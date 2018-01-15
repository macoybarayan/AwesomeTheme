<?php
/**
 * Template Name: Events Page
 *
 * @package AwesomeTheme
 */

get_header(); 

$page_id = get_the_ID();

?>

<div class="primary" id="events-page">
	<?php
		$section_one_heading = get_post_meta(get_the_ID(), "awt_section_one_heading", true);
		$section_one_content = get_post_meta(get_the_ID(), "awt_section_one_content", true);
		$section_one_bg_img = get_post_meta(get_the_ID(), "awt_section_one_bg_image", true);
	?>
	<section id="section-one" style="background-image: url(<?= $section_one_bg_img ?>);">	
		<div id="inner-container" class="row align-middle">	
			<div class="large-12 column">
				<h1 class="section-heading text-orange text-uppercase"><?= $section_one_heading ?></h1>
				<div class="text-content text-white">
					<?= $section_one_content ?>
				</div>				
			</div>			
		</div>
	</section>	


	<section id="section-two" class="bg-light-gray">		
		<div class="row">	
			<div class="large-12 column">
				<h1 class="section-heading text-blue">Current Events</h1>

				<div class="event-list">
				<?php
					$args = array(	'post_type'=>'event', 
									'posts_per_page' => 10, 
									'order' => 'ASC',
									'meta_query' => array(
														'relation' => 'OR',
														array(
															'key'     => 'awt_event_status',
															'value'   => 'current_event',
															'compare' => 'LIKE',
														),														
									),											
								);				
					$past_events = new WP_Query($args);
					while ($past_events->have_posts() ) : $past_events->the_post();
						$term = get_the_terms( get_the_ID(), 'event_cat' );	
						$term_icon = get_term_meta($term[0]->term_id, "awt_term_term_image", true);

						echo "<div class='row align-middle item'>";
							echo "<div class='large-2 shrink  columns'>";	
								echo "<img src='".$term_icon."'>";				
							echo "</div>";
							echo "<div class='large-5 columns'>";	
								if(get_the_content()):				
									echo "<h4 class='text-blue'><a href='".get_permalink()."'>" . get_the_title() . "</a></h4>";
								else:
									echo "<h4 class='text-blue'>" . get_the_title() . "</h4>";
								endif;
							echo "</div>";
							echo "<div class='large-2 columns'>";					
								echo "<span>" . get_post_meta(get_the_ID(), "awt_event_date", true) . "</span>";
							echo "</div>";
							echo "<div class='large-3 columns'>";					
								echo "<span>" . get_post_meta(get_the_ID(), "awt_location", true) . "</span>";

								if(get_the_content()):	
									echo '<a class="view" href="'.get_permalink().'"><i class="fa fa-angle-right" aria-hidden="true"></i></a>';
								endif;
							echo "</div>";
							
						echo "</div>";
					endwhile; wp_reset_query();
				?>	
				</div>	
			</div>	
		</div>		
	</section>	

	<?php
		$section_two_heading = get_post_meta(get_the_ID(), "awt_section_two_heading", true);
	?>
	<section id="section-two" class="bg-light-gray">		
		<div class="row">	
			<div class="large-12 column">
				<h1 class="section-heading text-blue"><?= $section_two_heading ?></h1>

				<div class="event-list">
				<?php
					query_posts(array('post_type'=>'event', 'posts_per_page' => -1, 'order' => 'ASC'));
					while ( have_posts() ) : the_post();
						$term = get_the_terms( get_the_ID(), 'event_cat' );	
						$term_icon = get_term_meta($term[0]->term_id, "awt_term_term_image", true);

						echo "<div class='row align-middle item'>";
							echo "<div class='large-2 shrink  columns'>";	
								echo "<img src='".$term_icon."'>";				
							echo "</div>";
							echo "<div class='large-5 columns'>";	
								if(get_the_content()):				
									echo "<h4 class='text-blue'><a href='".get_permalink()."'>" . get_the_title() . "</a></h4>";
								else:
									echo "<h4 class='text-blue'>" . get_the_title() . "</h4>";
								endif;
							echo "</div>";
							echo "<div class='large-2 columns'>";					
								echo "<span>" . get_post_meta(get_the_ID(), "awt_event_date", true) . "</span>";
							echo "</div>";
							echo "<div class='large-3 columns'>";					
								echo "<span>" . get_post_meta(get_the_ID(), "awt_location", true) . "</span>";

								if(get_the_content()):	
									echo '<a class="view" href="'.get_permalink().'"><i class="fa fa-angle-right" aria-hidden="true"></i></a>';
								endif;
							echo "</div>";
							
						echo "</div>";
					endwhile; wp_reset_query();
				?>	
				</div>	
			</div>	
		</div>		
	</section>	

	<?php
		$section_three_heading = get_post_meta(get_the_ID(), "awt_section_three_heading", true);
		$section_three_content = get_post_meta(get_the_ID(), "awt_section_three_content", true);
		$section_three_img = get_post_meta(get_the_ID(), "awt_section_three_image", true);
	?>
	<section id="section-three">		
		<div class="row">	
			<div class="large-8 column">
				<h1 class="section-heading text-blue"><?= $section_three_heading ?></h1>
				<div class="text-content text-blue">
					<?= apply_filters("the_content", $section_three_content) ?>
				</div>				
			</div>	
			<div class="large-4 column">	
				<img src="<?= $section_three_img ?>" class="alignright">
			</div>	
		</div>		
	</section>	

	<?php
		$section_four_heading = get_post_meta(get_the_ID(), "awt_section_four_heading", true);
		$section_four_content = get_post_meta(get_the_ID(), "awt_section_four_content", true);
		$section_four_shortcode = get_post_meta(get_the_ID(), "awt_section_four_shortcode", true);
	?>
	<section id="section-four">		
		<div class="row">	
			<div class="large-12 column">
				<h1 class="section-heading text-orange"><?= $section_four_heading ?></h1>
				<div class="text-content text-white">
					<?= $section_four_content ?>
				</div>	
				<div class="form-container">
					<a href="javascript:void(0);" class="secondary-btn" id="contact-us">CONTACT US</a>
					<div id="contact-form">
						<?= do_shortcode($section_four_shortcode) ?>
					</div>
				</div>			
			</div>			
		</div>
	</section>
</div>

<?php
get_footer();
