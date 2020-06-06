<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper clearfix">
<!-- Main content -->
  <div class="col-md-12 form f-label">
  <?php if($this->session->flashdata("messagePr")){?>
    <div class="alert alert-info">      
      <?php echo $this->session->flashdata("messagePr")?>
    </div>
  <?php } ?>
    <!-- Profile Image -->
    <div class="box box-success pad-profile">
     	<div class="box-header with-border">
            <h3 class="box-title">Dashboard<small></small></h3>
        </div>
        <div class="box-body" style="margin:100px 30px 100px 30px">
            <div class="row" style="margin-bottom:100px">
                <?php if ($this->session->userdata('user_details')[0]->user_type == 'admin'){?>
                <div class="col-md-6 col-lg-3 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-danger">
                        <div class="panel-body box-dashboard">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-danger">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Teacher</h4>
                                        <div class="info">
                                            <strong class="amount"><?php echo $total_teacher?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?php echo base_url();?>user/TeacherTable" class="text-muted text-uppercase">(More Info)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-md-6 col-lg-3 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-secondary">
                        <div class="panel-body box-dashboard">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-secondary">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Student</h4>
                                        <div class="info">
                                            <strong class="amount"><?php echo $total_student?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?php echo base_url();?>user/StudentTable" class="text-muted text-uppercase">(More Info)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php }?>
                <?php if (($this->session->userdata('user_details')[0]->user_type == 'admin')||($this->session->userdata('user_details')[0]->user_type == 'Teacher')){?>
                <div class="col-md-6 col-lg-3 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-tertiary">
                        <div class="panel-body box-dashboard">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-tertiary">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Absensi</h4>
                                        <div class="info">
                                            <strong class="amount"><?php echo $total_absence?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?php echo base_url();?>user/AbsenseTable" class="text-muted text-uppercase">(More Info)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-quaternary">
                        <div class="panel-body box-dashboard">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-quaternary">
                                        <i class="fa fa-list-alt"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Quiz</h4>
                                        <div class="info">
                                            <strong class="amount"><?php echo $total_quiz?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <?php if ($this->session->userdata('user_details')[0]->user_type == 'admin'){?>
                                            <a href="<?php echo base_url();?>quiz/QuizTable" class="text-muted text-uppercase">(More Info)</a>
                                        <?php } else if ($this->session->userdata('user_details')[0]->user_type == 'Teacher'){?>
                                            <a href="<?php echo base_url();?>quiz/TeacherQuiz" class="text-muted text-uppercase">(More Info)</a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php }?>
                <?php if ($this->session->userdata('user_details')[0]->user_type == 'Student'){?>
                <div class="col-md-6 col-lg-3 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-tertiary">
                        <div class="panel-body box-dashboard">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-tertiary">
                                        <i class="fa fa-book"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Subjects</h4>
                                        <div class="info">
                                            <strong class="amount"><?php echo $total_subjects?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?php echo base_url();?>user/StudentAbsenseTable" class="text-muted text-uppercase">(More Info)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php }?>
            </div>
        </div>

      <!-- /.box -->
    </div>
    <!-- /.content -->
  </div>
</div>
<!-- /.content-wrapper -->