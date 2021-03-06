<?php
/**
 * Additional sanitization methods for controls.
 * These are used in the field's 'sanitize_callback' argument.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2015, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Early exit if the class already exists
if ( class_exists( 'Kirki_Sanitize' ) ) {
	return;
}

class Kirki_Sanitize {

	/**
	 * Checkbox sanitization callback.
	 *
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool|string $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	public static function checkbox( $checked ) {
		return ( ( isset( $checked ) && ( true == $checked || 'on' == $checked ) ) ? true : false );
	}

	/**
	 * Sanitize number options
	 *
	 * @since 0.5
	 */
	public static function number( $value ) {
		return ( is_numeric( $value ) ) ? $value : intval( $value );
	}

	/**
	 * Select sanitization callback example.
	 *
	 * - Control: select, radio
	 *
	 * Sanitization callback for 'select' and 'radio' type controls. This callback sanitizes `$input`
	 * as a slug, and then validates `$input` against the choices defined for the control.
	 *
	 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
	 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
	 *
	 * @param string               $input   Slug to sanitize.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
	 */
	public static function choice( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		if ( ! is_object( $setting->manager->get_control( $setting->id ) ) || null == $setting->manager->get_control( $setting->id ) ) {
			return $input;
		} else {
			// Get list of choices from the control associated with the setting.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			return ( ! is_array( $choices ) || ! is_object( $setting ) || array_key_exists( $input, $choices ) ? $input : $setting->default );
		}
	}

	/**
	 * Drop-down Pages sanitization callback.
	 *
	 * - Sanitization: dropdown-pages
	 * - Control: dropdown-pages
	 *
	 * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
	 * as an absolute integer, and then validates that $input is the ID of a published page.
	 *
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
	 *
	 * @param int                  $page_id    Page ID.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 */
	public static function dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );

		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	/**
	 * Sanitize sortable controls
	 *
	 * @since 0.8.3
	 */

	public static function sortable( $value ) {
		if ( is_serialized( $value ) ) {
			return $value;
		} else {
			return serialize( $value );
		}
	}

	/**
	 * Sanitize RGBA colors
	 *
	 * @since 0.8.5
	 */
	public static function rgba( $value ) {

		// If empty or an array return transparent
		if ( empty( $value ) || is_array( $value ) ) {
			return 'rgba(0,0,0,0)';
		}

		// If string does not start with 'rgba', then treat as hex
		// sanitize the hex color and finally convert hex to rgba
		if ( false === strpos( $value, 'rgba' ) ) {
			return Kirki_Color::get_rgba( Kirki_Color::sanitize_hex( $value ) );
		}

		// By now we know the string is formatted as an rgba color so we need to further sanitize it.
		$value = str_replace( ' ', '', $value );
		sscanf( $value, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
		return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';

	}

	/**
	 * Sanitize colors.
	 * Determine if the current value is a hex or an rgba color and call the appropriate method.
	 *
	 * @since 0.8.5
	 * @return string
	 */
	public static function color( $value ) {

		// Is this an rgba color or a hex?
		$mode = ( false === strpos( $value, 'rgba' ) ) ? 'rgba' : 'hex';

		if ( 'rgba' == $mode ) {
			return Kirki_Color::sanitize_hex( $value );
		} else {
			return self::rgba( $value );
		}

	}

	/**
	 * multicheck callback
	 */
	public static function multicheck( $values ) {

		$multi_values = ( ! is_array( $values ) ) ? explode( ',', $values ) : $values;
		return ( ! empty( $multi_values ) ) ? array_map( 'sanitize_text_field', $multi_values ) : array();

	}

	/**
	 * DOES NOT SANITIZE ANYTHING.
	 *
	 * @since 0.5
	 */
	public static function unfiltered( $value ) {
		return $value;
	}

}
