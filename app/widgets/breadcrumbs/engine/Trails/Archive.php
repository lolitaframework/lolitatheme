<?php
namespace lolitatheme\app\widgets\breadcrumbs\engine\Trails;

use \lolitatheme\app\widgets\breadcrumbs\engine\Crumb;
use \lolita\LolitaFramework\Core\Loc;
use \WP_Term;

class Archive extends Trail
{

    /**
     * Compile crumbs
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @return Archive instance.
     */
    public function compile()
    {
        $wp_rewrite = Loc::wpRewrite();

        /* Get some taxonomy and term variables. */
        $term = get_queried_object();
        if ($term instanceof WP_Term) {
            $taxonomy = get_taxonomy($term->taxonomy);
            $this->termParents($term->term_id, $taxonomy->name);
        }

        return $this;
    }
}
