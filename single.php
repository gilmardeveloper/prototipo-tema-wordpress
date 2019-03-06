<?php  get_header(); ?>

	<?php 

		
		if( have_posts() ){

			while( have_posts() ){
				the_post();
				$info_meta_imovel = get_post_meta($post->ID)
	?>	
						<div class="">
							<?php the_post_thumbnail(); ?>
						</div>
						<h1><?php the_title(); ?></h1>
						<div><?php the_content(); ?></div>

						<ul>
							<li>Preço: R$ <?= number_format( $info_meta_imovel['preco'][0], 2, ',', '.' ); ?></li>
							<li>Quartos: <?= $info_meta_imovel['quartos'][0]; ?></li>
						</ul>



	<?php
			}
		}

	?>

<?php get_footer(); ?>