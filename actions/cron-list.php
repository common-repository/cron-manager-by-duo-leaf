<?php

class dl_cm_ActionCronList {

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
        $view->crons = $this->storage->getCrons();
        
        
        include_once(WP_PLUGIN_DIR . '/' . $this->pluginInfo->name . '/actions/schedule-list.php');
        include_once(WP_PLUGIN_DIR . '/' . $this->pluginInfo->name . '/views/schedule-list.php');
        $scheduleAction = new dl_cm_ActionScheduleList($this->pluginInfo, $this->storage);
        $scheduleViewData = $scheduleAction->execute();
        $scheduleView = new dl_cm_ViewScheduleList($scheduleViewData);
        $view->scheduleView = $scheduleView;
                
        return $view;
    }

}
