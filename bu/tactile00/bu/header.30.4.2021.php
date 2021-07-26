<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php the_field('fav', 'option'); ?>">
	
    <?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/style.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/slick.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/slick-theme.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/mediaqueries.css'; ?>">
	
    
  </head>
  <body <?php body_class(); ?>>
    <div id="container">
<!--main menu-->
<div id="top"></div>
<div id="wrap_navBar">
<div id="navBar">
<div class="nav_ul_wrap">
<a href="<?php echo site_url('/home-page') ?>"><img class="main_logo top" src="<?php the_field('main_logo', 'option'); ?>"></a>
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
</div>
<!--end menu-->
