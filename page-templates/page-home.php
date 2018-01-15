<?php
/**
 * Template Name: Home
 *
 * @package AwesomeTheme
 */

get_header(); ?>

<div class="primary" id="membership-page">
	<section id="section-one" class="with-slider">
		<?php
			$section_one_list = get_post_meta(get_the_ID(), "awt_section_one", true);
			$section_one_heading = get_post_meta(get_the_ID(), "awt_section_one_heading", true);
			
			printf("<h3>%s</h3></li>", $section_one_heading);
			if($section_one_list):
				echo '<div class="slider-wrapper">';
					echo "<ul>";
						foreach($section_one_list as $item):
							printf("<li><h1 class='text-uppercase'>%s</h1></li>", $item);
						endforeach;
					echo "</ul>";
				echo '</div>';
			endif;
		?>

	</section>

	<?php
		$section_two_heading = get_post_meta(get_the_ID(), "awt_section_two_heading", true);
		$section_two_content = get_post_meta(get_the_ID(), "awt_section_two_content", true);
		$section_two_img = get_post_meta(get_the_ID(), "awt_section_two_image", true);
		$section_two_bg_img = get_post_meta(get_the_ID(), "awt_section_two_bg_image", true);
	?>
	<section id="section-two" style="background-image: url(<?= $section_two_bg_img ?>);">		
		<div class="row">
			<div class="large-12 column">
				<h1 class="section-heading"><?= $section_two_heading ?></h1>
			</div>
		</div>
		<div class="row">			
			<div class="large-6 column">
				<div class="text-content">
					<?= $section_two_content ?>
				</div>
			</div>
			<div class="large-6 column">
				<img src="<?= $section_two_img ?>">
			</div>
		</div>
	</section>	

	<?php
		$section_three_heading = get_post_meta(get_the_ID(), "awt_section_three_heading", true);
		$section_three_content = get_post_meta(get_the_ID(), "awt_section_three_content", true);
		$section_three_img = get_post_meta(get_the_ID(), "awt_section_three_image", true);
		$section_three_btn = get_post_meta(get_the_ID(), "awt_section_three_btn", true);
	?>
	<section id="section-three">		
		<div class="row">
			<div class="large-12 column">
				<h1 class="section-heading"><?= $section_three_heading ?></h1>
			</div>
		</div>
		<div class="row">	
			<div class="large-12 column">
				<img src="<?= $section_three_img ?>">
			</div>		
			<div class="large-12 column">
				<div class="text-content">
					<?= $section_three_content ?>
				</div>
				<div class="btn-container">
					<?= $section_three_btn ?>
				</div>
			</div>
			
		</div>
		
	</section>	

	<div class="row">	
		<div class="large-12 column">
			<div class="spacer"></div>
		</div>	
	</div>

	<?php
		$section_four_heading = get_post_meta(get_the_ID(), "awt_section_four_heading", true);
		$section_four_content = get_post_meta(get_the_ID(), "awt_section_four_content", true);
		$section_four_list = get_post_meta(get_the_ID(), "awt_section_four_list", true);
	?>
	<section id="section-four">		
		<div class="row">
			<div class="large-12 column">
				<h1 class="section-heading"><?= $section_four_heading ?></h1>
			</div>
		</div>
		<div class="row">	
			<div class="large-12 column">
				<div class="text-content">
					<?= $section_four_content ?>
				</div>				
			</div>			
		</div>
		<div class="row align-middle item-list">
			<?php
				foreach($section_four_list as $item):
					printf("<div class='large-4 column item'><img src='%s'><div class='title f-c-bold'>%s</div></div>", $item['image'], $item['title']);
				endforeach;
			?>
		</div>
		
	</section>	
	<div class="row">	
		<div class="large-12 column">
			<div class="spacer"></div>
		</div>	
	</div>

	<?php
		$section_five_heading = get_post_meta(get_the_ID(), "awt_section_five_heading", true);
		$section_five_content = get_post_meta(get_the_ID(), "awt_section_five_content", true);
		$section_five_list = get_post_meta(get_the_ID(), "awt_section_five_list", true);
		$section_five_btn = get_post_meta(get_the_ID(), "awt_section_five_btn", true);
	?>
	<section id="section-five">		
		<div class="row">
			<div class="large-12 column">
				<h1 class="section-heading text-blue"><?= $section_five_heading ?></h1>
			</div>
		</div>
		<div class="row">	
			<div class="large-12 column">
				<div class="text-content text-blue">
					<?= $section_five_content ?>
				</div>				
			</div>			
		</div>
		<div class="row item-list">
			<?php
				foreach($section_five_list as $item):
					printf("<div class='large-3 column item'><div class='title f-c-bold text-blue'>%s</div><div class='content text-blue'>%s</div></div>", $item['title'], $item['content']);
				endforeach;
			?>
		</div>
		<div class="btn-container">
			<?= $section_five_btn ?>
		</div>
	</section>	
	<?php
		$section_six_heading = get_post_meta(get_the_ID(), "awt_section_six_heading", true);
		$section_six_list = get_post_meta(get_the_ID(), "awt_section_six_testimonials", true);
		$section_six_img = get_post_meta(get_the_ID(), "awt_section_six_image", true);
	?>
	<section id="section-six" class="with-slider">		
		<div class="row">	
			<div class="large-12 column">
				<img src="<?= $section_six_img ?>">
			</div>	
		</div>

		<?php
			printf("<h3>%s</h3></li>", $section_six_heading);
			if($section_one_list):
				echo '<div class="slider-wrapper">';
					echo "<ul>";
						foreach($section_six_list as $item):
							printf("<li><div class='row'><div class='large-12 column text-content'>%s</div></div></li>", $item);
						endforeach;
					echo "</ul>";
				echo '</div>';
			endif;
		?>

	</section>

	<?php
		$section_seven_heading = get_post_meta(get_the_ID(), "awt_section_seven_heading", true);
		$section_seven_content = get_post_meta(get_the_ID(), "awt_section_seven_content", true);
		$section_seven_shortcode = get_post_meta(get_the_ID(), "awt_section_seven_shortcode", true);
	?>
	<section id="section-seven">		
		<div class="row">
			<div class="large-12 column">
				<h1 class="section-heading text-blue"><?= $section_seven_heading ?></h1>
			</div>
		</div>
		<div class="row">	
			<div class="large-12 column">
				<div class="text-content text-blue">
					<?= $section_seven_content ?>
				</div>	
				<div class="form-container">
					<?= do_shortcode($section_seven_shortcode) ?>
				</div>			
			</div>			
		</div>
	</section>
</div>

<?php
get_footer();
