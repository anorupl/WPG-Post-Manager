<?php
/**
 * File with template tags.
 *
 * @since      1.0.0
 * @package    Wpg_Post_Manager
 * @subpackage Wpg_Post_Manager/includes
 * @author     Anoru <anorupl@gmail.com>
 *

/**
 * Return the URL of the term thumbnail meta
 *
 * @since    1.0.0
 * @see 	'wpg_get_term_thumb_id'
 */
function the_term_thumbnail_url($term_id, $size = "thumbnail"){

	return helper::wpg_get_term_thumb_id($term_id, $size);
}
/**
 * Return the term thumbnail.
 * 
 * @since    1.0.0
 * @see 	'the_term_thumbnail'
 */
function the_term_thumbnail($term_id, $size = "medium"){

	return helper::the_term_thumbnail($term_id, $size);
}
/**
 * Return the thumbnail id for the term.
 * 
 * @since    1.0.0
 * @see 	'wpg_get_term_thumb_id'
 */
function wpg_get_term_thumb_id($term_id){

	return helper::wpg_get_term_thumb_id($term_id);
}

?>