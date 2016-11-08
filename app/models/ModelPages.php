<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\Decorators\Post;
use \lolitatheme\LolitaFramework\Core\Decorators\Term;
use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Arr;
use \WP_Post;
use \WP_Query;
use \WP_Term;

class ModelPages
{

    /**
     * Archive page
     *
     * @return string
     */
    public static function archive()
    {
        $qo    = get_queried_object();
        $query = new WP_Query;
        $ppp   = (int) get_option('posts_per_page');
        $paged = (int) get_query_var('paged');

        $args = array(
            'numberposts' => $ppp,
            'offset'      => $ppp * $paged,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'post_tpye'   => 'post',
            'post_status' => 'publish',
        );

        if ($qo instanceof WP_Term) {
            $args['tax_query'] = Term::termsToQuery(array($qo));
        }

        $items = $query->query($args);
        $items = Post::sanitize($items);

        return View::make(
            'pages' . DS . 'archive',
            array(
                'qo'            => $qo,
                'items'         => $items,
                'max_num_pages' => $query->max_num_pages - 1,
                'current_page'  => $paged,
            )
        );
    }

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

    /**
     * 404 error page
     *
     * @return string
     */
    public static function page404()
    {
        return View::make('pages' . DS . '404');
    }
}
