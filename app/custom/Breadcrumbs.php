<?php

final class Breadcrumb
{
    public static function the_breadcrumb()
    {

        $breadcrumbs = "";

        if (!is_home()) {
            $breadcrumbs .= '<li class="breadcrumb-item"><a href="' . get_option('home') . '">' . __('Home', 'sage') . "</a></li>";
            if (is_category() || is_single()) {
                $breadcrumbs .= '<li class="breadcrumb-item">' . get_the_category_list(' </li><li class="breadcrumb-item"> ');
                if (is_single()) {
                    $breadcrumbs .= '</li><li class="breadcrumb-item">' . get_the_title() . '</li>';
                }
            } elseif (is_page()) {
                $breadcrumbs .= '<li class="breadcrumb-item">' . get_the_title() . '</li>';
            } elseif (is_tag()) {
                $breadcrumbs .= '<li class="breadcrumb-item">' . single_tag_title() . '</li>';
            } elseif (is_day()) {
                $breadcrumbs .=  '<li class="breadcrumb-item">' . sprintf(__('Archive for: %s', 'sage'), get_the_time('F jS, Y')) . '</li>';
            } elseif (is_month()) {
                $breadcrumbs .=  '<li class="breadcrumb-item">' . sprintf(__('Archive for: %s', 'sage'), get_the_time('F, Y')) . '</li>';
            } elseif (is_year()) {
                $breadcrumbs .=  '<li class="breadcrumb-item">' . sprintf(__('Archive for: %s', 'sage'), get_the_time('Y')) .  '</li>';
            } elseif (is_author()) {
                $breadcrumbs .=  '<li class="breadcrumb-item">' . sprintf(__('Author: %s', 'sage'), get_the_author_meta('display_name')) . '</li>';
            } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
                $breadcrumbs .=  '<li class="breadcrumb-item">' . __('Blog Archives', 'sage') .  '</li>';
            } elseif (is_search()) {
                $breadcrumbs .=  '<li class="breadcrumb-item">' . sprintf(__('Search Results for: %s', 'sage'), get_search_query()) . '</li>';
            }
        }
        if ($breadcrumbs != "") {
            echo '<ol class="breadcrumb">';
            echo self::make_last_active($breadcrumbs);
            echo '</ol>';
        }
    }

    private static function make_last_active($subject)
    {
        $search = 'class="breadcrumb-item"';
        $replace = 'class="breadcrumb-item active"';
        $pos = strrpos($subject, $search);

        if ($pos !== false) {
            $subject = substr_replace($subject, $replace, $pos, strlen($search));
        }

        return preg_replace('/active"><a[^>]+>([^<]+)<\/a>/', 'active">$1', $subject);
    }
}
