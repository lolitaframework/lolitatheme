<?php
namespace daxx\app\widgets\breadcrumbs\engine\Trails;

use \daxx\app\widgets\breadcrumbs\engine\Crumb;

class Home extends Trail
{

    /**
     * Compile home crumbs
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @return Home instance.
     */
    public function compile()
    {
        return $this;
    }
}
