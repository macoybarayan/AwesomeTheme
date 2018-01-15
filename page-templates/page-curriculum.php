<?php
/**
 * Template Name: Curriculum Page
 *
 * @package AwesomeTheme
 */

get_header(); ?>

<div class="primary" id="curriculum-page">
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
	?>
	<section id="section-four">		
		<div class="row">
			<div class="large-12 column">
				<h1 class="section-heading text-white"><?= $section_four_heading ?></h1>
				<div class="text-content text-white">
					<?= $section_four_content ?>
				</div>
			</div>
		</div>
		<div class="course-list">
			<?php
				query_posts(array('post_type'=>'course', 'posts_per_page' => -1, 'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'course_cat',
							'field'    => 'slug',
							'terms'    => 'hot',
						),
					),
				));
				echo "<div class='row large-up-2'>";
				while ( have_posts() ) : the_post();
					echo "<div class='columns item'>";
						echo "<h4 class='text-orange'><a class='text-orange' href='".get_permalink()."'>". get_the_title() . "</a></h4>";
						echo "<div class='content text-white'>" . get_the_excerpt() . "</div>"; 
							
					echo "</div>";
				endwhile; wp_reset_query();
				echo "</div>";
			?>	
		</div>
	</section>	

	<?php
		$section_five_heading = get_post_meta(get_the_ID(), "awt_section_five_heading", true);
		$section_five_content = get_post_meta(get_the_ID(), "awt_section_five_content", true);
	?>
	<section id="section-five">		
		<div class="row">
			<div class="large-12 column">
				<h1 class="section-heading text-blue"><?= $section_five_heading ?></h1>
				<div class="text-content text-blue">
					<?= $section_five_content ?>
				</div>
			</div>
		</div>
		<div class="course-list">
			<?php
				query_posts(array('post_type'=>'course', 'posts_per_page' => -1, 'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'course_cat',
							'field'    => 'slug',
							'terms'    => 'new',
						),
					),
				));
				echo "<div class='row large-up-2'>";
				while ( have_posts() ) : the_post();
					echo "<div class='columns item'>";
						echo "<h4 class='text-blue'><a class='text-blue' href='".get_permalink()."'>". get_the_title() . "</a></h4>";
						echo "<div class='content'>" . get_the_excerpt() . "</div>"; 
							
					echo "</div>";
				endwhile; wp_reset_query();
				echo "</div>";
			?>	
		</div>
	</section>	
	<?php
		$section_six_heading = get_post_meta(get_the_ID(), "awt_section_six_heading", true);
		$section_six_content = get_post_meta(get_the_ID(), "awt_section_six_content", true);
		$section_six_list = get_post_meta(get_the_ID(), "awt_section_six_list", true);
	?>
	<section id="section-six" class="bg-light-gray">		
		<div class="row">	
			<div class="large-12 column">
				<h1 class="section-heading text-blue"><?= $section_six_heading ?></h1>
				<div class="text-content text-blue">
					<?= $section_six_content ?>
				</div>


				<div class="course-list">
					<div class="row medium-up-3 small-up-1">	
						<?php
							if($section_six_list):
								foreach($section_six_list as $item):						
									echo "<div class='columns item'>";
										echo "<div class='content'>";
											echo apply_filters("the_content", $item['content']);
										echo "</div>";
									echo "</div>";	
								endforeach;		
							endif;
						?>
					</div>
				</div>	
				
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
				<h1 class="section-heading text-blue"><?= $section_seven_heading ?></h1>
				<div class="text-content text-blue">
					<?= $section_seven_content ?>
				</div>
				
			</div>		
		</div>
		<div class="faculty-list">
			<div class="row medium-up-2">	
				<?php
					if($section_seven_list):
						$count = 0;
						foreach($section_seven_list as $item):							
							echo "<div class='columns item'>";
								echo "<div class='row'>";
									echo "<div class='small-4 column'>";
										echo "<img src='". $item['image'] ."'>";
									echo "</div>";
									echo "<div class='small-8 column'>";					
										echo "<a href='#popup-".$count."' class='open-popup text-blue'><h4>" . $item['title'] . "»</h4></a>";
										
										//POPUP
										echo "<div class='modal' id='popup-".$count."' style='display:none;'>";
											echo "<a id='close-btn' href='javascript:void(0)' onclick='Custombox.modal.close();'><i class='fa fa-times' aria-hidden='true'></i></a>";
											echo "<h4>" . $item['title'] . "</h4>";
											echo apply_filters("the_content", $item['content']);
										echo "</div>";
										echo "<div class='content'>" . $item['excerpt'] . "</div>";
									echo "</div>";	
								echo "</div>";
							echo "</div>";	
							$count++;
						endforeach;		
					endif;
				?>
			</div>
		</div>				
	</section>


	<?php
		$section_eight_heading = get_post_meta(get_the_ID(), "awt_section_eight_heading", true);
		$section_eight_content = get_post_meta(get_the_ID(), "awt_section_eight_content", true);
		$section_eight_columns = get_post_meta(get_the_ID(), "awt_section_eight_columns", true);
	?>
	<section id="section-eight">		
		<div class="row">	
			<div class="large-12 column">
				<h1 class="section-heading text-blue"><?= $section_eight_heading ?></h1>
				<div class="text-content text-blue">
					<?= $section_eight_content ?>					
				</div>		
				<div class="row medium-up-3">
					<?php foreach($section_eight_columns as $item): ?>
						<div class="columns">
							<?= $item ?>
						</div>
					<?php endforeach; ?>
				</div>		
			</div>	
		</div>		
	</section>	

	<?php
		$section_nine_list = get_post_meta(get_the_ID(), "awt_section_nine_list", true);
	?>
	<section id="section-nine" class="with-slider">
		<?php	
		
			if($section_nine_list):
				echo '<div class="slider-wrapper">';
					echo "<ul>";
						foreach($section_nine_list  as $item):
							printf("<li><div class='row'><div class='large-12 column'><h1 class='text-white'>%s</h1></div></div></li>", $item);
						endforeach;
					echo "</ul>";
				echo '</div>';
			endif;
		?>

	</section>

</div>

<?php
get_footer();
