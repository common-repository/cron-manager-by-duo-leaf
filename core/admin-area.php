<?php

class dl_cm_AdminArea {

    /** @var dl_cm_PluginInfo */
    public $pluginInfo;

    /** @var dl_cm_Storage */
    public $storage;

    /** @var array */
    public $get;

    /** @var array */
    public $post;

    public function __construct($pluginInfo, $storage, $get, $post) {

        $this->pluginInfo = $pluginInfo;
        $this->storage = $storage;
        $this->get = $get;
        $this->post = $post;

        // Hooks
        add_action('admin_menu', array(&$this, 'adminPanelsAndMetaBoxes'));
    }

    function adminPanelsAndMetaBoxes() {

        add_submenu_page('duo-leaf', $this->pluginInfo->smallDisplayName, $this->pluginInfo->smallDisplayName, 'manage_options', $this->pluginInfo->name, array(&$this, 'adminPanel'));
        add_action('admin_enqueue_scripts', array(&$this, 'adminEnqueueScripts'));
    }

    public function adminPanel() {

        $this->adminRegisterScripts();

        $viewData = new stdClass();

            if (isset($_GET['action']) && $_GET['action'] == 'delete-cron') {
                $this->storage->deleteCron($this->get['cronID']);
            }
        
        
        include_once(WP_PLUGIN_DIR . '/' . $this->pluginInfo->name . '/actions/cron-list.php');
        include_once(WP_PLUGIN_DIR . '/' . $this->pluginInfo->name . '/views/cron-list.php');
        $action = new dl_cm_ActionCronList($this->pluginInfo, $this->storage);
        $viewData = $action->execute();
        $view = new dl_cm_ViewCronList($viewData);
        $view->execute();
    }

    public function adminEnqueueScripts() {
        wp_register_script('dl_cm_bootstrap', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/js/bootstrap.min.js', array('jquery'), NULL);
        wp_register_script('dl_cm_bootstrapToggle', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/js/bootstrap-toggle.min.js', array('jquery'), NULL);
        wp_register_script('dl_cm_customJS', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/js/custom.js', array('jquery'), NULL);


        wp_enqueue_style('dl_cm_css_custom', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/css/custom.css', array(), null, 'all');
        wp_enqueue_style('dl_cm_css_bootstrap', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/css/bootstrap-iso.css', array(), null, 'all');
        wp_enqueue_style('dl_cm_css_bootstrap_theme', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/css/bootstrap-theme.css', array(), null, 'all');
        wp_enqueue_style('dl_cm_css_bootstrap_toggle', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/css/bootstrap-toggle.min.css', array(), null, 'all');
    }

    public function adminRegisterScripts() {
        wp_enqueue_script('dl_cm_customJS');
        wp_enqueue_script('dl_cm_bootstrap');
        wp_enqueue_script('dl_cm_bootstrapToggle');


        wp_enqueue_script('dl_cm_css_custom');
        wp_enqueue_script('dl_cm_css_bootstrap');
        wp_enqueue_script('dl_cm_css_bootstrap_theme');
        wp_enqueue_script('dl_cm_css_bootstrap_toggle');
    }

}
