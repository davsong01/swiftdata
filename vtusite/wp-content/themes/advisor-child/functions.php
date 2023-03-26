<?php
/**
 * Loads the child theme textdomain.
 */
function advisor_child_theme_setup() {
    load_child_theme_textdomain( 'advisor', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'advisor_child_theme_setup' );
/* add parent and child style.css */
function advisor_theme_enqueue_styles() {

    $parent_style = 'advisor-style'; // This is parent style for castle theme.
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        $parent_style,
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'advisor_theme_enqueue_styles', 16 );
