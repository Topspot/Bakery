<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$the_core_colors             = array(
	'color_1' => '#d12a5c',
	'color_2' => '#49ca9f',
	'color_3' => '#1f1f1f',
	'color_4' => '#808080',
	'color_5' => '#ebebeb'
);
$the_core_typography         = array(
	'h1' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => 'regular',
		'family'         => 'Crimson Text',
		'style'          => '',
		'weight'         => '',
		'size'           => '45',
		'line-height'    => '50',
		'letter-spacing' => '0',
	),
	'h2' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => 'regular',
		'family'         => 'Crimson Text',
		'style'          => '',
		'weight'         => '',
		'size'           => '38',
		'line-height'    => '42',
		'letter-spacing' => '0',
	),
	'h3' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => 'regular',
		'family'         => 'Crimson Text',
		'style'          => '',
		'weight'         => '',
		'size'           => '34',
		'line-height'    => '15',
		'letter-spacing' => '0',
	),
	'h4' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => 'regular',
		'family'         => 'Crimson Text',
		'style'          => '',
		'weight'         => '',
		'size'           => '30',
		'line-height'    => '34',
		'letter-spacing' => '0',
	),
	'h5' => array(
		'google_font'    => true,
		'subset'         => 'cyrillic',
		'variation'      => 'regular',
		'family'         => 'Playfair Display',
		'style'          => '',
		'weight'         => '',
		'size'           => '24',
		'line-height'    => '28',
		'letter-spacing' => '0',
	),
	'h6' => array(
		'google_font'    => true,
		'subset'         => 'cyrillic',
		'variation'      => 'regular',
		'family'         => 'Playfair Display',
		'style'          => '',
		'weight'         => '',
		'size'           => '22',
		'line-height'    => '26',
		'letter-spacing' => '0',
	),
	'buttons' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => 'regular',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '13',
		'line-height'    => '20',
		'letter-spacing' => '0',
	),
);
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
if (FW_WP_Option::get('fw_theme_settings_options:' . fw()->theme->manifest->get_id())) {
	// there are some settings in db
	$the_core_general_settings    = fw_get_db_settings_option();
} else {
	// no settings in db
	// the form was never saved or the Reset button was pressed
	$the_core_general_settings    = fw_get_db_settings_option('null', array('color_settings' => $the_core_colors, 'typography_settings' => $the_core_typography ));
}
$the_core_color_settings      = isset( $the_core_general_settings['color_settings'] ) ? $the_core_general_settings['color_settings'] : $the_core_colors;
$the_core_typography_settings = isset( $the_core_general_settings['typography_settings'] ) ? $the_core_general_settings['typography_settings'] : $the_core_typography;

