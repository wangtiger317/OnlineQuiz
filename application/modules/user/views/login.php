<body class="hold-transition login-page" style="background-image: url('<?php echo base_url().'assets/images/background.jpg'; ?>'); background-size: cover">
    <div style="border-bottom:2px solid #00c0ef; padding-top:10px">
        <div style="margin-left:35px">
            <a href="<?php echo base_url(); ?>" class="logo">
                <?php $logo =  (setting_all('logo'))?setting_all('logo'):'logo.png'; ?>
                <img src="<?php echo base_url().'assets/images/'.$logo; ?>" id="logo" style="width:169px; height:auto">
            </a>
        </div>
    </div>
	<div class="login-box">
	  	<!-- /.login-logo -->
	  	<div class="login-box-body" style="margin-top:200px; border:1px solid dodgerblue">
			<?php if($this->session->flashdata("messagePr")){?>
	  		<div class="alert alert-info">
		        <?php echo $this->session->flashdata("messagePr")?>
		    </div>
		    <?php } ?>
		    <form action="<?php echo base_url().'user/auth_user'; ?>" method="post" style="margin-top:50px;margin-bottom:50px">
		    	<div class="form-group has-feedback">
		    		<input type="text" name="email" class="form-control" id="" placeholder="NIM/NIP">
		        	<span class="glyphicon glyphicon-user form-control-feedback"></span>
		      	</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" id="pwd" placeholder="Password" >
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
			  	<div class="row">
			  		<div class="col-xs-12">
		          		<button type="submit" class="btn btn-primary btn-block btn-flat btn-color">Log In</button>
		        	</div>
				</div>
		    </form>
		</div>
	</div>
</body>
