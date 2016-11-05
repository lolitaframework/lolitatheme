<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\Decorators\Post;
use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Arr;
use \WP_Post;

class ModelPages
{

    /**
     * Home page
     *
     * @return string
     */
    public static function home()
    {
        return View::make('pages' . DS . 'home');
    }

    /**
     * Page
     *
     * @return string
     */
    public static function page()
    {
        $qo = get_queried_object();
        if ($qo instanceof WP_Post) {
            $p = Post::getInstance($qo->ID);
        } else {
            wp_redirect(home_url());
        }

        return View::make(
            'pages' . DS . 'page',
            array(
                'p' => $p
            )
        );
    }
}
