<?php
// Register Custom Post Type FAQ
$labels = array(
    'name' => _x('FAQ', 'Post Type General Name', 'faq'),
    'singular_name' => _x('FAQ', 'Post Type Singular Name', 'faq'),
    'menu_name' => _x('FAQ', 'Admin Menu text', 'faq'),
    'name_admin_bar' => _x('FAQ', 'Add New on Toolbar', 'faq'),
    'archives' => __('FAQ Archives', 'faq'),
    'attributes' => __('FAQ Attributes', 'faq'),
    'parent_item_colon' => __('Parent FAQ:', 'faq'),
    'all_items' => __('All FAQs', 'faq'),
    'add_new_item' => __('Add New FAQ', 'faq'),
    'add_new' => __('Add New', 'faq'),
    'new_item' => __('New FAQ', 'faq'),
    'edit_item' => __('Edit FAQ', 'faq'),
    'update_item' => __('Update FAQ', 'faq'),
    'view_item' => __('View FAQ', 'faq'),
    'view_items' => __('View FAQs', 'faq'),
    'search_items' => __('Search FAQ', 'faq'),
    'not_found' => __('Not found', 'faq'),
    'not_found_in_trash' => __('Not found in Trash', 'faq'),
    'featured_image' => __('Featured Image', 'faq'),
    'set_featured_image' => __('Set featured image', 'faq'),
    'remove_featured_image' => __('Remove featured image', 'faq'),
    'use_featured_image' => __('Use as featured image', 'faq'),
    'insert_into_item' => __('Insert into FAQ', 'faq'),
    'uploaded_to_this_item' => __('Uploaded to this FAQ', 'faq'),
    'items_list' => __('FAQs list', 'faq'),
    'items_list_navigation' => __('FAQs list navigation', 'faq'),
    'filter_items_list' => __('Filter FAQs list', 'faq'),
);
$args = array(
    'label' => __('FAQ', 'faq'),
    'description' => __('Frequently Asked Questions', 'faq'),
    'labels' => $labels,
    'menu_icon' => 'dashicons-testimonial',
    'supports' => array('title', 'revisions'),
    'taxonomies' => array(),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 20,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
);
register_post_type('faq', $args);

// Custom Field
function add_custom_fields_to_faq()
{
    add_meta_box('faq_questionAnswer', 'Question/Answer', 'render_faq_questionAnswer_meta_box', 'faq', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_custom_fields_to_faq');

function render_faq_questionAnswer_meta_box($post)
{
    // Retrieve existing values for the custom fields
    $question = get_post_meta($post->ID, 'question', true);
    $answer = get_post_meta($post->ID, 'answer', true);

    // Output the custom fields form
?>
    <div class="qa-fields">
        <label for="question">
            <span>Question:</span>
            <input type="text" id="question" name="question" value="<?php echo esc_attr($question); ?>" /><br />
        </label>
        <label for="answer">
            <span>Answer:</span>
            <input type="text" id="answer" name="answer" value="<?php echo esc_attr($answer); ?>" /><br />
        </label>
    </div>
<?php
}

function save_custom_fields_data($post_id)
{
    // Save custom field data when the post is saved
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['question'])) {
        update_post_meta($post_id, 'question', sanitize_text_field($_POST['question']));
    }
    if (isset($_POST['answer'])) {
        update_post_meta($post_id, 'answer', sanitize_text_field($_POST['answer']));
    }
}
add_action('save_post', 'save_custom_fields_data');
