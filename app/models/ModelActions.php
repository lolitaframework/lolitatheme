<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Arr;
use \lolitatheme\LolitaFramework\Core\Str;
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
        //check_ajax_referer('Lolita Framework', 'nonce');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $args = array(
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_type'      => array('post', 'page'),
            'post_status'    => 'publish',
            's'              => Arr::get($_POST, 's'),
        );
        $items   = Post::sanitize(get_posts($args));
        $return  = array();
        foreach ($items as &$p) {
            $content = ModelMain::removeCodeFromContent($p->content());
            $content = Str::limit($content, 255);
            $content = wp_strip_all_tags($content);
            $return[] = array(
                'url'     => $p->link(),
                'title'   => $p->title(),
                'content' => $content,
                'img'     => $p->img()->src('65x65'),
            );
        }
        wp_send_json_success(array('items' => $return));
    }
}
