<?php

namespace lolitatheme;


class ModelFilters
{
    public static function cssWithoutBlockingRender($link)
    {
        return str_replace('/>', 'onload="if(media!=\'all\')media=\'all\'" />', $link);
    }
}
