<!doctype html>
<!--[if lt IE 8 ]><html <?php language_attributes(); ?> class="ie7"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="ie8"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="hfeed site">
	<?php the_core_header(); ?>
	<div id="main" class="site-main">