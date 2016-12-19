<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>
	</div><!-- /.site-main -->

	<!-- Footer -->
	<footer id="colophon" class="site-footer fw-footer <?php the_core_get_footer_class(); ?>" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
		<?php the_core_footer(); ?>
	</footer>
</div><!-- /#page -->
<?php wp_footer(); ?>
<?php the_core_go_to_top_button(); ?>
</body>
</html>