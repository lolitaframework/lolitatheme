<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Arr;

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
}
