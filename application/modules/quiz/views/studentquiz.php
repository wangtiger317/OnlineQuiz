<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quiz Answering Page</h3>
                    </div>

                    <!-- /.box-header -->
                    <div id="question_body" class="box-body" style="padding:30px 0 0">
                        <div>
                            <h4 id="quiz_number_plate" style="margin-left:30px">Page 1 of <?php echo count($questions)?></h4>
                        </div>
                        <div class="form-group has-feedback" style="display: flex">
                            <h4 style="margin-left:30px; margin-right:10px">Code : </h4>
                            <h4 id="code"></h4>
                        </div>
                        <div class="tab-content" style="padding-left:30px">
                            <?php $i = 1?>
                            <?php foreach ($questions as $quiz): ?>
                            <div class="row no-margin tab-pane fade <?php if ($i == 1) echo "in active"?>" style="padding:50px 50px 50px 0" id="question_<?php echo $i++?>">
                                <div class="text-center">
                                    <h1><?php echo $quiz->question?></h1>
                                </div>
                                <div class="col-md-6">
                                    <div class="quiz_answer" id="display_answer1">
                                        <div class="triangle-up-l"></div>
                                    </div>
                                    <div class="quiz_answer" id="display_answer2">
                                        <div class="circle-l"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="quiz_answer" id="display_answer3">
                                        <div class="equilateral-l"></div>
                                    </div>
                                    <div class="quiz_answer" id="display_answer4">
                                        <div class="square-l"></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
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

<script>
    $(document).ready(function () {
        var quiz_code = JSON.parse(localStorage.getItem("quiz_code"));
        $("#code").html(quiz_code);

        var time = [];
        var score_weight = [];
        var score = [];
        var correct_answer_id = [];
        var div_id;
        var total_time = 0;
        var total_score = 0;
        var subject = "<?php echo $questions[0]->subject?>";
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var cur_time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var day = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        <?php $k = 0;?>
        <?php foreach ($questions as $quiz): ?>
        time[<?php echo $k++?>] = <?php echo $quiz->timelimit?>;
        score_weight[<?php echo $k?>] = <?php echo $quiz->score_weight?>;
        correct_answer_id[<?php echo $k?>] = <?php echo $quiz->correct_answer_id?>;
        <?php endforeach; ?>
        for (var k = 0; k <= time.length; k++) {
            if(k === time.length){
                setTimeout(function () {
                    $("#question_body").html(
                        "<div class='text-center'>" +
                        "<h1 style='font-size: 100px; padding:100px'>Time Is Up ! </h1>" +
                        "<h1 style='font-size: 100px; padding-bottom:200px'>Your Score Is " +
                        total_score +
                        "</h1>" +
                        "</div>"
                    );
                    $.ajax({
                        url: '<?php echo base_url();?>user/addabsencedata', // point to server-side PHP script
                        data: {
                            'student_id':<?php echo $this->session->userdata('user_details')[0]->users_id;?>,
                            'subject': subject,
                            'NIM':<?php echo $this->session->userdata('user_details')[0]->NIP;?>,
                            'name':"<?php echo $this->session->userdata('user_details')[0]->name;?>",
                            'gender':"<?php echo $this->session->userdata('user_details')[0]->Gender;?>",
                            'day':day[today.getDay()],
                            'date':date,
                            'attendance_time':cur_time,
                            'score':total_score,
                        },
                        type: 'GET',
                        // dataType: 'json',
                        success: function(e) {
                            // alert("OKKKKKKKKKK");
                        }
                    });
                }, total_time);
            }
            else {
                var time_quiz = time[k] * 1000;
                var j = k + 1;
                div_id = "#question_" + j;
                total_time = total_time + time_quiz;
                setTimeout(function () {
                    $(div_id).siblings().removeClass("in active");
                    $(div_id).fadeIn();
                    $(div_id).addClass("in active");

                    $("#quiz_number_plate").html("Page " + j + " of " + time.length);
                }, total_time);
            }
        }
        function showquiz(div_id){
            $(div_id).siblings().removeClass("in active");
            $(div_id).addClass("in active");
        }
        $(".quiz_answer").on("click", function() {
            var answer_id = this.id;
            var answer_num = answer_id.slice(-1);
            var quiz_id = $(this).parent().parent().attr("id");
            var quiz_num = quiz_id.slice(-1);
            if (answer_num == correct_answer_id[quiz_num]){
                score[quiz_num - 1] = score_weight[quiz_num];
            } else {
                score[quiz_num - 1] = 0;
            }
            quiz_id = "#" + quiz_id;
            $(quiz_id).html(
                "<div class='text-center'>" +
                "<h1 style='padding:100px 0 200px 0'>Please Wait a Next Question...</h1>" +
                "</div>"
            );
            total_score = total_score + score[quiz_num - 1];
        });
    });
</script>
