<?php

// Disabled Gutenburg Editor
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_widgets_block_editor', '__return_false', 10);

// Primary Menu
function ikonic_register_menus()
{
	register_nav_menus(array(
		'primary_menu' => __('Primary Menu', 'ikonic'),
	));
}
add_action('after_setup_theme', 'ikonic_register_menus');


// Countries Shortcode
function countries_fn()
{
	require __DIR__ . '/shortcodes/countries.php';
}
add_shortcode('countries', 'countries_fn');

// Theme Setting Option Page
add_action('admin_menu', 'theme_option_menu');
function theme_option_menu()
{
	add_menu_page(
		'Theme Option', // page <title>Title</title>
		'Theme Option', // link text
		'manage_options', // user capabilities
		'theme_option', // page slug
		'theme_option_page_callback', // this function prints the page content
		'dashicons-admin-generic', // icon (from Dashicons for example)
		80 // menu position
	);
}
function theme_option_page_callback()
{
	require __DIR__ . '/includes/theme-option.php';
}


// Save theme setting
// Image Upload
add_action("wp_ajax_theme_setting", "theme_setting_fn");
add_action("wp_ajax_nopriv_theme_setting", "theme_setting_fn");

function theme_setting_fn()
{
	$return = true;
	$web_addr = $_POST['web_addr'];
	$web_contact = $_POST['web_contact'];

	// Website Address
	update_option('web_addr', $web_addr);

	// Website Contact
	update_option('web_contact', $web_contact);

	// Website Logo
	if (isset($_FILES)) {
		$web_logo = $_FILES['web_logo'];
		if (!empty($web_logo)) {
			$wordpress_upload_dir = wp_upload_dir();
			$new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $web_logo['name'];
			$new_file_mime = mime_content_type($web_logo['tmp_name']);
			if (move_uploaded_file($web_logo['tmp_name'], $new_file_path)) {
				$upload_id = wp_insert_attachment(array(
					'guid'           => $new_file_path,
					'post_mime_type' => $new_file_mime,
					'post_title'     => preg_replace('/\.[^.]+$/', '', $web_logo['name']),
					'post_content'   => '',
					'post_author'   => 1,
					'post_status'    => 'inherit'
				), $new_file_path);
				require_once(ABSPATH . 'wp-admin/includes/image.php');
				wp_update_attachment_metadata($upload_id, wp_generate_attachment_metadata($upload_id, $new_file_path));
				update_option('web_logo', wp_get_attachment_url($upload_id));
			}
		} else if (empty($web_logo)) {
			update_option('web_logo', $_POST['web_logo']);
		}
	}

	print_r($return);
	exit;
}