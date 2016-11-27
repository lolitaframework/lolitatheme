<?php

namespace lolitatheme;

use \lolita\LolitaFramework\Core\View;
use \lolita\LolitaFramework\Core\Arr;
use \lolita\LolitaFramework;

class ModelOptions
{
    /**
     * Default logo
     *
     * @return string
     */
    public static function defaultLogo()
    {
        return LolitaFramework::getInstance()->baseUrl() . '/app/assets/img/logo.svg';
    }

    /**
     * Default logo white
     *
     * @return string
     */
    public static function defaultLogoWhite()
    {
        return LolitaFramework::getInstance()->baseUrl() . '/app/assets/img/logo-white.svg';
    }

    /**
     * Logo url
     *
     * @return string
     */
    public static function logo()
    {
        return get_theme_mod('general_site_settings_upload_a_logo', self::defaultLogo());
    }

    /**
     * Logo white url
     *
     * @return string
     */
    public static function logoWhite()
    {
        return get_theme_mod('general_site_settings_upload_a_white_logo', self::defaultLogoWhite());
    }

    /**
     * Social icons
     *
     * @return array
     */
    public static function socialIcons()
    {
        return (array) get_theme_mod('general_site_settings_social_icons', array());
    }
}
