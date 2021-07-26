<?php

add_theme_support( 'post-thumbnails' );

function tactile_features() {
	register_nav_menu('main_menu', 'Main Menu');
	add_theme_support('title-tag');
	}

add_action('after_setup_theme', 'tactile_features');

function load_js_assets() {
$frontpage_id = get_option( 'page_on_front' );
    if( is_page( 5005 ) ) {
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




if ( ! function_exists('presenters') ) {

// Register Custom Post Type
function presenters() {

	$labels = array(
		'name'                  => _x( 'presenters', 'Post Type General Name', 'presenters' ),
		'singular_name'         => _x( 'presenter', 'Post Type Singular Name', 'presenters' ),
		'menu_name'             => __( 'Presenters', 'presenters' ),
		'name_admin_bar'        => __( 'Presenters', 'presenters' ),
		'archives'              => __( 'Item Archives', 'presenters' ),
		'attributes'            => __( 'Item Attributes', 'presenters' ),
		'parent_item_colon'     => __( 'Parent Item:', 'presenters' ),
		'all_items'             => __( 'All Items', 'presenters' ),
		'add_new_item'          => __( 'Add New Item', 'presenters' ),
		'add_new'               => __( 'Add New', 'presenters' ),
		'new_item'              => __( 'New Item', 'presenters' ),
		'edit_item'             => __( 'Edit Item', 'presenters' ),
		'update_item'           => __( 'Update Item', 'presenters' ),
		'view_item'             => __( 'View Item', 'presenters' ),
		'view_items'            => __( 'View Items', 'presenters' ),
		'search_items'          => __( 'Search Item', 'presenters' ),
		'not_found'             => __( 'Not found', 'presenters' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'presenters' ),
		'featured_image'        => __( 'Featured Image', 'presenters' ),
		'set_featured_image'    => __( 'Set featured image', 'presenters' ),
		'remove_featured_image' => __( 'Remove featured image', 'presenters' ),
		'use_featured_image'    => __( 'Use as featured image', 'presenters' ),
		'insert_into_item'      => __( 'Insert into item', 'presenters' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'presenters' ),
		'items_list'            => __( 'Items list', 'presenters' ),
		'items_list_navigation' => __( 'Items list navigation', 'presenters' ),
		'filter_items_list'     => __( 'Filter items list', 'presenters' ),
	);
	$args = array(
		'label'                 => __( 'presenter', 'presenters' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'excerpt' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);
	register_post_type( 'presenters', $args );

}
add_action( 'init', 'presenters', 0 );

}



if ( ! function_exists('testimonials') ) {

	// Register Custom Post Type
	function testimonials() {
	
		$labels = array(
			'name'                  => _x( 'testimonials', 'Post Type General Name', 'testimonials' ),
			'singular_name'         => _x( 'testimonial', 'Post Type Singular Name', 'testimonials' ),
			'menu_name'             => __( 'testimonials', 'testimonials' ),
			'name_admin_bar'        => __( 'testimonials', 'testimonials' ),
			'archives'              => __( 'Item Archives', 'testimonials' ),
			'attributes'            => __( 'Item Attributes', 'testimonials' ),
			'parent_item_colon'     => __( 'Parent Item:', 'testimonials' ),
			'all_items'             => __( 'All Items', 'testimonials' ),
			'add_new_item'          => __( 'Add New Item', 'testimonials' ),
			'add_new'               => __( 'Add New', 'testimonials' ),
			'new_item'              => __( 'New Item', 'testimonials' ),
			'edit_item'             => __( 'Edit Item', 'testimonials' ),
			'update_item'           => __( 'Update Item', 'testimonials' ),
			'view_item'             => __( 'View Item', 'testimonials' ),
			'view_items'            => __( 'View Items', 'testimonials' ),
			'search_items'          => __( 'Search Item', 'testimonials' ),
			'not_found'             => __( 'Not found', 'testimonials' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'testimonials' ),
			'featured_image'        => __( 'Featured Image', 'testimonials' ),
			'set_featured_image'    => __( 'Set featured image', 'testimonials' ),
			'remove_featured_image' => __( 'Remove featured image', 'testimonials' ),
			'use_featured_image'    => __( 'Use as featured image', 'testimonials' ),
			'insert_into_item'      => __( 'Insert into item', 'testimonials' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'testimonials' ),
			'items_list'            => __( 'Items list', 'testimonials' ),
			'items_list_navigation' => __( 'Items list navigation', 'testimonials' ),
			'filter_items_list'     => __( 'Filter items list', 'testimonials' ),	
		);
		$args = array(
			'label'                 => __( 'testimonial', 'testimonials' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail', 'excerpt' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'          => false,
			'menu_icon'           => 'dashicons-testimonial'
		)

		
		;
		register_post_type( 'testimonials', $args );
	
	}
	add_action( 'init', 'testimonials', 5 );
	
	}
	


//////////////////////// register nav menus //////////////////////

register_nav_menus(
    array(
    'main-menu' => __( 'Main Menu' ),
    )
);
//////////////////////// register nav menus End //////////////////////

//////////////////////// Desktop Menu //////////////////////
/* Check if Class Exists. */
if ( ! class_exists( 'WP_Bootstrap_Navwalker' ) ) {
	/**
	 * WP_Bootstrap_Navwalker class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
		/**
		 * Start Level.
		 *
		 * @see Walker::start_lvl()
		 * @since 3.0.0
		 *
		 * @access public
		 * @param mixed $output Passed by reference. Used to append additional content.
		 * @param int   $depth (default: 0) Depth of page. Used for padding.
		 * @param array $args (default: array()) Arguments.
		 * @return void
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu fade-up\" >\n";
		}
		/**
		 * Start El.
		 *
		 * @see Walker::start_el()
		 * @since 3.0.0
		 *
		 * @access public
		 * @param mixed $output Passed by reference. Used to append additional content.
		 * @param mixed $item Menu item data object.
		 * @param int   $depth (default: 0) Depth of menu item. Used for padding.
		 * @param array $args (default: array()) Arguments.
		 * @param int   $id (default: 0) Menu item ID.
		 * @return void
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			/**
			 * Dividers, Headers or Disabled
			 * =============================
			 * Determine whether the item is a Divider, Header, Disabled or regular
			 * menu item. To prevent errors we use the strcasecmp() function to so a
			 * comparison that is not case sensitive. The strcasecmp() function returns
			 * a 0 if the strings are equal.
			 */
			 
			 
			if ( 0 === strcasecmp( $item->attr_title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->attr_title, 'dropdown-header' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
			} elseif ( 0 === strcasecmp( $item->attr_title, 'disabled' ) ) {
				$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
			} else {
				$value = '';
				$class_names = $value;
				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;
				$classes[] = 'nav-item';
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				if ( $args->has_children ) {
					$class_names .= ' dropdown';
				}
				if ( in_array( 'current-menu-item', $classes, true ) ) {
					$class_names .= ' active';
				}
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
				$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
				$output .= $indent . '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $value . $class_names . '>';
				$atts = array();
				if ( empty( $item->attr_title ) ) {
					//$atts['title']  = ! empty( $item->title )   ? strip_tags( $item->title ) : '';
				} else {
					//$atts['title'] = $item->attr_title;
				}
				$atts['target'] = ! empty( $item->target ) ? $item->target : '';
				$atts['rel']    = ! empty( $item->xfn )    ? $item->xfn    : '';
				$atts['class']          = 'nav-link';
				// If item has_children add atts to a.
				if ( $args->has_children && 0 === $depth ) {
					//$atts['href']           = '#';
					$atts['href']           = $item->url;
					//$atts['data-toggle']    = 'dropdown';
					$atts['class']          = 'nav-link dropdown dropdown-toggle';
					$atts['role'] = 'button';
					$atts['data-toggle'] = 'dropdown';
					$atts['aria-haspopup'] = 'true';
					$atts['aria-expanded'] = 'false';
					//$atts['aria-haspopup']  = 'true';
				} else {
					$atts['href'] = ! empty( $item->url ) ? $item->url : '';
				}
				if($depth > 0){
					$atts['class']          = 'nav-link dropdown-item';
					
				}
				$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
				$attributes = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {
						$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
						$attributes .= ' ' . $attr . '="' . $value . '"';
					}
				}
				$item_output = $args->before;
				/*
				 * Glyphicons/Font-Awesome
				 * ===========
				 * Since the the menu item is NOT a Divider or Header we check the see
				 * if there is a value in the attr_title property. If the attr_title
				 * property is NOT null we apply it as the class name for the glyphicon.
				 */
				if ( ! empty( $item->attr_title ) ) {
					$pos = strpos( esc_attr( $item->attr_title ), 'glyphicon' );
					if ( false !== $pos ) {
						$item_output .= '<a' . $attributes . '><span class="glyphicon ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></span>&nbsp;';
					} else {
						$item_output .= '<a' . $attributes . '><i class="fa ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></i>&nbsp;';
					}
				} else {
					$item_output .= '<a' . $attributes . '>';
				}
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= ( $args->has_children && 0 === $depth ) ? '</a>' : '</a>';
				$item_output .= $args->after;
				
				$my_menu = wp_get_nav_menu_object( 'Main Menu' );
				
				// Echo count of items in menu
				//print_r($my_menu->count);
				
				//print_r($item->menu_order);
				
				/* if($my_menu->count !== $item->menu_order){
				$item_output .= '<li role="separator" class="divider">/</li>';
				} */
				
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				
			} // End if().
		}
		/**
		 * Traverse elements to create list from elements.
		 *
		 * Display one element if the element doesn't have any children otherwise,
		 * display the element and its children. Will only traverse up to the max
		 * depth and no ignore elements under that depth.
		 *
		 * This method shouldn't be called directly, use the walk() method instead.
		 *
		 * @see Walker::start_el()
		 * @since 2.5.0
		 *
		 * @access public
		 * @param mixed $element Data object.
		 * @param mixed $children_elements List of elements to continue traversing.
		 * @param mixed $max_depth Max depth to traverse.
		 * @param mixed $depth Depth of current element.
		 * @param mixed $args Arguments.
		 * @param mixed $output Passed by reference. Used to append additional content.
		 * @return null Null on failure with no changes to parameters.
		 */
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element ) {
				return; }
			$id_field = $this->db_fields['id'];
			// Display this element.
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] ); }
			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}
		/**
		 * Menu Fallback
		 * =============
		 * If this function is assigned to the wp_nav_menu's fallback_cb variable
		 * and a menu has not been assigned to the theme location in the WordPress
		 * menu manager the function with display nothing to a non-logged in user,
		 * and will add a link to the WordPress menu manager if logged in as an admin.
		 *
		 * @param array $args passed from the wp_nav_menu function.
		 */
		public static function fallback( $args ) {
			if ( current_user_can( 'edit_theme_options' ) ) {
				/* Get Arguments. */
				$container = $args['container'];
				$container_id = $args['container_id'];
				$container_class = $args['container_class'];
				$menu_class = $args['menu_class'];
				$menu_id = $args['menu_id'];
				
				if ( $container ) {
					echo '<' . esc_attr( $container );
					if ( $container_id ) {
						echo ' id="' . esc_attr( $container_id ) . '"';
					}
					if ( $container_class ) {
						echo ' class="' . sanitize_html_class( $container_class ) . '"'; }
					echo '>';
				}
				echo '<ul';
				if ( $menu_id ) {
					echo ' id="'  . esc_attr( $menu_id ) . '"'; }
				if ( $menu_class ) {
					echo ' class="' . esc_attr( $menu_class ) . '"'; }
				echo '>';
				echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="">' . esc_attr( 'Add a menu', '' ) . '</a></li>';
				echo '</ul>';
				if ( $container ) {
					echo '</' . esc_attr( $container ) . '>'; }
			}
		}
	}
} // End if().

