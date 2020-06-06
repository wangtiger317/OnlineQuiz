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
  <link rel="stylesheet" href="<?php echo base_url('assets/css/magnific-popup.css');?>">
    <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/stylesheets/theme.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/stylesheets/skin/default.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/stylesheets/theme-custom.css');?>">
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
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->c
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        .box-dashboard {
            border:1px solid #00c0ef;
            border-left: none;
        }
        .box-header{
            font-size: 50px;
        }
        .display_answer{
            height: 100px;
            margin-top:30px;
            padding:20px;
            display: flex;
        }
        .quiz_answer{
            height: 150px;
            margin-top:30px;
            text-align: center;
            padding-left:40%;
            padding-top:25px;
        }
        .quiz_answer:hover{
            cursor:pointer;
        }
        #display_answer1{
            background-color: red;
        }
        #display_answer2{
            background-color: blue;
        }
        #display_answer3{
            background-color: #ffc700;
        }
        #display_answer4{
            background-color: green;
        }
        .square {
            height: 60px;
            width: 60px;
            background-color: #FFFFFF;
        }
        .circle {
            height: 60px;
            width: 60px;
            background-color: #FFFFFF;
            border-radius: 50%;
        }
        .triangle-up {
            width: 0;
            height: 0;
            border-left: 30px solid transparent;
            border-right: 30px solid transparent;
            border-bottom: 60px solid #FFFFFF;
        }
        .equilateral{
            margin-top:5px;
            margin-left:10px;
            height: 50px;
            width: 50px;
            background-color: #FFFFFF;
            transform: rotate(45deg);
            -ms-transform: rotate(45deg); /* IE 9 */
            -webkit-transform: rotate(45deg); /* Safari and Chrome */
            position:relative;
        }
        .square-l {
            height: 100px;
            width: 100px;
            background-color: #FFFFFF;
        }
        .circle-l {
            height: 100px;
            width: 100px;
            background-color: #FFFFFF;
            border-radius: 50%;
        }
        .triangle-up-l {
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            border-bottom: 100px solid #FFFFFF;
        }
        .equilateral-l{
            margin-top:5px;
            margin-left:10px;
            height: 80px;
            width: 80px;
            background-color: #FFFFFF;
            transform: rotate(45deg);
            -ms-transform: rotate(45deg); /* IE 9 */
            -webkit-transform: rotate(45deg); /* Safari and Chrome */
            position:relative;
        }
        .answer_name{
            color:black;
            font-size: 30px;
            padding:20px 0 0 100px;
        }
    </style>
  </head>
    <body class="hold-transition skin-black-light sidebar-mini body" data-base-url="<?php echo base_url(); ?>">
        <div class="wrapper">

          <header class="main-header">
            <a href="<?php echo base_url(); ?>" class="logo">
             <?php $logo =  (setting_all('logo'))?setting_all('logo'):'logo.png'; ?>
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><img src="<?php echo base_url().'assets/images/'.$logo; ?>" id="logo"></span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><img src="<?php echo base_url().'assets/images/'.$logo; ?>" id="logo"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Control Sidebar Toggle Button -->
                        <!-- <li>
                          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li> -->
                        <!-- User Account: style can be found in dropdown.less -->

                        <li class="dropdown user user-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs"><?php echo isset($this->session->userdata('user_details')[0]->name)?$this->session->userdata('user_details')[0]->name:'';?></span>
                          </a>
                          <ul class="dropdown-menu" role="menu" style="width: 164px;">
                              <li><a href="<?php echo base_url('user/profile');?>"><i class="fa fa-user mr10"></i>My Account</a></li>
                              <li class="divider"></li>
                              <li><a href="<?php echo base_url('user/logout');?>"><i class="fa fa-power-off mr10"></i>Log Out</a></li>
                          </ul>
                        </li>
                    </ul>
                </div>
            </nav>
          </header>
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <ul class="sidebar-menu">
                <li class="header"><!-- MAIN NAVIGATION --></li>
                <?php //echo '<pre>';print_r($this->router); die; ?>
                <li class="<?=($this->router->method==="profile")?"active":"not-active"?>"> 
                <a href="<?php echo base_url('user/profile');?>"> <i class="fa fa-home"></i> <span>Home</span></a>
                </li>                
                <?php $this->load->view("include/menu");?>
                
               
                <?php if(CheckPermission("user", "own_read")){ ?>
                  <li class="<?=($this->router->method==="TeacherTable")?"active":"not-active"?>">
                      <a href="<?php echo base_url();?>user/TeacherTable"> <i class="fa fa-user"></i> <span>Master Data Teacher</span></a>
                  </li>
                <?php }  if(CheckPermission("user", "own_read")){ ?>
                  <li class="<?=($this->router->method==="StudentTable")?"active":"not-active"?>">
                      <a href="<?php echo base_url();?>user/StudentTable"><i class="fa fa-cogs"></i> <span>Master Data Student</span></a>
                  </li>
         
                  <li class="<?=($this->router->method==="AbsenseTable")?"active":"not-active"?>">
                      <a href="<?php echo base_url();?>user/AbsenseTable"><i class="fa fa-cubes"></i> <span>Master Data Absensi</span></a>
                  </li>

                  <li class="<?=($this->router->method==="QuizTable")?"active":"not-active"?>">
                      <a href="<?php echo base_url();?>quiz/QuizTable"><i class="fa fa-list-alt"></i> <span>Master Data Quiz</span></a>
                  </li>
                <?php  } ?>

                <?php if (isset($this->session->userdata('user_details')[0]->user_type) && $this->session->userdata('user_details')[0]->user_type==='Teacher'){?>
                    <li class="<?=($this->router->method==="TeacherQuiz")?"active":"not-active"?>">
                        <a href="<?php echo base_url();?>quiz/TeacherQuiz"> <i class="fa fa-book"></i> <span>Quiz</span></a>
                    </li>
                    <li class="<?=($this->router->method==="TeacherAbsenseTable")?"active":"not-active"?>">
                        <a href="<?php echo base_url();?>user/TeacherAbsenseTable"> <i class="fa fa-user"></i> <span>DataStudent</span></a>
                    </li>
                <?php }?>

                <?php if (isset($this->session->userdata('user_details')[0]->user_type) && $this->session->userdata('user_details')[0]->user_type==='Student'){?>
                    <li class="<?=($this->router->method==="Absense")?"active":"not-active"?>">
                        <a href="<?php echo base_url();?>user/Absense"> <i class="fa fa-user"></i> <span>Absence</span></a>
                    </li>
                    <li class="<?=($this->router->method==="StudentAbsenseTable")?"active":"not-active"?>">
                        <a href="<?php echo base_url();?>user/StudentAbsenseTable"> <i class="fa fa-user"></i> <span>Data Absence</span></a>
                    </li>
                <?php }?>

                <li class="<?=($this->router->class==="about")?"active":"not-active"?>">
                   <a href="<?php echo base_url('user/logout');?>"><i class="fa fa-power-off"></i> <span>Logout</span></a>
                </li>
              </ul>
            </section>
            <!-- /.sidebar -->
          </aside>        
