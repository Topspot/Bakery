<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */

$the_core_template_directory = get_template_directory_uri();
if ( defined( 'FW' ) ) {
	$the_core_version   = fw()->theme->manifest->get_version();
	$the_core_blog_view = fw_get_db_settings_option( 'posts_settings/blog_view' );
} else {
	$the_core_version   = '1.0';
	$the_core_blog_view = '';
}

/**
 * Enqueue scripts and styles for the front end.
 */

// Load bootstrap stylesheet.
wp_enqueue_style(
	'bootstrap',
	$the_core_template_directory . '/css/bootstrap.css',
	array(),
	$the_core_version
);

// Load menu stylesheet.
wp_enqueue_style(
	'fw-mmenu',
	$the_core_template_directory . '/css/jquery.mmenu.all.css',
	array(),
	$the_core_version
);

// Load our main stylesheet. It is generated with less in upload folder
$upload_dir = wp_upload_dir();
$style_dir  = $upload_dir['baseurl'];
if( file_exists($upload_dir['basedir'] . '/the-core-style.css') ) {
	wp_enqueue_style(
		'the-core-style',
		$style_dir . '/the-core-style.css',
		array(),
		filemtime( $upload_dir['basedir'] . '/the-core-style.css' )
	);
}
else {
	wp_enqueue_style(
		'the-core-style',
		$the_core_template_directory . '/css/the-core-style.css',
		array(),
		$the_core_version
	);
}

// Load our main stylesheet.
wp_enqueue_style(
	'fw-theme-style',
	get_stylesheet_uri(),
	array(),
	$the_core_version
);

// Load prettyPhoto stylesheet.
wp_enqueue_style(
	'prettyPhoto',
	$the_core_template_directory . '/css/prettyPhoto.css',
	array(),
	$the_core_version
);

// Load animate stylesheet.
wp_enqueue_style(
	'animate',
	$the_core_template_directory . '/css/animate.css',
	array(),
	$the_core_version
);

// Load font-awesome stylesheet.
wp_enqueue_style(
	'font-awesome',
	$the_core_template_directory . '/css/font-awesome.css',
	array(),
	$the_core_version
);

// Load js files.
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

wp_enqueue_script(
	'modernizr',
	$the_core_template_directory . '/js/lib/modernizr.min.js',
	array( 'jquery' ),
	$the_core_version,
	false
);

wp_enqueue_script(
	'bootstrap',
	$the_core_template_directory . '/js/lib/bootstrap.min.js',
	array(),
	$the_core_version,
	false
);

wp_enqueue_script(
	'carouFredSel',
	$the_core_template_directory . '/js/jquery.carouFredSel-6.2.1-packed.js',
	array( 'jquery' ),
	$the_core_version,
	true
);

wp_enqueue_script(
	'touchSwipe',
	$the_core_template_directory . '/js/jquery.touchSwipe.min.js',
	array( 'jquery' ),
	$the_core_version,
	false
);

wp_enqueue_script(
	'prettyPhoto',
	$the_core_template_directory . '/js/jquery.prettyPhoto.js',
	array( 'jquery' ),
	$the_core_version,
	true
);

if ( $the_core_blog_view == 'grid' || get_post_type() == 'product' || get_post_type() == 'fw-portfolio') {
	wp_enqueue_script(
		'masonry-theme',
		$the_core_template_directory . '/js/masonry.pkgd.min.js',
		array( 'jquery' ),
		$the_core_version,
		true
	);
}

wp_enqueue_script(
	'customInput',
	$the_core_template_directory . '/js/jquery.customInput.js',
	array( 'jquery' ),
	$the_core_version,
	true
);

wp_enqueue_script(
	'scrollTo',
	$the_core_template_directory . '/js/scrollTo.min.js',
	array( 'jquery' ),
	$the_core_version,
	true
);

wp_enqueue_script(
	'mmenu',
	$the_core_template_directory . '/js/jquery.mmenu.min.all.js',
	array( 'jquery' ),
	$the_core_version,
	true
);

wp_enqueue_script(
	'selectize',
	$the_core_template_directory . '/js/selectize.min.js',
	array( 'jquery' ),
	$the_core_version,
	true
);

wp_enqueue_script(
	'stellar',
	$the_core_template_directory . '/js/jquery.stellar.min.js',
	array( 'jquery' ),
	$the_core_version,
	true
);

wp_enqueue_script(
	'lazysizes',
	$the_core_template_directory . '/js/lazysizes.min.js',
	array( 'jquery' ),
	$the_core_version,
	true
);

wp_enqueue_script(
	'general',
	$the_core_template_directory . '/js/general.js',
	array( 'jquery' ),
	$the_core_version,
	true
);

wp_localize_script( 'general', 'FwPhpVars', array(
	'ajax_url'           => admin_url( 'admin-ajax.php' ),
	'template_directory' => $the_core_template_directory,
	'previous' => esc_html__('Previous', 'the-core'),
	'next' => esc_html__('Next', 'the-core'),
    'smartphone_animations' => function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option( 'enable_smartphone_animations', 'no' ) : 'no',
    'fail_form_error' => esc_html__('Sorry you are an error in ajax, please contact the administrator of the website', 'the-core'),
) );

// contact form messages
if ( defined( 'FW' ) && FW_Form::get_submitted() && ! FW_Form::get_submitted()->is_valid() ) {
	wp_localize_script( 'general', '_fw_form_invalid', array(
		'id'     => FW_Form::get_submitted()->get_id(),
		'errors' => FW_Form::get_submitted()->get_errors(),
	) );
}

// js for ie < ie9
wp_enqueue_script( 'html5shiv', $the_core_template_directory . '/js/lib/html5shiv.js', array(), $the_core_version );
wp_style_add_data( 'html5shiv', 'conditional', 'if lt IE 9' );

wp_enqueue_script( 'respond', $the_core_template_directory . '/js/lib/respond.min.js', array(), $the_core_version );
wp_style_add_data( 'respond', 'conditional', 'if lt IE 9' );