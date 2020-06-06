<?php if($this->session->flashdata("alert_msg")){?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata("alert_msg")?>
    </div>
<?php } ?>
<body class="hold-transition register-page" style="background-image: url('<?php echo base_url().'assets/images/background.jpg'; ?>'); background-size: cover">
<div style="border-bottom:2px solid #00c0ef; padding-top:10px">
    <div style="margin-left:35px">
        <a href="<?php echo base_url(); ?>" class="logo">
            <?php $logo =  (setting_all('logo'))?setting_all('logo'):'logo.png'; ?>
            <img src="<?php echo base_url().'assets/images/'.$logo; ?>" id="logo" style="width:169px; height:auto">
        </a>
    </div>
</div>
<div class="register-box" style="border:1px solid dodgerblue; margin-top:200px">
    <div class="register-box-body">
        <p class="login-box-msg">Register a new Student</p>
        <?php if($this->session->flashdata("messagePr")){?>
            <div class="alert alert-info">
                <?php echo $this->session->flashdata("messagePr")?>
            </div>
        <?php } ?>
        <form action="<?php echo base_url().'user/registration_student'; ?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" data-validation="required" placeholder="Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" name="NIP" class="form-control" data-validation="required" placeholder="NIM">
                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <select name="gender" id="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <span class="glyphicon glyphicon-heart form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" name="email" class="form-control" data-validation="required" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" data-validation="required">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <!--  <input type="hidden" name="user_type" value="<?php //echo setting_all('user_type');?>"> -->
                    <input type="hidden" name="call_from" value="reg_page">
                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat btn-color">Register</button>
                </div>
            </div>
        </form>
        <br>
        <a href="<?php echo base_url('user/login');?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->
</body>
<script>
    $(document).ready(function(){
        <?php if($this->input->get('invited') && $this->input->get('invited') != ''){ ?>
        $burl = '<?php echo base_url() ?>';
        $.ajax({
            url: $burl+'user/chekInvitation',
            method:'post',
            data:{
                code: '<?php echo $this->input->get('invited'); ?>'
            },
            dataType: 'json'
        }).done(function(data){
            console.log(data);
            if(data.result == 'success') {
                $('[name="email"]').val(data.email);
                $('form').attr('action', $burl + 'user/register_invited/' + data.users_id);
            } else{
                window.location.href= $burl + 'user/login';
            }
        });
        <?php } ?>
    });
</script>
