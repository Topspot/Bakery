<?php
/**
 * Template Name: Visual Builder Template
 */

get_header();

while ( have_posts() ) :
	the_post(); ?>

    <?php if ( post_password_required() ) : ?>
        <section class="fw-main-row" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
            <div class="fw-container">
                <div class="fw-row">
                    <div class="fw-content-area">
                        <div class="fw-inner">
                            <article id="page-<?php the_ID(); ?>" class="post post-details" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                                <div class="inner">
                                    <header class="entry-header">
                                        <?php the_core_single_post_title( $post->ID, 'page' ); ?>
                                    </header>
                                    <div class="entry-content" itemprop="text">
                                        <?php the_content(); ?>
                                    </div>
                                </div><!-- /.inner-->
                            </article>
                        </div><!-- /.fw-inner-->
                    </div><!-- /.fw-content-area-->
                </div><!-- /.fw-row-->
            </div><!-- /.fw-container-->
        </section>
    <?php else: ?>
	    <?php the_content(); ?>
    <?php endif; ?>
<?php endwhile;

get_footer();
?>