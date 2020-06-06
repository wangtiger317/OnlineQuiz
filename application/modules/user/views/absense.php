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
                        <h3 class="box-title">Student Absence Page</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div style="margin-top:100px; margin-bottom:400px; text-align: center">
                            <h2>Enter Code</h2>
                            <input id="code" class="form-control" style="width:30%; margin:auto; height: 80px">
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
        var subject = '';
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
                subject = e[0]["subject"];
            }
        });

        $("#start").on("click", function() {
            var quiz_code = JSON.parse(localStorage.getItem("quiz_code"));
            var code = document.getElementById("code").value;
            if(code !== quiz_code) {
                alert("Password incorrect ! Please enter the correct password !");
            } else {
                window.location.href = "<?php echo base_url()."quiz/StudentQuiz?title="?>" +  title + "&subject=" + subject;
            }

        });
    });
</script>
