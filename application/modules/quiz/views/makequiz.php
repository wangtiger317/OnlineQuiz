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
                    <div class="box-body" style="width:50%; padding:30px 0 0 30px">
                        <?php $question = $questions[0];?>
                        <div class="form-group has-feedback">
                            <h4>Title</h4>
                            <input type="text" name="quiz_title" class="form-control" id="quiz_title" value="<?php echo $question->title?>">
                        </div>
                        <div class="form-group has-feedback">
                            <h4>Description</h4>
                            <textarea id="quiz_description" rows="4" style="width:100%"><?php echo $question->description?></textarea>
                        </div>
                        <div class="form-group has-feedback row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6"><h4>Cover Image</h4></div>
                                    <div class="col-md-6" style="float: right">
                                        <input id="sortpicture" type="file" name="sortpic" style="display: none"/>
                                        <button id="upload" class="btn btn-success btn-block">Upload</button>
                                    </div>
                                </div>
                                <div id="quiz_image" class="text-center" style="height:200px; width:100%; border:1px solid lightgrey">
                                    <?php if ($question) {?>
                                    <img src="<?php echo base_url().$question->image?>" style="height:100%">
                                    <?php }?>
                                </div>

                                <div style="margin-top:20px">
                                    <h4>Visible to</h4>
                                    <select id="subject" class="form-control" style="width:200px" disabled>
                                        <?php foreach ($subjects as $review): ?>
                                            <option value="<?php echo $review->subject?>" <?php if($this->session->userdata('user_details')[0]->subject == $review->subject) echo "selected"?>><?php echo $review->subject?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button id="save" type="button" class="btn btn-primary" style="margin-top:20px; margin-bottom:20px">Save</button>
                            </div>
                            <div class="col-md-6"></div>
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
        var img_script;
        var img_real;
        img_script = "<?php echo base_url().$question->image?>";
        var is_set = JSON.parse(localStorage.getItem("is_set"));
        if(localStorage.getItem("new_title") && is_set){
            var new_title = JSON.parse(localStorage.getItem("new_title"));
            $("#quiz_title").val(new_title["title"]);
            $("#quiz_description").val(new_title["description"]);
            var script = '<img src="' + new_title["img"] + '" style="height:100%">';
            $("#quiz_image").html(script);
            img_script = new_title["img"];
        }

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
                    $("#quiz_image").html(script);
                    img_script = "<?php echo base_url()?>" + php_script_response;
                    img_real = php_script_response;
                }
            });
        });
        $("#save").on("click", function() {
            var title = document.getElementById("quiz_title").value;
            var description = document.getElementById("quiz_description").value;
            var img = img_script;
            var subject = document.getElementById("subject").value;
            var new_title = {title:title, description:description, img:img, img_real:img_real, subject:subject};
            localStorage.setItem("new_title", JSON.stringify(new_title));
            localStorage.setItem("is_set", JSON.stringify(true));
            <?php if ($question->title) {?>
                window.location.href = "<?php echo base_url()."quiz/EditQuiz?title="?>" + title;
            <?php } else {?>
                window.location.href = "<?php echo base_url()."quiz/EditQuiz"?>";
            <?php }?>
        });
    });
</script>
