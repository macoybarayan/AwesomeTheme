<main id="main" class="site-main row">
	<div class="large-12 columns">
		<div id="featured-image">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php
			$term = get_the_terms( get_the_ID(), 'event_cat' );	
			if($term):
				echo "<h4 id='category' class='f-c-bold text-orange text-uppercase'>Event / " . $term[0]->name . "</h4>";
			endif;
			the_title("<h1 class='condensed text-blue text-uppercase'>","</h1>");
		?>
	</div>
	<div class="large-8 column">
	<?php
	while ( have_posts() ) : the_post();	
		echo "<div id='content'>";	
			the_content();
		echo "</div>";
	endwhile; // End of the loop.
	?>
	</div>
	<div class="large-4 column">
		<?php 
			$other_details = get_post_meta(get_the_ID(), "awt_other_details", true);
			$reg_link =  get_post_meta(get_the_ID(), "awt_reg_link", true);
		?>
		<?php if($other_details): ?>
			<sidebar class="bg-light-gray">
				<?php 
					if($reg_link):
						echo "<a class='primary-btn text-uppercase' target='_blank' href='".$reg_link."'>REGISTER NOW</a>";
					endif;
					
					echo apply_filters("the_content", $other_details);
				?>
			</sidebar>
		<?php endif; ?>
	</div>
</main>