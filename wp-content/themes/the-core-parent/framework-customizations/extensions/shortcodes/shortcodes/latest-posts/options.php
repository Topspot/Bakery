<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$the_core_template_directory = get_template_directory_uri();
$options            = array(
	'blog_type'       => array(
		'type'    => 'image-picker',
		'label'   => __( 'Blog Style', 'the-core' ),
		'desc'    => __( 'Select the blog display style', 'the-core' ),
		'value'   => '',
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
	'blog_view' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'type'         => 'switch',
				'value'        => 'default',
				'label'        => __( 'Grid View', 'the-core' ),
				'desc'         => __( 'Display blog posts on a grid', 'the-core' ),
				'left-choice'  => array(
					'value' => 'default',
					'label' => __( 'No', 'the-core' ),
				),
				'right-choice' => array(
					'value' => 'grid',
					'label' => __( 'Yes', 'the-core' ),
				)
			),
		),
		'choices' => array(
			'grid' => array(
				'columns' => array(
					'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
					'label'   => __( '', 'the-core' ),
					'desc'    => __( 'Choose the number of columns', 'the-core' ),
					'type'    => 'radio',
					'value'   => 'fw-portfolio-cols-3',
					'choices' => array(
						'fw-portfolio-cols-2' => __( '2 columns', 'the-core' ),
						'fw-portfolio-cols-3' => __( '3 columns', 'the-core' ),
					)
				),
			)
		)
	),
	'category'        => array(
		'label'   => __( 'Display From', 'the-core' ),
		'desc'    => __( 'Select a blog category', 'the-core' ),
		'type'    => 'select',
		'value'   => '',
		'choices' => the_core_get_category_term_list(),
	),
	'posts_number'    => array(
		'label' => __( 'No of Posts', 'the-core' ),
		'desc'  => __( 'Enter the number of posts to display. Ex: 3, 6, maximum of 50', 'the-core' ),
		'type'  => 'short-text',
		'value' => get_option( 'posts_per_page' )
	),
	'animation_group' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'type'         => 'switch',
				'label'        => __( 'Animation', 'the-core' ),
				'help'         => __( 'Enables you to create an animation entrance or exit for this shortcode. Demo previews for the animations can be found <a target="_blank" href="http://daneden.github.io/animate.css/">here</a>.', 'the-core' ),
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
			'yes' => array(
				'animation' => array(
					'label' => __( 'Type & Delay', 'the-core' ),
					'desc'  => __( 'The type and delay in milliseconds (previews on <a target="_blank" href="http://daneden.github.io/animate.css/">http://daneden.github.io/animate.css/</a>)', 'the-core' ),
					'type'  => 'tf-animation',
					'value' => array(
						'animation' => 'fadeInUp',
						'delay'     => '200'
					)
				),
			),
		),
	),
	'responsive'         => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => __( 'Responsive Behavior', 'the-core' ),
		'button'        => __( 'Settings', 'the-core' ),
		'size'          => 'small',
		'popup-options' => array(
            'desktop_display'     => array(
                'type'    => 'multi-picker',
                'label'   => false,
                'desc'    => false,
                'picker'  => array(
                    'selected' => array(
                        'type'         => 'switch',
                        'value'        => 'yes',
                        'label'        => __( 'Desktop', 'the-core' ),
                        'desc'         => __( 'Display this shortcode on desktop?', 'the-core' ),
                        'help'         => __( 'Applies to devices with the resolution higher then 1200px (desktops and laptops)', 'the-core' ),
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
            ),
            'tablet_landscape_display'     => array(
                'type'    => 'multi-picker',
                'label'   => false,
                'desc'    => false,
                'picker'  => array(
                    'selected' => array(
                        'type'         => 'switch',
                        'value'        => 'yes',
                        'label'        => __( 'Tablet Landscape', 'the-core' ),
                        'desc'         => __( 'Display this shortcode on tablet landscape?', 'the-core' ),
                        'help'         => __( 'Applies to devices with the resolution between 992px - 1199px (tablet landscape)', 'the-core' ),
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
            ),
            'tablet_display'     => array(
                'type'    => 'multi-picker',
                'label'   => false,
                'desc'    => false,
                'picker'  => array(
                    'selected' => array(
                        'type'         => 'switch',
                        'value'        => 'yes',
                        'label'        => __( 'Tablet Portrait', 'the-core' ),
                        'desc'         => __( 'Display this shortcode on tablet portrait?', 'the-core' ),
                        'help'         => __( 'Applies to devices with the resolution between 768px - 991px (tablet portrait)', 'the-core' ),
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
                'choices' => array(),
            ),
            'smartphone_display' => array(
                'type'    => 'multi-picker',
                'label'   => false,
                'desc'    => false,
                'picker'  => array(
                    'selected' => array(
                        'type'         => 'switch',
                        'value'        => 'yes',
                        'label'        => __( 'Smartphone', 'the-core' ),
                        'desc'         => __( 'Display this shortcode on smartphone?', 'the-core' ),
                        'help'         => __( 'Applies to devices with the resolution up to 767px (smartphones both portrait and landscape as well as some low-resolution tablets)', 'the-core' ),
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
                'choices' => array(),
            ),
		),
	),
	'class'           => array(
		'attr'  => array( 'class' => 'border-bottom-none' ),
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'type'  => 'text',
		'help'  => __( 'You can use this class to further style this shortcode by adding your custom CSS in the <strong>style.css</strong> file. This file is located on your server in the <strong>child-theme</strong> folder.', 'the-core' ),
		'value' => '',
	),
);