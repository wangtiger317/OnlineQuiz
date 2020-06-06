<div class="content-wrapper">
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
                    <div class="box-body" style="padding:30px 0 0 30px">
                        <?php $question = $questions[0];?>
                        <div class="row">
                            <div class="col-md-6" style="padding-right:200px; padding-bottom:100px">
                                <div class="form-group has-feedback">
                                    <h4>Question</h4>
                                    <input type="text" name="question" class="form-control" id="question" value="<?php echo $question->question?>">
                                </div>
                                <div style="margin-top:20px">
                                    <h4>Time Limit</h4>
                                    <select id="timelimit" class="form-control" style="width:100%">
                                        <option value="5" <?php if($question->timelimit == 5){?> selected<?php }?>>5 sec</option>
                                        <option value="10" <?php if($question->timelimit == 10){?> selected<?php }?>>10 sec</option>
                                        <option value="15" <?php if($question->timelimit == 15){?> selected<?php }?>>15 sec</option>
                                        <option value="20" <?php if($question->timelimit == 20){?> selected<?php }?>>20 sec</option>
                                        <option value="60" <?php if($question->timelimit == 60){?> selected<?php }?>>60 sec</option>
                                        <option value="120" <?php if($question->timelimit == 120){?> selected<?php }?>>120 sec</option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback" style="margin-top:50px">
                                    <h4>Score of this Qustion(Weight)</h4>
                                    <input type="text" name="score" class="form-control" id="score" value="<?php echo $question->score_weight?>">
                                </div>
                            </div>
                            <div class="col-md-6" style="padding-right:200px">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6"><h4>Cover Image</h4></div>
                                    <div class="col-sm-6 col-md-6" style="float: right">
                                        <input id="sortpicture" type="file" name="sortpic" style="display: none"/>
                                        <button id="upload" class="btn btn-success btn-block">Upload</button>
                                    </div>
                                </div>
                                <div id="quiz_image" class="text-center" style="height:200px; width:100%; border:1px solid lightgrey">
                                    <img src="<?php echo base_url().$question->question_image?>" style="height:100%">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-6" style="margin-right:0">
                                <div class="row no-margin">
                                    <div class="col-md-8 form-group has-feedback" style="padding-left:0">
                                        <h4>Answer 1</h4>
                                        <input type="text" class="form-control" id="answer_1" value="<?php echo $question->answer_1?>">
                                    </div>
                                    <div class="col-md-4" style="display: flex; margin-top:30px">
                                        <input class="check" num="1" id="check_1" type="checkbox" style="margin:15px 10px 0 0" <?php if($question->correct_answer_id == 1) echo "checked"?>>
                                        <h4>correct answer</h4>
                                    </div>
                                </div>
                                <div class="row no-margin">
                                    <div class="col-md-8 form-group has-feedback" style="padding-left:0">
                                        <h4>Answer 2</h4>
                                        <input type="text" class="form-control" id="answer_2" value="<?php echo $question->answer_2?>">
                                    </div>
                                    <div class="col-md-4" style="display: flex; margin-top:30px">
                                        <input class="check" num="2" id="check_2" type="checkbox" style="margin:15px 10px 0 0" <?php if($question->correct_answer_id == 2) echo "checked"?>>
                                        <h4>correct answer</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6" style="margin-right:0">
                                <div class="row no-margin">
                                    <div class="col-md-8 form-group has-feedback" style="padding-left:0">
                                        <h4>Answer 3</h4>
                                        <input type="text" class="form-control" id="answer_3" value="<?php echo $question->answer_3?>">
                                    </div>
                                    <div class="col-md-4" style="display: flex; margin-top:30px">
                                        <input class="check" num="3" id="check_3" type="checkbox" style="margin:15px 10px 0 0" <?php if($question->correct_answer_id == 3) echo "checked"?>>
                                        <h4>correct answer</h4>
                                    </div>
                                </div>
                                <div class="row no-margin">
                                    <div class="col-md-8 form-group has-feedback" style="padding-left:0">
                                        <h4>Answer 4</h4>
                                        <input type="text" class="form-control" id="answer_4" value="<?php echo $question->answer_4?>">
                                    </div>
                                    <div class="col-md-4" style="display: flex; margin-top:30px"">
                                    <input class="check" num="4" id="check_4" type="checkbox" style="margin:15px 10px 0 0" <?php if($question->correct_answer_id == 4) echo "checked"?>>
                                    <h4>correct answer</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button id="save" type="button" class="btn btn-primary" style="margin:15px 15px 15px 0">Save</button>
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
<script>
    $(document).ready(function () {
        var img_real;
        img_real = "<?php echo $question->question_image?>";
        $('#upload').on('click', function() {
            $("#sortpicture").click();

        });
        $("#sortpicture").change(function(){
            var file_data = $('#sortpicture').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                url: '<?php echo base_url();?>quiz/imgupload', // point to server-side PHP script
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(php_script_response){
                    // alert(php_script_response); // display response from the PHP script, if any
                    var script = '<img src="<?php echo base_url()?>' + php_script_response + '" style="height:100%">';
                    img_real = php_script_response;
                    $("#quiz_image").html(script);
                }
            });
        });
        $("#save").on("click", function() {
            var new_title = JSON.parse(localStorage.getItem("new_title"));
            var id = "<?php echo $question->id?>";
            var title = "<?php echo $question->title?>";
            var description = "<?php echo $question->description?>";
            var image = "<?php echo $question->image?>";
            <?php if(!($question->title)) {?>
            title = new_title["title"];
            description = new_title["description"];
            image = new_title["img_real"];
            <?php }?>
            // var question = $("#question").value;
            var question = document.getElementById("question").value;
            var timelimit = document.getElementById("timelimit").value;
            var question_image = img_real;
            var checks = $(".check");
            var correct_id;
            for (var i = 0; i < checks.length; i++){
                if (checks[i].checked === true) correct_id = i + 1;
            }
            var score = document.getElementById("score").value;
            var answer_1 = document.getElementById("answer_1").value;
            var answer_2 = document.getElementById("answer_2").value;
            var answer_3 = document.getElementById("answer_3").value;
            var answer_4 = document.getElementById("answer_4").value;
            var correct_answer = document.getElementById("answer_"+correct_id).value;
            $.ajax({
                url: '<?php echo base_url();?>quiz/editquiz_id', // point to server-side PHP script
                data: {
                    'id': id,
                    'description':description,
                    'image':image,
                    'question':question,
                    'timelimit':timelimit,
                    'question_image':question_image,
                    'score':score,
                    'answer_1':answer_1,
                    'answer_2':answer_2,
                    'answer_3':answer_3,
                    'answer_4':answer_4,
                    'correct_answer':correct_answer,
                    'correct_answer_id':correct_id
                },
                type: 'GET',
                // dataType: 'json',
                success: function(e){
                    // alert("OKKKKKKKKKK");
                }
            });
            <?php if ($question->title) {?>
            window.location.href = "<?php echo base_url()."quiz/EditQuiz?title=".$question->title?>";
            <?php } else {?>
            window.location.href = "<?php echo base_url()."quiz/EditQuiz?title="?>" + title;
            <?php }?>
        });

    });
</script>
