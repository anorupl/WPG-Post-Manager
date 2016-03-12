<?php
/**
 * Thumbnail meta form template in manage taxonomy screen
 *
 * @since      1.0.0
 *
 * @package    Wpg_Post_Manager
 * @subpackage Wpg_Post_Manager/admin/partials
 * @author     Anoru <anorupl@gmail.com>
 * 
 */
?>

<div id="wpg-term-thumb" class="form-field">
	<label for="wpg-term-thumb-id"><?php _e( 'Term Thumbnail', 'wpg-post-manager'); ?></label>
	<div id="custom-img-container">
		<div id="thumb"></div>
		<div class="inside">
			<input id="add-term-image" class="button" type="button" value="<?php _e('Select Image', 'wpg-post-manager');?>">
		</div>
		<a id="remove-term-image" href="#" class="dashicons dashicons-no hidden"><?php _e('Remove Image', 'wpg-post-manager');?></a>
	</div>
	<input type="hidden" name="wpg-term-thumb-id" id="wpg-term-thumb-id" value=""/>
</div>