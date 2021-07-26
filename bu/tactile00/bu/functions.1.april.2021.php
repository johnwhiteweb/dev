<?php

function tactile_files() {
	wp_enqueue_script('jquery_js', get_theme_file_uri('/js/jquery-2.1.0.min.js'), NULL, microtime(), true);
	wp_enqueue_script('main-functions', get_theme_file_uri('/js/functions.js'), NULL, microtime(), true);
	wp_enqueue_script('main-slick', get_theme_file_uri('/js/slick.js'), NULL, microtime(), true);
  	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/css/style.css' );
  	wp_enqueue_style( 'main-slick-css', get_stylesheet_directory_uri() . '/css/slick.css' );
  	wp_enqueue_style( 'main-slick-theme', get_stylesheet_directory_uri() . '/css/slick-theme.css' );
  	wp_enqueue_style( 'main-mediaqueries', get_stylesheet_directory_uri() . '/css/mediaqueries.css' );
}

add_action('wp_enqueue_scripts', 'tactile_files');

function tactile_features() {
	register_nav_menu('main_menu', 'Main Menu');
	add_theme_support('title-tag');
	}

add_action('after_setup_theme', 'tactile_features');

function load_js_assets() {
$frontpage_id = get_option( 'page_on_front' );
    if( is_page( 7 ) ) {
        wp_enqueue_script('hp_animation', get_theme_file_uri('/js/animation_hp.js'), NULL, microtime(), true);
    } 
    if( is_page( 26 ) ) {
        wp_enqueue_script('contact_animation', get_theme_file_uri('/js/animate_contact.js'), NULL, microtime(), true);
    }
    if( is_page( 18 ) ) {
        wp_enqueue_script('tech_animation', get_theme_file_uri('/js/animate_tech.js'), NULL, microtime(), true);
    }
    if( is_page( 20 ) ) {
        wp_enqueue_script('about_animation', get_theme_file_uri('/js/animate_about.js'), NULL, microtime(), true);
    }
    if( is_page( 22 ) ) {
        wp_enqueue_script('career_animation', get_theme_file_uri('/js/animate_career.js'), NULL, microtime(), true);
    }
    if( is_page( 86 ) ) {
        wp_enqueue_script('resources_animation', get_theme_file_uri('/js/animate_res.js'), NULL, microtime(), true);
    }
}
 
add_action('wp_enqueue_scripts', 'load_js_assets');


add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
	
	// loop
	foreach( $items as & $item ) {
		
		// vars
		$icon = get_field('social_image', $item);
		$adress = $icon['url'];
		
		
		// append icon
		if( $icon ) {
			
			$item->title = '<img src="'.$adress.'">';
			
		}
		
	}
	
	
	// return
	return $items;
	
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	acf_add_options_sub_page('Header');
	acf_add_options_sub_page('Footer');
	
}

function disable_product_title( $return ) {
    if ( is_front_page() or is_home() ) {
        return false;
    } else {
        return $return;
    }
}
add_filter( 'wpex_display_page_header', 'disable_product_title' );