<?php
$the_core_header_settings       = defined( 'FW' ) ? fw_get_db_settings_option( 'header_settings' ) : array();
$the_core_enable_header_top_bar = isset( $the_core_header_settings['enable_header_top_bar']['selected_value'] ) ? $the_core_header_settings['enable_header_top_bar']['selected_value'] : 'no';
$the_core_top_bar_text          = isset( $the_core_header_settings['enable_header_top_bar']['yes']['header_text'] ) ? $the_core_header_settings['enable_header_top_bar']['yes']['header_text'] : '';
$the_core_enable_header_socials = isset( $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['selected_value'] ) ? $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['selected_value'] : 'yes';
$the_core_enable_search         = isset( $the_core_header_settings['enable_search']['selected_value'] ) ? $the_core_header_settings['enable_search']['selected_value'] : 'no';
$the_core_search_type           = isset( $the_core_header_settings['enable_search']['yes']['search_type']['selected'] ) ? $the_core_header_settings['enable_search']['yes']['search_type']['selected'] : '';
$the_core_search_position       = isset( $the_core_header_settings['enable_search']['yes']['search_position'] ) ? $the_core_header_settings['enable_search']['yes']['search_position'] : 'top_bar';
$the_core_header_text           = isset( $the_core_header_settings['header_type_picker']['header-4']['header_text'] ) ? $the_core_header_settings['header_type_picker']['header-4']['header_text'] : '';
$the_core_placeholder_text      = isset( $the_core_header_settings['enable_search']['yes']['search_type'][$the_core_search_type]['search_advanced_styling']['placeholder_text'] ) ? $the_core_header_settings['enable_search']['yes']['search_type'][$the_core_search_type]['search_advanced_styling']['placeholder_text'] : '';
?>
<header class="fw-header fw-search-in-menu-area" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
	<?php if ( $the_core_enable_header_top_bar == 'yes' ) {
		the_core_top_bar( array('top_bar_text' => $the_core_top_bar_text, 'enable_header_socials' => $the_core_enable_header_socials, 'enable_search' => $the_core_enable_search, 'search_type' => $the_core_search_type, 'placeholder_text' => $the_core_placeholder_text, 'search_position' => $the_core_search_position) );
	} ?>
	<div class="fw-header-main">
		<div class="fw-wrap-logo-info-text">
			<div class="fw-container">
				<?php the_core_logo(); ?>
				<div class="fw-info-text-header-main">
					<?php if ( $the_core_header_text != '' ) : ?>
						<div class="fw-text"><?php echo $the_core_header_text; ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="fw-nav-wrap" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
			<div class="fw-container">
				<?php fw_theme_nav_menu( 'primary' ); ?>
				<?php if ( $the_core_enable_search == 'yes' && $the_core_search_position == 'menu_bar' ) {
					the_core_header_search( array('search_type' => $the_core_search_type, 'placeholder_text' => $the_core_placeholder_text) );
				} ?>
			</div>
		</div>
	</div>
	<?php if($the_core_enable_search == 'yes' && $the_core_search_type == 'fw-mini-search') {
		the_core_header_mini_search($the_core_placeholder_text);
	} ?>
</header>