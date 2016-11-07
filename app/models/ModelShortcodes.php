<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Arr;
use \lolitatheme\LolitaFramework\Core\Data;
use \lolitatheme\LolitaFramework\Core\Decorators\Post;

class ModelShortcodes
{

    /**
     * Header
     * @return string HTML code header.
     */
    public static function header()
    {
        return View::make('layouts' . DS . 'header');
    }

    /**
     * Footer
     *
     * @return string HTML code footer.
     */
    public static function footer()
    {
        return View::make('layouts' . DS . 'footer');
    }

    /**
     * .b-small-logo
     *
     * @return string
     */
    public static function bSmallLogo()
    {
        return View::make(
            'blocks' . DS . 'b-small-logo',
            array(
                'logo' => ModelOptions::logo(),
            )
        );
    }

    /**
     * w-logo
     *
     * @return string
     */
    public static function wLogo()
    {
        return View::make(
            'blocks' . DS . 'w-logo',
            array(
                'logo' => ModelOptions::logo(),
            )
        );
    }

    /**
     * w-logo--white
     *
     * @return string
     */
    public static function wLogoWhite()
    {
        return View::make(
            'blocks' . DS . 'w-logo--white',
            array(
                'logo' => ModelOptions::logoWhite(),
            )
        );
    }

    /**
     * w-menu
     *
     * @return string
     */
    public static function wMenu()
    {
        return View::make(
            'blocks' . DS . 'w-menu',
            array(
                'JSON_menu' => View::make('jsons' . DS . 'home_page_menu'),
            )
        );
    }

    /**
     * w-search-block
     *
     * @return string
     */
    public static function wSearchBlock($atts = array())
    {
        return View::make(
            'blocks' . DS . 'w-search-block',
            array(
                'w_class' => Arr::get($atts, 'w_class'),
                'b_class' => Arr::get($atts, 'b_class'),
            )
        );
    }

    /**
     * b-might-like
     *
     * @param  array  $atts
     * @return string
     */
    public static function bMightLike($atts = array())
    {
        if (array_key_exists('p', $atts)) {
            $p = Post::getInstance($atts['p']);
            if (is_array($p->categories) && count($p->categories)) {
                $items = get_posts(
                    array(
                        'posts_per_page'   => 3,
                        'exclude'          => $p->ID,
                        'category'         => implode(',', Arr::pluck($p->categories, 'term_id')),
                        'orderby'          => 'date',
                        'order'            => 'DESC',
                        'post_type'        => 'post',
                        'post_status'      => 'publish',
                    )
                );
                return View::make(
                    'blocks' . DS . 'b-might-like',
                    array(
                        'items' => Post::sanitize($items),
                    )
                );
            }
        }
        return '';
    }

    /**
     * w-social-buttons
     *
     * @return string
     */
    public static function wSocialButtons()
    {
        return View::make(
            'blocks' . DS . 'w-social-buttons',
            array(
                'icons' => ModelOptions::socialIcons()
            )
        );
    }

    /**
     * w-follow
     *
     * @return mixed
     */
    public static function wFollow()
    {
        $transient_key = 'cache-w-follow';
        $items         = get_transient($transient_key);
        $items = false;

        if (false === $items) {
            $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=3494283511.3a81a9f.ca5fb9bd44df4ad69768c44a8947c3e5&COUNT=20';
            $items = wp_remote_retrieve_body(wp_remote_get($url));
            $items = Data::maybeJSONDecode($items);
            set_transient($transient_key, $items, HOUR_IN_SECONDS);
        }
        return View::make(
            'blocks' . DS . 'w-follow',
            array(
                'items' => $items
            )
        );
    }
}
