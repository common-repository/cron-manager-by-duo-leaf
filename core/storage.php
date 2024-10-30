<?php

class dl_cm_Storage {

    /** @var dl_ac_PluginInfo */
    public $pluginInfo;

    public function __construct($pluginInfo) {
        $this->pluginInfo = $pluginInfo;
    }

    public function getCrons() {
        return get_option('cron');
    }

    public function deleteCron($id) {
        return wp_clear_scheduled_hook($id);
    }

    public function getSchedules() {
        return wp_get_schedules();
    }

}
