<?php
/**
 * Template Name: Research Page
 *
 * @package AwesomeTheme
 */

get_header(); ?>

<div class="primary" id="research-page">
	<?php
		$section_one_heading = get_post_meta(get_the_ID(), "awt_section_one_heading", true);
		$section_one_content = get_post_meta(get_the_ID(), "awt_section_one_content", true);
		$section_one_bg_img = get_post_meta(get_the_ID(), "awt_section_one_bg_image", true);
	?>
	<section id="section-one" style="background-image: url(<?= $section_one_bg_img ?>);">	
		<div id="inner-container" class="row align-middle">	
			<div class="large-12 column">
				<h1 class="section-heading text-white text-uppercase huge"><?= $section_one_heading ?></h1>
				<div class="text-content text-orange text-uppercase">
					<?= $section_one_content ?>
				</div>				
			</div>			
		</div>
	</section>

	<?php
		$section_two_content = get_post_meta(get_the_ID(), "awt_section_two_content", true);
	?>
	<section id="section-two">		
		<div class="row">			
			<div class="large-12 column">
				<div class="text-content text-center text-blue">
					<?= $section_two_content ?>
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
		$section_three_heading = get_post_meta(get_the_ID(), "awt_section_three_heading", true);
		$section_three_content = get_post_meta(get_the_ID(), "awt_section_three_content", true);
	?>
	<section id="section-three">		
		<div class="row">
			<div class="large-12 column">
				<h1 class="section-heading text-blue"><?= $section_three_heading ?></h1>
			</div>
		</div>
		<div class="row">		
			<div class="large-12 column">
				<div class="text-content">
					<?= $section_three_content ?>
				</div>
			</div>			
		</div>
		
	</section>	


	<?php
		$section_four_heading = get_post_meta(get_the_ID(), "awt_section_four_heading", true);
		$section_four_content = get_post_meta(get_the_ID(), "awt_section_four_content", true);
		$section_four_list = get_post_meta(get_the_ID(), "awt_section_four_list", true);
		$section_four_btn = get_post_meta(get_the_ID(), "awt_section_four_btn", true);
		$section_four_modal = get_post_meta(get_the_ID(), "awt_section_four_modal", true);
	?>
	<section id="section-four" class="with-slider">		
		<div class="row">
			<div class="large-12 column">
				<h1 class="section-heading text-white"><?= $section_four_heading ?></h1>
			</div>
		</div>
		<div class="slider-wrapper">
			<ul>
				<?php
					foreach($section_four_list as $item):
						echo "<li><div class='row align-middle'>";
						printf("<div class='large-6 column text-white text-content'><h2 class='text-white'>%s</h2>%s</div><div class='large-6 column'><img src='%s'></div>", $item['title'], wpautop($item['content']), $item['image']);
						echo "</div></li>";
					endforeach;
				?>
			</ul>
		</div>
		<div class="btn-container">
			<?= $section_four_btn ?>
		</div>
		<div id="isbm-team" class="modal">
			<a id="close-btn" href="javascript:void(0)" onclick="Custombox.modal.close();"><i class="fa fa-times" aria-hidden="true"></i></a>

			<div id="content">
				<?= $section_four_modal ?>
			</div>
		</div>
	</section>	

	<?php
		$section_five_heading = get_post_meta(get_the_ID(), "awt_section_five_heading", true);
		$section_five_subheading = get_post_meta(get_the_ID(), "awt_section_five_subheading", true);
		$section_five_content = get_post_meta(get_the_ID(), "awt_section_five_content", true);
		$section_five_img = get_post_meta(get_the_ID(), "awt_section_five_image", true);
	?>
	<section id="section-five">		
		<div class="row">
			<div class="large-12 column">
				<h1 class="section-heading text-blue"><?= $section_five_heading ?></h1>
				<h2><?= $section_five_subheading ?></h2>
			</div>
		</div>
		<div class="row">	
			<div class="large-8 column">
				<div class="text-content text-blue">
					<?= apply_filters("the_content", $section_five_content) ?>
				</div>				
			</div>	
			<div class="large-4 column">	
				<img src="<?= $section_five_img ?>" class="alignright">
			</div>	
		</div>		


	</section>	
	<?php
		$section_six_heading = get_post_meta(get_the_ID(), "awt_section_six_heading", true);
		$section_six_content = get_post_meta(get_the_ID(), "awt_section_six_content", true);
		$section_six_list = get_post_meta(get_the_ID(), "awt_section_six_file_list", true);
	?>
	<section id="section-six" class="with-carousel">		
		<div class="row">	
			<div class="large-12 column">
				<h1 class="section-heading text-blue"><?= $section_six_heading ?></h1>
				<div class="text-content text-blue">
					<?= $section_six_content ?>
				</div>	
				
			</div>		
		</div>
		<div class="slider-wrapper">
			<div class="row">	
				<div class="large-12 column">
				<?php
					if($section_six_list):
						echo "<ul>";
							foreach($section_six_list as $item):
								printf("<li><img src='%s'></li>", $item);
							endforeach;
						echo "</ul>";
					endif;
				?>
				</div>
			</div>
			<div class="slider-nav">
				<a href="javascript:void(0);" id="goToPrevSlide"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
				<a href="javascript:void(0);" id="goToNextSlide"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
		</div>				
	</section>

	<?php
		$section_seven_heading = get_post_meta(get_the_ID(), "awt_section_seven_heading", true);
		$section_seven_content = get_post_meta(get_the_ID(), "awt_section_seven_content", true);
		$section_seven_list = get_post_meta(get_the_ID(), "awt_section_seven_list", true);
		
	?>
	<section id="section-seven">		
		<div class="row">	
			<div class="large-12 column">
				<h1 class="section-heading text-white"><?= $section_seven_heading ?></h1>
				<div class="text-content text-white">
					<?= $section_seven_content ?>
				</div>
				
			</div>		
		</div>
		<div class="tab-wrapper">
			<div class="row">	
				<div class="large-12 column">
				<?php
					if($section_seven_list):
						$count = 1;
						echo "<ul class='tab-heading row small-up-1 medium-up-3 large-up-3'>";
							foreach($section_seven_list as $item):
								$active = ($count == 1)?"active":"";
								printf("<li class='columns'><a href='javascript:void(0);' class='%s' data-id='%s' data-bg='%s'><span class='count'>%s</span><strong class='f-c-bold title'>%s</strong></a></li>", $active, $count, $item['image'], $count, $item['title']);

								$count++;
							endforeach;
						echo "</ul>";
						echo "<div class='tab-container'>";
							$count = 1;
							foreach($section_seven_list as $item):		
								$active = ($count == 1)?"active":"";						
								echo "<div class='tab-content ".$active." tab-content-".$count."'>";
									echo $item['content'];
								echo "</div>";	
								$count++;
							endforeach;														
						echo "</div>";
					endif;
				?>
				</div>
			</div>
		</div>				
	</section>


	<?php
		$section_eight_heading = get_post_meta(get_the_ID(), "awt_section_eight_heading", true);
		$section_eight_content = get_post_meta(get_the_ID(), "awt_section_eight_content", true);
		$section_eight_img = get_post_meta(get_the_ID(), "awt_section_eight_image", true);
	?>
	<section id="section-eight">		
		<div class="row">	
			<div class="large-8 column">
				<h1 class="section-heading text-orange"><?= $section_eight_heading ?></h1>
				<div class="text-content text-blue">
					<?= apply_filters("the_content", $section_eight_content) ?>
				</div>				
			</div>	
			<div class="large-4 column">	
				<img src="<?= $section_eight_img ?>" class="alignright">
			</div>	
		</div>		
	</section>	

	<?php
		$section_nine_left_content = get_post_meta(get_the_ID(), "awt_section_nine_left_content", true);
		$section_nine_right_content = get_post_meta(get_the_ID(), "awt_section_nine_right_content", true);
	?>
	<section id="section-nine">		
		<div class="row">	
			<div class="large-6 column">
				<div class="text-content text-blue">
					<?= apply_filters("the_content", $section_nine_left_content) ?>
				</div>				
			</div>	
			<div class="large-6 column">	
				<div class="text-content text-blue">
					<?= apply_filters("the_content", $section_nine_right_content) ?>
				</div>	
			</div>	
		</div>		
	</section>	

	<?php
		$section_ten_heading = get_post_meta(get_the_ID(), "awt_section_ten_heading", true);
		$section_ten_content = get_post_meta(get_the_ID(), "awt_section_ten_content", true);
		$section_ten_img = get_post_meta(get_the_ID(), "awt_section_ten_image", true);
	?>
	<section id="section-ten">		
		<div class="row">	
			<div class="large-8 column">
				<h1 class="section-heading text-orange"><?= $section_ten_heading ?></h1>
				<div class="text-content text-white">
					<?= apply_filters("the_content", $section_ten_content) ?>
				</div>				
			</div>	
			<div class="large-4 column">	
				<img src="<?= $section_ten_img ?>" class="alignright">
			</div>	
		</div>		
	</section>	
</div>

<?php
get_footer();
