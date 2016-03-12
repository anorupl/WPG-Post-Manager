<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Wpg_Post_Manager
 * @subpackage Wpg_Post_Manager/admin
 * @author     Anoru <anorupl@gmail.com>
 * 
 */


/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.0.0
 */
class Wpg_Custom_Post_Type {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 *  The custom post type name.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $post_type_name    The current custom post type name.
	 */
 	public $post_type_name;

	/**
	 *  The custom post type args.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $post_type_args    The current custom post type args.
	 */
    public $post_type_args;

	/**
	 *  The custom post type labels.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $post_type_labels    The current custom post type labels.
	 */
    public $post_type_labels;

 	/**
	 *  The current custom taxonomy name.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $post_type_taxonomy    The current custom taxonomy name.
	 */   
    public $post_type_taxonomy;


	

	/* ***********************************************
	 * 												 *
	 * Section with function to add custom post type *
	 * 												 *
	************************************************/

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name     The name of this plugin.
	 * @param    string    $version    		The version of this plugin.
	 *
	 */
	public function __construct( $plugin_name, $version) {

		$this->plugin_name	= $plugin_name;
		$this->version 		= $version;
		
		

		// Array specifying, what fields to be added in the taxonomy
		$this->tax_metabox = array(
							'post_gallery'=> array(
									'taxonomy'		=>	'gallery',
									'tax_metabox' 	=>	'thumbnail'
							)
		);

		// Array specifying, custom post type and taxonomy
		$this->setting = array(
	
					'post_gallery'=> array(
									'single'	=> __( 'Gallery', 'wpg-post-manager' ),
									'plural'	=> __( 'Galleries', 'wpg-post-manager' ),
									'post_labels' 	=> array(
															'name'                => _x( 'Galleries', 'post type general name', 'wpg-post-manager' ),
															'singular_name'       => _x( 'Gallery','post type singular name', 'wpg-post-manager' ),
															'menu_name'           => __( 'Gallery', 'wpg-post-manager' ),
															'all_items'           => __( 'All Galleries', 'wpg-post-manager' ), 
															'view_item'           => __( 'View Gallery', 'wpg-post-manager' ), 
															'add_new_item'        => __( 'Add New Gallery', 'wpg-post-manager' ), // W menu po prawej i w naglowku
															'add_new'             => __( 'Add New Gallery', 'wpg-post-manager' ),
															'edit_item'           => __( 'Edit Gallery', 'wpg-post-manager' ),															'update_item'         => __( 'Update Offer', 'wpg-post-manager' ), 
															'search_items'        => __( 'Search Galleries', 'wpg-post-manager' ),
															'not_found'           => __( 'Not found galleries', 'wpg-post-manager' ),
															'not_found_in_trash'  => __( 'No galleries found in trash', 'wpg-post-manager' )
														),
									'post_setting' 	=> array(
														'public'      => true, // true = like post, false = like menu
														'menu_icon'   => 'dashicons-portfolio',
														'has_archive' => true,
														'supports'    => array( 'title','editor' ,'author','thumbnail', 'excerpt', 'thumbnail', 'custom-fields','comments' ,'revisions' ),
									),
									'taxonomy'		=>	'gallery',
									'tax_setting' 	=>	array(
															'labels' => array(
																		'name'                       => _x( 'Gallery Categories', 'Taxonomy General Name', 'wpg-post-manager' ),
																		'singular_name'              => _x( 'Gallery Category', 'Taxonomy Singular Name', 'wpg-post-manager' ),
																		'menu_name'                  => __( 'Gallery Categories', 'wpg-post-manager' ),
																		'all_items'                  => __( 'All gallery Categories', 'wpg-post-manager'),
																		'parent_item'                => __( 'Parent gallery category', 'wpg-post-manager'),
																		'parent_item_colon'          => __( 'Parent gallery category:', 'wpg-post-manager'),
																		'new_item_name'              => __( 'New gallery category name', 'wpg-post-manager'),
																		'add_new_item'               => __( 'Add new gallery category', 'wpg-post-manager'),
																		'edit_item'                  => __( 'Edit gallery category', 'wpg-post-manager' ),
																		'update_item'                => __( 'Update gallery category', 'wpg-post-manager'),
																		'view_item'                  => __( 'View gallery category', 'wpg-post-manager' ),
																		'separate_items_with_commas' => __( 'Separate gallery categories with commas', 'wpg-post-manager'),
																		'add_or_remove_items'        => __( 'Add or remove gallery category', 'wpg-post-manager'),
																		'choose_from_most_used'      => __( 'Choose from the most used', 'wpg-post-manager' ),
																		'popular_items'              => __( 'Popular gallery categories', 'wpg-post-manager'),
																		'search_items'               => __( 'Search gallery category', 'wpg-post-manager'),
																		'not_found'                  => __( 'Not Found', 'wpg-post-manager'),
																		'no_terms'                   => __( 'No items', 'wpg-post-manager'),
																		'items_list'                 => __( 'Gallery categories list', 'wpg-post-manager' ),
																		'items_list_navigation'      => __( 'Gallery categories list navigation', 'wpg-post-manager')
															),
									),
											
					),
					'offer'=> array(
									'single'		=>__('Offer','wpg-post-manager'),
									'plural'		=>__('Offers','wpg-post-manager'),
									'post_labels' 	=> array(
															'name'                => _x( 'Offers', 'post type general name', 'wpg-post-manager' ),
															'singular_name'       => _x( 'Offer','post type singular name', 'wpg-post-manager' ),
															'menu_name'           => __( 'Offer', 'wpg-post-manager' ),
															'all_items'           => __( 'All Offers', 'wpg-post-manager' ), 
															'view_item'           => __( 'View offer', 'wpg-post-manager' ), 
															'add_new_item'        => __( 'Add New Offer', 'wpg-post-manager' ), // W menu po prawej i w naglowku
															'add_new'             => __( 'Add New Offer', 'wpg-post-manager' ),
															'edit_item'           => __( 'Edit Offer', 'wpg-post-manager' ),															'update_item'         => __( 'Update Offer', 'wpg-post-manager' ), 
															'search_items'        => __( 'Search Offers', 'wpg-post-manager' ),
															'not_found'           => __( 'Not found offers', 'wpg-post-manager' ),
															'not_found_in_trash'  => __( 'No offers found in trash', 'wpg-post-manager' )
														),
									
									'post_setting' 	=> array(
														'hierarchical'        => true,
														'public'              => true, // true = like post, false = like menu
														'menu_icon'           => 'dashicons-portfolio',
														'has_archive'         => true,
														'exclude_from_search' => false,
														'publicly_queryable'  => true,
														'supports'    => array( 'title','editor' ,'author','thumbnail', 'excerpt', 'thumbnail', 'custom-fields','comments' ,'revisions' ),
														),
									'taxonomy'		=>	false,
											
					),						
					'client_reviews'=> array(
									'single'	=> __( 'Client Review', 'wpg-post-manager' ),
									'plural'	=> __( 'Client Reviews', 'wpg-post-manager' ),
									'post_labels' 	=> array(
															'name'                => _x( 'Client Reviews', 'post type general name', 'wpg-post-manager' ),
															'singular_name'       => _x( 'Client Review','post type singular name', 'wpg-post-manager' ),
															'menu_name'           => __( 'Client Review', 'wpg-post-manager' ),
															'all_items'           => __( 'All Client Reviews', 'wpg-post-manager' ), 
															'view_item'           => __( 'View Client Review', 'wpg-post-manager' ), 
															'add_new_item'        => __( 'Add New Client Review', 'wpg-post-manager' ), // W menu po prawej i w naglowku
															'add_new'             => __( 'Add New Client Review', 'wpg-post-manager' ),
															'edit_item'           => __( 'Edit Client Review', 'wpg-post-manager' ),															'update_item'         => __( 'Update Offer', 'wpg-post-manager' ), 
															'search_items'        => __( 'Search Client Reviews', 'wpg-post-manager' ),
															'not_found'           => __( 'Not found client reviews', 'wpg-post-manager' ),
															'not_found_in_trash'  => __( 'No client reviews found in trash', 'wpg-post-manager' )
														),
									'post_setting' 	=> array(
														'hierarchical'        => true,
														'public'              => false, // true = like post, false = like menu
														'menu_icon'           => 'dashicons-portfolio',
														'has_archive'         => false,
														'exclude_from_search' => true,
														'publicly_queryable'  => true,
														'supports'            => array( 'title', 'excerpt', 'thumbnail', 'custom-fields', ),
														),
									'taxonomy'		=>	false,
											
					)								
	);		
		
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpg_Post_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpg_Post_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpg-post-manager-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook_suffix) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpg_Post_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpg_Post_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

