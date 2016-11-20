<?php

namespace lolitatheme\app\widgets\comments\engine;

use \lolitatheme\LolitaFramework\Core\Arr;
use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Decorators\Post;
use \WP_Post;

class Engine
{
    /**
     * Render the widget
     *
     * @param  array $args
     * @param  array $instance
     * @return void
     */
    public static function widget($args, $instance)
    {
        $views = dirname(__DIR__) . DS . 'views' . DS;
        $qo = get_queried_object();
        if ($qo instanceof WP_Post) {
            $p = Post::sanitize($qo);
            echo View::make(
                $views . 'comments.php',
                array(
                    'p'        => $p,
                    'form'     => View::make($views . 'form.php'),
                    'elements' => View::make(
                        $views . 'elements.php',
                        array(
                            'comments' => $p->comments(),
                            'path'     => $views . 'elements.php',
                            'parent'   => 0,
                        )
                    ),
                )
            );
        }
    }
}
