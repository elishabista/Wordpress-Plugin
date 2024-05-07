<?php

/**
 * Plugin Name: Simple Form Plugin
 * Plugin URI: http://simpleformplugin.com
 * Description: This is my first WordPress plugin.
 * Version: 1.0.0
 * Author: XYZ
 */

// Prevent direct access to this file
if (!defined('ABSPATH')) {
    echo "You cannot access the data through absolute path";
    exit;
}

class SimpleFormPlugin
{
    public function __construct()
    {
        add_action('init', array($this, 'create_custom_post'));
    }

    public function create_custom_post()
    {

        $args = array(
            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
            'exclude_from_search' => true,
            'publicly_querable' => false,
            'capability' => 'manage_options',
            'labels' => array(
                'name' => 'Simple Php Form',
                'singular_name' => 'Simple Form Entry'
            ),
            'menu_icon' => 'dashicons-media-text'
        );

        register_post_type('simple_form', $args);
    }
}

// Instantiate the plugin class
new SimpleFormPlugin;
