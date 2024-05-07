<?php

/**
 * Plugin Name: Simple Form Plugin
 * Plugin URI: http://localhost/wordpress/2024/05/07/51/
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
        add_action('wp_enqueue_scripts', array($this, 'enqueue_bootstrap_css'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_bootstrap_js'));
        add_shortcode('simple-form-shortcode',array($this,'load_shortcode'));
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

    public function enqueue_bootstrap_css()
    {
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3');
    }
    public function enqueue_bootstrap_js()
    {
        wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true);
    }
    public function load_shortcode(){
        ?>
        <div class="d-flex justify-content-center align-items-center  vh-100"> 

<form method="post" id="submitBtn"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<div class="card" style="width: 32rem;">
  <div class="card-body">
  <h3 class="card-title">Php Form</h3>

  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name:</label>

    <input type="text" name="name" class="form-control" id="exampleInputName" />
  </div>

  <div class="mb-3">
  <label for="exampleInputEmail" class="form-label">Email: </label>

    <input type="email" name="email" class="form-control" id="exampleInputEmail"/>
  </div>
  <div class="mb-3">
  <label for="exampleInputPhone" class="form-label"> Phone Number:</label>

   <input type="number" name="phone" class="form-control" id="exampleInputPhone" />
  </div>

  <div class="mb-3">
  <label for="exampleInputAddress" class="form-label">  Address: </label>

  <input type="text" name="address" class="form-control" id="exampleInputAddress"/>
  </div>

  <div class="mb-3">
  <label for="exampleInputMessage" class="form-label">Message:</label>

    <textarea name="message" rows="4" columns="10" class="form-control" id="exampleInputMessage"></textarea>
  </div>

  <button type="submit" class="btn btn-primary w-100" name="submit">Submit</button>

  <!-- <input type="submit" name="submit" value="Submit"> -->
</div>
  </div>
</form>
</div>
        <?php
    }

}

// Instantiate the plugin class
new SimpleFormPlugin;
