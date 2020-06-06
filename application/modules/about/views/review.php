<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <?php $setting = setting_all();?>

    <link rel="icon" href="<?php echo base_url((setting_all('favicon'))?'assets/images/'.setting_all('favicon'):'assets/images/favicon.ico');?>">
    <title><?php echo (setting_all('website'))?setting_all('website'):'Dasboard';?></title>

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css'); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-black-light.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-black-light.css');?>">
    <!--  <link rel="stylesheet" href="<?php echo base_url('assets/css/blue.css');?>">-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/buttons.dataTables.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/daterangepicker.css'); ?>" />
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 m-t-25">
            <div class="panel panel-default">
                <div class="panel-body row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8 row">
                        <h1 class="m-t-25"style="text-align: center; color: purple">Tell us what you think</h1>
                        <h2 class="m-t-25" style="text-align: center">Thanks for your business! How would you rate your experiences?</h2>
                        <div class="m-t-25"></div>
                        <div class="m-t-25"></div>
                        <div class="row">
                            <div class="m-t-25 col-sm-1"></div>
                            <div class="m-t-25 col-sm-10">
                                <button class="btn btn-success" id="recommendButton" style="width: 100%; height: 80px"><h2>Good, I'd recommend it</h2></button>
                                <button href="" class="btn" data-toggle="modal" data-target="#badRecommend" style="width: 100%; height: 80px; margin-top: 20px; margin-bottom: 60px"><h2>BAD, I wouldn't recommend it</h2></button>
                                <div class="modal fade"  id="badRecommend" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content"style="border-radius: 7px">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">To Admin </h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form" action="#" method="post">
                                                    <div class="form-group">
                                                        <textarea id="reviewContent" placeholder="Please leave a review here..." name="customer_review" cols="91", rows="5"></textarea>
                                                    </div>
                                                    <div class="form-group" align="right">
                                                        <input type="hidden" id="customerID" name="customer_id" value="<?php echo $customer_id?>" class="btn btn-primary" align="right">
                                                    </div>
                                                    <div class="form-group" align="right">
                                                        <input type="submit" id="sendReview" class="btn btn-primary" align="right">
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="m-t-25 col-sm-1"></div>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>

            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/skins/_all-skins.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/blue.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"><\/script>')</script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="<?php echo base_url('assets/js/jquery.form-validator.min.js');?>"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);

</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/js/icheck.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/js/demo.js');?>"></script>
<script src="<?php echo base_url('assets/js/custom.js');?>"></script>
<script
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet"
      href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script>
    document.getElementById("recommendButton").onclick = function () {
        location.href = "https://www.google.com/maps/place/Advanced+Dentistry/@32.9966429,-96.9686208,17z/data=!4m7!3m6!1s0x864c2f271b66a0b1:0xfe406014e7da7fa6!8m2!3d32.9966429!4d-96.9664321!9m1!1b1";
    };
    document.getElementById("sendReview").onclick = function () {
        //console.log($("#reviewContent").val());
        //console.log($("#customerID").val());
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>'+'about/send_reviews',
            data:{
                'content': $("#reviewContent").val(),
                'customer_id':$("#customerID").val()
            },
            success:function (data) {
                console.log(data);
                toastr.options = {
                    "positionClass" : "toast-top-center",
                    "closeButton" : false,
                    "debug" : false,
                    "newestOnTop" : false,
                    "progressBar" : false,
                    "preventDuplicates" : false,
                    "onclick" : null,
                    "showDuration" : "300",
                    "hideDuration" : "1000",
                    "timeOut" : "5000",
                    "extendedTimeOut" : "1000",
                    "showEasing" : "swing",
                    "hideEasing" : "linear",
                    "showMethod" : "fadeIn",
                    "hideMethod" : "fadeOut"
                }
                Command: toastr["success"]
                ("I'm in the top-center!")
            },
            error(xhr, error, thrown){
                console.log(error)
            }
        });
    };
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>