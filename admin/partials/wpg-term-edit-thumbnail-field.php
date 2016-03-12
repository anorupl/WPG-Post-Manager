<?php
/**
 * Thumbnail meta form template in edit term screen
 *
 * @since      1.0.0
 *
 * @package    Wpg_Post_Manager
 * @subpackage Wpg_Post_Manager/admin/partials
 * @author     Anoru <anorupl@gmail.com>
 * 
 */
?>

<tr id="wpg-term-thumb" class="form-field">
	<th scope="row"><label for="wpg-term-thumb-id"><?php _e( 'Term Thumbnail', 'wpg-post-manager'); ?></label></th>
	<td>
		<?php wp_nonce_field( 'my-nonce', 'wpg_term_thumb_nonce' ); ?>
		<div id="custom-img-container">
			<div id="thumb">
				<?php
					if ($has_image == true) {
					echo helper::the_term_thumbnail($term->term_id);
					}
				?>
			</div>
			<div class="inside <?php if ($has_image == true) {echo 'hidden';} ?>" style="margin-top: 100px;">
		  		<input id="add-term-image" class="button" type="button" value="<?php _e('Select Image', 'wpg-post-manager');?>">
		  	</div>
			<a id="remove-term-image" href="#" class="dashicons dashicons-no <?php if ($has_image == false) {echo 'hidden';} ?>"><?php _e('Remove Image', 'wpg-post-manager');?></a>
		</div>
		<input type="hidden" name="wpg-term-thumb-id" id="wpg-term-thumb-id" value="<?php echo $id_thumb; ?>"/>
	</td>
</tr>