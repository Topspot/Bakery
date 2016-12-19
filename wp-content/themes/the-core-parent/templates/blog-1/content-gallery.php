<?php
/**
 * The template for displaying posts in the Gallery post format
 */
?>
<?php $the_core_blog_title = (function_exists('fw_get_db_settings_option')) ? fw_get_db_settings_option('posts_settings/blog_title/selected', 'h2') : 'h2'; ?>
<?php $the_core_permalink  = get_permalink(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post clearfix" ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<span class="post-format"><a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'gallery' ) ); ?>"><?php echo get_post_format_string( 'gallery' ); ?></a></span>
		<?php the_core_post_meta( $post->ID, 'post' ); ?>
		<<?php echo $the_core_blog_title; ?> class="entry-title" itemprop="headline"><a href="<?php echo esc_url($the_core_permalink); ?>"><?php the_title(); ?></a></<?php echo $the_core_blog_title; ?>>
	</header>

	<div class="entry-content clearfix" itemprop="text">
		<?php the_content( '' ); ?>
		<footer class="entry-meta clearfix">
			<?php the_core_get_blog_button(array('permalink' => $the_core_permalink)); ?>
			<?php the_core_get_blog_comments_number(array('permalink' => $the_core_permalink)); ?>
		</footer>
	</div>
</article>