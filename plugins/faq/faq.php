<?php

/**
 * Plugin Name: FAQ (Frequently Asked Questions)
 * Plugin URI: https://github.com/MuhammadSaudFarooq
 * Description: Make shortcode of FAQ (Frequently Asked Questions) --- Shortcode: [FAQ]
 * Version: 1.0
 * Author: Muhammad Saud Farooque
 * Author URI: https://github.com/MuhammadSaudFarooq
 **/

/**
 * Register the "FAQ" custom post type
 */
function faq_setup_post_type()
{
    require_once __DIR__ . '/post-type/faq-pt.php';
}
add_action('init', 'faq_setup_post_type');

/**
 * Activate the plugin.
 */
function faq_activate()
{
    // Trigger our function that registers the custom post type plugin.
    faq_setup_post_type();
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'faq_activate');

/**
 * Deactivation hook.
 */
function faq_deactivate()
{
    // Unregister the post type, so the rules are no longer in memory.
    unregister_post_type('faq');
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'faq_deactivate');

// Shortcode
function faq_fn($params)
{
    require_once __DIR__ . '/shortcode/faq-shortcode.php';
}
add_shortcode('FAQ', 'faq_fn');

// Enqueue CSS File
wp_enqueue_style('faq',  plugin_dir_url(__FILE__) . "/css/faq.css");

// Enqueue JS file
wp_enqueue_script("faq", plugin_dir_url(__FILE__) . "/js/faq.js");
wp_localize_script('faq', 'url', array('ajaxurl' => admin_url('admin-ajax.php'), 'siteurl' => site_url()));
