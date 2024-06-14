<?php

function navikash_theme_support()
{
    //Adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'navikash_theme_support');

//custom menu....

function navikash_menus()
{
    $locations = array(
        'primary' => 'Desktop Menu',
        'footer' => 'Footer Menu Items'
    );

    register_nav_menus($locations);
}

add_action('init', 'navikash_menus');


//enqueue style

function navikash_register_styles()
{
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('navikash-style', get_template_directory_uri() . "/style.css", array('navikash-bootstrap'), $version, 'all');
    wp_enqueue_style('navikash-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('navikash-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

add_action('wp_enqueue_scripts', 'navikash_register_styles');

function navikash_register_scripts()
{

    wp_enqueue_script('navikash-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('navikash-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script('navikash-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
    wp_enqueue_script('navikash-mainjs', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);


}
add_action('wp_enqueue_scripts', 'navikash_register_scripts');

function navikash_widget_areas()
{
    register_sidebar(
        array(
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>'
        )
    );
    
    register_sidebar(
        array(
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        )
    );
}

add_action('widgets_init', 'navikash_widget_areas');
?>