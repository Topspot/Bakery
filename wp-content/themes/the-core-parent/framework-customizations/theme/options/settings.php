<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in backend
 */

$the_core_portfolio_tab = $the_core_events_tab = $the_core_products_tab = $the_core_learning_tab = $the_core_bbpress_tab = $the_core_buddypress_tab=  array();
if ( fw_ext( 'portfolio' ) ) {
	$the_core_portfolio_tab = fw()->theme->get_options( 'portfolio-tab' );
}
if ( fw_ext( 'events' ) ) {
	$the_core_events_tab = fw()->theme->get_options( 'events-tab' );
}
if ( fw_ext( 'learning' ) ) {
	$the_core_learning_tab = fw()->theme->get_options( 'learning-tab' );
}
if ( class_exists( 'WooCommerce' ) ) {
	$the_core_products_tab = fw()->theme->get_options( 'products-tab' );
}
if ( class_exists( 'bbPress' ) ) {
	$the_core_bbpress_tab = fw()->theme->get_options( 'bbpress-tab' );
}
if ( class_exists( 'BuddyPress' ) ) {
	$the_core_buddypress_tab = fw()->theme->get_options( 'buddypress-tab' );
}

$the_core_requirements_tab = fw()->theme->get_options( 'theme-requirements' );

$the_core_colors             = array(
	'color_1' => '#d12a5c',
	'color_2' => '#49ca9f',
	'color_3' => '#1f1f1f',
	'color_4' => '#808080',
	'color_5' => '#ebebeb'
);
$the_core_typography          = array(
	'h1' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => 'regular',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '55',
		'line-height'    => '65',
		'letter-spacing' => '-2',
	),
	'h2' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => '700',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '40',
		'line-height'    => '56',
		'letter-spacing' => '-2',
	),
	'h3' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => '700',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '32',
		'line-height'    => '38',
		'letter-spacing' => '-2',
	),
	'h4' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => '700',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '26',
		'line-height'    => '32',
		'letter-spacing' => '-2',
	),
	'h5' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => '700',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '19',
		'line-height'    => '28',
		'letter-spacing' => '-1',
	),
	'h6' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => '700',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '14',
		'line-height'    => '26',
		'letter-spacing' => '-1',
	),
	'buttons' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => 'regular',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '12',
		'line-height'    => '30',
		'letter-spacing' => '0',
	),
	'subtitles' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => '300',
		'family'         => 'Merriweather',
		'style'          => '',
		'weight'         => '',
		'size'           => '22',
		'line-height'    => '39',
		'letter-spacing' => '0.5',
	),
);
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option( 'color_settings', $the_core_colors );
$the_core_typography_settings = fw_get_db_settings_option( 'typography_settings', $the_core_typography );

