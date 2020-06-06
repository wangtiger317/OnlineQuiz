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
                        <h3 class="box-title">Teacher Quiz Page</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="text-center">
                            <a href="<?php echo base_url();?>quiz/MakeQuiz">
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-warning btn-lg" style="height: 50px; margin: auto; width:30%;">Make A Quiz</button>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table" id="TeacherQuizTable">
                                    <thead>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; $prev_title = array()?>
                                    <?php foreach ($all_quiz as $quiz): ?>
                                        <?php if (!in_array($quiz->title, $prev_title)) {?>
                                        <tr data-item-id="<?php echo $quiz->id ?>">
                                            <td><?php echo $i++; ?></td>
                                            <td>
                                                <img src="<?php echo base_url().$quiz->image?>" style="height:50px; width:auto">
                                            </td>
                                            <td><?php echo $quiz->title?><?php array_push($prev_title, $quiz->title);?></td>
                                            <td><?php echo $quiz->description; ?></td>
                                            <td class="actions">
                                                <a href="#" class="hidden on-editing save-row btn btn-warning" style="padding:7px 9px 7px 8px; color:white">
                                                    <i class="fa fa-save"></i>
                                                </a>
                                                <a href="#" class="hidden on-editing cancel-row btn btn-danger" style="padding:7px 8px 7px 8px; color:white">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <a class="on-default play-row btn btn-success" style="padding:7px; color:white">
                                                    <i class="fa fa-youtube-play"></i>
                                                </a>
                                                <a class="on-default edit-row btn btn-warning" style="padding:7px; color:white">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#" class="on-default remove-row btn btn-danger" style="padding:7px 8px 7px 8px; color:white">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
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

<div id="dialog" class="modal" style="padding:300px">
    <div class="modal-content">
        <header class="modal-header">
            <h2 class="modal-title">Are you sure?</h2>
        </header>
        <div class="modal-body">
            <div class="modal-wrapper">
                <div class="modal-text">
                    <p>Are you sure that you want to delete this row?</p>
                </div>
            </div>
        </div>
        <footer class="modal-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button id="dialogConfirm" class="btn btn-primary">Confirm</button>
                    <button id="dialogCancel" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </footer>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var current_row;
        // Get the modal
        var modal = document.getElementById("dialog");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        };

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };

        var table = $('#TeacherQuizTable').DataTable({});
        localStorage.setItem("is_set", JSON.stringify(false));
        $("a.play-row").on("click", function() {
            var quiz_id = $(this).parent().parent().attr("data-item-id");
            localStorage.setItem("quiz_id", JSON.stringify(quiz_id));
            window.location.href = "<?php echo base_url()."quiz/ShowQuizcode"?>";
        });
        $("a.edit-row").on("click", function() {
            var quiz_id = $(this).parent().parent().attr("data-item-id");
            var title = $(this).parent().siblings().eq(2).html();
            window.location.href = "<?php echo base_url()."quiz/EditQuiz?title="?>"+title;
        });
        $("a.remove-row").on("click", function() {
            modal.style.display = "block";
            current_row = $(this);
        });
        $("#dialogConfirm").on("click", function () {
            var quiz_id = current_row.parent().parent().attr("data-item-id");
            var title = current_row.parent().siblings().eq(2).html();
            //window.location.href = "<?php //echo base_url()."quiz/DeleteQuiz?title="?>//"+title;
            $.ajax({
                url: '<?php echo base_url();?>quiz/removetitle', // point to server-side PHP script
                data: {
                    'title':title
                },
                type: 'GET',
                // dataType: 'json',
                success: function(e){
                    modal.style.display = "none";
                    window.location.href = "<?php echo base_url()."quiz/TeacherQuiz"?>";
                }
            });
        });
        $("#dialogCancel").on("click", function () {
            modal.style.display = "none";
        });

    })
</script>