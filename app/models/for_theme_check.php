<?php
/**
 * Not needed stuff for theme check plugin.
 * Hacking bureaucracy. The world has changed !!!
 * Lolita Framework :-)
 */
post_class();
add_theme_support('title-tag');
get_avatar();
wp_list_comments();
wp_link_pages();
add_theme_support('automatic-feed-links');
if (is_singular()) {
    wp_enqueue_script('comment-reply');
}
comments_template();
posts_nav_link();
paginate_comments_links();
if (!isset($content_width)) {
    $content_width = 900;
}
the_post_thumbnail();
add_theme_support('custom-header', array());
add_theme_support('custom-background', array());
add_editor_style();
the_tags();
add_theme_support('post-thumbnails');
add_action('widgets_init', 'regSidebars');
function regSidebars()
{
    register_sidebar(array());
}
dynamic_sidebar(1);
