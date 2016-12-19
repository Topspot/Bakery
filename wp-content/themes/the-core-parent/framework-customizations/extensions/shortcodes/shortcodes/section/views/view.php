<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id              = ( isset($atts['link_id']) && !empty($atts['link_id']) ) ? $atts['link_id'] : uniqid( 'section-' );
$bg_color        = $bg_image = $bg_image_set = $bg_video_data_attr = $extra_classes = $margin_bottom = $data_height = $the_core_overlay_style = '';
$container_class = ( isset( $atts['is_fullwidth']['selected'] ) && $atts['is_fullwidth']['selected'] == 'yes' ) ? 'fw-container-fluid' : 'fw-container';
$container_style = '';

if(( isset( $atts['is_fullwidth']['selected'] ) && $atts['is_fullwidth']['selected'] == 'no' ) ){
	// container color
	if( isset($atts['is_fullwidth']['no']['container_color']['id']) && $atts['is_fullwidth']['no']['container_color']['id'] != 'fw-custom' ){
		$container_class .= ' fw_theme_bg_' . $atts['is_fullwidth']['no']['container_color']['id'];
	}
	elseif( isset($atts['is_fullwidth']['no']['container_color']['color']) && !empty($atts['is_fullwidth']['no']['container_color']['color']) ){
		$container_style = 'style="background-color:' . $atts['is_fullwidth']['no']['container_color']['color'] . ';"';
	}
}

if ( isset( $atts['background_options']['background'] ) && $atts['background_options']['background'] == 'default' ) {
	$extra_classes .= ' fw-main-row';
} elseif ( isset( $atts['is_fullwidth'] ) && isset( $atts['auto_generated'] ) && $atts['auto_generated'] == '' ) {
	$extra_classes .= ' fw-main-row-custom';
} else {
	$extra_classes .= ' fw-main-row';
}

if ( isset( $atts['first_in_builder'] ) && $atts['first_in_builder'] ) {
	$extra_classes .= ' fw-main-row-top';
}

if ( isset( $atts['default_spacing'] ) && $atts['default_spacing'] != '' ) {
	$extra_classes .= ' ' . $atts['default_spacing'];
}

if ( isset( $atts['margin_bottom'] ) && $atts['margin_bottom'] != '' && $atts['margin_bottom'] != 'fw-content-overlay-sm' && $atts['margin_bottom'] != 'fw-content-overlay-md' && $atts['margin_bottom'] != 'fw-content-overlay-lg' ) {
	$margin_bottom = 'margin-bottom:' . - (int) $atts['margin_bottom'] . 'px;';
	$extra_classes .= ' fw-content-overlay-custom';
} elseif ( isset( $atts['margin_bottom'] ) ) {
	$extra_classes .= ' ' . $atts['margin_bottom'];
}

if ( $atts['background_options']['background'] == 'image' && ! empty( $atts['background_options']['image']['background_image']['data'] ) ) {
	//$bg_image_set = 'data-bgset="' . $atts['background_options']['image']['background_image']['data']['icon'] . '"';
	$bg_image .= ' background-image:url(' . $atts['background_options']['image']['background_image']['data']['icon'] . ');';
	$bg_image .= ' background-repeat: ' . $atts['background_options']['image']['repeat'] . ';';
	$bg_image .= ' background-position: ' . $atts['background_options']['image']['bg_position_x'] . ' ' . $atts['background_options']['image']['bg_position_y'] . ';';
	$bg_image .= ' background-size: ' . $atts['background_options']['image']['bg_size'] . ';';

	if ( isset( $atts['background_options']['image']['background_color']['id'] ) && $atts['background_options']['image']['background_color']['id'] == 'fw-custom' && ! empty( $atts['background_options']['image']['background_color']['color'] ) ) {
		$bg_color = 'background-color:' . $atts['background_options']['image']['background_color']['color'] . ';';
	} elseif ( isset( $atts['background_options']['image']['background_color']['id'] ) ) {
		$extra_classes .= ' fw_theme_bg_' . $atts['background_options']['image']['background_color']['id'];
	}
	$extra_classes .= ' fw-section-image';
} elseif ( $atts['background_options']['background'] == 'video' ) {
	$poster = '';
	if($atts['background_options']['video']['video_type']['selected'] == 'uploaded' ){
		$video_url = $atts['background_options']['video']['video_type']['uploaded']['video']['url'];
		if( isset($atts['background_options']['video']['video_type']['uploaded']['poster']['data']['icon']) ) {
			$poster = $atts['background_options']['video']['video_type']['uploaded']['poster']['data']['icon'];
		}
	}
	else{
		$video_url = $atts['background_options']['video']['video_type']['youtube']['video'];
        if( isset($atts['background_options']['video']['video_type']['youtube']['poster']['data']['icon']) && !empty($atts['background_options']['video']['video_type']['youtube']['poster']['data']['icon']) ) {
            $poster = $atts['background_options']['video']['video_type']['youtube']['poster']['data']['icon'];
        }
	}

	$filetype  = wp_check_filetype( $video_url );
	$filetypes = array( 'mp4' => 'mp4', 'ogv' => 'ogg', 'webm' => 'webm', 'jpg' => 'poster' );
	$filetype  = array_key_exists( (string) $filetype['ext'], $filetypes ) ? $filetypes[ $filetype['ext'] ] : 'video';
	$bg_video_data_attr = 'data-wallpaper-options="' . fw_htmlspecialchars( json_encode( array( 'source' => array( $filetype => $video_url, 'poster' => $poster ) ) ) ) . '"';
	$extra_classes .= ' background-video';
} elseif ( $atts['background_options']['background'] == 'default' ) {
	$extra_classes .= ' background-default';
} elseif ( $atts['background_options']['background'] == 'color' ) {
	if ( isset( $atts['background_options']['color']['background_color']['id'] ) && $atts['background_options']['color']['background_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $atts['background_options']['color']['background_color']['color'] ) ) {
			$bg_color = 'background-color:' . $atts['background_options']['color']['background_color']['color'] . ';';
		}
	} elseif ( isset( $atts['background_options']['color']['background_color']['id'] ) ) {
		$extra_classes .= ' fw_theme_bg_' . $atts['background_options']['color']['background_color']['id'];
	}
}