  		if ( 'edit-tags' !== get_current_screen()->base )
	        return;

		wp_enqueue_media();
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpg-post-manager-admin.js', array( 'jquery' ), $this->version, false );

			$post_manager_lang = array(
		  	'title_frame' 		=> __('Select or Upload Media Of Your Chosen Persuasion', 'wpg-post-manager'),
			'use_button' 		=> __('Use this media', 'wpg-post-manager'),
			);
  		wp_localize_script( $this->plugin_name, helper::underscore($this->plugin_name) , $post_manager_lang );


	}
	

	/**
     * Register Custom Post Types
	 * 
     * @see https://codex.wordpress.org/Function_Reference/register_post_type
     * @since 1.0.0
     */
    public function register_post_types() {
        	
        // Register each individual post type
        foreach( $this->setting as $type_type => $args ) {
            		
				$base_args = array_merge(
					        // Default
							array(
				                'label'               => $args['plural'],
            					'labels'              => $args['post_labels'],           
								'show_ui'             => true,
								'show_in_menu'        => true,
								'show_in_nav_menus'   => true,
								'show_in_admin_bar'   => false,
						        'show_in_nav_menus'   => true,
						        'can_export'          => true,
				    
			            	),
					        // Given args
					        $args['post_setting']
			    );		
				
	            register_post_type( $type_type, $base_args );
        }
    }
	
	



	/* **********************************************
	 * 												*
	 * Section with function to add custom taxonomy *
	 * 												*
	************************************************/

	/**
	 * Setup for custom taxonomy.
	 *
	 * @since    1.0.0
	 */
	public function setup_taxonomy() {
			
			
			
		foreach ( $this->setting as $post_types => $taxonomy ) {
				
			if ($taxonomy['taxonomy'] !== false) {
				
				//marge setting
				
				$args = array_merge(
								array(
									'hierarchical'               => true,
									'public'                     => true,
									'show_ui'                    => true,
									'show_admin_column'          => true,
									'show_in_nav_menus'          => true,
									'menu_icon' 				 => 'dashicons-format-gallery',
									'show_tagcloud'              => false,
									'rewrite'                    => array(
																	'slug'			=>	$taxonomy['taxonomy'],
																	'with_front'	=>	true,
																	'hierarchical'  =>	true),
									
							),
							// Given args
					        $taxonomy['tax_setting']
				);				
				
				register_taxonomy( $taxonomy['taxonomy'], $post_types, $args );
				
			}
		}
	}


	/* ****************************************************************
	 * 																  *
	 * Section with functions to add custom meta box in term taxonomy *
	 * 																  *
	*******************************************************************/

	/**
	 * Function for register term thumbnail meta
	 *
	 * @since 1.0.0
	 */
	public function wpg_register_meta_image() {

	    register_meta( 'term', 'term_thumb', array( $this, 'wpg_sanitize_thumb_id' ));
	}


	/**
	 * Add form field in add taxonomy term screen
	 *
	 *  @since 1.0.0
	 *	@param object $term
	 */
	public function add_form_meta_thumbnail(){

	    wp_nonce_field( 'my-nonce', 'wpg_term_thumb_nonce' );
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/wpg-term-add-thumbnail-field.php';

	}

	/**
	 * Add form field in edit taxonomy term screen
	 *
	 *  @since 1.0.0
	 *	@param object $term
	 */
	public function edit_form_meta_thumbnail($term ){

		$id_thumb 	=	helper::wpg_get_term_thumb_id($term->term_id);
	   	$has_image 	=	!empty($id_thumb); // nie ma true , ma false

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/wpg-term-edit-thumbnail-field.php';

	}

	/**
	 * Function save, update and delete term meta
	 *
	 *  @since 1.0.0
	 *	@param int $term_id Term ID
	 */
	public function save_meta_thumbnail($term_id) {

		if ( ! isset( $_POST['wpg_term_thumb_nonce'] ) || ! wp_verify_nonce( $_POST['wpg_term_thumb_nonce'], 'my-nonce' ) )
	    return;

	    $old_thumb = helper::wpg_get_term_thumb_id($term_id );
	    $new_thumb = isset( $_POST['wpg-term-thumb-id'] ) ? helper::wpg_sanitize_thumb_id( $_POST['wpg-term-thumb-id'] ) : '';

	    if ( $old_thumb && '' === $new_thumb )
	        delete_term_meta( $term_id, 'term_thumb' );

	    else if ( $old_thumb !== $new_thumb )
	        update_term_meta( $term_id, 'term_thumb', $new_thumb );

	}
	/**
	 * Filter applied to the list of columns to print column title on the manage taxonomy screen
	 * 
	 * manage_edit-{$taxonomy_id}_columns
	 * 
	 * @since 1.0.0
	 */
	function term_thumbnail_columns( $columns ) {

	    $columns['term_thumb'] = __( 'Thumbnail', 'wpg-post-manager' );

	    return $columns;
	}


 
	/**
	 * Filter applied to the list of columns to print column value on the manage taxonomy screen
	 * 
	 * manage_{$taxonomy_id}_custom_column
	 *
	 * @since 1.0.0
	 */	 
	function manage_term_thumbnail_column( $out, $column, $term_id ) {

	    if ( 'term_thumb' === $column ) {

	        $url = helper::the_term_thumbnail_url($term_id);

	        if ( ! $url ) {
	           return '<div class="no-thumb dashicons dashicons-format-image"></div>';
			}
	        $out = sprintf( '<img src="%s" alt="" />', $url);
	    }

	    return $out;
	}



	/**
	 * Add the necessary action for the registration the new fields in taxonomy.
	 *
	 * @since    1.0.0
	 */	
	function action_taxonomy_metabox(){
		/**
 		 * The Wpg_Post_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
 		foreach ( $this->tax_metabox as $post_types => $taxonomy ) {
			
			
			if ($taxonomy['tax_metabox'] !== false) {
					
				switch ($taxonomy['tax_metabox']) {
				    case "thumbnail":
						add_action( 'init', array($this, 'wpg_register_meta_image'));
						add_action( $taxonomy['taxonomy'] .'_add_form_fields', array($this,'add_form_meta_thumbnail' ));
						add_action( $taxonomy['taxonomy'] .'_edit_form_fields', array($this,	'edit_form_meta_thumbnail' ));
						add_action( 'create_'. $taxonomy['taxonomy'] , array($this, 'save_meta_thumbnail'));
						add_action( 'edit_'. $taxonomy['taxonomy'] , array($this, 'save_meta_thumbnail'));
				        break;
				    default:
				}				
			}
		}
	}
	/**
	 * Add the necessary filters for the registration the new fields in taxonomy.
	 *
	 * @since    1.0.0
	 */	
	function filter_taxonomy_metabox(){

		/**
 		 * The Wpg_Post_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */			
		foreach ( $this->tax_metabox as $post_types => $taxonomy ) {
			if ($taxonomy['tax_metabox'] !== false) {
					
				switch ($taxonomy['tax_metabox']) {
				    case "thumbnail":
						add_filter( 'manage_edit-'. $taxonomy['taxonomy'] .'_columns', array($this, 'term_thumbnail_columns'));
	 					add_filter( 'manage_'. $taxonomy['taxonomy'] .'_custom_column', array($this, 'manage_term_thumbnail_column'), 10, 3);
				        break;
				    default:
				}				
			}
		}		
	}

}
