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
			<div class="large-6 medium-6 column">
				<div class="footer-logo">
					<?php if(!is_home() && !is_front_page()): ?>
						<a href="<?= site_url() ?>"><img src="<?= $data['footer_logo_dark'] ?>"></a>
					<?php else: ?>
							<a href="<?= site_url() ?>"><img src="<?= $data['footer_logo_light'] ?>"></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="large-6 medium-6 column">
				<div class="footer-info">
					<div class="menu-link"><?= $data['footer_link'] ?></div>
					<div class="copyright">© <?= date('Y') ?> <?= $data['footer_text'] ?></div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
