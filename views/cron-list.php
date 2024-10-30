<?php

class dl_cm_ViewCronList {

    public $view;

    public function __construct($view) {
        $this->view = $view;
    }

    public function execute() {
        ?>
        <div class="bootstrap-iso">
            <h2><?php echo $this->view->pluginInfo->displayName; ?></h2>
            <hr />
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-refresh"></span> List of Cron Jobs
                        </div> 
                        <div class="panel-body">
                            <?php if (Count($this->view->crons) != 0) { ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Args</th>
                                            <th>Next execution</th>
                                            <th class="col-xs-1">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($this->view->crons as $cronSchedule) { ?>
                                            <?php if (is_array($cronSchedule)) { ?>
                                                <?php foreach ($cronSchedule as $cronName => $cron) { ?>
                                                    <?php foreach ($cron as $cronArgs) { ?>
                                                        <tr>
                                                            <td><?php echo $cronName; ?></td>
                                                            <td><?php echo $cronArgs['schedule']; ?></td>
                                                            <td>
                                                                <?php
                                                                if (count($cronArgs['args']) > 0) {
                                                                    foreach ($cronArgs['args'] as $arg) {
                                                                        echo $arg;
                                                                    }
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo date(get_option('date_format') . ' ' . get_option('time_format'), wp_next_scheduled($cronName)); ?>

                                                            </td>
                                                            <td>
                                                                <button class="btn btn-default btn-xs" data-href="?page=<?php echo $this->view->pluginInfo->name ?>&action=delete-cron&cronID=<?php echo $cronName; ?>" data-toggle="modal" data-target="#confirm-delete">
                                                                    <span class="glyphicon glyphicon-trash"></span>
                                                                    Delete
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>




                                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <strong>Confirmation</strong>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-danger btn-ok">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else { ?>
                                <p>Ready to start? Click in  <a href="?page=<?php echo $this->view->pluginInfo->name ?>&action=cron-form" >Add new</a> to add your first css or javascript.</javascriptp>
                                <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <?php $this->view->scheduleView->execute(); ?>
                </div>
                <?php include 'panel.php'; ?>

            </div>
        </div>
        <?php
    }

}
