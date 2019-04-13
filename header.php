<?php 
$options = get_option('theme_options');  
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Bootstrap core CSS -->
	<link href="<?= get_template_directory_uri() ?>/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="<?= get_template_directory_uri() ?>/css/mdb.min.css" rel="stylesheet">
	
	<!-- font awesome -->
	<link href="<?= get_template_directory_uri() ?>/css/fontawesome.css" rel="stylesheet">
	<link href="<?= get_template_directory_uri() ?>/css/brands.css" rel="stylesheet">
	<link href="<?= get_template_directory_uri() ?>/css/solid.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/slick/slick-theme.css"/>

	<!-- Your custom styles (optional) -->
	<link href="<?= get_template_directory_uri() ?>/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="z-navbar">
	<!--Navbar-->
	<nav class="navbar navbar-expand-lg fixed-top z-navbar-element">
		<div class="container">

		  <!-- Navbar brand -->
		  <a class="navbar-brand" href="<?= home_url() ?>">
		  	<?php 
		  	if($options['logo_type']){
		  		if($options['logo_type'] == 'text'){
		  			echo $options['logo_text'];
		  		}
		  		else
		  		{
		  			echo "<img src='$options[logo_image]' width='300px' height='60px' style='object-fit: contain;'><style>.space-to-navbar{padding-top:100px;}</style>";
		  		}
		  	}else{
		  		echo bloginfo('name');
		  	} 
		  	?>
		  </a>

		  <!-- Collapse button -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
		    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		     <?php
			   wp_nav_menu([
			     'menu'            => 'top',
			     'theme_location'  => 'header-menu',
			     'container'       => 'div',
			     'container_id'    => 'bs4navbar',
			     'container_class' => 'collapse navbar-collapse',
			     'menu_id'         => false,
			     'menu_class'      => 'navbar-nav ml-auto',
			     'depth'           => 2,
			     'fallback_cb'     => 'bs4navwalker::fallback',
			     'walker'          => new bs4navwalker()
			   ]);
			  ?>

		</div>
	</nav>
	<!--/.Navbar-->
</div>

<div class="space-to-navbar"></div>