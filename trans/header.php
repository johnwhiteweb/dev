<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php the_field('fav', 'option'); ?>">

	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/style.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/slick.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/slick-theme.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/mediaqueries.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/customnew2.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/custom.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/additional.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/new_home2.css'; ?>">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body <?php body_class(); ?>>
	<div id="container">
		<!--main menu-->
		<div id="top"></div>

		<!--<div id="wrap_navBar">
<div id="navBar">
<div class="nav_ul_wrap">
<a href="<php echo site_url('/home-page') ?>"><img class="main_logo top" src="<php the_field('main_logo', 'option'); ?>"></a>

<?php
wp_nav_menu(array(
	'theme_location' => 'mainMenu'
))
?>
    </div>
<img class="mobile_logo top" src="<?php echo get_theme_file_uri('images/general/main_logo.svg') ?>" width="177" height="71" alt="TACTILE">
<div id="mobile_link">
	<hr class="reg_grey_hr1">
	<hr class="reg_grey_hr3">
	<hr class="reg_grey_hr2">
</div>
</div>
</div>-->

		<header class="header">
			<nav class="navbar navbar-expand-md">
				<div class="container">
					<a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img class="img-fluid" src="<?php echo get_theme_file_uri('images/general/main_logo.svg') ?>"></a>

					<?php
					//if ( is_page_template('template-solutions.php') ) {
					echo '<a class="btn-mobile" data-toggle="modal" data-target="#exampleModal" href="#">REQUEST A DEMO</a>';
					//}
					?>
					<button class="navbar-toggler nav-open" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
						<div class="inner"></div>
					</button>

					<div class="collapse navbar-collapse" id="navbarsExample02">

						<?php

						$defaults = array(
							'menu'              => 'Main Menu',
							'menu_id' 			=> '',
							'theme_location'    => 'main-menu',
							'depth'             => 2,
							'container'         => '',
							'container_class'   => '',
							'container_id'      => '',
							'menu_class'        => 'navbar-nav ml-auto',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker()
						);
						wp_nav_menu($defaults);
						?>
						<?php

						//if ( is_page_template('template-solutions.php') ) {
						echo '<a class="btn REQUEST_A_DEMO" data-toggle="modal" data-target="#exampleModal" href="#">REQUEST A DEMO</a>';
						//}
						?>
					</div>

				</div>
			</nav>

		</header>


		<!--end menu-->