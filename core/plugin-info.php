<?php

class dl_cm_PluginInfo {

    /**
     * Properties
     */
    public $name;
    public $displayName;
    public $smallDisplayName;
    public $currentVersion;

    /**
     * Constructor
     */
    public function __construct() {

        $this->name = "cron-manager-by-duo-leaf";
        $this->smallDisplayName = "Cron Manager";
        $this->displayName = $this->smallDisplayName . " by Duo Leaf";

        $this->currentVersion = '1.0.0';
    }

}
