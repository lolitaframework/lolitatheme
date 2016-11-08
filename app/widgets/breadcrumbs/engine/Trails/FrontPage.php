<?php
namespace daxx\app\widgets\breadcrumbs\engine\Trails;

use \daxx\app\widgets\breadcrumbs\engine\Crumb;

class FrontPage extends Trail
{

    /**
     * Compile front page crumbs
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @return FrontPage instance.
     */
    public function compile()
    {
        return $this;
    }
}
