<?php

namespace lolitatheme\app\widgets\menu\engine;

use \lolitatheme\LolitaFramework\Core\Arr;
use \lolitatheme\LolitaFramework\Core\View;

class Engine
{
    /**
     * Locations
     */
    public static function locations()
    {
        $locations = get_nav_menu_locations();
        if (count($locations)) {
            $locations = array_flip($locations);
        }

        return Arr::prepend($locations, __('Select location', 'lf'), -1);
    }

    /**
     * Registered menus
     *
     * @return Array
     */
    public static function menus()
    {
        $menus = (array) wp_get_nav_menus();
        $menus = Arr::pluck($menus, 'name', 'term_id');
        return Arr::prepend($menus, __('Select location', 'lf'), -1);
    }

    /**
     * Render the google map widget
     *
     * @param  array $args
     * @param  array $instance
     * @return void
     */
    public static function widget($args, $instance)
    {
        $menu  = false;
        if (array_key_exists('location', $instance)) {
            $menu_id = (int) $instance['location'];
        }
        if (array_key_exists('menu', $instance)) {
            $menu_id = (int) $instance['menu'];
        }
        $menu = new Menu($menu_id, $instance);
        echo View::make(
            dirname(__DIR__).DS.'views'.DS.'menu.php',
            array(
                'args'     => $args,
                'instance' => $instance,
                'menu'     => $menu,
            )
        );
    }
}
