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
                        <h3 class="box-title">Halaman Data Teacher</h3>
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
                        <div class="row">
<!--                            <div class="col-md-6 col-md-offset-3">-->
<!--                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block" id="tambah_data">Tambah Data</button>-->
<!--                            </div>-->
                            <div class="col-md-3">
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block" id="tambah_data">Tambah Data</button>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-danger btn-lg btn-block" id="excel">Excel</button>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-warning btn-lg btn-block" id="pdf">PDF</button>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-error btn-lg btn-block" id="print">Print</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

                                <table class="table" id="TeacherTable">
                                    <thead>
                                    <th style="width:10%">No</th>
                                    <th style="width:10%">NIP</th>
                                    <th style="width:20%">Name</th>
                                    <th style="width:20%">Email</th>
                                    <th style="width:10%">Subject</th>
                                    <th style="width:20%">Action</th>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($all_users as $review): ?>
                                        <tr data-item-id="<?php echo $review->users_id ?>">
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $review->NIP ?></td>
                                            <td><?php echo $review->name; ?></td>
                                            <td><?php echo $review->email; ?></td>
                                            <td><?php echo $review->subject; ?></td>
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
                                        </tr>
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
        // var table = $('#TeacherTable').DataTable({});
        $('#excel').on('click', function() {
            $('#TeacherTable').DataTable().buttons(0, 0).trigger();
        });
        $('#pdf').on('click', function() {
            $('#TeacherTable').DataTable().buttons(0, 1).trigger();
        });
        $('#print').on('click', function() {
            $('#TeacherTable').DataTable().buttons(0, 2).trigger();
        });
    })
</script>