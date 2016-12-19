<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );

	/**
	 * @var array $atts
	 */
}

$term_id   = (int) $atts['category'];
$the_core_blog_view = @$atts['blog_view']['selected'];
$blog_type = $atts['blog_type'];

$posts_per_page = (int) $atts['posts_number'];
if ( $posts_per_page == 0 ) {
	$posts_per_page = - 1;
}

if ( $term_id == 0 ) {
	$args = array(
		'posts_per_page' => $posts_per_page,
		'post_type'      => 'post',
		'orderby'        => 'date'
	);
} else {
	$args = array(
		'posts_per_page' => $posts_per_page,
		'post_type'      => 'post',
		'orderby'        => 'date',
		'tax_query'      => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $term_id
			)
		)
	);
}

$query = new WP_Query( $args );

// set sidebar position for 3 columns full, and function get the specific wrap
$the_core_sidebar_position = ( isset($atts['blog_view']['grid']['columns']) && $atts['blog_view']['grid']['columns'] == 'fw-portfolio-cols-3' ) ? 'full' : 'right';
$the_core_wrap_div         = the_core_get_blog_wrap( $the_core_blog_view, $the_core_sidebar_position );

if ( $the_core_blog_view == 'grid' ) {
	wp_enqueue_script(
		'masonry-theme',
		get_template_directory_uri() . '/js/masonry.pkgd.min.js',
		array( 'jquery' ),
		'1.0',
		true
	);
}

// for desktop
if( isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
    $atts['class'] .= ' fw-desktop-hide-element';
}

// for tablet landscape
if( isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
    $atts['class'] .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if( isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-tablet-hide-element';
}

// for display on smartphone
if( isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-mobile-hide-element';
}

/*----------------Animation option--------------*/
$data_animation = '';
if ( isset( $atts['animation_group'] ) ) {
	// get animation class and delay
	if ( $atts['animation_group']['selected'] == 'yes' ) {
		$atts['class'] .= ' fw-animated-element';
		// get animation
		if ( ! empty( $atts['animation_group']['yes']['animation']['animation'] ) ) {
			$data_animation .= ' data-animation-type="' . $atts['animation_group']['yes']['animation']['animation'] . '"';
		}

		// get delay
		if ( ! empty( $atts['animation_group']['yes']['animation']['delay'] ) ) {
			$data_animation .= ' data-animation-delay="' . (int) esc_attr( $atts['animation_group']['yes']['animation']['delay'] ) . '"';
		}
	}
}
/*----------------End Animation----------------*/
?>
<div class="fw-shortcode-latest-posts postlist <?php echo the_core_get_blog_view( $the_core_blog_view, 'class', $the_core_sidebar_position ); ?> <?php echo esc_attr($atts['class']); ?>" <?php echo $data_animation; ?> <?php echo the_core_get_blog_view( $the_core_blog_view, 'id', $the_core_sidebar_position ) ?>>
	<?php if ( $query->have_posts() ) :
		// Start the Loop.
		while ( $query->have_posts() ) : $query->the_post();
			echo $the_core_wrap_div['start'];
			get_template_part( 'templates/' . $blog_type . '/content', get_post_format() );
			echo $the_core_wrap_div['end'];
		endwhile;
	else :
		// If no content, include the "No posts found" template.
		get_template_part( 'content', 'none' );
	endif; ?>
</div>
<?php wp_reset_query(); ?>