//////////////////////////////////////////////////////


/* if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', get_theme_file_uri('/js/jquery-3.2.1.min.js'), false, null);
   wp_enqueue_script('jquery');
} */


// remove version from head
remove_action('wp_head', 'wp_generator');

// remove version from rss
add_filter('the_generator', '__return_empty_string');

// remove version from scripts and styles
function remove_version_scripts_styles($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'remove_version_scripts_styles', 9999);

$wpse_40574_custom_excerpt_length = 45;

add_filter( 'wp_insert_post_data', 'wpse_40574_populate_excerpt', 99, 2 );

function wpse_40574_populate_excerpt( $data, $postarr ) 
{   
    global $wpse_40574_custom_excerpt_length;
    
    // check if it's a valid call
    if ( !in_array( $data['post_status'], array( 'draft', 'pending', 'auto-draft' ) ) && 'post' == $data['post_type'] ) 
    {
        if ( strlen($data['post_excerpt']) == 0 ) 
            $data['post_excerpt'] = wpse_40574_create_excerpt( get_field( 'sub_title' ), $wpse_40574_custom_excerpt_length );
    }

    return $data;
}


function wpse_40574_create_excerpt( $content, $length = 20 )
{
    $the_string = preg_replace( '#\s+#', ' ', $content );
    $words = explode( ' ', $the_string );


    if( count($words) <= $length ) 
        $result = $content;
    else
        $result = implode( ' ', array_slice( $words, 0, $length ) );

    return $result;
}

// function update_all_posts() {
//     $args = array(
//         'post_type' => 'post',
//         'numberposts' => -1
//     );
//     $all_posts = get_posts($args);
//     foreach ($all_posts as $single_post){
//         $single_post->post_title = $single_post->post_title.'';
//         wp_update_post( $single_post );
//     }
// }
// add_action( 'wp_loaded', 'update_all_posts' );
