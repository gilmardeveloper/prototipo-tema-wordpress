<?php get_header(); ?>

	<?php 

		if( have_posts() ){

			while( have_posts() ){

				the_post();
	?>			

				<?php the_title(); ?>
				<?php the_content(); ?>

	<?php
			}

		}

	 ?>

	 <?php add_form_contato(); ?>

<?php get_footer(); ?>
