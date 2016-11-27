<?php

namespace lolitatheme\app\widgets\menu\engine;

use \lolita\LolitaFramework\Core\Arr;
use \lolita\LolitaFramework\Core\View;

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

        return Arr::prepend($locations, __('Select location', 'lolita'), -1);
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
        return Arr::prepend($menus, __('Select location', 'lolita'), -1);
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
            $location = $instance['location'];
            $loc_id   = array_flip((array) self::locations());
            $menu_id  = 0;
            if (array_key_exists($location, $loc_id)) {
                $menu_id = $loc_id[ $location ];
            }
        }
        if (array_key_exists('menu', $instance)) {
            $menu_id = (int) $instance['menu'];
        }

        $menu = new Menu($menu_id, $instance);
        echo $menu->render();
    }
}
