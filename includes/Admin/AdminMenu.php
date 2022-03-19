<?php

namespace Inc\Admin;

class AdminMenu

{

    public static function search_listing_menu()
    {
        $parent_slug = 'search_listing';
        add_menu_page('Search Listing', 'Search Listing', 'manage_options', $parent_slug, array(__CLASS__, 'search_listings_settings'), 'dashicons-search', 17); // need __CLASS__ super global variable to reference this class in static variable
        add_submenu_page($parent_slug, 'Search Listing settings', 'Search Settings', 'manage_options', $parent_slug, array(__CLASS__, 'search_listings_settings'));
        add_submenu_page($parent_slug, 'Search Listing options', 'Search Options', 'manage_options', 'search_listing_options', array(__CLASS__, 'search_listing_options'));
    }

    /**
     * settings page callback
     */

    public function search_listings_settings()
    {
        echo '<h1>Hello from search listing plugin</h1>';
    }

    /**
     * options submenu's calback
     */
    public function search_listing_options()
    {
        echo '<h1>Hello from options</h1>';
    }
}
