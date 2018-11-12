<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-blog navbar-expand-md navbar-light">
      <div class="nav-left w-100 navbar-collapse order-1 order-md-0 collapse nav-main">
        <ul class="navbar-nav ml-auto text-center">
          <li class="nav-item">
            <a class="nav-link" href="#about-us">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:3000/growth360/blog/">Blog</a>
          </li>
        </ul>
      </div>
      <div class="nav-center align-items-center order-0 order-md-1">
        <span class="w-100"></span>
        <a class="navbar-brand text-center w-100" href="http://localhost:3000/growth360/"><img src="http://localhost:3000/growth360/wp-content/uploads/2018/10/vitalogy-tree.svg"></a>
        <div class="w-100 text-right">
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target=".nav-main" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
      <div class="nav-right w-100 navbar-collapse order-2 collapse nav-main">
        <ul class="navbar-nav text-center">
          <li class="nav-item">
          <a class="nav-link" href=" http://localhost:3000/growth360/responsive-table/">Table</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:3000/growth360/category/social-media/">Social Media</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-tag" href="#quote-form">Get A Quote</a>
          </li>
        </ul>
      </div>
    </nav>
