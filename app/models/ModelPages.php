<?php

namespace lolitatheme;

use \lolita\LolitaFramework;
use \lolita\LolitaFramework\Core\Decorators\Post;
use \lolita\LolitaFramework\Core\Decorators\Term;
use \lolita\LolitaFramework\Core\View;
use \lolita\LolitaFramework\Core\Arr;
use \WP_Post;
use \WP_Query;
use \WP_Term;

class ModelPages
{
    /**
     * Old browser
     *
     * @return string
     */
    public static function old()
    {
        return View::make('pages' . DS . 'old');
    }

    /**
     * Hire use
     *
     * @return string
     */
    public static function hireUs()
    {
        $allowed = array('standard', 'premium', 'luxury');
        $text    = Arr::get($_GET, 'type');
        if (in_array($text, $allowed)) {
            $text = View::make('texts' . DS . $text);
        }
        return View::make(
            'pages' . DS . 'hire_us',
            array(
                'text' => $text,
            )
        );
    }

    /**
     * Showcase page
     *
     * @return string
     */
    public static function showcase()
    {
        return View::make('pages' . DS . 'showcase');
    }

    /**
     * Attachment page
     *
     * @return string
     */
    public static function attachment()
    {
        $qo = get_queried_object();
        if (!($qo instanceof WP_Post)) {
            wp_redirect(home_url());
        }
        $p      = Post::sanitize($qo);
        $file   = get_attached_file($p->ID);
        $info   = getimagesize($file);
        $width  = Arr::get($info, 0, 0);
        $height = Arr::get($info, 1, 0);
        return View::make(
            'pages' . DS . 'attachment',
            array(
                'p'             => $p,
                'file_size'     => size_format(filesize($file)),
                'info'          => $info,
                'width'         => $width,
                'height'        => $height,
                'default_image' => LolitaFramework::getInstance()->baseUrl() . '/app/assets/img/b-attachment--file.png'
            )
        );
    }

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
            'offset'      => $ppp * ($paged),
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
                'query'         => $query,
                'items'         => $items,
                'max_num_pages' => $query->max_num_pages - 1,
                'current_page'  => $paged,
            )
        );
    }

    /**
     * Search page
     *
     * @return string
     */
    public static function search()
    {
        $query = new WP_Query;
        $ppp   = (int) get_option('posts_per_page');
        $paged = max(1, (int) get_query_var('paged'));
        $s     = (string) get_query_var('s');

        $args = array(
            'numberposts' => $ppp,
            'offset'      => $ppp * ($paged-1),
            'orderby'     => 'date',
            'order'       => 'DESC',
            'post_type'   => array('post', 'page'),
            'post_status' => 'publish',
            's'           => $s,
        );

        $items = $query->query($args);
        $items = Post::sanitize($items);

        return View::make(
            'pages' . DS . 'search',
            array(
                's'             => $s,
                'query'         => $query,
                'items'         => $items,
                'max_num_pages' => $query->max_num_pages,
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
