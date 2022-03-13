<?php
function theme_wp_enqueue_scripts_style() {
    wp_enqueue_script('main-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);

    wp_enqueue_style("google-fonts", '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style("font-awesome", '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style("main_style", get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style("extra_style", get_theme_file_uri('/build/index.css'));
}

function theme_features() {
    add_theme_support('title-tag');
    register_nav_menu('header-menu-location', 'Header Menu Location');
    register_nav_menu('footer-location-1', 'Footer Menu Column 1');
    register_nav_menu('footer-location-2', 'Footer Menu Column 2');
}

add_action("wp_enqueue_scripts", "theme_wp_enqueue_scripts_style");
add_action("after_setup_theme", "theme_features");