$options   = array(
	'posts_header_height'          => array(
		'label'   => __( 'Header Height', 'the-core' ),
		'desc'    => __( "Select the header height in pixels (Ex: 300)", "the-core" ),
		'type'    => 'radio-text',
		'value'   => 'fw-section-height-md',
		'choices' => array(
			'auto'                 => __( 'auto', 'the-core' ),
			'fw-section-height-sm' => __( 'small', 'the-core' ),
			'fw-section-height-md' => __( 'medium', 'the-core' ),
			'fw-section-height-lg' => __( 'large', 'the-core' ),
		),
		'custom'  => 'custom_width',
	),
	'header_image' => array(
		'label' => __( 'Header Image', 'the-core' ),
		'desc'  => __( 'Upload the image for header', 'the-core' ),
		'help'  => __( 'You can set a general header image for all your products and product categories from the Theme Settings page under the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-posts#fw-options-tab-products">' . __( 'Products tab', 'the-core' ) . '</a>',
		'type'  => 'upload',
		'value' => '',
	),
	'category_header_overlay_options'  => array(
		'type'    => 'multi-picker',
		'label'        => __( 'Overlay Color', 'the-core' ),
		'desc'    => false,
		'picker'  => array(
			'category_header_overlay' => array(
				'type'         => 'switch',
				'label'   => false,
				'desc'         => __( 'Enable image overlay color?', 'the-core' ),
				'value'        => 'no',
				'right-choice' => array(
					'value' => 'yes',
					'label' => __( 'Yes', 'the-core' ),
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => __( 'No', 'the-core' ),
				),
			),
		),
		'choices' => array(
			'no'  => array(),
			'yes' => array(
				'category_header_overlay_color'         => array(
					'label'   => false,
					'desc'    => __( 'Select the image overlay color', 'the-core' ),
					'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
					'value'   => '',
					'choices' => $the_core_color_settings,
					'type'    => 'color-palette'
				),
				'category_header_overlay_opacity_image' => array(
					'type'       => 'slider',
					'value'      => 80,
					'properties' => array(
						'min' => 0,
						'max' => 100,
						'sep' => 1,
					),
					'label'   => false,
					'desc'       => __( 'Select the overlay color opacity in %', 'the-core' ),
				)
			),
		),
	),
	'header_image_overlap' => array(
		'label'   => __( 'Header Image Overlap', 'the-core' ),
		'desc'    => __( 'Select the header image overlap value in pixels (Ex: 100)', 'the-core' ),
		'help'    => __( 'The content that follows will overlap the header with the specified pixel amount.', 'the-core' ),
		'type'    => 'radio-text',
		'choices' => array(
			''                      => __( 'none', 'the-core' ),
			'fw-content-overlay-sm' => __( 'small', 'the-core' ),
			'fw-content-overlay-md' => __( 'medium', 'the-core' ),
			'fw-content-overlay-lg' => __( 'large', 'the-core' ),
		),
		'custom'  => 'custom_width',
		'value'   => ''
	),
	'category_header_title'         => array(
		'type'    => 'multi-picker',
		'label'   => __( 'Title', 'the-core' ),
		'desc'    => false,
		'picker'  => array(
			'category_title' => array(
				'label'   => false,
				'desc'    => __( 'Select what title will be displayed in the category header', 'the-core' ),
				'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
				'type'    => 'radio',
				'value'   => 'category_title',
				'choices' => array(
					'category_title' => __( 'Category Title', 'the-core' ),
					'custom_title'   => __( 'Custom Title', 'the-core' ),
				),
			),
		),
		'choices' => array(
			'custom_title' => array(
				'custom_title_text' => array(
					'label'   => false,
					'desc'  => __( 'Enter a custom title', 'the-core' ),
					'help'  => __( 'This title appears on this category page only and will be displayed in the header.', 'the-core' ),
					'type'  => 'text',
				),
			),
		),
	),
	'header_title_advanced_styling' => array(
		'attr'          => array(
			'data-advanced-for' => 'header_title_advanced_styling',
			'class'             => 'fw-advanced-button'
		),
		'type'          => 'popup',
		'label'         => __( 'Title', 'the-core' ),
		'desc'          => __( 'Change the style / typography of the title', 'the-core' ),
		'button'        => __( 'Styling', 'the-core' ),
		'size'          => 'small',
		'popup-options' => array(
			'subtitle_typography' => array(
				'label' => __( 'Title', 'the-core' ),
				'type'  => 'tf-typography',
				'value' => array(
					'google_font'    => $the_core_typography_settings['h1']['google_font'],
					'subset'         => $the_core_typography_settings['h1']['subset'],
					'variation'      => $the_core_typography_settings['h1']['variation'],
					'family'         => $the_core_typography_settings['h1']['family'],
					'style'          => $the_core_typography_settings['h1']['style'],
					'weight'         => $the_core_typography_settings['h1']['weight'],
					'size'           => $the_core_typography_settings['h1']['size'],
					'line-height'    => $the_core_typography_settings['h1']['line-height'],
					'letter-spacing' => $the_core_typography_settings['h1']['letter-spacing'],
					'color-palette'  => '',
				)
			),
		),
	),
	'header_subtitle_advanced_styling' => array(
		'attr'          => array(
			'data-advanced-for' => 'header_subtitle_advanced_styling',
			'class'             => 'fw-advanced-button'
		),
		'type'          => 'popup',
		'label'         => __( 'Description', 'the-core' ),
		'desc'          => __( 'Change the style / typography of the description', 'the-core' ),
		'button'        => __( 'Styling', 'the-core' ),
		'size'          => 'small',
		'popup-options' => array(
			'subtitle_typography' => array(
				'label' => __( 'Description', 'the-core' ),
				'type'  => 'tf-typography',
				'value' => array(
					'google_font'    => $the_core_typography_settings['subtitles']['google_font'],
					'subset'         => $the_core_typography_settings['subtitles']['subset'],
					'variation'      => $the_core_typography_settings['subtitles']['variation'],
					'family'         => $the_core_typography_settings['subtitles']['family'],
					'style'          => $the_core_typography_settings['subtitles']['style'],
					'weight'         => $the_core_typography_settings['subtitles']['weight'],
					'size'           => $the_core_typography_settings['subtitles']['size'],
					'line-height'    => $the_core_typography_settings['subtitles']['line-height'],
					'letter-spacing' => $the_core_typography_settings['subtitles']['letter-spacing'],
					'color-palette'  => '',
				)
			),
		),
	),
	'posts_header_content_position' => array(
		'label'   => __( 'Content Position', 'the-core' ),
		'desc'    => __( "Adjust the content vertical position in pixels (Ex: -20 or 20)", "the-core" ),
		'help'    => __( "Let's you fine tune the header content position on the vertical axis. Input a negative value if you want your content to go up or a positive value if you want your content to go down.", "the-core" ),
		'type'    => 'short-text',
		'value'   => '',
	),
);