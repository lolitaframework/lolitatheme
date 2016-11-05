<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Arr;

class ModelPages
{

    /**
     * Home page
     *
     * @return string
     */
    public static function home()
    {
        return View::make(
            'pages' . DS . 'home',
            array(
                'logo' => ModelOptions::logo(),
            )
        );
    }
}
