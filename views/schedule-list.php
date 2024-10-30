<?php

class dl_cm_ViewScheduleList {

    public $view;

    public function __construct($view) {
        $this->view = $view;
    }

    public function execute() {
        ?>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-time"></span> Intervals
            </div> 
            <div class="panel-body">
                <?php if (Count($this->view->schedules) != 0) { ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Interval<br />(seconds)</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($this->view->schedules as $scheduleKey => $schedule) { ?>

                                <tr>
                                    <td><?php echo $schedule['display']; ?></td>
                                    <td><?php echo $schedule['interval']; ?></td>
                                </tr>

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

        <?php
    }

}
