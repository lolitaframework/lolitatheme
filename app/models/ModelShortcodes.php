<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Arr;
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
        return print_r(ModelOptions::socialIcons(), true);
    }
}
