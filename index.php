<?php get_header(); ?>
<?php 
	$categoria = array_key_exists('categoria', $_GET);
 ?>

	<main class="container">
		
		<div class="row">

			<div>
				<form action="<?= bloginfo('url'); ?>" method="get">
					<select name="categoria">
							<option value="">Todos</option>
						<?php $taxonomias = get_terms('localizacao'); ?>
						<?php foreach ( $taxonomias as $taxonomia ) { ?>
							<option value="<?= $taxonomia->slug; ?>"><?= $taxonomia->name; ?></option>			
						<?php } ?>	
					</select>
					<button type="submit">Filtrar</button>
				</form>
			</div>


	<?php 
		
		if( $categoria ){
			 $taxOptions = array(
							
				array(
								
					'taxonomy' => 'localizacao',
					'field' => 'slug',
					'terms' => $_GET['categoria']
					
					 )

			);	
		}

		$args = array( 
			'post_type' => 'imovel',
			'tax_query' => $taxOptions
			 );

		$query = new WP_Query( $args );
		if( $query->have_posts() ){

			while( $query->have_posts() ){
				$query->the_post();
	?>			
				
					<div class="col-lg-4">
						<a href="<?php the_permalink(); ?>">	
							<div class="">
								<?php the_post_thumbnail(); ?>
							</div>
							<h1><?php the_title(); ?></h1>
							<div><?php the_content(); ?></div>
						</a>	
					</div>
					
				
				
	
	<?php
			}
		}

	?>
		</div>

	</main>
	<footer>
		
	</footer>
<?php get_footer(); ?>