<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Arr;
use \lolitatheme\LolitaFramework\Core\Decorators\Post;

class ModelActions
{

    /**
     * Search
     * Action: wp_ajax_search, wp_ajax_nopriv_search
     *
     * @return string
     */
    public static function search()
    {
        check_ajax_referer('Lolita Framework', 'nonce');
        $args = array(
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_type'      => array('post', 'page'),
            'post_status'    => 'publish',
            's'              => Arr::get($_POST, 's'),
        );
        $items  = Post::sanitize(get_posts($args));
        $return = array();
        foreach ($items as &$el) {
            $return[] = array(
                'url'     => $p->link(),
                'title'   => $p->title(),
                'content' => wp_strip_all_tags($p->content(255)),
                'img'     => $p->img()->src('65x65'),
            );
        }

        wp_send_json_success(array('items' => $return));
    }
}
