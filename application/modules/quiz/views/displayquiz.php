<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Play Quiz Page</h3>
                    </div>
<!--                    <div class="row">-->
<!--                        <div class="col-sm-6 col-md-6"></div>-->
<!--                        <div class="col-sm-6 col-md-6">-->
<!--                            <ul class="pagination" style="float:right; margin-right:50px">-->
<!--                                --><?php //$j = 1?>
<!--                                --><?php //foreach ($questions as $quiz): ?>
<!--                                <li class="page-item"><a class="page-link" data-toggle="tab" href="#question_--><?php //echo $j?><!--" id="link_--><?php //echo $j?><!--">--><?php //echo $j++?><!--</a></li>-->
<!--                                --><?php //endforeach; ?>
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div id="question_body">
                        <div>
                            <h4 id="quiz_number_plate" style="float:right; margin-right:50px">Page 1 of <?php echo count($questions)?></h4>
                        </div>
                        <div class="tab-content">
                            <?php $i = 1?>
                            <?php foreach ($questions as $quiz): ?>
                            <div class="box-body text-center tab-pane fade <?php if ($i == 1) echo "in active"?>" style="padding:30px 0 0 30px;" id="question_<?php echo $i++?>">
                                <div class="form-group has-feedback">
                                    <h1><?php echo $quiz->question?></h1>
                                    <div id="quiz_image" class="text-center" style="height:200px; width:30%; border:1px solid lightgrey; margin:auto">
                                        <img src="<?php echo base_url().$quiz->question_image?>" style="height:100%">
                                    </div>
                                </div>
                                <div class="row no-margin" style="padding:50px">
                                    <div class="col-md-6">
                                        <div class="display_answer" id="display_answer1">
                                            <div class="triangle-up"></div>
                                            <div class="answer_name"><?php echo $quiz->answer_1?></div>
                                        </div>
                                        <div class="display_answer" id="display_answer2">
                                            <div class="circle"></div>
                                            <div class="answer_name"><?php echo $quiz->answer_2?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="display_answer" id="display_answer3">
                                            <div class="equilateral"></div>
                                            <div class="answer_name"><?php echo $quiz->answer_3?></div>
                                        </div>
                                        <div class="display_answer" id="display_answer4">
                                            <div class="square"></div>
                                            <div class="answer_name"><?php echo $quiz->answer_4?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
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
        //var quiz_image = JSON.parse(localStorage.getItem("quiz_image"));
        //var quiz_code = JSON.parse(localStorage.getItem("quiz_code"));
        //
        //var script = '<img src="<?php //echo base_url();?>//' + quiz_image + '" style="height:100%">';
        //$("#quiz_image").html(script);
        var time = [];
        var div_id;
        var total_time = 0;
        <?php $k = 0;?>
        <?php foreach ($questions as $quiz): ?>
            time[<?php echo $k++?>] = <?php echo $quiz->timelimit?>;
        <?php endforeach; ?>
        for (var k = 0; k <= time.length; k++) {
            if(k === time.length){
                setTimeout(function () {
                    $("#question_body").html(
                        "<div class='text-center'>" +
                        "<h1 style='font-size: 100px; padding:200px'>Time Is Up ! </h1>" +
                        "</div>"
                    );
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
    });
</script>

