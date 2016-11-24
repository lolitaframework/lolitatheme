<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\Url;
use \lolitatheme\LolitaFramework\Core\View;

class ModelFilters
{
    public static function loadDirectly($tag, $handle, $href, $media)
    {
        $tag_js = str_replace('/>', 'onload="if(media!=\'all\')media=\'all\'" />', $tag);
        $tag_nojs = sprintf('<noscript>%s</noscript>', $tag);

        return $tag_js . $tag_nojs;
    }
}
