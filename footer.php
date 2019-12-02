<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AwesomeTheme
 */

global $data;

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="row">
			<div class="large-12 columns">
				<hr/>
			</div>
			<div class="large-6 medium-6 small-12 column">
				<div class="footer-info">					
					<div class="copyright">© <?= date('Y') ?> <?= $data['footer_text'] ?></div>
				</div>
			</div>
			<div class="large-6 medium-6 small-12 column">
				<div class="menu-link">
					<!-- <?= $data['footer_link'] ?> -->
				
					<ul>
						<?php if($data['facebook_link']): ?>
							<li><a href="<?= $data['facebook_link'] ?>" target="_blank"><img src="<?= get_bloginfo('stylesheet_directory') ?>/assets/images/facebook.png" alt="Facebook" title="Facebook"></a></li>
						<?php endif ?>

						<?php if($data['linkedin_link']): ?>
							<li><a href="<?= $data['linkedin_link'] ?>" target="_blank"><img src="<?= get_bloginfo('stylesheet_directory') ?>/assets/images/linkedin.png" alt="Linkedin" title="Linkedin"></a></li>
						<?php endif ?>

						<?php if($data['twitter_link']): ?>
							<li><a href="<?= $data['twitter_link'] ?>" target="_blank"><img src="<?= get_bloginfo('stylesheet_directory') ?>/assets/images/twitter.png" alt="Twitter" title="Twitter"></a></li>
						<?php endif ?>
					</ul>
				</div>
			</div>			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
