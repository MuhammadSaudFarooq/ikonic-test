<?php
// Include CSS file
wp_enqueue_style("theme-setting.css", get_stylesheet_directory_uri() . "/includes/css/theme-setting.css");

// Include JS file
wp_enqueue_script("theme-setting", get_stylesheet_directory_uri() . "/includes/js/theme-setting.js");
wp_localize_script('theme-setting', 'url', array('ajaxurl' => admin_url('admin-ajax.php'), 'siteurl' => site_url()));

// Get website data
$web_logo_url = get_option('web_logo');
if (isset($web_logo_url) && $web_logo_url != '')
    $web_logo_url = $web_logo_url;
else
    $web_logo_url = get_stylesheet_directory_uri() . '/assets/logo-placeholder.jpg';

$web_addr = get_option('web_addr');
$web_contact = get_option('web_contact');
?>
<div class="theme-setting">
    <div>
        <h1>Theme Setting</h1>
    </div>
    <hr>
    <div class="website_logo">
        <h2>Website Logo:</h2>
        <div>
            <input type="file" name="site_logo" accept=".png, .jpg, .jpeg">
            <img src="<?= ($web_logo_url != '') ? $web_logo_url : ''; ?>" alt="Website Logo">
            <?php
            if (isset($web_logo_url) && $web_logo_url != site_url('/wp-content/themes/ikonic/assets/logo-placeholder.jpg'))
                echo "<span class='remove_logo'>x</span>";
            ?>
        </div>
    </div>
    <div class="website_address">
        <h2>Address:</h2>
        <div>
            <textarea name="site_addr" rows="3" value="<?= ($web_addr != '') ? $web_addr : '' ?>"><?= ($web_addr != '') ? $web_addr : '' ?></textarea>
        </div>
    </div>
    <div class="website_contact">
        <h2>Contact:</h2>
        <div>
            <input type="tel" name="site_contact" value="<?= ($web_contact != '') ? $web_contact : '' ?>">
        </div>
    </div>
    <div class="save_theme_setting">
        <input type="submit" name="save_theme_setting" class="button button-primary button-large" value="Save">
    </div>
</div>