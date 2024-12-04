<?php
/**
 * The Header 	for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<header id="branding" role="banner">
	<div style="border:0px; padding:0px; width:960px; height:92px; background-image:url(/uploads/band.png);    background-repeat: repeat-x;">
        <div style="padding:9px 0px 9px 60px; width:244px; height:74px; float:left;">
			<a  href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="home" title="home"><img src="/uploads/kieker-logo.svg" style="width:244px; height:74px;"/></a>
        </div>
        <div style="padding:43px 50px 0px 40px; float:left; font-size: 24px; color:#2456a1; font-family:helvetica,verdana,san-serif; font-style:italic;">keeps an eye on your software</div>
        <a href="<?php echo esc_url( home_url( '/download/' ) ); ?>" alt="download" title="download"><img src="/uploads/download-button.svg" style="width:70px; padding:25.5px 20px 0px 0px; float:right;"/></a>
    </div>
    <!-- img src="<?php bloginfo('stylesheet_directory'); ?>/images/header_image.jpg" width="960" height="92" border="0" alt="" usemap="#kiekermenumap" />
    <map name="kiekermenumap">
      <area shape="rect" coords="5,5,315,85"
            href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="home" title="home" />
      <area shape="rect" coords="784,26,849,65"
            href="<?php echo esc_url( home_url( '/download/' ) ); ?>" alt="download" title="download" />
      <area shape="rect" coords="869,26,935,65"
            href="http://demo-release.kieker-monitoring.net/livedemo" alt="live demo" title="live demo" />
    </map -->
<?php if(is_front_page()): /* removed check for original theme header image */ ?>
    <div class="kieker-slides" style="background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/slide-empty.jpg); margin:0px; padding:0px">
      <?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>
    </div>
<?php endif; ?>
  <?php wp_nav_menu( array( 'theme_location' => 'top-nav' , 'container_class' => 'menu-header' ) ); ?>
	</header><!-- #branding -->

	<div id="main">
