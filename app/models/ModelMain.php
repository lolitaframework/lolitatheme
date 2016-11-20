<?php

namespace lolitatheme;

class ModelMain
{

    /**
     * Remove code from content
     * @param  string $content
     * @return string
     */
    public static function removeCodeFromContent($content)
    {
        return preg_replace('/<pre class="prettyprint.*/s', '', $content);
    }

    /**
     * Retrieve paginated link for archive post pages.
     *
     * Technically, the function can be used to create paginated link list for any
     * area. The 'base' argument is used to reference the url, which will be used to
     * create the paginated links. The 'format' argument is then used for replacing
     * the page number. It is however, most likely and by default, to be used on the
     * archive post pages.
     *
     * The 'type' argument controls format of the returned value. The default is
     * 'plain', which is just a string with the links separated by a newline
     * character. The other possible values are either 'array' or 'list'. The
     * 'array' value will return an array of the paginated link list to offer full
     * control of display. The 'list' value will place all of the paginated links in
     * an unordered HTML list.
     *
     * The 'total' argument is the total amount of pages and is an integer. The
     * 'current' argument is the current page number and is also an integer.
     *
     * An example of the 'base' argument is "http://example.com/all_posts.php%_%"
     * and the '%_%' is required. The '%_%' will be replaced by the contents of in
     * the 'format' argument. An example for the 'format' argument is "?page=%#%"
     * and the '%#%' is also required. The '%#%' will be replaced with the page
     * number.
     *
     * You can include the previous and next links in the list by setting the
     * 'prev_next' argument to true, which it is by default. You can set the
     * previous text, by using the 'prev_text' argument. You can set the next text
     * by setting the 'next_text' argument.
     *
     * If the 'show_all' argument is set to true, then it will show all of the pages
     * instead of a short list of the pages near the current page. By default, the
     * 'show_all' is set to false and controlled by the 'end_size' and 'mid_size'
     * arguments. The 'end_size' argument is how many numbers on either the start
     * and the end list edges, by default is 1. The 'mid_size' argument is how many
     * numbers to either side of current page, but not including current page.
     *
     * It is possible to add query vars to the link by using the 'add_args' argument
     * and see add_query_arg() for more information.
     *
     * The 'before_page_number' and 'after_page_number' arguments allow users to
     * augment the links themselves. Typically this might be to add context to the
     * numbered links so that screen reader users understand what the links are for.
     * The text strings are added before and after the page number - within the
     * anchor tag.
     *
     * @since 2.1.0
     *
     * @global WP_Query   $wp_query
     * @global WP_Rewrite $wp_rewrite
     *
     * @param string|array $args {
     *     Optional. Array or string of arguments for generating paginated links for archives.
     *
     *     @type string $base               Base of the paginated url. Default empty.
     *     @type string $format             Format for the pagination structure. Default empty.
     *     @type int    $total              The total amount of pages. Default is the value WP_Query's
     *                                      `max_num_pages` or 1.
     *     @type int    $current            The current page number. Default is 'paged' query var or 1.
     *     @type bool   $show_all           Whether to show all pages. Default false.
     *     @type int    $end_size           How many numbers on either the start and the end list edges.
     *                                      Default 1.
     *     @type int    $mid_size           How many numbers to either side of the current pages. Default 2.
     *     @type bool   $prev_next          Whether to include the previous and next links in the list. Default true.
     *     @type bool   $prev_text          The previous page text. Default '« Previous'.
     *     @type bool   $next_text          The next page text. Default '« Previous'.
     *     @type string $type               Controls format of the returned value. Possible values are 'plain',
     *                                      'array' and 'list'. Default is 'plain'.
     *     @type array  $add_args           An array of query args to add. Default false.
     *     @type string $add_fragment       A string to append to each link. Default empty.
     *     @type string $before_page_number A string to appear before the page number. Default empty.
     *     @type string $after_page_number  A string to append after the page number. Default empty.
     * }
     * @return array|string|void String of page links or array of page links.
     */
    public static function paginateLinks($args = '')
    {
        global $wp_query, $wp_rewrite;
        // Setting up default values based on the current URL.
        $pagenum_link = html_entity_decode(get_pagenum_link());
        $url_parts    = explode('?', $pagenum_link);

        // Get max pages and current page out of the current query, if available.
        $total   = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
        $current = get_query_var('paged') ? intval(get_query_var('paged')) : 1;

        // Append the format placeholder to the base URL.
        $pagenum_link = trailingslashit($url_parts[0]) . '%_%';

        // URL base depends on permalink settings.
        $format  = $wp_rewrite->using_index_permalinks() && ! strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
        $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged') : '?paged=%#%';

        $defaults = array(
            'base'               => $pagenum_link,
            'format'             => $format,
            'total'              => $total,
            'current'            => $current,
            'show_all'           => false,
            'prev_next'          => true,
            'prev_text'          => __('&laquo; Previous'),
            'next_text'          => __('Next &raquo;'),
            'end_size'           => 1,
            'mid_size'           => 2,
            'type'               => 'plain',
            'add_args'           => array(),
            'add_fragment'       => '',
            'before_page_number' => '',
            'after_page_number'  => ''
        );

        $args = wp_parse_args($args, $defaults);

        if (!is_array($args['add_args'])) {
            $args['add_args'] = array();
        }

        // Merge additional query vars found in the original URL into 'add_args' array.
        if (isset($url_parts[1])) {
            // Find the format argument.
            $format = explode('?', str_replace('%_%', $args['format'], $args['base']));
            $format_query = isset($format[1]) ? $format[1] : '';
            wp_parse_str($format_query, $format_args);

            // Find the query args of the requested URL.
            wp_parse_str($url_parts[1], $url_query_args);

            // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
            foreach ($format_args as $format_arg => $format_arg_value) {
                unset($url_query_args[$format_arg]);
            }

            $args['add_args'] = array_merge($args['add_args'], urlencode_deep($url_query_args));
        }

        // Who knows what else people pass in $args
        $total = (int) $args['total'];
        if ($total < 2) {
            return;
        }
        $current  = (int) $args['current'];
        $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
        if ($end_size < 1) {
            $end_size = 1;
        }
        $mid_size = (int) $args['mid_size'];
        if ($mid_size < 0) {
            $mid_size = 2;
        }
        $add_args = $args['add_args'];
        $r = '';
        $page_links = array();
        $dots = false;

        if ($args['prev_next'] && $current && 1 < $current) {
            $link = str_replace('%_%', 2 == $current ? '' : $args['format'], $args['base']);
            $link = str_replace('%#%', $current - 1, $link);
            if ($add_args) {
                $link = add_query_arg($add_args, $link);
            }
            $link .= $args['add_fragment'];

            /**
             * Filters the paginated links for the given archive pages.
             *
             * @since 3.0.0
             *
             * @param string $link The paginated link URL.
             */
            $page_links[] = array(
                'link'    => $link,
                'text'    => $args['prev_text'],
                'is_prev' => true,
            );
        } else {
            $page_links[] = array(
                'text'    => $args['prev_text'],
                'is_prev' => true,
            );
        }
        for ($n = 1; $n <= $total; $n++) {
            if ($n == $current) :
                $page_links[] = array(
                    'text' => $args['before_page_number'] . number_format_i18n($n) . $args['after_page_number'],
                );
                $dots = true;
            else :
                if ($args['show_all'] || ($n <= $end_size || ($current && $n >= $current - $mid_size && $n <= $current + $mid_size) || $n > $total - $end_size)) :
                    $link = str_replace('%_%', 1 == $n ? '' : $args['format'], $args['base']);
                    $link = str_replace('%#%', $n, $link);
                    if ($add_args) {
                        $link = add_query_arg($add_args, $link);
                    }
                    $link .= $args['add_fragment'];

                    /** This filter is documented in wp-includes/general-template.php */
                    $page_links[] = array(
                        'link' => $link,
                        'text' => $args['before_page_number'] . number_format_i18n($n) . $args['after_page_number'],
                    );
                    $dots = true;
                elseif ($dots && ! $args['show_all']) :
                    $page_links[] = array(
                        'text' => __('&hellip;'),
                    );
                    $dots = false;
                endif;
            endif;
        }
        if ($args['prev_next'] && $current && ($current < $total || -1 == $total)) {
            $link = str_replace('%_%', $args['format'], $args['base']);
            $link = str_replace('%#%', $current + 1, $link);
            if ($add_args) {
                $link = add_query_arg($add_args, $link);
            }
            $link .= $args['add_fragment'];

            /** This filter is documented in wp-includes/general-template.php */
            $page_links[] = array(
                'link'    => $link,
                'text'    => $args['next_text'],
                'is_next' => true,
            );
        } else {
            $page_links[] = array(
                'text'    => $args['next_text'],
                'is_next' => true,
            );
        }
        switch ($args['type']) {
            case 'array':
                return $page_links;

            case 'list':
                $r .= "<ul class='page-numbers'>\n\t<li>";
                $r .= join("</li>\n\t<li>", $page_links);
                $r .= "</li>\n</ul>\n";
                break;

            default:
                $r = join("\n", $page_links);
                break;
        }
        return $r;
    }
}
