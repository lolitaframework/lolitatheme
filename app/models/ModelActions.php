<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Arr;
use \lolitatheme\LolitaFramework\Core\Str;
use \lolitatheme\LolitaFramework\Core\Loc;
use \lolitatheme\LolitaFramework\Core\Url;
use \lolitatheme\LolitaFramework\Core\Data;
use \lolitatheme\LolitaFramework\Core\Decorators\Post;
use \WP_Post;

class ModelActions
{
    /**
     * Add meta to head
     *
     * @return void
     */
    public static function meta()
    {
        $qo = get_queried_object();
        if ($qo instanceof WP_Post) {
            $description = Str::limit(esc_attr(strip_tags($qo->post_content)), 200, '');
        } else {
            $description = sprintf('%s - %s', get_bloginfo('name'), get_bloginfo('description'));
        }
        echo View::make(
            'blocks' . DS . 'meta',
            array(
                'description' => $description,
            )
        );
    }

    /**
     * Filter old browsers
     *
     * @return void
     */
    public static function checkBrowser()
    {
        $response = Loc::browserVersion();
        if (is_array($response)) {
            if (array_key_exists('name', $response) && array_key_exists('version', $response)) {
                $name    = $response['name'];
                $version = (int) $response['version'];

                if ('Internet Explorer' === $name && $version < 11) {
                    wp_redirect('http://outdatedbrowser.com/');
                    exit;
                }
            }
        }
    }

    /**
     * Search
     * Action: wp_ajax_search, wp_ajax_nopriv_search
     *
     * @return string
     */
    public static function search()
    {
        check_ajax_referer('Lolita Framework', 'nonce');
        $args = array(
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_type'      => array('post', 'page'),
            'post_status'    => 'publish',
            's'              => Arr::get($_POST, 's'),
        );
        $items   = Post::sanitize(get_posts($args));
        $return  = array();
        foreach ($items as &$p) {
            $content = ModelMain::removeCodeFromContent($p->content());
            $content = Str::limit($content, 255);
            $content = wp_strip_all_tags($content);
            $return[] = array(
                'url'     => $p->link(),
                'title'   => $p->title(),
                'content' => $content,
                'img'     => $p->img()->src('65x65'),
            );
        }
        wp_send_json_success(array('items' => $return));
    }

    /**
     * Instagram
     * Action: wp_ajax_instagra, wp_ajax_nopriv_instagra
     *
     * @return string
     */
    public static function instagram()
    {
        check_ajax_referer('Lolita Framework', 'nonce');
        $transient_key = 'cache-w-follow';
        $items         = get_transient($transient_key);
        $placeholder   = LolitaFramework::baseUrl() . DS . 'app' . DS . 'assets' . DS . 'img' . DS . 'insta_placeholder.min.svg';

        if (false === $items) {
            $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=3494283511.3a81a9f.ca5fb9bd44df4ad69768c44a8947c3e5&COUNT=20';
            $items = wp_remote_retrieve_body(wp_remote_get($url));
            $items = Data::maybeJSONDecode($items);
            $items = Arr::get($items, 'data', array());
            if (count($items) && is_array($items)) {
                foreach ($items as &$el) {
                    $el = array(
                        'link'        => $el['link'],
                        'placeholder' => $placeholder,
                        'src'         => $el['images']['standard_resolution']['url'],
                        'text'        => $el['caption']['text'],
                    );
                }
                set_transient($transient_key, $items, HOUR_IN_SECONDS);
            }
        }
        wp_send_json_success(array('items' => $items));
    }

    /**
     * Hire use
     *
     * @return void
     */
    public static function hireUs()
    {
        check_ajax_referer('Lolita Framework', 'nonce');

        wp_send_json_success(
            array(
                get_option('admin_email'),
                'HIRE US',
                View::make(
                    'mails' . DS . 'hire_us',
                    array(
                        'name'  => Arr::get($_POST, 'name'),
                        'email' => Arr::get($_POST, 'email'),
                        'msg'   => Arr::get($_POST, 'msg'),
                    )
                ),
                mail(
                    get_option('admin_email'),
                    'HIRE US',
                    View::make(
                        'mails' . DS . 'hire_us',
                        array(
                            'name'  => Arr::get($_POST, 'name'),
                            'email' => Arr::get($_POST, 'email'),
                            'msg'   => Arr::get($_POST, 'msg'),
                        )
                    )
                ),
                wp_mail(
                    get_option('admin_email'),
                    'HIRE US',
                    View::make(
                        'mails' . DS . 'hire_us',
                        array(
                            'name'  => Arr::get($_POST, 'name'),
                            'email' => Arr::get($_POST, 'email'),
                            'msg'   => Arr::get($_POST, 'msg'),
                        )
                    )
                )
            )
        );
    }

    /**
     * Block wp-admin
     *
     * @return void
     */
    public static function blockWPAdmin()
    {
        $route = Url::route();
        $route = str_replace('/', '', $route);
        if ('wp-admin' === $route) {
            wp_redirect(home_url());
            die();
        }
    }

    /**
     * Print emoji detection script
     *
     * @return void
     */
    public static function printEmojiDetectionScript()
    {
        echo View::make(
            'scripts' . DS . 'emoji_detection_script',
            array(
                'settings' => array(
                    'baseUrl' => apply_filters('emoji_url', 'https://s.w.org/images/core/emoji/2/72x72/'),
                    'ext'     => apply_filters('emoji_ext', '.png'),
                    'svgUrl'  => apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/'),
                    'svgExt'  => apply_filters('emoji_svg_ext', '.svg'),
                    'source'  => array(
                        'wpemoji' => apply_filters('script_loader_src', includes_url('js/wp-emoji.min.js'), 'wpemoji'),
                        'twemoji' => apply_filters('script_loader_src', includes_url('js/twemoji.min.js'), 'twemoji'),
                    ),
                ),
            )
        );
    }
}
