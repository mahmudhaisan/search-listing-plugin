<?php

/**
 * Plugin Name: Search Listing
 * Plugin URI: https://github.com/mahmudhaisan
 * Description: Add search functionality with live results
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Mahmud Haisan
 * Author URI: https://github.com/mahmudhaisan
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://example.com/my-plugin/
 * Text Domain: sl493
 * Domain Path: /languages
 */


if (!defined('ABSPATH')) {
    die();
}


if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Admin\AdminMenu;
use Inc\Admin\Enqueue;

class SearchListing
{

    /**
     * ititialize construct
     */
    public $plugin;
    public function __construct()
    {
        $this->plugin = plugin_basename(__FILE__);
        add_action('admin_menu', array($this, 'menu_pages'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        //additional link beside default plugins link
        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_page'));
    }


    public function settings_page($link)
    {
        $settings_url = '<a href="admin.php?page=search_listing"> Settings</a>';
        array_push($link, $settings_url);
        return $link;
    }


    /**
     * menu pages from admin-menu-class 
     */

    public function menu_pages()
    {
        // require_once(plugin_dir_path(__FILE__) . 'includes/admin/admin-menu-class.php');
        AdminMenu::search_listing_menu();
    }


    public function enqueue()
    {
        // require_once(plugin_dir_path(__FILE__) . 'includes/admin/enqueue-class.php');
        Enqueue::enqueue_scripts();
    }
}


$searchListing = new SearchListing;
