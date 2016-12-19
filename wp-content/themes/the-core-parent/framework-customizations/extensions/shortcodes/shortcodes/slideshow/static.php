<?php

$slideshow              = fw()->extensions->get( 'shortcodes' )->get_shortcode( 'slideshow' );
$the_core_template_directory_uri = get_template_directory_uri();

wp_enqueue_script(
	'carouFredSel',
	$the_core_template_directory_uri . '/js/jquery.carouFredSel-6.2.1-packed.js',
	array( 'jquery' ),
	'',
	true
);

wp_enqueue_script(
	'masonry',
	$the_core_template_directory_uri . '/js/masonry.pkgd.min.js',
	array( 'jquery' ),
	'',
	true
);

wp_enqueue_script(
	'fw-slideshow-scripts',
	$slideshow->locate_URI( '/static/js/scripts.js' ),
	array( 'jquery' ),
	'',
	true
);