<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AwesomeTheme
 */

global $data;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?= $data['favicon'] ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div id="header-top" class="row align-middle">
			<div class="large-3 column">
				<div class="logo-default">
					<a href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>">
						<img src="<?= $data['logo'] ?>" alt="<?php bloginfo('name');?>" title="<?php bloginfo('name');?>" >
					</a>
				</div>
				<div class="logo-sticky">
					<a href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>">
						<img src="<?= $data['sticky_logo'] ?>" alt="<?php bloginfo('name');?>" title="<?php bloginfo('name');?>" >
					</a>
				</div>
			</div>
			<div class="large-6 column">
				<div id="tagline">
					<img src="<?= $data['logo_tagline'] ?>">
				</div>
			</div>
			<div class="large-3 column">
				<div id="header-img">
					<img src="<?= $data['header_img'] ?>">
				</div>
			</div>
		</div>
		<nav>
			<div class="row">
				<div class="large-12 column">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</div>
			</div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
