<body class="hold-transition login-page" style="background-image: url('<?php echo base_url().'assets/images/background.jpg'; ?>'); background-size: cover">
<!--    <div style="border-bottom:2px solid #00c0ef; padding-top:10px;background: #ECF1FA">-->
<!--        <div style="margin-left:30px">-->
<!--            <a href="--><?php //echo base_url(); ?><!--" class="logo">-->
<!--                --><?php //$logo =  (setting_all('logo'))?setting_all('logo'):'logo.png'; ?>
<!--                <img src="--><?php //echo base_url().'assets/images/'.$logo; ?><!--" id="logo" style="width:169px; height:auto">-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
    <header>
        <div class="row" style="border-bottom:2px solid #00c0ef; margin:0;background: #ECF1FA;">
            <div class="col-md-8" style="margin-top: 10px">
                <a href="<?php echo base_url(); ?>" class="logo" style="margin-left: 20px">
                    <?php $logo =  (setting_all('logo'))?setting_all('logo'):'logo.png'; ?>
                    <img src="<?php echo base_url().'assets/images/'.$logo; ?>" id="logo" style="width:169px; height:auto">
                </a>
            </div>
            <div class="col-md-4">

            </div>
        </div>


    </header>
    <div class="login-box">
        <div class="login-box-body" style="margin-top:200px; padding-bottom:100px; border:1px solid dodgerblue">
            <div style="display:flex; margin: 50px 0 50px 20px"><h4>Already Got an Account?</h4>
                <a href="<?php echo base_url().'user/login'; ?>">
                    <button type="button" class="btn btn-primary" style="margin-left:50px">Log In</button>
                </a>
            </div>
            <div style="margin-left:-10px">
                <br>
                <h4 class="text-center">I want to use</h4>
                <br>
                <a href="<?php echo base_url().'user/registration'; ?>">
                    <button type="button" class="btn btn-warning" style="margin-left:50px">As a Teacher</button>
                </a>
                <a href="<?php echo base_url().'user/registration_student'; ?>">
                    <button type="button" class="btn btn-danger" style="margin-left:50px">As a Student</button>
                </a>
            </div>
        </div>
    </div>
</body>