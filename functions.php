<?php 

function add_post_type(){

	$titulos = array(

		'name' => 'Imóveis',
		'name_singular' => 'Imóvel',
		'add_new_item' => 'Adiciona novo imóvel'

	);

	$supports = array(

		'title',
		'editor',
		'thumbnail'

	);

	$opcoes = array(

		'labels' => $titulos,
		'public' => true,
		'supports' => $supports,
		'menu_icon' => 'dashicons-admin-home',
		'description' => 'Imóveis da Malura'
	);

	register_post_type('imovel', $opcoes);
}

function add_localizacao(){

	$taxLabels = array(

		'name' => 'Localização',
		'singular_name' => 'Localização',
		'edit_item' => 'Editar',
		'add_new_item' => 'Adicionar novo' 

	);

	register_taxonomy(
		'localizacao',
		'imovel',
		array(

			'labels' => $taxLabels,
			'public' => true,
			'hierarchical' => true,
						
		)
	);
}

function register_header_nav_menu(){
	register_nav_menu('header-menu','main-menu');
}

function add_dinamic_title(){
	bloginfo('name');
	if( !is_home() ) echo ' | ';
	the_title();

}

function add_form_contato(){
	if ( is_page('contato') ){
	 		get_template_part('form', 'contato');
	}
}

function redirect_by_categoria(){
	
	$categoria = array_key_exists('categoria', $_GET);

    if ( $categoria && $_GET['categoria'] === '' ) {
		$redirect = home_url();
	    wp_redirect($redirect);
	    exit;
	}

}

function get_form_info_meta_box($post){
	$info_meta_imovel = get_post_meta($post->ID)
?>

	<div>
		<label for="preco">Preço:</label>
		<input id="preco" type="text" name="preco" value="<?= number_format( $info_meta_imovel['preco'][0], 2, ',', '.' ); ?>">
		<label for="quatos">Quartos:</label>
		<input id="quartos" type="text" name="quartos" value="<?= $info_meta_imovel['quartos'][0]; ?>">
	</div>
	
<?php
}

function registrar_meta_box_info_imovel(){

	add_meta_box(

		'info-imovel-meta-box',
		'Informações do Imóvel',
		'get_form_info_meta_box',
		'imovel',
		'normal'

	);

}

function salva_info_imovel($post_id){

	if( isset( $_POST['preco'] ) ){
		update_post_meta( $post_id, 'preco', sanitize_text_field( $_POST['preco'] ) );
	}

	if( isset( $_POST['quartos'] ) ){
		update_post_meta( $post_id, 'quartos', sanitize_text_field( $_POST['quartos'] ) );
	}

}

add_theme_support('post-thumbnails');
add_action('init', 'add_post_type');
add_action('init','register_header_nav_menu');
add_action('init', 'add_localizacao');
add_action('template_redirect', 'redirect_by_categoria');
add_action('add_meta_boxes', 'registrar_meta_box_info_imovel');
add_action('save_post', 'salva_info_imovel');
