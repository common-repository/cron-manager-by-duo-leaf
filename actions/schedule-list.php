<?php

class dl_cm_ActionScheduleList {

    /** @var dl_cm_PluginInfo */
    public $pluginInfo;

    /** @var dl_cm_Storage */
    public $storage;

    public function __construct($pluginInfo, $storage) {

        $this->pluginInfo = $pluginInfo;
        $this->storage = $storage;
    }

    public function execute() {
        $view = new stdClass();
        $view->pluginInfo = $this->pluginInfo;
        $view->schedules = $this->storage->getSchedules();
        return $view;
    }

}