if ( $atts['background_options']['background'] == 'image' || $atts['background_options']['background'] == 'video' ) {
	$type    = $atts['background_options']['background'];
	$overlay = $atts['background_options'][ $type ]['overlay_options']['overlay'];
	if ( $overlay == 'yes' ) {
		$the_core_overlay_bg    = $atts['background_options'][ $type ]['overlay_options']['yes']['background']['id'];
		$the_core_opacity_param = 'overlay_opacity_' . $atts['background_options']['background'];
		$the_core_opacity       = $atts['background_options'][ $type ]['overlay_options']['yes'][ $the_core_opacity_param ] / 100;
		if ( $the_core_overlay_bg == 'fw-custom' ) {
			$the_core_overlay_style = '<div class="fw-main-row-overlay" style="background-color: ' . $atts['background_options'][ $type ]['overlay_options']['yes']['background']['color'] . '; opacity: ' . $the_core_opacity . ';"></div>';
		} else {
			$the_core_overlay_style = '<div class="fw-main-row-overlay fw_theme_bg_' . $the_core_overlay_bg . '" style="opacity: ' . $the_core_opacity . ';"></div>';
		}
	}
}

if ( $atts['height'] != 'auto' && $atts['height'] != 'fw-section-height-sm' && $atts['height'] != 'fw-section-height-md' && $atts['height'] != 'fw-section-height-lg' ) {
	$height      = (int) $atts['height'];
	$data_height = 'height: ' . $height . 'px;';
	$extra_classes .= ' fw-section-height-custom';
} else {
	$extra_classes .= ' ' . $atts['height'];
}

// vertical align middle
if( isset($atts['vertical_align']) ){
	$extra_classes .= ' '.$atts['vertical_align'];
}

$data_parallax = '';
if ( $atts['background_options']['background'] == 'image' && isset($atts['background_options']['image']['parallax']['selected']) && $atts['background_options']['image']['parallax']['selected'] == 'yes' ) :
	$extra_classes .= ' parallax-section';
	$data_parallax = 'data-stellar-background-ratio="'.( (int)$atts['background_options']['image']['parallax']['yes']['parallax_speed']/10).'"';
endif;

// for desktop
if( isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
    $extra_classes .= ' fw-desktop-hide-element';
}

// for tablet landscape
if( isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
    $extra_classes .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if( isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$extra_classes .= ' fw-tablet-hide-element';
}

// for display on smartphone
if( isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$extra_classes .= ' fw-mobile-hide-element';
}
?>
<section <?php echo $data_parallax; ?> id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr( $extra_classes ); ?> <?php echo esc_attr( $atts['class'] ); ?>" <?php echo $bg_image_set; ?> style="<?php echo $bg_color; ?> <?php echo $bg_image; ?> <?php echo $margin_bottom; ?> <?php echo $data_height; ?>" <?php echo $bg_video_data_attr; ?> >
	<?php echo $the_core_overlay_style; ?>
	<div class="<?php echo esc_attr( $container_class ); ?>" <?php echo $container_style; ?>>
		<?php echo do_shortcode( $content ); ?>
	</div>
</section>