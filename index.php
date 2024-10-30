<?php

/**
 * Plugin Name: Cron Manager by Duo Leaf
 * Plugin URI: http://DuoLeaf.com/
 * Version: 1.0.1
 * Author: Duo Leaf
 * Author URI: http://duoleaf.com/cron-manager/ 
 * Description: Allows you to manage cron task/jobs easily.
 * License: GPLv3 or later
 */
require_once(WP_PLUGIN_DIR . '/cron-manager-by-duo-leaf/duo-leaf/duoleaf.php');
require_once(WP_PLUGIN_DIR . '/cron-manager-by-duo-leaf/core/plugin-info.php');
require_once(WP_PLUGIN_DIR . '/cron-manager-by-duo-leaf/core/storage.php');
require_once(WP_PLUGIN_DIR . '/cron-manager-by-duo-leaf/core/admin-area.php');


class dl_cm_CronManager {

    /** @var dl_cm_PluginInfo */
    public $pluginInfo;

    /** @var dl_cm_AdminArea */
    public $adminArea;

    /**
     * Constructor
     */
    public function __construct($pluginInfo, $adminArea) {

        $this->pluginInfo = $pluginInfo;

        $this->adminArea = $adminArea;

    }

}

$dl_cm_pluginInfo = new dl_cm_PluginInfo();

$dl_cm_Storage = new dl_cm_Storage($dl_cm_pluginInfo);
$dl_cm_AdminArea = new dl_cm_AdminArea($dl_cm_pluginInfo, $dl_cm_Storage, $_GET, $_POST);



