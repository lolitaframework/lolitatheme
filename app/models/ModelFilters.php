<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\Url;
use \lolitatheme\LolitaFramework\Core\View;

class ModelFilters
{
    public static function loadDirectly($tag, $handle, $href, $media)
    {
        // $file = Url::toFileSystem($href);
        // if(is_file($file)) {
        //     $style = View::make(
        //         'styles' . DS . 'base',
        //         array(
        //             'file' => $file,
        //         )
        //     );
        //     $style = str_replace('url(', 'url(' . Url::toUrl(dirname($file)) . DS, $style);
        //     return $style;
        // }
        return $tag;
    }
}
