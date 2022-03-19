<?php

namespace Inc\Admin;

define('PLUGINS_ROOT_DIR', WP_PLUGIN_URL . '/search-listing');

class Enqueue
{
    public static function enqueue_scripts()
    {
        wp_enqueue_style('mystyle', PLUGINS_ROOT_DIR . '/assets/css/style.css', 'all');
        wp_enqueue_script('myscript', PLUGINS_ROOT_DIR . '/assets/js/script.js');
    }
}
