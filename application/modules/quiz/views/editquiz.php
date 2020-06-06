<div class="content-wrapper" style="color:black">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quiz Making Page</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body" style="padding:30px">
                        <?php $question = $questions[0];?>
                        <div class="row no-margin" style="border-bottom: 2px solid #00c0ef">
                            <div class="col-md-6" style="display: flex">
                                <img src="<?php echo base_url().$question->image?>" style="width:80px; height:80px; border:1px solid dodgerblue" id="new_quiz_img">
                                <div style="margin-left:10px">
                                    <h4><b id="new_quiz_title"><?php echo $question->title?></b></h4>
                                    <h5 id="new_quiz_description"><?php echo $question->description?></h5>
                                    <h5 id="new_quiz_subject"><?php echo $this->session->userdata('user_details')[0]->subject;?></h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button id="title_edit" type="button" class="btn" style="width:50px; height:50px; border-radius:50%; background-color:#66CCCC; float: right; color:black">Edit</button>
                            </div>
                        </div>
                        <?php $i = 1;?>
                        <?php foreach ($questions as $quiz): ?>
                        <div class="row" data-item-id="<?php echo $quiz->id ?>" style="border:1px solid #00c0ef; margin:30px 0 0 0; background-color: lightgray; width:100%; padding:10px;">
                            <div class="col-md-6" style="display: flex">
                                <div style="width:80px; height: 70px; background-color: darkgray; text-align: center;"><h1 style="margin:auto; padding-top:15px"><?php echo $i++?></h1></div>
                                <div style="margin-left:20px"><h4><?php echo $quiz->question?></h4></div>
                            </div>
                            <div class="col-md-3">
                                <h5>Time Limit</h5>
                                <select class="form-control" style="height: 30px; width:50%">
                                    <option value="5" <?php if($quiz->timelimit == 5){?> selected<?php }?>>5 sec</option>
                                    <option value="10" <?php if($quiz->timelimit == 10){?> selected<?php }?>>10 sec</option>
                                    <option value="15" <?php if($quiz->timelimit == 15){?> selected<?php }?>>15 sec</option>
                                    <option value="20" <?php if($quiz->timelimit == 20){?> selected<?php }?>>20 sec</option>
                                    <option value="60" <?php if($quiz->timelimit == 60){?> selected<?php }?>>60 sec</option>
                                    <option value="120" <?php if($quiz->timelimit == 120){?> selected<?php }?>>120 sec</option>
                                </select>
                            </div>
                            <div class="col-md-3 text-center" style="padding:20px">
                                <a href="#" class="on-default edit-row btn btn-warning" style="padding:7px; color:white">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="on-default remove-row btn btn-danger" style="padding:7px 8px 7px 8px; color:white">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>


                        <div class="text-center" style="margin-top: 30px">
                            <button id="add_answer" type="button" class="btn" style="width:50px; height:50px; border-radius:50%; background-color:dodgerblue;"><p style="font-size:30px">+</p></button><br>
                            <h4>Add Question</h4>
                        </div>
                        <div class="text-center">
                            <button id="save" type="button" class="btn btn-primary" style="margin:15px">Save</button>
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

<script>
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
        var new_title = JSON.parse(localStorage.getItem("new_title"));
        var is_set = JSON.parse(localStorage.getItem("is_set"));
        if(is_set) {
            $("#new_quiz_img").attr("src", new_title["img"]);
            $("#new_quiz_title").html(new_title["title"]);
            $("#new_quiz_description").html(new_title["description"]);
            $("#new_quiz_subject").html("<?php echo $this->session->userdata('user_details')[0]->subject;?>");
            // $("#new_quiz_subject").html(new_title["subject"]);
        }
        $("#save").on("click", function() {
            localStorage.setItem("is_set", JSON.stringify(false));
            window.location.href = "<?php echo base_url()."quiz/TeacherQuiz"?>";
        });
        $("#title_edit").on("click", function() {
            var title = "<?php echo $question->title?>";
            <?php if ($question->title) {?>
                window.location.href = "<?php echo base_url()."quiz/MakeQuiz?title="?>" + title;
            <?php } else {?>
                window.location.href = "<?php echo base_url()."quiz/MakeQuiz"?>";
            <?php }?>
        });
        $("#add_answer").on("click", function() {
            var title = "<?php echo $question->title?>";
            <?php if(!($question->title)) {?>
            title = new_title["title"];
            <?php }?>
            window.location.href = "<?php echo base_url()."quiz/MakeAnswer?title="?>" + title;
        });

        $("a.edit-row").on("click", function() {
            var quiz_id = $(this).parent().parent().attr("data-item-id");
            window.location.href = "<?php echo base_url()."quiz/EditAnswer?id="?>"+quiz_id;
        });

        $("a.remove-row").on("click", function() {
            modal.style.display = "block";
            current_row = $(this);
        });

        $("#dialogConfirm").on("click", function () {
            var quiz_id = current_row.parent().parent().attr("data-item-id");
            var title = "<?php echo $questions[0]->title?>";
            var description = "<?php echo $questions[0]->description?>";
            var img = "<?php echo base_url().$questions[0]->image?>";
            var img_real = "<?php echo $questions[0]->image?>";
            var subject = "<?php echo $questions[0]->subject?>";
            //window.location.href = "<?php //echo base_url()."quiz/DeleteQuiz?title="?>//"+title;
            $.ajax({
                url: '<?php echo base_url();?>quiz/removerow', // point to server-side PHP script
                data: {
                    'id':quiz_id
                },
                type: 'GET',
                // dataType: 'json',
                success: function(e){
                    modal.style.display = "none";
                    var new_title = {title:title, description:description, img:img, img_real:img_real, subject:subject};
                    localStorage.setItem("new_title", JSON.stringify(new_title));
                    localStorage.setItem("is_set", JSON.stringify(true));
                    window.location.href = "<?php echo base_url()."quiz/EditQuiz?title="?>"+title;
                }
            });
        });
        $("#dialogCancel").on("click", function () {
            modal.style.display = "none";
        });
    });
</script>
