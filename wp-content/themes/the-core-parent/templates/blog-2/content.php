<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

$the_core_permalink    = get_permalink();
$the_core_post_options = the_core_listing_post_options($post->ID);
$the_core_blog_title   = (function_exists('fw_get_db_settings_option')) ? fw_get_db_settings_option('posts_settings/blog_title/selected', 'h2') : 'h2';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post clearfix post-list-type-2" ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<<?php echo $the_core_blog_title; ?> class="entry-title" itemprop="headline">
			<?php if ( is_sticky() ) : ?>
				<i class="sticky-icon"></i>
			<?php endif; ?>
			<a href="<?php echo esc_url($the_core_permalink); ?>"><?php the_title(); ?></a>
		</<?php echo $the_core_blog_title; ?>>
	</header>

	<div class="fw-post-image fw-block-image-parent <?php echo esc_attr($the_core_post_options['image_alignment']) . ' ' . esc_attr($the_core_post_options['rounded']) . ' ' . esc_attr($the_core_post_options['frame']); ?> fw-overlay-1">
		<?php the_core_get_blog_comments_number(array('permalink' => $the_core_permalink)); ?>
		<?php if ( $the_core_post_options['image'] ) : ?>
			<a href="<?php echo esc_url($the_core_permalink); ?>" class="post-thumbnail fw-block-image-child <?php echo esc_attr($the_core_post_options['ratio_class']); ?>">
				<?php echo $the_core_post_options['image']['img']; ?>
				<div class="fw-block-image-overlay">
					<div class="fw-itable">
						<div class="fw-icell">
							<i class="fw-icon-link"></i>
						</div>
					</div>
				</div>
			</a>
		<?php endif; ?>
	</div>

	<div class="entry-content clearfix" itemprop="text">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-meta clearfix">
		<?php the_core_post_meta_blog_2( $post->ID, 'post' ); ?>
	</footer>
</article>