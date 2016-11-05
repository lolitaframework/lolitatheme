<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Arr;
use \lolitatheme\LolitaFramework;

class ModelOptions
{
    /**
     * Default logo
     *
     * @return string
     */
    public static function defaultLogo()
    {
        return LolitaFramework::baseUrl() . '/app/assets/img/logo.svg';
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
}
