<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php the_field('fav', 'option'); ?>">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/slick-theme.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/slick.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/animate.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/custom.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/additional.css'; ?>">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body <?php body_class(); ?>>

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

					<!--<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
					  <a class="nav-link" href="#">solutions </a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="#">technology</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">about</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="#">careers</a>
					  </li>
					  <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">resources</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown01">
						  <li><a class="dropdown-item" href="#">CASE STUDIES</a></li>
						  <li><a class="dropdown-item" href="#">WEBINARS</a></li>
						  <li><a class="dropdown-item" href="#">EBOOKS</a></li>
						  <li><a class="dropdown-item" href="#">BLOGS</a></li>
						  <li><a class="dropdown-item" href="#">PRESS RELEASES</a></li>
						</ul>
					  </li>
					  <li class="nav-item">
						<a class="nav-link contact" href="#">contact us</a>
					  </li>
				  </ul>
				  <ul class="social-icon">
					<li><a class="icon" href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a class="icon" href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>-->

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
					/*	echo '<a class="btn" data-toggle="modal" data-target="#exampleModal" href="#"><svg aria-hidden="true" class="progress" width="70" height="70" viewBox="0 0 70 70">
					<rect class="progress__rectangle" cx="40" cy="10" rx="30" ry="30" x="50" y="20" width="300" height="61" style="fill:blue;stroke:pink;stroke-width:1;fill-opacity:0.1;stroke-opacity:0.9" /> 
					<path class="progress__path" width="100%" height="100%" d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z" pathLength="1"></path>
				</svg><span>REQUEST A DEMO</span></a>';*/
					//}
					?>
					<a class="btn REQUEST_A_DEMO" data-toggle="modal" data-target="#exampleModal" href="#"><span>REQUEST A DEMO</span></a>

				</div>

			</div>
		</nav>

	</header>