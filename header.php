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
			<div class="large-2 small-3 column">
				<div class="logo">
					<a href="https://www.mainguard-intl.com.sg/" title="Mainguard">
						<img src="<?= $data['logo'] ?>" alt="Mainguard" title="Mainguard" >
					</a>
				</div>
			</div>
			<div class="large-4 small-6 column">
				<div class="logo">
					<a href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>">
						<img src="<?= $data['logo_2'] ?>" alt="<?php bloginfo('name');?>" title="<?php bloginfo('name');?>" >
					</a>
				</div>
			</div>
			<div class="large-6 column">
				<nav>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</nav>
			</div>
		</div>

	</header><!-- #masthead -->
	<div class="cta-container">
		<div class="row">
			<div class="large-12 columns">
				<div class="cta-text">
					Find that special someone today! Send us your preferences and we will give your matches.
				</div>
			</div>
			<!-- <div class="large-4 columns">
				<div class="phone-number">
						<i class="fa fa-phone" aria-hidden="true"></i> 
						<a>+65 6297 1229</a>
				</div>
			</div> -->
		</div>
	</div>

	<div id="content" class="site-content">
