<?php
/**
 * Hagefiksern Theme functions and definitions
 *
 * @package Hagefiksern
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue scripts and styles.
 */
function hagefiksern_scripts() {
    $parent_style = 'modern-minimal-style';
    
    // Enqueue parent theme style
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    
    // Enqueue child theme style
    wp_enqueue_style('hagefiksern-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
    
    // Enqueue custom CSS
    wp_enqueue_style('hagefiksern-custom-css', 
        get_stylesheet_directory_uri() . '/assets/css/styles.css',
        array('hagefiksern-style'),
        wp_get_theme()->get('Version')
    );
    
    // Enqueue custom JS
    wp_enqueue_script('hagefiksern-script', 
        get_stylesheet_directory_uri() . '/assets/js/script.js',
        array('jquery'), 
        wp_get_theme()->get('Version'),
        true
    );
    
    // Localize script for AJAX
    wp_localize_script('hagefiksern-script', 'hagefiksern_vars', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('hagefiksern-nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'hagefiksern_scripts');

/**
 * Register widget areas
 */
function hagefiksern_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'hagefiksern'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'hagefiksern'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widgets', 'hagefiksern'),
        'id'            => 'footer-widgets',
        'description'   => esc_html__('Add footer widgets here.', 'hagefiksern'),
        'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'hagefiksern_widgets_init');

/**
 * Register custom navigation menus
 */
function hagefiksern_register_menus() {
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'hagefiksern'),
        'footer'  => esc_html__('Footer Menu', 'hagefiksern'),
    ));
}
add_action('after_setup_theme', 'hagefiksern_register_menus');

/**
 * Add custom body classes
 */
function hagefiksern_body_classes($classes) {
    // Add a class if we're on the front page
    if (is_front_page()) {
        $classes[] = 'hagefiksern-front-page';
    }
    
    // Add a class if we're on the blog
    if (is_home()) {
        $classes[] = 'hagefiksern-blog';
    }
    
    return $classes;
}
add_filter('body_class', 'hagefiksern_body_classes');

/**
 * Customize excerpt length
 */
function hagefiksern_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'hagefiksern_excerpt_length');

/**
 * Customize excerpt more string
 */
function hagefiksern_excerpt_more($more) {
    return '... <a class="read-more" href="' . esc_url(get_permalink()) . '">' . esc_html__('Read More', 'hagefiksern') . '</a>';
}
add_filter('excerpt_more', 'hagefiksern_excerpt_more');

/**
 * Add classes to nav menu items for smooth scrolling
 */
function hagefiksern_menu_classes($atts, $item) {
    if (is_front_page() && in_array('menu-item', $item->classes)) {
        $url = $atts['href'];
        $url_parts = parse_url($url);
        
        if (isset($url_parts['fragment'])) {
            $atts['class'] = 'smooth-scroll';
        }
    }
    
    return $atts;
}
add_filter('nav_menu_link_attributes', 'hagefiksern_menu_classes', 10, 2);