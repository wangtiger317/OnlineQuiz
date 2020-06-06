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
                        <?php if ($this->session->userdata('user_details')[0]->user_type == 'Teacher'){?>
                            <h3 class="box-title">Student Data Page</h3>
                        <?php } else {?>
                            <h3 class="box-title">Absence Data Page</h3>
                        <?php }?>
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
                            <div class="col-md-4">
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-danger btn-lg btn-block" id="excel">Excel</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-warning btn-lg btn-block" id="pdf">PDF</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-error btn-lg btn-block" id="print">Print</button>
                            </div>
                        </div>
                        <div>
                            <select id="subject" class="form-control" style="width:200px">
                                <option value="All">All</option>
                                <?php foreach ($subjects as $review): ?>
                                    <option value="<?php echo $review->subject?>"><?php echo $review->subject?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

                                <table class="table" id="AbsenseTable">
                                    <thead>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Day</th>
                                    <th>Date</th>
                                    <th>Attendance Time</th>
                                    <th>Score</th>
                                    <th>Subject</th>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($students as $review): ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $review->NIM ?></td>
                                            <td><?php echo $review->name; ?></td>
                                            <td><?php echo $review->gender; ?></td>
                                            <td><?php echo $review->day; ?></td>
                                            <td><?php echo $review->date; ?></td>
                                            <td><?php echo $review->attendance_time; ?></td>
                                            <td><?php echo $review->score; ?></td>
                                            <td><?php echo $review->subject_id; ?></td>
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
<!-- Modal Crud Start-->
<div class="modal fade" id="nameModal_user" role="dialog">
    <div class="modal-dialog">
        <div class="box box-primary popup">
            <div class="box-header with-border formsize">
                <h3 class="box-title">User Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <!-- /.box-header -->
            <div class="modal-body" style="padding: 0px 0px 0px 0px;"></div>
        </div>
    </div>
</div><!--End Modal Crud -->

<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#AbsenseTable').DataTable({
            dom: 'lfBrtip',
            buttons: [
                // 'excel', 'pdf', 'print'
                {
                    extend: 'excel',
                    className: 'hidden',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
                    },
                },
                {
                    extend: 'pdf',
                    className: 'hidden',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
                    },
                },
                {
                    extend: 'print',
                    className: 'hidden',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
                    },
                }
            ],
            "columnDefs": [
                {
                    "targets": [ 8 ],
                    "visible": false,
                }
            ]
        });
        $("#subject").change(function() {
            var id = this.selectedIndex;
            if (id) table.columns(8).search(id).draw();
            else table.columns(8).search("").draw();
        });
        // var table = $('#TeacherTable').DataTable({});
        $('#excel').on('click', function() {
            table.buttons(0, 0).trigger();
        });
        $('#pdf').on('click', function() {
            table.buttons(0, 1).trigger();
        });
        $('#print').on('click', function() {
            table.buttons(0, 2).trigger();
        });

    })
</script>