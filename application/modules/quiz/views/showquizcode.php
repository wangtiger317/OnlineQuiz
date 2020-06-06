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

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div style="margin-top:100px; margin-bottom:400px; text-align: center">
                            <h2>Quiz Code</h2>
                            <input id="quizcode" class="form-control" style="width:30%; margin:auto; height: 80px">
                            <button type="button" id="start" class="mb-xs mt-xs mr-xs btn btn-warning btn-lg" style="height: 50px; margin: auto; width:10%;">Start</button>
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
        var quiz_id = JSON.parse(localStorage.getItem("quiz_id"));
        var title = '';
        var description = '';
        var image = '';
        $.ajax({
            url: '<?php echo base_url();?>quiz/getquiz', // point to server-side PHP script
            data: {'quiz_id':quiz_id},
            type: 'GET',
            // dataType: 'json',
            success: function(e){
                e = JSON.parse(e);
                var quiz_code = e[0]["quiz_code"];
                var quiz_image = e[0]["question_image"];
                title = e[0]["title"];
                description = e[0]["description"];
                image = e[0]["image"];
                localStorage.setItem("quiz_image", JSON.stringify(quiz_image));
                // $("#quizcode").val(quiz_code);
                var code = makeid(10);
                $("#quizcode").val(code);
            }
        });
        $("#start").on("click", function() {
            var quiz_code = document.getElementById("quizcode").value;
            localStorage.setItem("quiz_code", JSON.stringify(quiz_code));
            $.ajax({
                url: '<?php echo base_url();?>quiz/updatequizcode', // point to server-side PHP script
                data: {
                    'quiz_id': quiz_id,
                    'title': title,
                    'description': description,
                    'image': image,
                    'quiz_code': quiz_code
                },
                type: 'GET',
                // dataType: 'json',
                success: function(e){
                }
            });
            window.location.href = "<?php echo base_url()."quiz/DisplayQuiz?title="?>" + title;
        });
        function makeid(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }
    });
</script>
