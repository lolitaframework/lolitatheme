<?php

namespace lolitatheme\app\widgets\menu\engine;

use \lolita\LolitaFramework\Core\View;
use \lolita\LolitaFramework\Core\Arr;
use \lolita\LolitaFramework\Core\Decorators\Post;

class Menu
{
    /**
     * Menu items
     */
    private $items = null;

    /**
     * Menu graph
     */
    private $graph = null;

    /**
     * Nav menu object
     * @var null
     */
    private $menu = null;

    /**
     * Widget instance
     * @var null
     */
    private $instance = null;

    /**
     * Class constructor
     */
    public function __construct($id, $instance)
    {
        $this->items = $this->menu($id);
        if ($this->items) {
            $this->menu     = wp_get_nav_menu_object($id);
            $this->instance = $instance;
            $this->initGraph();
        }
    }

    /**
     * Get menu
     */
    public function menu($menu_id = '')
    {
        if ($menu_id > 0) {
            return wp_get_nav_menu_items($menu_id);
        }
        return false;
    }

    /**
     * Init graph
     *
     * @return Menu instance.
     */
    public function initGraph()
    {
        foreach ($this->items as $item) {
            $this->graph[ $item->menu_item_parent ][] = $item;
        }
        return $this;
    }

    /**
     * Get graph
     *
     * @return mixed
     */
    public function getGraph()
    {
        return $this->graph;
    }

    /**
     * Render menu
     *
     * @param  integer $parent
     * @param  integer $level
     * @return string
     */
    public function render($parent = 0, $level = 0)
    {
        $items = array();
        if (array_key_exists($parent, $this->graph)) {
            foreach ($this->graph[ $parent ] as $el) {
                $items[] = View::make(
                    dirname(__DIR__) . DS . 'views' . DS . 'li.php',
                    array(
                        'p'       => $el,
                        'level'   => $level,
                        'submenu' => $this->render($el->ID, $level + 1),
                    )
                );
            }
            return View::make(
                dirname(__DIR__) . DS . 'views' . DS . 'ul.php',
                array(
                    'items' => implode('', $items),
                    'level' => $level,
                )
            );
        }
        return '';
    }
}
