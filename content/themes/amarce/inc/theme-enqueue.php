<?php

function chroma_scripts()
{
    wp_enqueue_style(
        '66-chroma_app_css',
        get_theme_file_uri('/public/css/app.css'),
        ['66-chroma_vendor_css'],
        '1.0.0'
    );

    wp_enqueue_style(
        '66-chroma_vendor_css',
        get_theme_file_uri('/public/css/vendor.css'),
        [],
        '1.0.0'
    );

    wp_enqueue_script(
        '66-chroma_app_js',
        get_theme_file_uri('/public/js/app.js'),
        ['66-chroma_vendor_js'],
        '1.0.0',
        true
    );

    wp_enqueue_script(
        '66-chroma_vendor_js',
        get_theme_file_uri('/public/js/vendor.js'),
        [],
        '1.0.0',
        true
    );
}

add_action('wp_enqueue_scripts', 'chroma_scripts');