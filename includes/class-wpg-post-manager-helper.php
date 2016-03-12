<?php
/**
 * File with helper functions for the plugin.
 *
 * @since      1.0.0
 *
 * @package    Wpg_Post_Manager
 * @subpackage Wpg_Post_Manager/includes
 * @author     Anoru <anorupl@gmail.com>
 * 
 */
 
/**
 * Define the helper functions for the plugin.
 *
 * @since      1.0.0
 *
 */ 
class helper {

 	/**
	 * This function Uppercase the first character of each word in string and changes the character "_" to " " 
	 *
	 * @since 1.0.0
	 * @param string $string
	 *
	 * @return string
	 */
	 public static function beautify($string) {
	    return ucwords(str_replace('_', ' ', $string));
	 }

 	/**
	 * This function converted string to lowercase and changes the character " " to "_" 
	 *
	 * @since 1.0.0
	 * @param string $string
	 *
	 * @return string
	 */ 
	 public static function uglify($string) {
	    return strtolower(str_replace(' ', '_', $string));
	 }
 
 	/**
	 * This function converted string to lowercase and changes the character "-" to "_" 
	 *
	 * @since 1.0.0
	 * @param string $string
	 *
	 * @return string
	 */ 
	 public static function underscore($string) {
	    return strtolower(str_replace('-', '_', $string));
	 }


	/**
	 * Retrieve term thumbnail meta field for a term.
	 *
	 * @since 1.0.0
	 * @param int $term_id Term ID
	 *
	 * @return int Attachment ID.
	 */
	public static function wpg_get_term_thumb_id($term_id) {

		$attachment_id = get_term_meta( $term_id, 'term_thumb', true );

		return $attachment_id = !empty($attachment_id) ? esc_attr( $attachment_id ) : '';

	}

	/**
	 * Get the URL of the term thumbnail meta.
	 *
	 * @since 1.0.0
	 *
	 * @param int 			$term_id 	Term ID
	 * @param string|array 	$size		Optional. Image size to retrieve. Accepts any valid image size, or an array
	 *									of width and height values in pixels (in that order). Default 'thumbnail'.
	 *
	 * @return string Term thumbnail url or empty string.
	 */
	public static function the_term_thumbnail_url($term_id, $size = "thumbnail"){

		$attachment_id = self::wpg_get_term_thumb_id($term_id);

		if (!empty($attachment_id)) {
			$url = 	wp_get_attachment_image_url($attachment_id,$size);

			return esc_url($url);
		}
		return '';
	}

	/**
	 * The term thumbnail.
	 *
	 * @since 1.0.0
	 *
	 * @param int 			$term_id 	Term ID
	 * @param string|array 	$size		Optional. Image size to retrieve. Accepts any valid image size, or an array
	 *									of width and height values in pixels (in that order). Default 'medium'.
	 *
	 * @return string Term thumbnail image or empty string.
	 */
	public static function the_term_thumbnail($term_id, $size = "medium") {

		$attachment_id = self::wpg_get_term_thumb_id($term_id);

		if (!empty($attachment_id)) {
			$image = wp_get_attachment_image($attachment_id, $size);

			return $image;
		}

		return '';
	}

	/**
	 * Sanitize function for term thumbnail meta
	 *
	 * @since 1.0.0
	 *
	 * @param intval $value
	 * @return intval
	 */
	public static function wpg_sanitize_thumb_id( $input ){

		return $input = !empty($input) ? absint($input) : '';
	}
}
?>