$options = array(
	'general'        => array(
		'title'   => __( 'General', 'the-core' ),
		'type'    => 'tab',
		'options' => array(
			'general-options' => array(
				'title'   => __( 'General', 'the-core' ),
				'type'    => 'tab',
				'options' => array(
					'general-box' => array(
						'title'   => __( 'Global Settings', 'the-core' ),
						'type'    => 'box',
						'options' => array(
							'container_site_type'  => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected' => array(
										'label'   => __( 'Website Width', 'the-core' ),
										'desc'    => __( "Select your website's width", "the-core" ),
										'value'   => 'fw-side-boxed',
										'type'    => 'image-picker',
										'choices' => array(
											'fw-full'       => array(
												'small' => array(
													'height' => 70,
													'src'    => $the_core_template_directory . '/images/image-picker/full.jpg'
												),
												'large' => array(
													'height' => 214,
													'src'    => $the_core_template_directory . '/images/image-picker/full.jpg'
												),
											),
											'fw-side-boxed' => array(
												'small' => array(
													'height' => 70,
													'src'    => $the_core_template_directory . '/images/image-picker/side-boxed.jpg'
												),
												'large' => array(
													'height' => 214,
													'src'    => $the_core_template_directory . '/images/image-picker/side-boxed.jpg'
												),
											),
										),
									),
								),
								'choices' => array(
									'fw-side-boxed' => array(
										'site_width'     => array(
											'type'       => 'slider',
											'value'      => 1560,
											'properties' => array(
												'min' => 1170,
												'max' => 1920,
												'sep' => 1,
											),
											'label'      => __( '', 'the-core' ),
											'desc'       => __( 'Select the website width', 'the-core' ),
										),
										'site_margin'    => array(
											'label' => __( '', 'the-core' ),
											'desc'  => __( 'Enter the top and bottom margin', 'the-core' ),
											'value' => '',
											'type'  => 'short-text',
										),
										'boxed_container_bg'    => array(
											'label' => __( 'Container Background', 'the-core' ),
											'desc'  => __( 'Select the website container background', 'the-core' ),
											'value' => '#ffffff',
											'type'  => 'color-picker',
										),
										'site_alignment' => array(
											'label'   => __( 'Website Alignment', 'the-core' ),
											'desc'    => __( 'Choose the website alignment', 'the-core' ),
											'type'    => 'image-picker',
											'value'   => 'fw-website-align-center',
											'choices' => array(
												'fw-website-align-left'   => array(
													'small' => array(
														'height' => 50,
														'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
														'title'  => __( 'Left', 'the-core' )
													),
												),
												'fw-website-align-center' => array(
													'small' => array(
														'height' => 50,
														'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
														'title'  => __( 'Center', 'the-core' )
													),
												),
												'fw-website-align-right'  => array(
													'small' => array(
														'height' => 50,
														'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
														'title'  => __( 'Right', 'the-core' )
													),
												),
											),
										),
									)
								)
							),
							'website_background'   => array(
								'type'          => 'multi',
								'label'         => false,
								'inner-options' => array(
									'website_bg_color' => array(
										'label' => __( 'Website Background', 'the-core' ),
										'desc'  => __( 'Select the website background color', 'the-core' ),
										'value' => '#f1eee9',
										'type'  => 'color-picker',
									),
									'website_bg'       => array(
										'type'    => 'background-image',
										'value'   => 'none',
										'label'   => __( '', 'the-core' ),
										'desc'    => __( 'Select the patern overlay', 'the-core' ),
										'choices' => array(
											'none' => array(
												'icon' => $the_core_template_directory . '/images/patterns/no_pattern.jpg',
												'css'  => array(
													'background-image' => 'none'
												),
											),
											'bg-1' => array(
												'icon' => $the_core_template_directory . '/images/patterns/diagonal_bottom_to_top_pattern_preview.jpg',
												'css'  => array(
													'background-image'  => 'url("' . $the_core_template_directory . '/images/patterns/diagonal_bottom_to_top_pattern.png' . '")',
													'background-repeat' => 'repeat',
												)
											),
											'bg-2' => array(
												'icon' => $the_core_template_directory . '/images/patterns/diagonal_top_to_bottom_pattern_preview.jpg',
												'css'  => array(
													'background-image'  => 'url("' . $the_core_template_directory . '/images/patterns/diagonal_top_to_bottom_pattern.png' . '")',
													'background-repeat' => 'repeat',
												)
											),
											'bg-3' => array(
												'icon' => $the_core_template_directory . '/images/patterns/dots_pattern_preview.jpg',
												'css'  => array(
													'background-image'  => 'url("' . $the_core_template_directory . '/images/patterns/dots_pattern.png' . '")',
													'background-repeat' => 'repeat',
												)
											),
											'bg-4' => array(
												'icon' => $the_core_template_directory . '/images/patterns/noise_pattern_preview.jpg',
												'css'  => array(
													'background-image'  => 'url("' . $the_core_template_directory . '/images/patterns/noise_pattern.png' . '")',
													'background-repeat' => 'repeat',
												)
											),
											'bg-5' => array(
												'icon' => $the_core_template_directory . '/images/patterns/romb_pattern_preview.jpg',
												'css'  => array(
													'background-image'  => 'url("' . $the_core_template_directory . '/images/patterns/romb_pattern.png' . '")',
													'background-repeat' => 'repeat',
												)
											),
											'bg-6' => array(
												'icon' => $the_core_template_directory . '/images/patterns/square_pattern_preview.jpg',
												'css'  => array(
													'background-image'  => 'url("' . $the_core_template_directory . '/images/patterns/square_pattern.png' . '")',
													'background-repeat' => 'repeat',
												)
											),
											'bg-7' => array(
												'icon' => $the_core_template_directory . '/images/patterns/vertical_lines_pattern_preview.jpg',
												'css'  => array(
													'background-image'  => 'url("' . $the_core_template_directory . '/images/patterns/vertical_lines_pattern.png' . '")',
													'background-repeat' => 'repeat',
												)
											),
											'bg-8' => array(
												'icon' => $the_core_template_directory . '/images/patterns/waves_pattern_preview.jpg',
												'css'  => array(
													'background-image'  => 'url("' . $the_core_template_directory . '/images/patterns/waves_pattern.png' . '")',
													'background-repeat' => 'repeat',
												)
											),
										)
									)
								)
							),
							'logo_settings'        => array(
								'type'          => 'multi',
								'label'         => false,
								'attr'          => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
									'logo' => array(
										'type'         => 'multi-picker',
										'label'        => false,
										'desc'         => false,
										'picker'       => array(
											'selected_value' => array(
												'label'   => __( 'Logo Type', 'the-core' ),
												'desc'    => __( 'Select the logo type', 'the-core' ),
												'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
												'value'   => 'text',
												'type'    => 'radio',
												'choices' => array(
													'text'  => __( 'Text', 'the-core' ),
													'image' => __( 'Image', 'the-core' ),
												),
											)
										),
										'choices'      => array(
											'text'  => array(
												'title'              => array(
													'label' => __( 'Title', 'the-core' ),
													'desc'  => __( 'Enter the title', 'the-core' ),
													'type'  => 'short-text',
													'value' => get_bloginfo( 'name' )
												),
												'logo_title_font'    => array(
													'label' => __( '', 'the-core' ),
													'desc'  => __( 'Choose the title font', 'the-core' ),
													'type'  => 'tf-typography',
													'value' => array(
														'family'         => 'Playfair Display',
														'size'           => 20,
														'line-height'    => 30,
														'style'          => '400',
														'letter-spacing' => 1,
													)
												),
												'subtitle'           => array(
													'label' => __( 'Subtitle', 'the-core' ),
													'desc'  => __( 'Enter the subtitle', 'the-core' ),
													'type'  => 'short-text',
													'value' => '',
												),
												'logo_subtitle_font' => array(
													'label' => __( '', 'the-core' ),
													'desc'  => __( 'Choose the subtitle font', 'the-core' ),
													'type'  => 'tf-typography',
													'value' => array(
														'family'         => 'Playfair Display',
														'size'           => 10,
														'line-height'    => 10,
														'style'          => '400',
														'letter-spacing' => 1,
													)
												),
											),
											'image' => array(
												'image_logo'  => array(
													'label' => __( '', 'the-core' ),
													'desc'  => __( 'Upload logo image', 'the-core' ),
													'type'  => 'upload'
												),
												'retina_logo' => array(
													'type'         => 'switch',
													'label'        => __( '', 'the-core' ),
													'desc'         => __( 'Use logo as retina?', 'the-core' ),
													'left-choice'  => array(
														'value' => 'fw-logo-no-retina',
														'label' => __( 'No', 'the-core' ),
													),
													'right-choice' => array(
														'value' => 'fw-logo-retina',
														'label' => __( 'Yes', 'the-core' ),
													),
													'value' => 'fw-logo-no-retina'
												),
											),
										),
										'show_borders' => false,
									),
								),
							),
							'section_spacing'      => array(
								'label'   => __( 'Content Density', 'the-core' ),
								'desc'    => __( 'Select the spacing between content sections', 'the-core' ),
								'help'    => __( "The content spacing applies only for the Section shortcode. You can disable this spacing for an individual shortcode from the section's options pop-up in the visual page builder.", "the-core" ),
								'value'   => 'fw-section-space-md',
								'type'    => 'short-select',
								'choices' => array(
									'fw-section-space-sm' => __( 'Compact', 'the-core' ),
									'fw-section-space-md' => __( 'Cozy', 'the-core' ),
									'fw-section-space-lg' => __( 'Comfortable', 'the-core' ),
								),
							),
							'page_404'          => array(
								'label'   => __( '404 Error Page', 'the-core' ),
								'desc'    => __( 'Select the 404 error page', 'the-core' ),
								'help'    => __( 'The users will be redirected to this page when the page they are looking for is not found', 'the-core' ),
								'value'   => '',
								'type'    => 'select',
								'choices' => the_core_list_pages(),
							),
							'enable_coming_soon' => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected' => array(
										'type'         => 'switch',
										'value'        => 'no',
										'label'        => __( 'Coming soon / Maintenance Page', 'the-core' ),
										'desc'         => __( 'Enable coming soon/maintenance page?', 'the-core' ),
										'help'    => __( 'The users will be redirected to this page when they are not logged in. Note that you need to disable it manually in order to make your website accessible again.', 'the-core' ),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' ),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' ),
										)
									),
								),
								'choices' => array(
									'yes' => array(
										'coming_soon_page'          => array(
											'label'   => __( '', 'the-core' ),
											'desc'    => __( 'Select the coming soon page', 'the-core' ),
											'value'   => '',
											'type'    => 'select',
											'choices' => the_core_list_pages(),
										),
									)
								)
							),
							'scroll_to_top_group'      => array(
								'type'    => 'group',
								'options' => array(
									'scroll_to_top_styling' => array(
										'attr'          => array(
											'data-advanced-for' => 'scroll-to-top-styling',
											'class'             => 'fw-advanced-button'
										),
										'type'          => 'popup',
										'label'         => __( 'Custom Style', 'the-core' ),
										'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
										'button'        => __( 'Styling', 'the-core' ),
										'size'          => 'medium',
										'popup-options' => array(
											'icon-type'         => array(
												'type'    => 'multi-picker',
												'label'   => false,
												'desc'    => false,
												'picker'  => array(
													'icon-box-img' => array(
														'label'   => __( 'Icon', 'the-core' ),
														'desc'    => __( 'Select icon type', 'the-core' ),
														'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
														'type'    => 'radio',
														'value'   => 'icon-class',
														'choices' => array(
															'icon-class'  => __( 'Font Awesome', 'the-core' ),
															'upload-icon' => __( 'Custom Upload', 'the-core' ),
														),
													),
												),
												'choices' => array(
													'icon-class'  => array(
														'icon_class' => array(
															'type'  => 'icon',
															'value' => '',
															'label' => __( '', 'the-core' )
														),
													),
													'upload-icon' => array(
														'upload-custom-img' => array(
															'label' => '',
															'type'  => 'upload',
															'help'  => __('For best results upload a square image, larger then 30px x 30px.', 'the-core'),
														),
													),
												)
											),
											'color' => array(
												'label'   => __( 'Color', 'the-core' ),
												'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
												'desc'    => __( 'Select the color', 'the-core' ),
												'value'   => '',
												'choices' => $the_core_color_settings,
												'type'    => 'color-palette'
											),
										)
									),
									'enable_scroll_to' => array(
										'attr'    => array( 'class' => 'scroll-to-top-styling' ),
										'type'         => 'switch',
										'value'        => 'no',
										'label'        => __( 'Scroll to Top Button', 'the-core' ),
										'desc'         => __( 'Enable scroll to top?', 'the-core' ),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' ),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' ),
										)
									),
								)
							),
                            'custom_login_page_group'      => array(
                                'type'    => 'group',
                                'options' => array(
                                    'custom_login_page_styling' => array(
                                        'attr'          => array(
                                            'data-advanced-for' => 'custom_login_page_styling',
                                            'class'             => 'fw-advanced-button'
                                        ),
                                        'type'          => 'popup',
                                        'label'         => __( 'Custom Login Page Styling', 'the-core' ),
                                        'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
                                        'button'        => __( 'Styling', 'the-core' ),
                                        'size'          => 'medium',
                                        'popup-options' => array(
                                            'login_logo' => array(
                                                'label' => __('Logo', 'the-core'),
                                                'type'  => 'upload',
                                                'desc'  => __('Upload custom logo for login page', 'the-core'),
                                            ),
                                            'custom_login_background' => array(
                                                'type'    => 'group',
                                                'options' => array(
                                                    'background_image' => array(
                                                        'label'   => __( 'Background', 'the-core' ),
                                                        'type'    => 'background-image',
                                                        'choices' => array(//	in future may will set predefined images
                                                        )
                                                    ),
                                                    'background_color' => array(
                                                        'label'   => __( '', 'the-core' ),
                                                        'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
                                                        'desc'    => __( 'Select the background color', 'the-core' ),
                                                        'value'   => '',
                                                        'choices' => $the_core_color_settings,
                                                        'type'    => 'color-palette'
                                                    ),
                                                    'repeat'           => array(
                                                        'label'   => __( '', 'the-core' ),
                                                        'desc'    => __( 'Select how will the background repeat', 'the-core' ),
                                                        'type'    => 'short-select',
                                                        'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
                                                        'value'   => 'no-repeat',
                                                        'choices' => array(
                                                            'no-repeat' => __( 'No-Repeat', 'the-core' ),
                                                            'repeat'    => __( 'Repeat', 'the-core' ),
                                                            'repeat-x'  => __( 'Repeat-X', 'the-core' ),
                                                            'repeat-y'  => __( 'Repeat-Y', 'the-core' ),
                                                        )
                                                    ),
                                                    'bg_position_x'    => array(
                                                        'label'   => __( 'Position', 'the-core' ),
                                                        'desc'    => __( 'Select the horizontal background position', 'the-core' ),
                                                        'type'    => 'short-select',
                                                        'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
                                                        'value'   => '',
                                                        'choices' => array(
                                                            'left'   => __( 'Left', 'the-core' ),
                                                            'center' => __( 'Center', 'the-core' ),
                                                            'right'  => __( 'Right', 'the-core' ),
                                                        )
                                                    ),
                                                    'bg_position_y'    => array(
                                                        'label'   => __( '', 'the-core' ),
                                                        'desc'    => __( 'Select the vertical background position', 'the-core' ),
                                                        'type'    => 'short-select',
                                                        'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
                                                        'value'   => '',
                                                        'choices' => array(
                                                            'top'    => __( 'Top', 'the-core' ),
                                                            'center' => __( 'Center', 'the-core' ),
                                                            'bottom' => __( 'Bottom', 'the-core' ),
                                                        )
                                                    ),
                                                    'bg_size'          => array(
                                                        'label'   => __( 'Size', 'the-core' ),
                                                        'desc'    => __( 'Select the background size', 'the-core' ),
                                                        'help'    => __( '<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'the-core' ),
                                                        'type'    => 'short-select',
                                                        'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
                                                        'value'   => '',
                                                        'choices' => array(
                                                            'auto'    => __( 'Auto', 'the-core' ),
                                                            'cover'   => __( 'Cover', 'the-core' ),
                                                            'contain' => __( 'Contain', 'the-core' ),
                                                        )
                                                    ),
                                                )
                                            ),
                                            'login_forms_typography_group' => array(
                                                'type'    => 'group',
                                                'options' => array(
                                                    'custom_login_form_labels'    => array(
                                                        'label' => __( 'Form Labels', 'the-core' ),
                                                        'type'  => 'tf-typography',
                                                        'value' => array(
                                                            'google_font'    => true,
                                                            'subset'         => 'latin',
                                                            'variation'      => 'regular',
                                                            'family'         => 'Open Sans',
                                                            'style'          => '',
                                                            'weight'         => '',
                                                            'size'           => '14',
                                                            'line-height'    => '21',
                                                            'letter-spacing' => '0',
                                                            'color-palette'  => array(
                                                                'id' => 'fw-custom',
                                                                'color' => '#777',
                                                            ),
                                                        ),
                                                    ),
                                                    'custom_login_form_labels_uppercase' => array(
                                                        'type'         => 'switch',
                                                        'value'        => 'uppercase',
                                                        'label'        => __( '', 'the-core' ),
                                                        'desc'         => __( 'Uppercase form labels?', 'the-core' ),
                                                        'left-choice'  => array(
                                                            'value' => 'none',
                                                            'label' => __( 'No', 'the-core' ),
                                                        ),
                                                        'right-choice' => array(
                                                            'value' => 'uppercase',
                                                            'label' => __( 'Yes', 'the-core' ),
                                                        )
                                                    ),
                                                    'custom_login_form_inputs'    => array(
                                                        'label' => __( 'Form Inputs', 'the-core' ),
                                                        'type'  => 'tf-typography',
                                                        'value' => array(
                                                            'google_font'    => true,
                                                            'subset'         => 'latin',
                                                            'variation'      => '400',
                                                            'family'         => 'Open Sans',
                                                            'style'          => '',
                                                            'weight'         => '',
                                                            'size'           => '24',
                                                            'line-height'    => '24',
                                                            'letter-spacing' => '0',
                                                            'color-palette'  => array(
                                                                'id' => 'fw-custom',
                                                                'color' => '#32373c',
                                                            ),
                                                        ),
                                                    ),
                                                    'login_form_bg_options_group'  => array(
                                                        'type'    => 'group',
                                                        'options' => array(
                                                            'login_form_bg_options' => array(
                                                                'type'         => 'multi-picker',
                                                                'label'        => false,
                                                                'desc'         => false,
                                                                'picker'       => array(
                                                                    'background' => array(
                                                                        'label'   => __( 'Form Bg Color', 'the-core' ),
                                                                        'desc'    => __( 'Select form background', 'the-core' ),
                                                                        'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
                                                                        'type'    => 'radio',
                                                                        'choices' => array(
                                                                            'none'   => __( 'None', 'the-core' ),
                                                                            'custom' => __( 'Custom', 'the-core' ),
                                                                        ),
                                                                        'value'   => 'custom'
                                                                    ),
                                                                ),
                                                                'choices'      => array(
                                                                    'custom' => array(
                                                                        'login_form_bg_color' => array(
                                                                            'label'   => __( '', 'the-core' ),
                                                                            'desc'    => __( 'Select form background color', 'the-core' ),
                                                                            'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
                                                                            'value'   => array(
                                                                                'id' => 'fw-custom',
                                                                                'color' => '#fff'
                                                                            ),
                                                                            'choices' => $the_core_color_settings,
                                                                            'type'    => 'color-palette'
                                                                        ),
                                                                    ),
                                                                ),
                                                                'show_borders' => false,
                                                            ),
                                                        )
                                                    ),
                                                    'login_input_border' => array(
                                                        'type'    => 'multi-picker',
                                                        'label'   => false,
                                                        'desc'    => false,
                                                        'picker'  => array(
                                                            'selected' => array(
                                                                'type'         => 'switch',
                                                                'value'        => 'yes',
                                                                'label'        => __( 'Fields Border', 'the-core' ),
                                                                'desc'         => __( 'Add a border to the fields?', 'the-core' ),
                                                                'left-choice'  => array(
                                                                    'value' => 'no',
                                                                    'label' => __( 'No', 'the-core' ),
                                                                ),
                                                                'right-choice' => array(
                                                                    'value' => 'yes',
                                                                    'label' => __( 'Yes', 'the-core' ),
                                                                )
                                                            ),
                                                        ),
                                                        'choices' => array(
                                                            'yes' => array(
                                                                'border_size'  => array(
                                                                    'label' => __( '', 'the-core' ),
                                                                    'desc'  => __( 'Border size in pixels', 'the-core' ),
                                                                    'type'  => 'short-text',
                                                                    'value' => '1',
                                                                ),
                                                                'border_color' => array(
                                                                    'label'   => __( '', 'the-core' ),
                                                                    'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
                                                                    'desc'    => __( 'Select border color', 'the-core' ),
                                                                    'value'   => array(
                                                                        'id' => 'fw-custom',
                                                                        'color' => '#ddd'
                                                                    ),
                                                                    'choices' => $the_core_color_settings,
                                                                    'type'    => 'color-palette'
                                                                ),
                                                            )
                                                        )
                                                    ),
                                                    'login_fields_bg_options' => array(
                                                        'type'         => 'multi-picker',
                                                        'label'        => false,
                                                        'desc'         => false,
                                                        'picker'       => array(
                                                            'background' => array(
                                                                'label'   => __( 'Fields Bg Color', 'the-core' ),
                                                                'desc'    => __( 'Select fields background', 'the-core' ),
                                                                'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
                                                                'type'    => 'radio',
                                                                'choices' => array(
                                                                    'none'   => __( 'None', 'the-core' ),
                                                                    'custom' => __( 'Custom', 'the-core' ),
                                                                ),
                                                                'value'   => 'custom'
                                                            ),
                                                        ),
                                                        'choices'      => array(
                                                            'custom' => array(
                                                                'fields_bg_color'                   => array(
                                                                    'label'   => __( '', 'the-core' ),
                                                                    'desc'    => __( 'Select fields background color', 'the-core' ),
                                                                    'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
                                                                    'value'   => array(
                                                                        'id' => 'fw-custom',
                                                                        'color' => '#fbfbfb'
                                                                    ),
                                                                    'choices' => $the_core_color_settings,
                                                                    'type'    => 'color-palette'
                                                                ),
                                                            ),
                                                        ),
                                                        'show_borders' => false,
                                                    ),
                                                )
                                            ),
                                            'login_button_options_group'  => array(
                                                'type'    => 'group',
                                                'options' => array(
                                                    'login_button_label' => array(
                                                        'label' => __( 'Button Label', 'the-core' ),
                                                        'type'  => 'tf-typography',
                                                        'value' => array(
                                                            'google_font'    => true,
                                                            'subset'         => 'latin',
                                                            'variation'      => '400',
                                                            'family'         => 'Open Sans',
                                                            'style'          => '',
                                                            'weight'         => '',
                                                            'size'           => '13',
                                                            'line-height'    => '28',
                                                            'letter-spacing' => '0',
                                                            'color-palette'  => array(
                                                                'id' => 'fw-custom',
                                                                'color' => '#fff',
                                                            ),
                                                        ),
                                                    ),
                                                    'login_button_bg_color' => array(
                                                        'label'   => __( 'Button Bg Color', 'the-core' ),
                                                        'desc'    => __( 'Select the button background color', 'the-core' ),
                                                        'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
                                                        'value'   => array(
                                                            'id' => 'fw-custom',
                                                            'color' => '#0085ba'
                                                        ),
                                                        'choices' => $the_core_color_settings,
                                                        'type'    => 'color-palette'
                                                    ),
                                                )
                                            ),
                                            'custom_login_form_links_group' => array(
                                                'type'    => 'group',
                                                'options' => array(
                                                    'custom_login_form_links'    => array(
                                                        'label' => __( 'Links', 'the-core' ),
                                                        'type'  => 'tf-typography',
                                                        'value' => array(
                                                            'google_font'    => true,
                                                            'subset'         => 'latin',
                                                            'variation'      => '400',
                                                            'family'         => 'Open Sans',
                                                            'style'          => '',
                                                            'weight'         => '',
                                                            'size'           => '13',
                                                            'line-height'    => '19.5',
                                                            'letter-spacing' => '0',
                                                            'color-palette'  => array(
                                                                'id' => 'fw-custom',
                                                                'color' => '#999',
                                                            ),
                                                        ),
                                                    ),
                                                    'custom_login_form_links_hover' => array(
                                                        'label'   => __( '', 'the-core' ),
                                                        'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
                                                        'desc'    => __( 'Select the hover color', 'the-core' ),
                                                        'value'   => '',
                                                        'choices' => $the_core_color_settings,
                                                        'type'    => 'color-palette'
                                                    ),
                                                )
                                            ),
                                        )
                                    ),
                                    'enable_custom_login_page' => array(
                                        'attr'    => array( 'class' => 'custom_login_page_styling' ),
                                        'type'         => 'switch',
                                        'value'        => 'no',
                                        'label'        => __( 'Custom Login Page', 'the-core' ),
                                        'desc'         => __( 'Enable custom login page?', 'the-core' ),
                                        'left-choice'  => array(
                                            'value' => 'no',
                                            'label' => __( 'No', 'the-core' ),
                                        ),
                                        'right-choice' => array(
                                            'value' => 'yes',
                                            'label' => __( 'Yes', 'the-core' ),
                                        )
                                    ),
                                )
                            ),
                            'enable_smartphone_animations' => array(
                                'type'         => 'switch',
                                'value'        => 'no',
                                'label'        => __( 'Smartphone Animations', 'the-core' ),
                                'desc'         => __( 'Enable the page elements animations on smartphones?', 'the-core' ),
                                'help'         => __( 'This is linked to the Animation options found in the visual page builder. It lets you turn ON / OFF animations for smartphones. Having them ON might have a negative performance impact for your website on smartphones.', 'the-core' ),
                                'left-choice'  => array(
                                    'value' => 'no',
                                    'label' => __( 'No', 'the-core' ),
                                ),
                                'right-choice' => array(
                                    'value' => 'yes',
                                    'label' => __( 'Yes', 'the-core' ),
                                )
                            ),
							// todo: temporary is disabled the licence key
							/*'theme_licence_key' => array(
								'label'   => __( 'Theme Licence Key', 'the-core' ),
								'desc'    => __( 'Enter the theme licence key', 'the-core' ),
								'type'    => 'text',
								'value'   => ''
							),*/
						)
					),
				)
			),
			'social-options'  => array(
				'title'   => __( 'Social Profiles', 'the-core' ),
				'type'    => 'tab',
				'options' => array(
					'social-box' => array(
						'title'   => __( 'Social', 'the-core' ),
						'type'    => 'box',
						'options' => array(
							'socials' => array(
								'type'          => 'addable-popup',
								'label'         => __( 'Social Links', 'the-core' ),
								'desc'          => __( 'Add your social profiles', 'the-core' ),
								'template'      => '{{=social_name}}',
								'popup-options' => array(
									'social_name' => array(
										'label' => __( 'Name', 'the-core' ),
										'desc'  => __( 'Enter a name (it is for internal use and will not appear on the front end)', 'the-core' ),
										'type'  => 'text',
									),
									'social_type' => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'social-type' => array(
												'label'   => __( 'Icon', 'the-core' ),
												'desc'    => __( 'Select social icon type', 'the-core' ),
												'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
												'type'    => 'radio',
												'value'   => 'icon-social',
												'choices' => array(
													'icon-social' => __( 'Font Awesome', 'the-core' ),
													'upload-icon' => __( 'Custom Upload', 'the-core' ),
												),
											),
										),
										'choices' => array(
											'icon-social' => array(
												'icon_class' => array(
													'type'  => 'icon',
													'value' => 'fa fa-adn',
													'label' => '',
												),
											),
											'upload-icon' => array(
												'upload-social-icon' => array(
													'label' => '',
													'type'  => 'upload',
												)
											),
										)
									),
									'social-link' => array(
										'label' => __( 'Link', 'the-core' ),
										'desc'  => __( 'Enter your social URL link', 'the-core' ),
										'type'  => 'text',
									)
								),
							),
						)
					),
				)
			),
		),
	),
	'posts'          => array(
		'title'   => __( 'Posts', 'the-core' ),
		'type'    => 'tab',
		'options' => array(
			'blog-posts' => array(
				'title'   => __( 'Blog', 'the-core' ),
				'type'    => 'tab',
				'options' => array(
					'posts-box'        => array(
						'title'   => __( 'Posts', 'the-core' ),
						'type'    => 'box',
						'options' => array(
							'posts_settings' => array(
								'type'          => 'multi',
								'label'         => false,
								'attr'          => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
									'blog_type'               => array(
										'type'    => 'image-picker',
										'label'   => __( 'Blog Style', 'the-core' ),
										'desc'    => __( 'Select the blog display style', 'the-core' ),
										'value'   => 'blog-1',
										'choices' => array(
											'blog-1' => array(
												'small' => array(
													'height' => 70,
													'src'    => $the_core_template_directory . '/images/image-picker/blog-style1.jpg'
												),
												'large' => array(
													'height' => 214,
													'src'    => $the_core_template_directory . '/images/image-picker/blog-style1.jpg'
												),
											),
											'blog-2' => array(
												'small' => array(
													'height' => 70,
													'src'    => $the_core_template_directory . '/images/image-picker/blog-style2.jpg'
												),
												'large' => array(
													'height' => 214,
													'src'    => $the_core_template_directory . '/images/image-picker/blog-style2.jpg'
												),
											),
										),
									),
									'blog_view'               => array(
										'type'         => 'switch',
										'value'        => 'default',
										'label'        => __( 'Grid View', 'the-core' ),
										'desc'         => __( 'Display blog posts on a grid', 'the-core' ),
										'help'         => sprintf( "%s", __( 'The posts will be displayed on a 2 columns grid if the page has a sidebar and on a 3 columns grid if it doesn\'t.', 'the-core' ) ),
										'left-choice'  => array(
											'value' => 'default',
											'label' => __( 'No', 'the-core' ),
										),
										'right-choice' => array(
											'value' => 'grid',
											'label' => __( 'Yes', 'the-core' ),
										)
									),
									'blog_title'              => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'selected' => array(
												'type'    => 'short-select',
												'label'   => 'Blog Titles',
												'desc'    => 'Choose the blog titles size, H1 being the largest',
												'value'   => 'h2',
												'choices' => array(
													'h1' => 'H1',
													'h2' => 'H2',
													'h3' => 'H3',
													'h4' => 'H4',
													'h5' => 'H5',
													'h6' => 'H6',
												)
											),
										),
										'choices' => array(
											'h1' => array(
												'advanced_styling' => array(
													'attr'          => array( 'class' => 'fw-advanced-button' ),
													'type'          => 'popup',
													'label'         => __( '', 'the-core' ),
													'desc'          => __( 'Change the style / typography of this title', 'the-core' ),
													'button'        => __( 'Styling', 'the-core' ),
													'size'          => 'small',
													'popup-options' => array(
														'h1_group' => array(
															'type'    => 'group',
															'options' => array(
																'h1'          => array(
																	'label' => __( 'H1', 'the-core' ),
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
																'hover_color' => array(
																	'label'   => __( '', 'the-core' ),
																	'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																	'desc'    => __( 'Select the hover color', 'the-core' ),
																	'value'   => '',
																	'choices' => $the_core_color_settings,
																	'type'    => 'color-palette'
																),
															)
														)
													),
												),
											),
											'h2' => array(
												'advanced_styling' => array(
													'attr'          => array( 'class' => 'fw-advanced-button' ),
													'type'          => 'popup',
													'label'         => __( '', 'the-core' ),
													'desc'          => __( 'Change the style / typography of this title', 'the-core' ),
													'button'        => __( 'Styling', 'the-core' ),
													'size'          => 'small',
													'popup-options' => array(
														'h2_group' => array(
															'type'    => 'group',
															'options' => array(
																'h2'          => array(
																	'label' => __( 'H2', 'the-core' ),
																	'type'  => 'tf-typography',
																	'value' => array(
																		'google_font'    => $the_core_typography_settings['h2']['google_font'],
																		'subset'         => $the_core_typography_settings['h2']['subset'],
																		'variation'      => $the_core_typography_settings['h2']['variation'],
																		'family'         => $the_core_typography_settings['h2']['family'],
																		'style'          => $the_core_typography_settings['h2']['style'],
																		'weight'         => $the_core_typography_settings['h2']['weight'],
																		'size'           => $the_core_typography_settings['h2']['size'],
																		'line-height'    => $the_core_typography_settings['h2']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h2']['letter-spacing'],
																		'color-palette'  => '',
																	)
																),
																'hover_color' => array(
																	'label'   => __( '', 'the-core' ),
																	'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																	'desc'    => __( 'Select the hover color', 'the-core' ),
																	'value'   => '',
																	'choices' => $the_core_color_settings,
																	'type'    => 'color-palette'
																),
															)
														)
													),
												),
											),
											'h3' => array(
												'advanced_styling' => array(
													'attr'          => array( 'class' => 'fw-advanced-button' ),
													'type'          => 'popup',
													'label'         => __( '', 'the-core' ),
													'desc'          => __( 'Change the style / typography of this title', 'the-core' ),
													'button'        => __( 'Styling', 'the-core' ),
													'size'          => 'small',
													'popup-options' => array(
														'h3_group' => array(
															'type'    => 'group',
															'options' => array(
																'h3'          => array(
																	'label' => __( 'H3', 'the-core' ),
																	'type'  => 'tf-typography',
																	'value' => array(
																		'google_font'    => $the_core_typography_settings['h3']['google_font'],
																		'subset'         => $the_core_typography_settings['h3']['subset'],
																		'variation'      => $the_core_typography_settings['h3']['variation'],
																		'family'         => $the_core_typography_settings['h3']['family'],
																		'style'          => $the_core_typography_settings['h3']['style'],
																		'weight'         => $the_core_typography_settings['h3']['weight'],
																		'size'           => $the_core_typography_settings['h3']['size'],
																		'line-height'    => $the_core_typography_settings['h3']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h3']['letter-spacing'],
																		'color-palette'  => '',
																	)
																),
																'hover_color' => array(
																	'label'   => __( '', 'the-core' ),
																	'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																	'desc'    => __( 'Select the hover color', 'the-core' ),
																	'value'   => '',
																	'choices' => $the_core_color_settings,
																	'type'    => 'color-palette'
																),
															)
														)
													),
												),
											),
											'h4' => array(
												'advanced_styling' => array(
													'attr'          => array( 'class' => 'fw-advanced-button' ),
													'type'          => 'popup',
													'label'         => __( '', 'the-core' ),
													'desc'          => __( 'Change the style / typography of this title', 'the-core' ),
													'button'        => __( 'Styling', 'the-core' ),
													'size'          => 'small',
													'popup-options' => array(
														'h4_group' => array(
															'type'    => 'group',
															'options' => array(
																'h4'          => array(
																	'label' => __( 'H4', 'the-core' ),
																	'type'  => 'tf-typography',
																	'value' => array(
																		'google_font'    => $the_core_typography_settings['h4']['google_font'],
																		'subset'         => $the_core_typography_settings['h4']['subset'],
																		'variation'      => $the_core_typography_settings['h4']['variation'],
																		'family'         => $the_core_typography_settings['h4']['family'],
																		'style'          => $the_core_typography_settings['h4']['style'],
																		'weight'         => $the_core_typography_settings['h4']['weight'],
																		'size'           => $the_core_typography_settings['h4']['size'],
																		'line-height'    => $the_core_typography_settings['h4']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h4']['letter-spacing'],
																		'color-palette'  => '',
																	)
																),
																'hover_color' => array(
																	'label'   => __( '', 'the-core' ),
																	'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																	'desc'    => __( 'Select the hover color', 'the-core' ),
																	'value'   => '',
																	'choices' => $the_core_color_settings,
																	'type'    => 'color-palette'
																),
															)
														)
													),
												),
											),
											'h5' => array(
												'advanced_styling' => array(
													'attr'          => array( 'class' => 'fw-advanced-button' ),
													'type'          => 'popup',
													'label'         => __( '', 'the-core' ),
													'desc'          => __( 'Change the style / typography of this title', 'the-core' ),
													'button'        => __( 'Styling', 'the-core' ),
													'size'          => 'small',
													'popup-options' => array(
														'h5_group' => array(
															'type'    => 'group',
															'options' => array(
																'h5'          => array(
																	'label' => __( 'H5', 'the-core' ),
																	'type'  => 'tf-typography',
																	'value' => array(
																		'google_font'    => $the_core_typography_settings['h5']['google_font'],
																		'subset'         => $the_core_typography_settings['h5']['subset'],
																		'variation'      => $the_core_typography_settings['h5']['variation'],
																		'family'         => $the_core_typography_settings['h5']['family'],
																		'style'          => $the_core_typography_settings['h5']['style'],
																		'weight'         => $the_core_typography_settings['h5']['weight'],
																		'size'           => $the_core_typography_settings['h5']['size'],
																		'line-height'    => $the_core_typography_settings['h5']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h5']['letter-spacing'],
																		'color-palette'  => '',
																	)
																),
																'hover_color' => array(
																	'label'   => __( '', 'the-core' ),
																	'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																	'desc'    => __( 'Select the hover color', 'the-core' ),
																	'value'   => '',
																	'choices' => $the_core_color_settings,
																	'type'    => 'color-palette'
																),
															)
														)
													),
												),
											),
											'h6' => array(
												'advanced_styling' => array(
													'attr'          => array( 'class' => 'fw-advanced-button' ),
													'type'          => 'popup',
													'label'         => __( '', 'the-core' ),
													'desc'          => __( 'Change the style / typography of this title', 'the-core' ),
													'button'        => __( 'Styling', 'the-core' ),
													'size'          => 'small',
													'popup-options' => array(
														'h6_group' => array(
															'type'    => 'group',
															'options' => array(
																'h6'          => array(
																	'label' => __( 'H6', 'the-core' ),
																	'type'  => 'tf-typography',
																	'value' => array(
																		'google_font'    => $the_core_typography_settings['h6']['google_font'],
																		'subset'         => $the_core_typography_settings['h6']['subset'],
																		'variation'      => $the_core_typography_settings['h6']['variation'],
																		'family'         => $the_core_typography_settings['h6']['family'],
																		'style'          => $the_core_typography_settings['h6']['style'],
																		'weight'         => $the_core_typography_settings['h6']['weight'],
																		'size'           => $the_core_typography_settings['h6']['size'],
																		'line-height'    => $the_core_typography_settings['h6']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h6']['letter-spacing'],
																		'color-palette'  => '',
																	)
																),
																'hover_color' => array(
																	'label'   => __( '', 'the-core' ),
																	'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																	'desc'    => __( 'Select the hover color', 'the-core' ),
																	'value'   => '',
																	'choices' => $the_core_color_settings,
																	'type'    => 'color-palette'
																),
															)
														)
													),
												),
											),
										),
									),
									'display_comments_number' => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'selected' => array(
												'type'         => 'switch',
												'value'        => 'yes',
												'label'        => __( 'Comments Number', 'the-core' ),
												'desc'         => __( 'Display the no. of comments?', 'the-core' ),
												'left-choice'  => array(
													'value' => 'no',
													'label' => __( 'No', 'the-core' ),
												),
												'right-choice' => array(
													'value' => 'yes',
													'label' => __( 'Yes', 'the-core' ),
												)
											),
										),
										'choices' => array(
											'yes' => array(
												'comments_number_type' => array(
													'label'   => __( '', 'the-core' ),
													'type'    => 'image-picker',
													'value'   => 'fw-comment-link-type-1',
													'desc'    => __( 'Select the comments number type', 'the-core' ),
													'choices' => array(
														'fw-comment-link-type-1' => array(
															'small' => array(
																'height' => 50,
																'src'    => $the_core_template_directory . '/images/image-picker/comment-type1.jpg',
															)
														),
														'fw-comment-link-type-2' => array(
															'small' => array(
																'height' => 50,
																'src'    => $the_core_template_directory . '/images/image-picker/comment-type2.jpg',
															)
														),
														'fw-comment-link-type-3' => array(
															'small' => array(
																'height' => 50,
																'src'    => $the_core_template_directory . '/images/image-picker/comment-type3.jpg',
															)
														),
														'fw-comment-link-type-4' => array(
															'small' => array(
																'height' => 50,
																'src'    => $the_core_template_directory . '/images/image-picker/comment-type4.jpg',
															)
														),
														'fw-comment-link-type-5' => array(
															'small' => array(
																'height' => 50,
																'src'    => $the_core_template_directory . '/images/image-picker/comment-type5.jpg',
															)
														),
													)
												)
											)
										)
									),
									'blog_btn'                => array(
										'type'    => 'group',
										'options' => array(
											'button_options' => array(
												'attr'          => array( 'class' => 'fw-advanced-button' ),
												'type'          => 'popup',
												'label'         => __( 'Blog Button', 'the-core' ),
												'desc'          => __( 'Change the style / typography of the blog button', 'the-core' ),
												'button'        => __( 'Styling', 'the-core' ),
												'size'          => 'medium',
												'popup-options' => array(
													'style_group'     => array(
														'type'    => 'group',
														'options' => array(
															'style' => array(
																'type'    => 'multi-picker',
																'label'   => false,
																'desc'    => false,
																'picker'  => array(
																	'selected' => array(
																		'label'   => __( 'Style', 'the-core' ),
																		'desc'    => __( 'Choose button style', 'the-core' ),
																		'type'    => 'image-picker',
                                                                        'attr'    => array( 'class' => 'fw-button-style-type' ),
																		'value'   => 'fw-btn-1',
																		'choices' => array(
																			'fw-btn-1' => array(
																				'small' => array(
																					'height' => 70,
																					'src'    => $the_core_template_directory . '/images/image-picker/button-style1.jpg'
																				),
																				'large' => array(
																					'height' => 208,
																					'src'    => $the_core_template_directory . '/images/image-picker/button-style1.jpg'
																				),
																			),
																			'fw-btn-2' => array(
																				'small' => array(
																					'height' => 70,
																					'src'    => $the_core_template_directory . '/images/image-picker/button-style2.jpg'
																				),
																				'large' => array(
																					'height' => 208,
																					'src'    => $the_core_template_directory . '/images/image-picker/button-style2.jpg'
																				),
																			),
																			'fw-btn-3' => array(
																				'small' => array(
																					'height' => 70,
																					'src'    => $the_core_template_directory . '/images/image-picker/button-style3.jpg'
																				),
																				'large' => array(
																					'height' => 208,
																					'src'    => $the_core_template_directory . '/images/image-picker/button-style3.jpg'
																				),
																			),
                                                                            'fw-btn-4' => array(
                                                                                'small' => array(
                                                                                    'height' => 70,
                                                                                    'src'    => $the_core_template_directory . '/images/image-picker/button-style4.jpg'
                                                                                ),
                                                                                'large' => array(
                                                                                    'height' => 208,
                                                                                    'src'    => $the_core_template_directory . '/images/image-picker/button-style4.jpg'
                                                                                ),
                                                                            ),
																		),
																	),
																),
																'choices' => array(
																	'fw-btn-1' => array(
																		'border_radius' => array(
																			'label' => __( 'Corner Radius', 'the-core' ),
																			'desc'  => __( 'Enter the corner radius in pixels', 'the-core' ),
																			'value' => '0',
																			'type'  => 'short-text'
																		),
																	),
																	'fw-btn-2' => array(
																		'border_radius' => array(
																			'label' => __( 'Corner Radius', 'the-core' ),
																			'desc'  => __( 'Enter the corner radius in pixels', 'the-core' ),
																			'value' => '0',
																			'type'  => 'short-text'
																		),
																		'border_size'   => array(
																			'label' => __( '', 'the-core' ),
																			'desc'  => __( 'Border size in pixels', 'the-core' ),
																			'type'  => 'short-text',
																			'value' => '1',
																		),
																	),
																	'fw-btn-3' => array(
																		'border_size' => array(
																			'label' => __( '', 'the-core' ),
																			'desc'  => __( 'Border size in pixels', 'the-core' ),
																			'type'  => 'short-text',
																			'value' => '1',
																		),
																	),
																),
															)
														)
													),
													'btn_color_group' => array(
														'type'    => 'group',
                                                        'attr'    => array( 'class' => 'fw-button-color-group' ),
														'options' => array(
															'normal_color' => array(
																'label'   => __( 'Normal Color', 'the-core' ),
																'desc'    => __( 'Select normal color', 'the-core' ),
																'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																'value'   => '',
																'choices' => $the_core_color_settings,
																'type'    => 'color-palette'
															),
															'hover_color'  => array(
																'label'   => __( 'Hover Color', 'the-core' ),
																'desc'    => __( 'Select hover color', 'the-core' ),
																'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																'value'   => '',
																'choices' => $the_core_color_settings,
																'type'    => 'color-palette'
															),
														)
													),
													'label-group'     => array(
														'type'    => 'group',
														'options' => array(
															'label_advanced_styling' => array(
																'attr'          => array(
																	'data-advanced-for' => 'button-advanced',
																	'class'             => 'fw-advanced-button'
																),
																'type'          => 'popup',
																'label'         => __( 'Custom Style', 'the-core' ),
																'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
																'button'        => __( 'Styling', 'the-core' ),
																'size'          => 'small',
																'popup-options' => array(
																	'advanced-group' => array(
																		'type'    => 'group',
																		'options' => array(
																			'text'             => array(
																				'label' => __( 'Label', 'the-core' ),
																				'type'  => 'tf-typography',
																				'value' => array(
																					'google_font'    => $the_core_typography_settings['buttons']['google_font'],
																					'subset'         => $the_core_typography_settings['buttons']['subset'],
																					'variation'      => $the_core_typography_settings['buttons']['variation'],
																					'family'         => $the_core_typography_settings['buttons']['family'],
																					'style'          => $the_core_typography_settings['buttons']['style'],
																					'weight'         => $the_core_typography_settings['buttons']['weight'],
																					'size'           => $the_core_typography_settings['buttons']['size'],
																					'line-height'    => $the_core_typography_settings['buttons']['line-height'],
																					'letter-spacing' => $the_core_typography_settings['buttons']['letter-spacing'],
																					'color-palette'  => '',
																				)
																			),
																			'hover_text_color' => array(
																				'label'   => __( '', 'the-core' ),
																				'desc'    => __( 'Select text hover color', 'the-core' ),
																				'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																				'value'   => '',
																				'choices' => $the_core_color_settings,
																				'type'    => 'color-palette'
																			),
																		)
																	)
																),
															),
															'label'                  => array(
																'label' => __( 'Label', 'the-core' ),
																'attr'  => array( 'class' => 'button-advanced' ),
																'desc'  => __( 'This is the text that appears on your button', 'the-core' ),
																'type'  => 'text',
																'value' => 'Read More'
															),
														)
													),
													'btn_size_group'  => array(
														'type'    => 'group',
														'options' => array(
															'size' => array(
																'type'    => 'multi-picker',
																'label'   => false,
																'desc'    => false,
																'picker'  => array(
																	'selected' => array(
																		'label'   => __( 'Button Size', 'the-core' ),
																		'desc'    => __( 'Choose button size', 'the-core' ),
																		'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
																		'type'    => 'radio',
																		'value'   => 'fw-btn-md',
																		'choices' => array(
																			'fw-btn-sm' => __( 'Small', 'the-core' ),
																			'fw-btn-md' => __( 'Normal', 'the-core' ),
																			'fw-btn-lg' => __( 'Large', 'the-core' ),
																			'custom'    => __( 'Custom', 'the-core' ),
																		)
																	),
																),
																'choices' => array(
																	'custom' => array(
																		'width'  => array(
																			'label' => __( 'Width', 'the-core' ),
																			'desc'  => __( 'Enter button width in pixels', 'the-core' ),
																			'type'  => 'short-text',
																			'value' => '',
																		),
																		'height' => array(
																			'label' => __( 'Height', 'the-core' ),
																			'desc'  => __( 'Enter button height in pixels', 'the-core' ),
																			'type'  => 'short-text',
																			'value' => '',
																		),
																	),
																),
															),
														)
													),
													'icon_group'      => array(
														'type'    => 'group',
														'options' => array(
															'icon_type'     => array(
																'type'    => 'multi-picker',
																'label'   => false,
																'desc'    => false,
																'picker'  => array(
																	'tab_icon' => array(
																		'label'   => __( 'Icon', 'the-core' ),
																		'desc'    => __( 'Select icon type', 'the-core' ),
																		'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
																		'type'    => 'radio',
																		'value'   => 'icon-class',
																		'choices' => array(
																			'icon-class'  => __( 'Font Awesome', 'the-core' ),
																			'upload-icon' => __( 'Custom Upload', 'the-core' ),
																		),
																	),
																),
																'choices' => array(
																	'icon-class'  => array(
																		'icon_class' => array(
																			'type'  => 'icon',
																			'value' => '',
																			'label' => '',
																		),
																	),
																	'upload-icon' => array(
																		'upload-custom-img' => array(
																			'label' => '',
																			'type'  => 'upload',
																		),
																	),
																)
															),
															'icon_position' => array(
																'type'         => 'switch',
																'label'        => __( '', 'the-core' ),
																'desc'         => __( 'Choose the icon position', 'the-core' ),
																'value'        => 'pull-left-icon',
																'right-choice' => array(
																	'value' => 'pull-right-icon',
																	'label' => __( 'Right', 'the-core' ),
																),
																'left-choice'  => array(
																	'value' => 'pull-left-icon',
																	'label' => __( 'Left', 'the-core' ),
																),
															),
															'icon_size'     => array(
																'label' => __( 'Icon Size', 'the-core' ),
																'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
																'value' => '12',
																'type'  => 'short-text'
															),
														)
													),
												),
											),
										),
									),
									'image_alignment'         => array(
										'label'   => __( 'Image Alignment', 'the-core' ),
										'type'    => 'image-picker',
										'value'   => '',
										'desc'    => __( 'Select the default image alignment for new post', 'the-core' ),
										'help'    => __( 'Your choice will not apply to posts that are already published, but it will set the default value for image alignment when you create new posts.', 'the-core' ),
										'choices' => array(
											'fw-block-image-left'  => array(
												'small' => array(
													'height' => 50,
													'src'    => $the_core_template_directory . '/images/image-picker/left.jpg',
													'title'  => __( 'Left', 'the-core' )
												)
											),
											''                     => array(
												'small' => array(
													'height' => 50,
													'src'    => $the_core_template_directory . '/images/image-picker/full-width.jpg',
													'title'  => __( 'Full', 'the-core' )
												)
											),
											'fw-block-image-right' => array(
												'small' => array(
													'height' => 50,
													'src'    => $the_core_template_directory . '/images/image-picker/right.jpg',
													'title'  => __( 'Right', 'the-core' )
												)
											),
										),
									),
									'rounded'                  => array(
										'type'         => 'switch',
										'value'        => '',
										'label'        => __( 'Use Round Image', 'the-core' ),
										'desc'         => __( 'Set the default image roundness for new posts', 'the-core' ),
										'help'         => __( 'Your choice will not apply to posts that are already published, but it will set the default value for image roundness when you create new posts.', 'the-core' ),
										'left-choice'  => array(
											'value' => '',
											'label' => __( 'No', 'the-core' ),
										),
										'right-choice' => array(
											'value' => 'fw-block-image-circle',
											'label' => __( 'Yes', 'the-core' ),
										)
									),
									'featured_image'          => array(
										'type'         => 'switch',
										'value'        => 'yes',
										'label'        => __( 'Featured Image', 'the-core' ),
										'desc'         => __( 'Use featured image in single post?', 'the-core' ),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' ),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' ),
										),
										'help'         => __( 'Your choice will not apply to posts that are already published, but it will set the default value for image roundness when you create new posts.', 'the-core' ),
									),
									'add_image_border'        => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'selected' => array(
												'label'        => __( 'Image Border', 'the-core' ),
												'desc'         => __( 'Add a border to your image', 'the-core' ),
												'type'         => 'switch',
												'right-choice' => array(
													'value' => 'fw-block-image-frame',
													'label' => __( 'Yes', 'the-core' )
												),
												'left-choice'  => array(
													'value' => '',
													'label' => __( 'No', 'the-core' )
												),
												'value'        => '',
											),
										),
										'choices' => array(
											'fw-block-image-frame' => array(
												'border_size'  => array(
													'label' => __( '', 'the-core' ),
													'desc'  => __( 'Size in pixels', 'the-core' ),
													'type'  => 'short-text',
													'value' => '',
												),
												'border_color' => array(
													'label'   => __( '', 'the-core' ),
													'desc'    => __( 'Select the border color', 'the-core' ),
													'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
													'value'   => '',
													'choices' => $the_core_color_settings,
													'type'    => 'color-palette'
												),
											),
										),
									),
									'post_date'               => array(
										'label'        => __( 'Post Date', 'the-core' ),
										'desc'         => __( 'Show post date?', 'the-core' ),
										'type'         => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' )
										),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' )
										),
										'value'        => 'yes',
									),
									'post_author'             => array(
										'label'        => __( 'Post Author', 'the-core' ),
										'desc'         => __( 'Show post author?', 'the-core' ),
										'type'         => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' )
										),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' )
										),
										'value'        => 'yes',
									),
									'post_categories'         => array(
										'label'        => __( 'Post Categories', 'the-core' ),
										'desc'         => __( 'Show post categories?', 'the-core' ),
										'type'         => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' )
										),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' )
										),
										'value'        => 'yes',
									),
									'post_author_box'         => array(
										'label'        => __( 'Author Box', 'the-core' ),
										'desc'         => __( 'Show author box?', 'the-core' ),
										'type'         => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' )
										),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' )
										),
										'value'        => 'no',
									),
									'post_navigation'         => array(
										'label'        => __( 'Post Navigation', 'the-core' ),
										'desc'         => __( 'Show post navigation?', 'the-core' ),
										'type'         => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' )
										),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' )
										),
										'value'        => 'yes',
									),
									'related_articles'        => array(
										'label'        => __( 'Related Articles', 'the-core' ),
										'desc'         => __( 'Show related articles?', 'the-core' ),
										'type'         => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' )
										),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' )
										),
										'value'        => 'yes',
									),
								)
							),
							'default_avatar' => array(
								'label' => __( 'Default Blog Avatar', 'the-core' ),
								'desc'  => __( 'Upload a default avatar', 'the-core' ),
								'type'  => 'upload'
							),
						)
					),
					'header-posts-box' => array(
						'title'   => __( 'Single Posts Header', 'the-core' ),
						'type'    => 'box',
						'options' => array(
							'general_posts_header' => array(
								'type'          => 'multi',
								'label'         => false,
								'attr'          => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
									'posts_header_height'           => array(
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
									'posts_header_image'            => array(
										'label' => __( 'Header Image', 'the-core' ),
										'desc'  => __( 'Upload a header image', 'the-core' ),
										'help'  => __( "This default header image will be used for all your posts if you didn't set one for a specific post.", "the-core" ),
										'type'  => 'upload'
									),
									'posts_header_overlay_options'  => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'posts_header_overlay' => array(
												'type'         => 'switch',
												'label'        => __( 'Overlay Color', 'the-core' ),
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
												'posts_header_overlay_color'         => array(
													'label'   => __( '', 'the-core' ),
													'desc'    => __( 'Select the image overlay color', 'the-core' ),
													'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
													'value'   => '',
													'choices' => $the_core_color_settings,
													'type'    => 'color-palette'
												),
												'posts_header_overlay_opacity_image' => array(
													'type'       => 'slider',
													'value'      => 80,
													'properties' => array(
														'min' => 0,
														'max' => 100,
														'sep' => 1,
													),
													'label'      => __( '', 'the-core' ),
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
									'posts_header_title'            => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'posts_title' => array(
												'label'   => __( 'Title', 'the-core' ),
												'desc'    => __( 'Select what title will be displayed in the posts header', 'the-core' ),
												'help'    => __( 'This title appears only on the post details pages and will be displayed if you have a header image set (in the post or here)', 'the-core' ),
												'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
												'type'    => 'radio',
												'value'   => 'category_title',
												'choices' => array(
													'post_title'     => __( 'Post Title', 'the-core' ),
													'category_title' => __( 'Category Title', 'the-core' ),
													'custom_title'   => __( 'Custom Title', 'the-core' ),
												),
											),
										),
										'choices' => array(
											'post_title' => array(
												'header_title_typography' => array(
													'attr'          => array( 'class' => 'fw-advanced-button' ),
													'type'          => 'popup',
													'label'         => '',
													'desc'          => __( 'Change the style / typography of the title', 'the-core' ),
													'button'        => __( 'Styling', 'the-core' ),
													'size'          => 'small',
													'popup-options' => array(
														'title' => array(
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
											),
											'category_title' => array(
												'header_title_typography' => array(
													'attr'          => array( 'class' => 'fw-advanced-button' ),
													'type'          => 'popup',
													'label'         => '',
													'desc'          => __( 'Change the style / typography of the title', 'the-core' ),
													'button'        => __( 'Styling', 'the-core' ),
													'size'          => 'small',
													'popup-options' => array(
														'title' => array(
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
												'header_subtitle_typography' => array(
													'attr'          => array( 'class' => 'fw-advanced-button' ),
													'type'          => 'popup',
													'label'         => __( 'Description', 'the-core' ),
													'desc'          => __( 'Change the style / typography of the description', 'the-core' ),
													'button'        => __( 'Styling', 'the-core' ),
													'size'          => 'small',
													'popup-options' => array(
														'subtitle' => array(
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
											),
											'custom_title'   => array(
												'header_title_typography' => array(
													'attr'          => array(
														'data-advanced-for' => 'header_title_advanced_styling',
														'class'             => 'fw-advanced-button'
													),
													'type'          => 'popup',
													'label'         => __( 'Custom Style', 'the-core' ),
													'button'        => __( 'Styling', 'the-core' ),
													'size'          => 'small',
													'popup-options' => array(
														'title' => array(
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
												'custom_title_text'            => array(
													'attr'  => array( 'class' => 'header_title_advanced_styling' ),
													'label' => __( 'Custom Title', 'the-core' ),
													'desc'  => __( 'Enter a custom title', 'the-core' ),
													'help'  => __( 'This title appears on the post detail pages only and will be displayed in all the headers. Choose something general that will fit all the posts. (Ex: Blog)', 'the-core' ),
													'type'  => 'text',
												),
												'header_subtitle_typography' => array(
													'attr'          => array(
														'data-advanced-for' => 'header_subtitle_advanced_styling',
														'class'             => 'fw-advanced-button'
													),
													'type'          => 'popup',
													'label'         => __( 'Custom Style', 'the-core' ),
													'button'        => __( 'Styling', 'the-core' ),
													'size'          => 'small',
													'popup-options' => array(
														'subtitle' => array(
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
												'custom_subtitle_text'         => array(
													'attr'  => array( 'class' => 'header_subtitle_advanced_styling' ),
													'label' => __( 'Custom Description', 'the-core' ),
													'desc'  => __( 'Enter a custom description', 'the-core' ),
													'help'  => __( 'The description is displayed as a subtitle', 'the-core' ),
													'type'  => 'text',
												),
											),
										),
									),
									'posts_header_content_position' => array(
										'label' => __( 'Content Position', 'the-core' ),
										'desc'  => __( "Adjust the content vertical position in pixels (Ex: -20 or 20)", "the-core" ),
										'help'  => __( "Let's you fine tune the header content position on the vertical axis. Input a negative value if you want your content to go up or a positive value if you want your content to go down.", "the-core" ),
										'type'  => 'short-text',
										'value' => '',
									),
								)
							)
						)
					),
				)
			),
			$the_core_portfolio_tab,
			$the_core_events_tab,
			$the_core_learning_tab,
			$the_core_products_tab,
			$the_core_bbpress_tab,
			$the_core_buddypress_tab,
		)
	),
	'pages'          => array(
		'title'   => __( 'Pages', 'the-core' ),
		'type'    => 'tab',
		'options' => array(
			'header-page-box' => array(
				'title'   => __( 'Pages Header', 'the-core' ),
				'type'    => 'box',
				'options' => array(
					'general_page_header' => array(
						'type'          => 'multi',
						'label'         => false,
						'attr'          => array(
							'class' => 'fw-option-type-multi-show-borders',
						),
						'inner-options' => array(
							'posts_header_height'           => array(
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
							'posts_header_image'            => array(
								'label' => __( 'Header Image', 'the-core' ),
								'desc'  => __( 'Upload a header image', 'the-core' ),
								'help'  => __( "This default header image will be used for all your pages if you didn't set one for a specific page (works only for pages that use Default Template and not the ones created with the Visual Builder).", "the-core" ),
								'type'  => 'upload'
							),
							'posts_header_overlay_options'  => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'posts_header_overlay' => array(
										'type'         => 'switch',
										'label'        => __( 'Overlay Color', 'the-core' ),
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
										'posts_header_overlay_color'         => array(
											'label'   => __( '', 'the-core' ),
											'desc'    => __( 'Select the image overlay color', 'the-core' ),
											'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
											'value'   => '',
											'choices' => $the_core_color_settings,
											'type'    => 'color-palette'
										),
										'posts_header_overlay_opacity_image' => array(
											'type'       => 'slider',
											'value'      => 80,
											'properties' => array(
												'min' => 0,
												'max' => 100,
												'sep' => 1,
											),
											'label'      => __( '', 'the-core' ),
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
							'header_title_typography' => array(
								'attr'          => array( 'class' => 'fw-advanced-button' ),
								'type'          => 'popup',
								'label'         => __( 'Title', 'the-core' ),
								'desc'          => __( 'Change the style / typography of the title', 'the-core' ),
								'button'        => __( 'Styling', 'the-core' ),
								'size'          => 'small',
								'popup-options' => array(
									'title' => array(
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
							'posts_header_content_position' => array(
								'label' => __( 'Content Position', 'the-core' ),
								'desc'  => __( "Adjust the content vertical position in pixels (Ex: -20 or 20)", "the-core" ),
								'help'  => __( "Let's you fine tune the header content position on the vertical axis. Input a negative value if you want your content to go up or a positive value if you want your content to go down.", "the-core" ),
								'type'  => 'short-text',
								'value' => '',
							),
							'default_pages_info' => array(
								'label' => false,
								'desc'  => '<i class="fw-info-symbol dashicons dashicons-info"></i>'.esc_html__('These options apply only to pages created with the default template (default WordPress pages) and not with the Visual Builder', 'the-core'),
								'type'  => 'html',
								'html'  => '',
							),
						)
					)
				)
			),
		)
	),
	'header'         => array(
		'title'   => __( 'Header', 'the-core' ),
		'type'    => 'tab',
		'options' => array(
			'footer-box' => array(
				'title'   => __( 'Header', 'the-core' ),
				'type'    => 'box',
				'options' => array(
					'header_settings' => array(
						'type'          => 'multi',
						'label'         => false,
						'attr'          => array(
							'class' => 'fw-option-type-multi-show-borders',
						),
						'inner-options' => array(
							'header_group'            => array(
								'type'    => 'group',
								'options' => array(
									'header_type_picker'   => array(
										'type'         => 'multi-picker',
										'label'        => false,
										'desc'         => false,
										'picker'       => array(
											'header_type' => array(
												'label'   => __( 'Header Type', 'the-core' ),
												'type'    => 'image-picker',
												'value'   => 'header-1',
												'desc'    => __( 'Select the prefered header type', 'the-core' ),
												'choices' => array(
													'header-1' => array(
														'small' => array(
															'height' => 75,
															'src'    => $the_core_template_directory . '/images/image-picker/header-type1.jpg'
														),
														'large' => array(
															'height' => 214,
															'src'    => $the_core_template_directory . '/images/image-picker/header-type1.jpg'
														),
													),
													'header-2' => array(
														'small' => array(
															'height' => 75,
															'src'    => $the_core_template_directory . '/images/image-picker/header-type2.jpg'
														),
														'large' => array(
															'height' => 214,
															'src'    => $the_core_template_directory . '/images/image-picker/header-type2.jpg'
														),
													),
													'header-3' => array(
														'small' => array(
															'height' => 75,
															'src'    => $the_core_template_directory . '/images/image-picker/header-type3.jpg'
														),
														'large' => array(
															'height' => 214,
															'src'    => $the_core_template_directory . '/images/image-picker/header-type3.jpg'
														),
													),
													'header-4' => array(
														'small' => array(
															'height' => 75,
															'src'    => $the_core_template_directory . '/images/image-picker/header-type4.jpg'
														),
														'large' => array(
															'height' => 214,
															'src'    => $the_core_template_directory . '/images/image-picker/header-type4.jpg'
														),
													),
												),
											),
										),
										'choices'      => array(
											'header-1' => array(
												'logo_align' => array(
													'label'        => __( 'Logo Position', 'the-core' ),
													'desc'         => __( 'Select your prefered logo position', 'the-core' ),
													'type'         => 'switch',
													'right-choice' => array(
														'value' => 'fw-top-logo-right',
														'label' => __( 'Right', 'the-core' )
													),
													'left-choice'  => array(
														'value' => 'fw-top-logo-left',
														'label' => __( 'Left', 'the-core' )
													),
													'value'        => 'fw-top-logo-left',
												)
											),
											'header-4' => array(
												'header_text' => array(
													'type'  => 'text',
													'value' => '',
													'label' => __( 'Header Text', 'the-core' ),
													'desc'  => __( 'Is located above the search and usually used for an email or phone no', 'the-core' ),
												)
											),
										),
										'show_borders' => false,
									),
									'header_bg_color'      => array(
										'label'   => __( 'Background Color', 'the-core' ),
										'desc'    => __( 'Select header background color', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'value'   => '#ffffff',
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
									'dropdown_bg_color'    => array(
										'label'   => __( 'Dropdown Bg Color', 'the-core' ),
										'desc'    => __( 'Select the dropdown background color', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'value'   => $the_core_color_settings['color_5'],
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
									'dropdown_links_color' => array(
										'label'   => __( 'Dropdown Links Color', 'the-core' ),
										'desc'    => __( 'Select the dropdown links color', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'value'   => $the_core_color_settings['color_4'],
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
								)
							),
							'enable_absolute_header'  => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'picker'       => array(
									'selected_value' => array(
										'type'         => 'switch',
										'value'        => 'fw-no-absolute-header',
										'attr'         => array(),
										'label'        => __( 'Absolute Header', 'the-core' ),
										'desc'         => __( 'Make the header position absolute?', 'the-core' ),
										'help'         => sprintf( "%s", __( 'This absolute positioning will put the header on top of the header image', 'the-core' ) ),
										'left-choice'  => array(
											'value' => 'fw-no-absolute-header',
											'label' => __( 'No', 'the-core' ),
										),
										'right-choice' => array(
											'value' => 'fw-absolute-header',
											'label' => __( 'Yes', 'the-core' ),
										),
									)
								),
								'choices'      => array(
									'fw-absolute-header' => array(
										'absolute_opacity' => array(
											'type'       => 'slider',
											'value'      => 65,
											'properties' => array(
												'min' => 0,
												'max' => 100,
												'sep' => 1,
											),
											'label'      => __( '', 'the-core' ),
											'desc'       => __( 'Select the header background opacity', 'the-core' ),
										),
									),
								),
								'show_borders' => false,
							),
							'enable_sticky_header'    => array(
								'type'         => 'switch',
								'value'        => '',
								'attr'         => array(),
								'label'        => __( 'Sticky Header', 'the-core' ),
								'desc'         => __( 'Make the header stick with the scroll?', 'the-core' ),
								'left-choice'  => array(
									'value' => '',
									'label' => __( 'No', 'the-core' ),
								),
								'right-choice' => array(
									'value' => 'fw-header-sticky',
									'label' => __( 'Yes', 'the-core' ),
								),
							),
							'enable_header_top_bar'   => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'picker'       => array(
									'selected_value' => array(
										'label'        => __( 'Header Top Bar', 'the-core' ),
										'desc'         => __( 'Enable the header top bar?', 'the-core' ),
										'type'         => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' )
										),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' )
										),
										'value'        => 'yes',
									)
								),
								'choices'      => array(
									'yes' => array(
										'header_top_bar_bg'     => array(
											'label'   => __( 'Background Color', 'the-core' ),
											'desc'    => __( "Select the header's top bar background color", "the-core" ),
											'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
											'value'   => $the_core_color_settings['color_5'],
											'choices' => $the_core_color_settings,
											'type'    => 'color-palette'
										),
										'header_text'           => array(
											'type'    => 'wp-editor',
											'tinymce' => true,
											'reinit'  => true,
											'wpautop' => true,
											'editor_height' => 200,
											'media_buttons' => false,
											'value'   => '<a href="#">Subscribe to RSS</a>&nbsp;|&nbsp;<a href="#">Advertise with us</a>',
											'label'   => __( 'Text', 'the-core' ),
											'desc'    => __( 'This top bar text is usually used for an email address or phone no', 'the-core' ),
										),
										'enable_header_socials' => array(
											'type'         => 'multi-picker',
											'label'        => false,
											'desc'         => false,
											'picker'       => array(
												'selected_value' => array(
													'label'        => __( 'Social Icons', 'the-core' ),
													'desc'         => __( 'Enable social icons?', 'the-core' ),
													'help'         => sprintf( "%s", __( 'Your social links can be set from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings#fw-options-tab-social-options">' . __( 'Social Profiles', 'the-core' ) . '</a> ' . __( 'section under the General tab.', 'the-core' ) ),
													'type'         => 'switch',
													'right-choice' => array(
														'value' => 'yes',
														'label' => __( 'Yes', 'the-core' )
													),
													'left-choice'  => array(
														'value' => 'no',
														'label' => __( 'No', 'the-core' )
													),
													'value'        => 'yes',
												)
											),
											'choices'      => array(
												'yes' => array(
													'header_socials_color'       => array(
														'label'   => __( '', 'the-core' ),
														'desc'    => __( 'Select the social icons color', 'the-core' ),
														'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
														'value'   => $the_core_color_settings['color_3'],
														'choices' => $the_core_color_settings,
														'type'    => 'color-palette'
													),
													'header_socials_hover_color' => array(
														'label'   => __( '', 'the-core' ),
														'desc'    => __( 'Select the social icons hover color', 'the-core' ),
														'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
														'value'   => '',
														'choices' => $the_core_color_settings,
														'type'    => 'color-palette'
													),
													'header_icon_size'           => array(
														'type'  => 'short-text',
														'label' => __( 'Icon Size', 'the-core' ),
														'desc'  => __( 'Enter icon size in pixels. Ex: 16', 'the-core' ),
														'value' => '16',
													),
													'header_social_position'     => array(
														'type'         => 'switch',
														'label'        => __( 'Socials Position', 'the-core' ),
														'desc'         => __( 'Select the socials position', 'the-core' ),
														'right-choice' => array(
															'value' => 'fw-top-social-right',
															'label' => __( 'Right', 'the-core' )
														),
														'left-choice'  => array(
															'value' => 'fw-top-social-left',
															'label' => __( 'Left', 'the-core' )
														),
														'value'        => 'fw-top-social-right',
													),
												),
												'no'  => array(),
											),
											'show_borders' => false,
										),
									),
									'no'  => array(),
								),
								'show_borders' => false,
							),
							'search_group_typography' => array(
								'attr'    => array( 'class' => 'border-bottom-none' ),
								'type'    => 'group',
								'options' => array(
									'enable_search' => array(
										'type'         => 'multi-picker',
										'label'        => false,
										'desc'         => false,
										'picker'       => array(
											'selected_value' => array(
												'label'        => __( 'Search', 'the-core' ),
												'desc'         => __( 'Enable search?', 'the-core' ),
												'type'         => 'switch',
												'right-choice' => array(
													'value' => 'yes',
													'label' => __( 'Yes', 'the-core' )
												),
												'left-choice'  => array(
													'value' => 'no',
													'label' => __( 'No', 'the-core' )
												),
												'value'        => 'yes',
											)
										),
										'choices'      => array(
											'yes' => array(
												'search_type'     => array(
													'type'    => 'multi-picker',
													'label'   => false,
													'desc'    => false,
													'picker'  => array(
														'selected' => array(
															'label'   => __( 'Type', 'the-core' ),
															'desc'    => __( 'Select your prefered search type', 'the-core' ),
															'type'    => 'select',
															'value'   => 'fw-mini-search',
															'choices' => array(
																'fw-input-search' => __( 'Input Search', 'the-core' ),
																'fw-mini-search'  => __( 'Icon Search', 'the-core' ),
															),
														)
													),
													'choices' => array(
														'fw-input-search' => array(
															'search_advanced_styling' => array(
																'attr'          => array( 'class' => 'fw-advanced-button' ),
																'type'          => 'popup',
																'label'         => __( '', 'the-core' ),
																'desc'          => __( 'Change the style / typography of the search', 'the-core' ),
																'button'        => __( 'Styling', 'the-core' ),
																'size'          => 'small',
																'popup-options' => array(
																	'search_group'             => array(
																		'type'    => 'group',
																		'options' => array(
																			'input_typography'          => array(
																				'label' => __( 'Input Text', 'the-core' ),
																				'type'  => 'tf-typography',
																				'value' => array(
																					'family'         => 'Crimson Text',
																					'size'           => 19,
																					'line-height'    => 26,
																					'letter-spacing' => 0,
																				)
																			),
																			'search_background_options' => array(
																				'type'         => 'multi-picker',
																				'label'        => false,
																				'desc'         => false,
																				'picker'       => array(
																					'background' => array(
																						'label'   => __( 'Bg Color', 'the-core' ),
																						'desc'    => __( "Select the background color", "the-core" ),
																						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
																						'type'    => 'radio',
																						'choices' => array(
																							'none'   => __( 'None', 'the-core' ),
																							'custom' => __( 'Custom', 'the-core' ),
																						),
																						'value'   => 'none'
																					),
																				),
																				'choices'      => array(
																					'custom' => array(
																						'background_color' => array(
																							'label'   => __( '', 'the-core' ),
																							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																							'desc'    => __( 'Select the background color', 'the-core' ),
																							'value'   => '',
																							'choices' => $the_core_color_settings,
																							'type'    => 'color-palette'
																						),
																					),
																				),
																				'show_borders' => false,
																			),
																		)
																	),
																	'placeholder_search_group' => array(
																		'type'    => 'group',
																		'options' => array(
																			'placeholder_text'  => array(
																				'label' => __( 'Placeholder Text', 'the-core' ),
																				'desc'  => __( 'Enter the placeholder text', 'the-core' ),
																				'value' => '',
																				'type'  => 'text'
																			),
																			'placeholder_color' => array(
																				'label'   => __( '', 'the-core' ),
																				'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																				'desc'    => __( 'Select the placeholder color', 'the-core' ),
																				'value'   => '',
																				'choices' => $the_core_color_settings,
																				'type'    => 'color-palette'
																			),
																		)
																	),
																	'border_group'             => array(
																		'type'    => 'multi-picker',
																		'label'   => false,
																		'desc'    => false,
																		'picker'  => array(
																			'selected' => array(
																				'type'         => 'switch',
																				'value'        => '',
																				'label'        => __( 'Border', 'the-core' ),
																				'desc'         => __( 'Add a border to input search?', 'the-core' ),
																				'left-choice'  => array(
																					'value' => 'no',
																					'label' => __( 'No', 'the-core' ),
																				),
																				'right-choice' => array(
																					'value' => 'yes',
																					'label' => __( 'Yes', 'the-core' ),
																				)
																			),
																		),
																		'choices' => array(
																			'yes' => array(
																				'border_size'  => array(
																					'label' => __( '', 'the-core' ),
																					'desc'  => __( 'Border size in pixels', 'the-core' ),
																					'type'  => 'short-text',
																					'value' => '1',
																				),
																				'border_color' => array(
																					'label'   => __( '', 'the-core' ),
																					'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																					'desc'    => __( 'Select border color', 'the-core' ),
																					'value'   => '',
																					'choices' => $the_core_color_settings,
																					'type'    => 'color-palette'
																				),
																			)
																		)
																	),
																	'icon_search_group'        => array(
																		'type'    => 'group',
																		'options' => array(
																			'icon_size'  => array(
																				'label' => __( 'Icon', 'the-core' ),
																				'desc'  => __( 'Icon size in pixels', 'the-core' ),
																				'type'  => 'short-text',
																				'value' => '16',
																			),
																			'icon_color' => array(
																				'label'   => __( '', 'the-core' ),
																				'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																				'desc'    => __( 'Select icon color', 'the-core' ),
																				'value'   => '',
																				'choices' => $the_core_color_settings,
																				'type'    => 'color-palette'
																			),
																		)
																	),
																),
															),
														),
														'fw-mini-search'  => array(
															'search_advanced_styling' => array(
																'attr'          => array( 'class' => 'fw-advanced-button' ),
																'type'          => 'popup',
																'label'         => __( '', 'the-core' ),
																'desc'          => __( 'Change the style / typography of the search', 'the-core' ),
																'button'        => __( 'Styling', 'the-core' ),
																'size'          => 'small',
																'popup-options' => array(
																	'search_group'             => array(
																		'type'    => 'group',
																		'options' => array(
																			'input_typography'          => array(
																				'label' => __( 'Input Text', 'the-core' ),
																				'type'  => 'tf-typography',
																				'value' => array(
																					'family'         => 'Crimson Text',
																					'size'           => 40,
																					'line-height'    => 40,
																					'letter-spacing' => 0,
																					'color-palette'  => $the_core_color_settings['color_4'],
																				)
																			),
																			'search_background_options' => array(
																				'type'         => 'multi-picker',
																				'label'        => false,
																				'desc'         => false,
																				'picker'       => array(
																					'background' => array(
																						'label'   => __( 'Bg Color', 'the-core' ),
																						'desc'    => __( "Select the background color", "the-core" ),
																						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
																						'type'    => 'radio',
																						'choices' => array(
																							'none'   => __( 'None', 'the-core' ),
																							'custom' => __( 'Custom', 'the-core' ),
																						),
																						'value'   => 'custom'
																					),
																				),
																				'choices'      => array(
																					'custom' => array(
																						'background_color' => array(
																							'label'   => __( '', 'the-core' ),
																							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																							'desc'    => __( 'Select the background color', 'the-core' ),
																							'value'   => $the_core_color_settings['color_3'],
																							'choices' => $the_core_color_settings,
																							'type'    => 'color-palette'
																						),
																					),
																				),
																				'show_borders' => false,
																			),
																		)
																	),
																	'placeholder_search_group' => array(
																		'type'    => 'group',
																		'options' => array(
																			'placeholder_text'  => array(
																				'label' => __( 'Placeholder Text', 'the-core' ),
																				'desc'  => __( 'Enter the placeholder text', 'the-core' ),
																				'value' => 'Search',
																				'type'  => 'text'
																			),
																			'placeholder_color' => array(
																				'label'   => __( '', 'the-core' ),
																				'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																				'desc'    => __( 'Select the placeholder color', 'the-core' ),
																				'value'   => $the_core_color_settings['color_4'],
																				'choices' => $the_core_color_settings,
																				'type'    => 'color-palette'
																			),
																		)
																	),
																	'full_background_color'    => array(
																		'label'   => __( 'Container Bg Color', 'the-core' ),
																		'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																		'desc'    => __( 'Select the container background color', 'the-core' ),
																		'value'   => '',
																		'choices' => $the_core_color_settings,
																		'type'    => 'color-palette'
																	),
																	'border_group'             => array(
																		'type'    => 'multi-picker',
																		'label'   => false,
																		'desc'    => false,
																		'picker'  => array(
																			'selected' => array(
																				'type'         => 'switch',
																				'value'        => 'no',
																				'label'        => __( 'Border', 'the-core' ),
																				'desc'         => __( 'Add a border to input search?', 'the-core' ),
																				'left-choice'  => array(
																					'value' => 'no',
																					'label' => __( 'No', 'the-core' ),
																				),
																				'right-choice' => array(
																					'value' => 'yes',
																					'label' => __( 'Yes', 'the-core' ),
																				)
																			),
																		),
																		'choices' => array(
																			'yes' => array(
																				'border_size'  => array(
																					'label' => __( '', 'the-core' ),
																					'desc'  => __( 'Border size in pixels', 'the-core' ),
																					'type'  => 'short-text',
																					'value' => '1',
																				),
																				'border_color' => array(
																					'label'   => __( '', 'the-core' ),
																					'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																					'desc'    => __( 'Select border color', 'the-core' ),
																					'value'   => '',
																					'choices' => $the_core_color_settings,
																					'type'    => 'color-palette'
																				),
																			)
																		)
																	),
																	'icon_search_group'        => array(
																		'type'    => 'group',
																		'options' => array(
																			'icon_size'  => array(
																				'label' => __( 'Icon', 'the-core' ),
																				'desc'  => __( 'Icon size in pixels', 'the-core' ),
																				'type'  => 'short-text',
																				'value' => '16',
																			),
																			'icon_color' => array(
																				'label'   => __( '', 'the-core' ),
																				'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																				'desc'    => __( 'Select icon color', 'the-core' ),
																				'value'   => $the_core_color_settings['color_1'],
																				'choices' => $the_core_color_settings,
																				'type'    => 'color-palette'
																			),
																		)
																	),
																),
															),
														),
													)
												),
												'search_position' => array(
													'label'   => __( 'Position', 'the-core' ),
													'desc'    => __( 'Select the search position', 'the-core' ),
													'type'    => 'select',
													'value'   => 'top_bar',
													'choices' => array(
														'top_bar'  => __( 'Top Bar', 'the-core' ),
														'menu_bar' => __( 'Menu Bar', 'the-core' ),
													),
												),
											),
											'no'  => array(),
										),
										'show_borders' => false,
									),
								)
							),
						)
					)
				)
			)
		)
	),
	'footer'         => array(
		'title'   => __( 'Footer', 'the-core' ),
		'type'    => 'tab',
		'options' => array(
			'footer-box' => array(
				'title'   => __( 'Footer', 'the-core' ),
				'type'    => 'box',
				'options' => array(
					'footer_settings' => array(
						'type'          => 'multi',
						'label'         => false,
						'attr'          => array(
							'class' => 'fw-option-type-multi-show-borders',
						),
						'inner-options' => array(
							'show_footer_widgets' => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'picker'       => array(
									'selected_value' => array(
										'label'        => __( 'Footer Widgets', 'the-core' ),
										'desc'         => __( 'Show footer widgets?', 'the-core' ),
										'type'         => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' )
										),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' )
										),
										'value'        => 'yes',
									)
								),
								'choices'      => array(
									'yes' => array(
										'number_of_columns'           => array(
											'label'   => __( 'Number of Columns', 'the-core' ),
											'desc'    => __( 'Select the number of columns', 'the-core' ),
											'help'    => sprintf( "%s", __( 'You can set the widgets displayed in the footer from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'widgets.php">' . __( 'Widgets section', 'the-core' ) . '</a> ' . __( 'under Appearance.', 'the-core' ) ),
											'type'    => 'short-select',
											'value'   => 'footer-cols-4',
											'choices' => array(
												'footer-cols-3' => __( '3', 'the-core' ),
												'footer-cols-4' => __( '4', 'the-core' ),
											),
										),
										'footer_widgets_bg'           => array(
											'type'         => 'multi-picker',
											'label'        => false,
											'desc'         => false,
											'picker'       => array(
												'background' => array(
													'label'   => __( 'Background', 'the-core' ),
													'desc'    => __( 'Select the background for your widget area', 'the-core' ),
													'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
													'type'    => 'radio',
													'choices' => array(
														'none'  => __( 'None', 'the-core' ),
														'image' => __( 'Image', 'the-core' ),
														'color' => __( 'Color', 'the-core' ),
													),
													'value'   => 'color'
												),
											),
											'choices'      => array(
												'none'  => array(),
												'color' => array(
													'background_color' => array(
														'label'   => __( '', 'the-core' ),
														'desc'    => __( 'Select the background color', 'the-core' ),
														'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
														'value'   => '#2a2e31',
														'choices' => $the_core_color_settings,
														'type'    => 'color-palette'
													),
												),
												'image' => array(
													'background_image' => array(
														'label'   => __( '', 'the-core' ),
														'type'    => 'background-image',
														'choices' => array(//	in future may will set predefined images
														)
													),
													'background_color' => array(
														'label'   => __( '', 'the-core' ),
														'desc'    => __( 'Select the background color', 'the-core' ),
														'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
														'value'   => '',
														'choices' => $the_core_color_settings,
														'type'    => 'color-palette'
													),
													'repeat'           => array(
														'label'   => __( '', 'the-core' ),
														'desc'    => __( 'Select how will the background repeat', 'the-core' ),
														'type'    => 'short-select',
														'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
														'value'   => 'no-repeat',
														'choices' => array(
															'no-repeat' => __( 'No-Repeat', 'the-core' ),
															'repeat'    => __( 'Repeat', 'the-core' ),
															'repeat-x'  => __( 'Repeat-X', 'the-core' ),
															'repeat-y'  => __( 'Repeat-Y', 'the-core' ),
														)
													),
													'bg_position_x'    => array(
														'label'   => __( 'Position', 'the-core' ),
														'desc'    => __( 'Select the horizontal background position', 'the-core' ),
														'type'    => 'short-select',
														'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
														'value'   => 'left',
														'choices' => array(
															'left'   => __( 'Left', 'the-core' ),
															'center' => __( 'Center', 'the-core' ),
															'right'  => __( 'Right', 'the-core' ),
														)
													),
													'bg_position_y'    => array(
														'label'   => __( '', 'the-core' ),
														'desc'    => __( 'Select the vertical background position', 'the-core' ),
														'type'    => 'short-select',
														'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
														'value'   => 'top',
														'choices' => array(
															'top'    => __( 'Top', 'the-core' ),
															'center' => __( 'Center', 'the-core' ),
															'bottom' => __( 'Bottom', 'the-core' ),
														)
													),
													'bg_size'          => array(
														'label'   => __( 'Size', 'the-core' ),
														'desc'    => __( 'Select the background size', 'the-core' ),
														'help'    => __( '<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'the-core' ),
														'type'    => 'short-select',
														'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
														'value'   => 'auto',
														'choices' => array(
															'auto'    => __( 'Auto', 'the-core' ),
															'cover'   => __( 'Cover', 'the-core' ),
															'contain' => __( 'Contain', 'the-core' ),
														)
													),
													'overlay_options'  => array(
														'type'    => 'multi-picker',
														'label'   => false,
														'desc'    => false,
														'picker'  => array(
															'overlay' => array(
																'type'         => 'switch',
																'label'        => __( 'Overlay Color', 'the-core' ),
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
																'background'            => array(
																	'label'   => __( '', 'the-core' ),
																	'desc'    => __( 'Select the overlay color', 'the-core' ),
																	'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																	'value'   => $the_core_color_settings['color_1'],
																	'choices' => $the_core_color_settings,
																	'type'    => 'color-palette'
																),
																'overlay_opacity_image' => array(
																	'type'       => 'slider',
																	'value'      => 80,
																	'properties' => array(
																		'min' => 0,
																		'max' => 100,
																		'sep' => 1,
																	),
																	'label'      => __( '', 'the-core' ),
																	'desc'       => __( 'Select the overlay color opacity in %', 'the-core' ),
																)
															),
														),
													),
												),
											),
											'show_borders' => false,
										),
										'footer_widgets_titles_color' => array(
											'label'   => __( 'Titles Color', 'the-core' ),
											'desc'    => __( 'Select the footer widgets titles color', 'the-core' ),
											'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
											'value'   => '#ffffff',
											'choices' => $the_core_color_settings,
											'type'    => 'color-palette'
										),
										'body_widgets_text_color'     => array(
											'label'   => __( 'Body Text Color', 'the-core' ),
											'desc'    => __( 'Select the footer widgets body text color', 'the-core' ),
											'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
											'value'   => '#898d8e',
											'choices' => $the_core_color_settings,
											'type'    => 'color-palette'
										),
									),
								),
								'show_borders' => false,
							),
							'show_menu_bar'       => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'picker'       => array(
									'selected_value' => array(
										'label'        => __( 'Menu Bar', 'the-core' ),
										'desc'         => __( 'Show menu bar?', 'the-core' ),
										'type'         => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' )
										),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' )
										),
										'value'        => 'yes',
									)
								),
								'choices'      => array(
									'yes' => array(
										'show_footer_menu' => array(
											'label'        => __( 'Footer Menu', 'the-core' ),
											'desc'         => __( 'Show footer navigation menu?', 'the-core' ),
											'help'         => sprintf( "%s \n\n<br/><br/>\n\n %s",
												__( 'You can set this navigation menu from', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'nav-menus.php?action=locations">' . __( 'Menu section', 'the-core' ) . '</a> ' . __( 'under Appearance.', 'the-core' ),
												__( 'Note that only the top level items will be displayed.', 'the-core' ) ),
											'type'         => 'switch',
											'right-choice' => array(
												'value' => 'yes',
												'label' => __( 'Yes', 'the-core' )
											),
											'left-choice'  => array(
												'value' => 'no',
												'label' => __( 'No', 'the-core' )
											),
											'value'        => 'yes',
										),
										'show_footer_logo' => array(
											'type'         => 'multi-picker',
											'label'        => false,
											'desc'         => false,
											'picker'       => array(
												'selected_value' => array(
													'label'        => __( 'Footer Logo', 'the-core' ),
													'desc'         => __( 'Show footer logo?', 'the-core' ),
													'type'         => 'switch',
													'right-choice' => array(
														'value' => 'yes',
														'label' => __( 'Yes', 'the-core' )
													),
													'left-choice'  => array(
														'value' => 'no',
														'label' => __( 'No', 'the-core' )
													),
													'value'        => 'no',
												)
											),
											'choices'      => array(
												'yes' => array(
													'footer_logo'          => array(
														'label' => __( '', 'the-core' ),
														'desc'  => __( 'Upload a logo for the footer', 'the-core' ),
														'type'  => 'upload',
														'value' => '',
													),
													'footer_logo_retina' => array(
														'type'         => 'switch',
														'label'        => __( '', 'the-core' ),
														'desc'         => __( 'Use logo as retina?', 'the-core' ),
														'left-choice'  => array(
															'value' => 'fw-footer-logo-no-retina',
															'label' => __( 'No', 'the-core' ),
														),
														'right-choice' => array(
															'value' => 'fw-footer-logo-retina',
															'label' => __( 'Yes', 'the-core' ),
														),
														'value' => 'fw-footer-logo-no-retina'
													),
													'footer_logo_position' => array(
														'label'        => __( 'Logo Position', 'the-core' ),
														'desc'         => __( 'Select your prefered logo position', 'the-core' ),
														'type'         => 'switch',
														'right-choice' => array(
															'value' => 'fw-footer-menu-left',
															'label' => __( 'Right', 'the-core' )
														),
														'left-choice'  => array(
															'value' => 'fw-footer-menu-right',
															'label' => __( 'Left', 'the-core' )
														),
														'value'        => 'fw-footer-menu-right',
														// for left logo footer
													),
												),
											),
											'show_borders' => false,
										),
										'menu_bar_bg'      => array(
											'type'         => 'multi-picker',
											'label'        => false,
											'desc'         => false,
											'picker'       => array(
												'background' => array(
													'label'   => __( 'Background', 'the-core' ),
													'desc'    => __( 'Select the background for your menu bar', 'the-core' ),
													'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
													'type'    => 'radio',
													'choices' => array(
														'none'  => __( 'None', 'the-core' ),
														'image' => __( 'Image', 'the-core' ),
														'color' => __( 'Color', 'the-core' ),
													),
													'value'   => 'color'
												),
											),
											'choices'      => array(
												'none'  => array(),
												'color' => array(
													'background_color' => array(
														'label'   => __( '', 'the-core' ),
														'desc'    => __( 'Select the background color', 'the-core' ),
														'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
														'value'   => '#000000',
														'choices' => $the_core_color_settings,
														'type'    => 'color-palette'
													),
												),
												'image' => array(
													'background_image' => array(
														'label'   => __( '', 'the-core' ),
														'type'    => 'background-image',
														'choices' => array(//	in future may will set predefined images
														)
													),
													'background_color' => array(
														'label'   => __( '', 'the-core' ),
														'desc'    => __( 'Select the background color', 'the-core' ),
														'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
														'value'   => '',
														'choices' => $the_core_color_settings,
														'type'    => 'color-palette'
													),
													'repeat'           => array(
														'label'   => __( '', 'the-core' ),
														'desc'    => __( 'Select how will the background repeat', 'the-core' ),
														'type'    => 'short-select',
														'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
														'value'   => 'no-repeat',
														'choices' => array(
															'no-repeat' => __( 'No-Repeat', 'the-core' ),
															'repeat'    => __( 'Repeat', 'the-core' ),
															'repeat-x'  => __( 'Repeat-X', 'the-core' ),
															'repeat-y'  => __( 'Repeat-Y', 'the-core' ),
														)
													),
													'bg_position_x'    => array(
														'label'   => __( 'Position', 'the-core' ),
														'desc'    => __( 'Select the horizontal background position', 'the-core' ),
														'type'    => 'short-select',
														'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
														'value'   => 'left',
														'choices' => array(
															'left'   => __( 'Left', 'the-core' ),
															'center' => __( 'Center', 'the-core' ),
															'right'  => __( 'Right', 'the-core' ),
														)
													),
													'bg_position_y'    => array(
														'label'   => __( '', 'the-core' ),
														'desc'    => __( 'Select the vertical background position', 'the-core' ),
														'type'    => 'short-select',
														'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
														'value'   => 'top',
														'choices' => array(
															'top'    => __( 'Top', 'the-core' ),
															'center' => __( 'Center', 'the-core' ),
															'bottom' => __( 'Bottom', 'the-core' ),
														)
													),
													'bg_size'          => array(
														'label'   => __( 'Size', 'the-core' ),
														'desc'    => __( 'Select the background size', 'the-core' ),
														'help'    => __( '<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'the-core' ),
														'type'    => 'short-select',
														'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
														'value'   => 'auto',
														'choices' => array(
															'auto'    => __( 'Auto', 'the-core' ),
															'cover'   => __( 'Cover', 'the-core' ),
															'contain' => __( 'Contain', 'the-core' ),
														)
													),
													'overlay_options'  => array(
														'type'    => 'multi-picker',
														'label'   => false,
														'desc'    => false,
														'picker'  => array(
															'overlay' => array(
																'type'         => 'switch',
																'label'        => __( 'Overlay Color', 'the-core' ),
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
																'background'            => array(
																	'label'   => __( '', 'the-core' ),
																	'desc'    => __( 'Select the overlay color', 'the-core' ),
																	'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
																	'value'   => '',
																	'choices' => $the_core_color_settings,
																	'type'    => 'color-palette'
																),
																'overlay_opacity_image' => array(
																	'type'       => 'slider',
																	'value'      => 80,
																	'properties' => array(
																		'min' => 0,
																		'max' => 100,
																		'sep' => 1,
																	),
																	'label'      => __( '', 'the-core' ),
																	'desc'       => __( 'Select the overlay color opacity in %', 'the-core' ),
																)
															),
														),
													),
												),
											),
											'show_borders' => false,
										),
									),
								),
								'show_borders' => false,
							),
							'footer_socials'      => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected_value' => array(
										'type'         => 'switch',
										'value'        => 'yes',
										'label'        => __( 'Footer Socials', 'the-core' ),
										'desc'         => __( 'Display footer social icons?', 'the-core' ),
										'help'         => sprintf( "%s", __( 'Your social links can be set from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings#fw-options-tab-social-options">' . __( 'Social Profiles', 'the-core' ) . '</a> ' . __( 'section under the General tab.', 'the-core' ) ),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' ),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' ),
										)
									)
								),
								'choices' => array(
									'yes' => array(
										'footer_social_color'       => array(
											'label'   => __( 'Social Icons Color', 'the-core' ),
											'desc'    => __( 'Select the social icons color', 'the-core' ),
											'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-styling">' . __( 'Styling section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
											'value'   => $the_core_color_settings['color_3'],
											'choices' => $the_core_color_settings,
											'type'    => 'color-palette'
										),
										'footer_social_hover_color' => array(
											'label'   => __( 'Social Icons Hover Color', 'the-core' ),
											'desc'    => __( 'Select the social icons hover color', 'the-core' ),
											'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-styling">' . __( 'Styling section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
											'value'   => '',
											'choices' => $the_core_color_settings,
											'type'    => 'color-palette'
										),
										'footer_icon_size'          => array(
											'type'  => 'short-text',
											'label' => __( 'Icon Size', 'the-core' ),
											'desc'  => __( 'Enter icon size in pixels. Ex: 16', 'the-core' ),
											'value' => '16',
										),
									)
								)
							),
							'copyright_group'     => array(
								'type'    => 'group',
								'attr'    => array( 'class' => 'border-bottom-none' ),
								'options' => array(
									'copyright'          => array(
										'label' => __( 'Copyright', 'the-core' ),
										'desc'  => __( 'Please enter the copyright text', 'the-core' ),
										'type'  => 'textarea',
										'value' => 'Copyright &copy;2015 <a rel="nofollow" href="http://themefuse.com">ThemeFuse</a>. All Rights Reserved',
									),
									'copyright_position' => array(
										'label'   => __( 'Position', 'the-core' ),
										'desc'    => __( 'Select the copyright position', 'the-core' ),
										'type'    => 'image-picker',
										'value'   => 'fw-copyright-center',
										'choices' => array(
											'fw-copyright-left'   => array(
												'small' => array(
													'height' => 50,
													'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
													'title'  => __( 'Left', 'the-core' )
												),
											),
											'fw-copyright-center' => array(
												'small' => array(
													'height' => 50,
													'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
													'title'  => __( 'Center', 'the-core' )
												),
											),
											'fw-copyright-right'  => array(
												'small' => array(
													'height' => 50,
													'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
													'title'  => __( 'Right', 'the-core' )
												),
											),
										),
									),
									'html_label'         => array(
										'type'  => 'html',
										'html'  => '',
										'value' => '',
										'label' => __( 'Spacing', 'the-core' ),
									),
									'copyright_top'      => array(
										'label' => false,
										'desc'  => __( 'top', 'the-core' ),
										'type'  => 'short-text',
										'value' => '40',
									),
									'copyright_bottom'   => array(
										'label' => false,
										'desc'  => __( 'bottom ', 'the-core' ),
										'type'  => 'short-text',
										'value' => '30',
									),
									'footer_bg_color'    => array(
										'label'   => __( 'Background Color', 'the-core' ),
										'desc'    => __( 'Select the copyright background color', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'value'   => '',
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
								)
							)
						)
					)
				)
			),
		)
	),
	'colors_tab'     => array(
		'title'   => __( 'Colors', 'the-core' ),
		'type'    => 'tab',
		'options' => array(
			'colors-box' => array(
				'title'   => __( 'Colors', 'the-core' ),
				'type'    => 'box',
				'attr'    => array( 'class' => 'fw-color-picker-palette' ),
				'options' => array(
					'color_settings'   => array(
						'type'          => 'multi',
						'label'         => false,
						'inner-options' => array(
							'color_1' => array(
								'label' => __( 'Color Palette', 'the-core' ),
								'desc'  => __( 'Color 1', 'the-core' ),
								'help'  => __( 'This color affects different elements across the website. Note that changing this color will also change the default color in all the options across the admin.', 'the-core' ),
								'type'  => 'color-picker',
								'value' => '#d12a5c',
							),
							'color_2' => array(
								'label' => __( '', 'the-core' ),
								'desc'  => __( 'Color 2', 'the-core' ),
								'help'  => __( 'This color affects different elements across the website. Note that changing this color will also change the default color in all the options across the admin.', 'the-core' ),
								'type'  => 'color-picker',
								'value' => '#49ca9f',
							),
							'color_3' => array(
								'label' => __( '', 'the-core' ),
								'desc'  => __( 'Color 3', 'the-core' ),
								'help'  => __( 'This color affects different elements across the website. Note that changing this color will also change the default color in all the options across the admin.', 'the-core' ),
								'type'  => 'color-picker',
								'value' => '#1f1f1f',
							),
							'color_4' => array(
								'label' => __( '', 'the-core' ),
								'desc'  => __( 'Color 4', 'the-core' ),
								'help'  => __( 'This color affects different elements across the website. Note that changing this color will also change the default color in all the options across the admin.', 'the-core' ),
								'type'  => 'color-picker',
								'value' => '#808080',
							),
							'color_5' => array(
								'label' => __( '', 'the-core' ),
								'desc'  => __( 'Color 5', 'the-core' ),
								'help'  => __( 'This color affects different elements across the website. Note that changing this color will also change the default color in all the options across the admin.', 'the-core' ),
								'type'  => 'color-picker',
								'value' => '#ebebeb',
							),
						)
					),
					'buttons_settings' => array(
						'type'          => 'multi',
						'label'         => false,
						'inner-options' => array(
							'links_color_group'   => array(
								'type'    => 'group',
								'options' => array(
									'links_normal_state' => array(
										'label'   => __( 'Links Color', 'the-core' ),
										'desc'    => __( 'normal state', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'value'   => $the_core_color_settings['color_1'],
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
									'links_hover_state'  => array(
										'label'   => __( '', 'the-core' ),
										'desc'    => __( 'hover state', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'value'   => '',
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
								)
							),
							'buttons_color_group' => array(
								'type'    => 'group',
								'attr'    => array( 'class' => 'border-bottom-none' ),
								'options' => array(
									'buttons_normal_state' => array(
										'label'   => __( 'Buttons Color', 'the-core' ),
										'desc'    => __( 'normal state', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'value'   => $the_core_color_settings['color_4'],
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
									'buttons_hover_state'  => array(
										'label'   => __( '', 'the-core' ),
										'desc'    => __( 'hover state', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'value'   => $the_core_color_settings['color_1'],
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
								)
							),
						)
					),
				)
			),
		)
	),
	'typography_tab' => array(
		'title'   => __( 'Typography', 'the-core' ),
		'type'    => 'tab',
		'options' => array(
			'typography-box' => array(
				'title'   => __( 'Typography', 'the-core' ),
				'type'    => 'box',
				'options' => array(
					'typography_settings' => array(
						'type'          => 'multi',
						'label'         => false,
						'attr'          => array(
							'class' => 'fw-option-type-multi-show-borders',
						),
						'inner-options' => array(
							'h1'                             => array(
								'label' => __( 'H1', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'google_font'    => true,
									'subset'         => 'latin',
									'variation'      => 'regular',
									'family'         => 'Montserrat',
									'style'          => '',
									'weight'         => '',
									'size'           => '55',
									'line-height'    => '65',
									'letter-spacing' => '-2',
									'color-palette'  => $the_core_color_settings['color_3'],
								)
							),
							'h2'                             => array(
								'label' => __( 'H2', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'google_font'    => true,
									'subset'         => 'latin',
									'variation'      => '700',
									'family'         => 'Montserrat',
									'style'          => '',
									'weight'         => '',
									'size'           => '40',
									'line-height'    => '56',
									'letter-spacing' => '-2',
									'color-palette'  => $the_core_color_settings['color_3'],
								)
							),
							'h3'                             => array(
								'label' => __( 'H3', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'google_font'    => true,
									'subset'         => 'latin',
									'variation'      => '700',
									'family'         => 'Montserrat',
									'style'          => '',
									'weight'         => '',
									'size'           => '32',
									'line-height'    => '38',
									'letter-spacing' => '-2',
									'color-palette'  => $the_core_color_settings['color_3'],
								)
							),
							'h4'                             => array(
								'label' => __( 'H4', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'google_font'    => true,
									'subset'         => 'latin',
									'variation'      => '700',
									'family'         => 'Montserrat',
									'style'          => '',
									'weight'         => '',
									'size'           => '26',
									'line-height'    => '32',
									'letter-spacing' => '-2',
									'color-palette'  => $the_core_color_settings['color_3'],
								)
							),
							'h5'                             => array(
								'label' => __( 'H5', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'google_font'    => true,
									'subset'         => 'latin',
									'variation'      => '700',
									'family'         => 'Montserrat',
									'style'          => '',
									'weight'         => '',
									'size'           => '19',
									'line-height'    => '28',
									'letter-spacing' => '-1',
									'color-palette'  => $the_core_color_settings['color_3'],
								)
							),
							'h6'                             => array(
								'label' => __( 'H6', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'google_font'    => true,
									'subset'         => 'latin',
									'variation'      => '700',
									'family'         => 'Montserrat',
									'style'          => '',
									'weight'         => '',
									'size'           => '14',
									'line-height'    => '26',
									'color-palette'  => $the_core_color_settings['color_3'],
								)
							),
							'body_text'                      => array(
								'label' => __( 'Body Text', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'subset'         => 'latin',
									'variation'      => 'regular',
									'family'         => 'Quattrocento Sans',
									'style'          => '',
									'weight'         => '',
									'size'           => '16.5',
									'line-height'    => '28',
									'letter-spacing' => '0',
									'color-palette'  => '#a8a8a8',
								),
							),
							'subtitles'                      => array(
								'label' => __( 'Subtitles', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'google_font'    => true,
									'subset'         => 'latin',
									'variation'      => '300',
									'family'         => 'Merriweather',
									'style'          => '',
									'weight'         => '',
									'size'           => '22',
									'line-height'    => '39',
									'letter-spacing' => '0.5',
								),
							),
							'buttons_typography_group'       => array(
								'type'    => 'group',
								'attr'    => array('class' => 'border-bottom-none'),
								'options' => array(
									'buttons'       => array(
										'label' => __( 'Buttons', 'the-core' ),
										'type'  => 'tf-typography',
										'value' => array(
											'google_font'    => true,
											'subset'         => 'latin',
											'variation'      => 'regular',
											'family'         => 'Montserrat',
											'style'          => '',
											'weight'         => '',
											'size'           => '12',
											'line-height'    => '30',
											'letter-spacing' => '0',
											'color-palette'  => '#ffffff',
										),
									),
									'buttons_hover' => array(
										'label'   => __( '', 'the-core' ),
										'desc'    => __( 'Select buttons hover color', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'value'   => '#ffffff',
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
								)
							),
							'blog-typography-box' => array(
								'title'   => __( 'Blog', 'the-core' ),
								'type'    => 'box',
								'options' => array(
									'widgets_title_typography_group' => array(
										'type'    => 'group',
										'options' => array(
											'widgets_title'       => array(
												'label' => __( 'Blog Widgets Title Links', 'the-core' ),
												'type'  => 'tf-typography',
												'value' => array(
													'subset'         => 'latin',
													'variation'      => '700',
													'family'         => 'Merriweather',
													'style'          => '',
													'weight'         => '',
													'size'           => '14',
													'line-height'    => '26',
													'letter-spacing' => '1',
												),
											),
											'widgets_title_hover' => array(
												'label'   => __( '', 'the-core' ),
												'desc'    => __( 'Select blog widgets title hover color', 'the-core' ),
												'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
												'value'   => $the_core_color_settings['color_1'],
												'choices' => $the_core_color_settings,
												'type'    => 'color-palette'
											),
											'widgets_spacing'     => array(
												'type'  => 'short-text',
												'value' => '80',
												'label' => __( 'Blog Widgets Spacing', 'the-core' ),
												'desc'  => __( 'Select the blog widgets spacing in pixels', 'the-core' ),
											)
										)
									),
								)
							),
							'header-typography-box' => array(
								'title'   => __( 'Header', 'the-core' ),
								'type'    => 'box',
								'options' => array(
									'header_top_bar_text'            => array(
										'label' => __( 'Header Top Bar', 'the-core' ),
										'type'  => 'tf-typography',
										'value' => array(
											'subset'         => 'latin',
											'variation'      => 'regular',
											'family'         => 'NTR',
											'style'          => '',
											'weight'         => '',
											'size'           => '16',
											'line-height'    => '35',
											'letter-spacing' => '0.3',
											'color-palette'  => '#ffffff',
										),
									),
									'header_menu_group'              => array(
										'type'    => 'group',
										'attr'    => array('class' => 'border-bottom-none'),
										'options' => array(
											'header_menu'               => array(
												'label' => __( 'Header Menu', 'the-core' ),
												'type'  => 'tf-typography',
												'value' => array(
													'google_font'    => true,
													'subset'         => 'latin',
													'variation'      => 'regular',
													'family'         => 'Montserrat',
													'style'          => '',
													'weight'         => '',
													'size'           => '13',
													'line-height'    => '30',
													'letter-spacing' => '0',
													'color-palette'  => $the_core_color_settings['color_3'],
												),
											),
											'header_menu_hover' => array(
												'label'   => __( '', 'the-core' ),
												'desc'    => __( 'Select the menu items hover color', 'the-core' ),
												'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
												'value'   => $the_core_color_settings['color_2'],
												'choices' => $the_core_color_settings,
												'type'    => 'color-palette'
											),
											'header_menu_items_spacing' => array(
												'type'  => 'short-text',
												'value' => '40',
												'label' => __( 'Menu Items Spacing', 'the-core' ),
												'desc'  => __( 'Select the menu items spacing in pixels', 'the-core' ),
											)
										)
									),
								)
							),
							'footer-typography-box' => array(
								'title'   => __( 'Footer', 'the-core' ),
								'type'    => 'box',
								'options' => array(
									'footer_menu_group'              => array(
										'type'    => 'group',
										'options' => array(
											'footer_menu'               => array(
												'label' => __( 'Footer Menu', 'the-core' ),
												'type'  => 'typography',
												'type'  => 'tf-typography',
												'value' => array(
													'google_font'    => true,
													'subset'         => 'latin',
													'variation'      => 'regular',
													'family'         => 'Montserrat',
													'style'          => '',
													'weight'         => '',
													'size'           => '13',
													'line-height'    => '84',
													'letter-spacing' => '1',
												),
											),
											'footer_menu_hover' => array(
												'label'   => __( '', 'the-core' ),
												'desc'    => __( 'Select the menu items hover color', 'the-core' ),
												'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
												'value'   => '',
												'choices' => $the_core_color_settings,
												'type'    => 'color-palette'
											),
											'footer_menu_items_spacing' => array(
												'type'  => 'short-text',
												'value' => '35',
												'label' => __( 'Menu Items Spacing', 'the-core' ),
												'desc'  => __( 'Select the menu items spacing in pixels', 'the-core' ),
											)
										)
									),
									'footer_copyright_typography'    => array(
										'label' => __( 'Footer Copyright', 'the-core' ),
										'type'  => 'tf-typography',
										'value' => array(
											'google_font'    => true,
											'subset'         => 'latin',
											'variation'      => 'regular',
											'family'         => 'Quattrocento Sans',
											'style'          => '',
											'weight'         => '',
											'size'           => '15',
											'line-height'    => '45',
											'letter-spacing' => '0',
											'color-palette'  => '#686869',
										),
									),
								)
							),
							'forms-typography-box' => array(
								'title'   => __( 'Forms', 'the-core' ),
								'type'    => 'box',
								'options' => array(
									'forms_typography_group'       => array(
										'type'    => 'group',
										'options' => array(
											'form_labels'    => array(
												'label' => __( 'Form Labels', 'the-core' ),
												'type'  => 'tf-typography',
												'value' => array(
													'google_font'    => true,
													'subset'         => 'latin',
													'variation'      => 'regular',
													'family'         => 'Montserrat',
													'style'          => '',
													'weight'         => '',
													'size'           => '12',
													'line-height'    => '30',
													'letter-spacing' => '0',
													'color-palette'  => '#b2b2b2',
												),
											),
											'form_labels_uppercase' => array(
												'type'         => 'switch',
												'value'        => 'uppercase',
												'label'        => __( '', 'the-core' ),
												'desc'         => __( 'Uppercase form labels?', 'the-core' ),
												'left-choice'  => array(
													'value' => 'none',
													'label' => __( 'No', 'the-core' ),
												),
												'right-choice' => array(
													'value' => 'uppercase',
													'label' => __( 'Yes', 'the-core' ),
												)
											),
											'form_inputs'    => array(
												'label' => __( 'Form Inputs', 'the-core' ),
												'type'  => 'tf-typography',
												'value' => array(
													'google_font'    => true,
													'subset'         => 'latin',
													'variation'      => '700',
													'family'         => 'Quattrocento Sans',
													'style'          => '',
													'weight'         => '',
													'size'           => '16.5',
													'line-height'    => '28',
													'letter-spacing' => '0',
													'color-palette'  => $the_core_color_settings['color_3'],
												),
											),
										)
									),
								)
							),
						)
					)
				)
			),
		)
	),
	'custom_css_tab' => array(
		'title'   => __( 'Custom CSS', 'the-core' ),
		'type'    => 'tab',
		'options' => array(
			'css-box' => array(
				'title'   => __( 'CSS', 'the-core' ),
				'type'    => 'box',
				'options' => array(
					'quick_css' => array(
						'label' => __( 'Quick CSS', 'the-core' ),
						'desc'  => __( 'Quick Css changes that will be applied to the theme', 'the-core' ),
						'help'  => __( 'If you need to change major portions of the theme please add your custom CSS in the <strong>custom.less</strong> file. This file is located on your server in the <strong>/child-theme/style-less/</strong> folder.', 'the-core' ),
						'type'  => 'textarea',
						'value' => '',
					),
				)
			),
		)
	),
	$the_core_requirements_tab,
);