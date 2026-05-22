<?php

// Enterbuy theme functions and definitions

if ( ! function_exists( 'enterbuy_setup' ) ) {
    function enterbuy_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption' ) );
    }
}
add_action( 'after_setup_theme', 'enterbuy_setup' );
