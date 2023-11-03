<?php
$faq_args = array(
    'post_type' => 'faq',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order' => 'DESC',
);
$faq_loop = new WP_Query($faq_args);
?>
<div class="faq_qa">
    <?php
    if (!empty($faq_loop->posts)) {
        foreach ($faq_loop->posts as $key => $value) {
            $post_title = $value->post_title;
            $post_question = get_post_meta($value->ID, 'question', true);
            $post_answer = get_post_meta($value->ID, 'answer', true);
    ?>
            <details>
                <summary><?= (isset($post_question) && $post_question != '') ? $post_question : ''; ?></summary>
                <p><?= (isset($post_answer) && $post_answer != '') ? $post_answer : ''; ?></p>
            </details>
    <?php
        }
    } else {
        echo "<p>No Question/Anwer available.</p>";
    }
    ?>
</div>