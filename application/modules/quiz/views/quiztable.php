<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <!--        --><?php //if ($this->session->flashdata("messagePr")) { ?>
        <!--            <div class="alert alert-info">-->
        <!--                --><?php //echo $this->session->flashdata("messagePr") ?>
        <!--            </div>-->
        <!--        --><?php //} ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quiz Data Page</h3>
                        <div class="box-tools">
                            <!--                            --><?php //if (CheckPermission("users", "own_create")) { ?>
                            <!--                                <button type="button" class="btn-sm  btn btn-success modalButtonUser"-->
                            <!--                                        data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Add User-->
                            <!--                                </button>-->
                            <!--                            --><?php //}
                            //                            if (setting_all('email_invitation') == 1) { ?>
                            <!--                                <button type="button" class="btn-sm  btn btn-success InviteUser" data-toggle="modal"><i-->
                            <!--                                            class="glyphicon glyphicon-plus"></i> Invite People-->
                            <!--                                </button>-->
                            <!--                            --><?php //} ?>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div>
                            <select id="subject" class="form-control" style="width:200px">
                                <option value="All">All</option>
                                <?php foreach ($subjects as $subject): ?>
                                    <option value="<?php echo $subject->subject?>"><?php echo $subject->subject?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

                                <table class="table" id="QuizTable">
                                    <thead>
                                    <th>No</th>
                                    <th>Quiz Code</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                    <th>Subject</th>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; $prev_title = array()?>
                                    <?php foreach ($all_quiz as $quiz): ?>
                                        <?php if (!in_array($quiz->title, $prev_title)) {?>
                                        <tr data-item-id="<?php echo $quiz->id ?>">
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $quiz->quiz_code ?></td>
                                            <td><?php echo $quiz->title; ?><?php array_push($prev_title, $quiz->title);?></td>
                                            <td class="actions">
                                                <a href="#" class="hidden on-editing save-row btn btn-warning" style="padding:7px 9px 7px 8px; color:white">
                                                    <i class="fa fa-save"></i>
                                                </a>
                                                <a href="#" class="hidden on-editing cancel-row btn btn-danger" style="padding:7px 8px 7px 8px; color:white">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <a href="#" class="on-default edit-row btn btn-warning" style="padding:7px; color:white">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#" class="on-default remove-row btn btn-danger" style="padding:7px 8px 7px 8px; color:white">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                            <td><?php echo $quiz->subject_id; ?></td>
                                        </tr>
                                    <?php }?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- Modal Crud Start-->
<div id="dialog" class="modal-block mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Are you sure?</h2>
        </header>
        <div class="card-body">
            <div class="modal-wrapper">
                <div class="modal-text">
                    <p>Are you sure that you want to delete this row?</p>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button id="dialogConfirm" class="btn btn-primary">Confirm</button>
                    <button id="dialogCancel" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </footer>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var table = $("#QuizTable");
        $("#subject").change(function() {
            var id = this.selectedIndex;
            if (id) table.DataTable().columns(4).search(id).draw();
            else table.DataTable().columns(4).search("").draw();
        });
    })
</script>