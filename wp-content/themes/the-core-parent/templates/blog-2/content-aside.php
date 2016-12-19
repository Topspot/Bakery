<?php
/**
 * The template for displaying posts in the Aside post format
 */
?>
<?php $the_core_blog_title = fw_get_db_settings_option('posts_settings/blog_title/selected', 'h2'); ?>
<?php $the_core_permalink  = get_permalink(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post clearfix post-list-type-2" ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<span class="post-format"><a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'aside' ) ); ?>"><?php echo get_post_format_string( 'aside' ); ?></a></span>
		<<?php echo $the_core_blog_title; ?> class="entry-title" itemprop="headline"><a href="<?php echo esc_url($the_core_permalink); ?>"><?php the_title(); ?></a></<?php echo $the_core_blog_title; ?>>
	</header>

	<div class="entry-content clearfix" itemprop="text">
		<?php the_content( '' ); ?>
	</div>

	<footer class="entry-meta clearfix">
		<?php the_core_post_meta_blog_2( $post->ID, 'post' ); ?>
	</footer>
</article>