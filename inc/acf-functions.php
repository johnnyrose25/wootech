<?php
/**
 * Acf Functions
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Code for SVG uploading - I guess the customizable block needed a SVG upload feature 

if (is_admin()){
function svgs_upload_mimes( $mimes = array() ) {

	if ( current_user_can( 'administrator' ) ) {

		// allow SVG file upload
		$mimes['svg'] = 'image/svg+xml';
		$mimes['svgz'] = 'image/svg+xml';

		return $mimes;

	} else {

		return $mimes;

	}

}
add_filter( 'upload_mimes', 'svgs_upload_mimes', 99 );


function svgs_upload_check( $checked, $file, $filename, $mimes ) {

	if ( ! $checked['type'] ) {

		$check_filetype		= wp_check_filetype( $filename, $mimes );
		$ext				= $check_filetype['ext'];
		$type				= $check_filetype['type'];
		$proper_filename	= $filename;

		if ( $type && 0 === strpos( $type, 'image/' ) && $ext !== 'svg' ) {
			$ext = $type = false;
		}

		$checked = compact( 'ext','type','proper_filename' );
	}

	return $checked;

}
add_filter( 'wp_check_filetype_and_ext', 'svgs_upload_check', 10, 4 );

function svgs_allow_svg_upload( $data, $file, $filename, $mimes ) {

	$filetype = wp_check_filetype( $filename, $mimes );

	return [
		'ext'				=> $filetype['ext'],
		'type'				=> $filetype['type'],
		'proper_filename'	=> $data['proper_filename']
	];

}
add_filter( 'wp_check_filetype_and_ext', 'svgs_allow_svg_upload', 10, 4 );

}

// Class for SVG Inline

class svgInline {

	public static function inline($url, $title = null) {

		$ext = pathinfo($url, PATHINFO_EXTENSION);

		if ($ext == 'svg'){

			return file_get_contents($url);

		}

		else {

			return '<img src="'. $url .'" alt="'. $title .'" />';

		}
		

	}


}

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register home banner block
		acf_register_block(array(
			'name'				=> 'banner',
			'title'				=> __('Home Page banner'),
			'description'		=> __('A custom Banner block.'),
			'render_callback'	=> 'homepage_banner',
			'category'			=> 'layout',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'banner', 'home' ),
		));

		// register after home banner block
		acf_register_block(array(
			'name'				=> 'afterbanner',
			'title'				=> __('Image and text banner'),
			'description'		=> __('A custom Gutenberg block.'),
			'render_callback'	=> 'after_banner',
			'category'			=> 'layout',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'after', 'home' ),
		));
	}
}

function homepage_banner() {

	include( get_theme_file_path("/resources/blocks/homebanner.php") );

}

function after_banner() {

	include( get_theme_file_path("/resources/blocks/afterbanner.php") );

}