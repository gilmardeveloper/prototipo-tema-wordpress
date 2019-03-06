<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">	
	<title><?php add_dinamic_title(); ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/style.css">
	<?php wp_head(); ?>
</head>
<header>
	
	<?php $args = array(
		'theme_location' => 'header-menu',
	); ?>
	<?php wp_nav_menu( $args ); ?>

	<h1>Malura</h1>
	<p>Esse é o site da malura</p>
</header>
<body>