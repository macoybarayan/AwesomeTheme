<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AwesomeTheme
 */

get_header(); 

$layout = get_post_meta(get_the_ID(), "awt_layout", true);
?>

	<div id="single-page" class="content-area layout-<?= $layout ?>">		
		<?php
			if($layout == "fullwidth"):
				get_template_part("template-parts/content-fullwidth");
			else:
				get_template_part("template-parts/content-default");
			endif;
		?>
	</div><!-- #primary -->

<?php
get_footer();
