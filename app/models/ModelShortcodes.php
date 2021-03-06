<?php

namespace lolitatheme;

use \lolita\LolitaFramework;
use \lolita\LolitaFramework\Core\View;
use \lolita\LolitaFramework\Core\Arr;
use \lolita\LolitaFramework\Core\Data;
use \lolita\LolitaFramework\Core\Decorators\Post;
use \lolita\LolitaFramework\Core\Decorators\Img;

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
                        'orderby'          => 'rand',
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
        return View::make('blocks' . DS . 'w-follow');
    }

    /**
     * b-pagination
     *
     * @param  array $attrs
     * @return string
     */
    public static function bPagination($attrs)
    {
        $max_num_pages = Arr::get($attrs, 'max_num_pages', 1);
        $big           = 999999999;
        $current       = max(1, Arr::get($attrs, 'current', 1));
        $args          = array(
            'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'  => '?paged=%#%',
            'current' => $current,
            'total'   => $max_num_pages,
            'type'    => 'array',
        );
        return View::make(
            'blocks' . DS . 'b-pagination',
            array(
                'items'         => ModelMain::paginateLinks($args),
                'current'       => $current,
                'max_num_pages' => $max_num_pages,
            )
        );
    }

    /**
     * w-banner
     *
     * @return mixed
     */
    public static function wBanner($atts = array())
    {
        $id  = (int) Arr::get($atts, 'img');
        $img = new Img($id);
        if ($img->isInitialized()) {
            $class = 'w-banner w-banner--header w-banner--loading';
            if ('image/gif' == $img->mime()) {
                $class = 'w-banner w-banner--header w-banner--loading w-banner--gif';
            }
            return View::make(
                'blocks' . DS . 'w-banner',
                array(
                    'class' => $class,
                    'img'   => $img,
                )
            );
        }
        return '';
    }

    /**
     * b-latest-projects
     *
     * @return mixed
     */
    public static function bLatestProjects()
    {
        return View::make(
            'blocks' . DS . 'b-latest-projects',
            array(
                'items' => Post::posts(
                    array(
                        'posts_per_page'   => 9,
                        'offset'           => 0,
                        'orderby'          => 'date',
                        'order'            => 'DESC',
                        'post_type'        => 'project',
                        'post_status'      => 'publish',
                    )
                ),
            )
        );
    }

    /**
     * b-services
     *
     * @return mixed
     */
    public static function bServices()
    {
        return View::make(
            'blocks' . DS . 'b-services',
            array(
                'assets' => LolitaFramework::getInstance()->baseUrl() . DS . 'app' . DS . 'assets',
            )
        );
    }

    /**
     * b-products
     *
     * @return mixed
     */
    public static function bProducts()
    {
        return View::make(
            'blocks' . DS . 'b-products',
            array(
                'items' => Post::posts(
                    array(
                        'posts_per_page' => 3,
                        'offset'         => 0,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'post_type'      => 'product',
                        'post_status'    => 'publish',
                        'envanto_link'   => 'https://codecanyon.net/user/lolitainc/portfolio',
                    )
                ),
            )
        );
    }

    /**
     * b-stories
     *
     * @return mixed
     */
    public static function bStories()
    {
        return View::make(
            'blocks' . DS . 'b-stories',
            array(
                'items' => Post::posts(
                    array(
                        'posts_per_page'   => -1,
                        'offset'           => 0,
                        'orderby'          => 'date',
                        'order'            => 'DESC',
                        'post_type'        => 'story',
                        'post_status'      => 'publish',
                    )
                ),
            )
        );
    }

    /**
     * b-features
     *
     * @return mixed
     */
    public static function bFeatures()
    {
        return View::make(
            'blocks' . DS . 'b-features',
            array(
                'items' => Post::posts(
                    array(
                        'posts_per_page'   => 3,
                        'offset'           => 0,
                        'orderby'          => 'date',
                        'order'            => 'DESC',
                        'post_type'        => 'feature',
                        'post_status'      => 'publish',
                    )
                ),
            )
        );
    }
}
