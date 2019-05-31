<!-- banner -->
<div class="banner-bg-inner">
    <!-- banner-text -->
    <div class="banner-text-inner">
        <div class="container">
            <h2 class="title-inner">
            <?php echo $title ?>
            </h2>

        </div>
    </div>
    <!-- //banner-text -->
</div>
<!-- //banner -->
<!-- breadcrumbs -->
<div class="crumbs text-center">
    <div class="container">
        <div class="row">
            <ul class="btn-group btn-breadcrumb bc-list">
                <li class="btn btn1">
                    <a href="<?php echo base_url() ?>">
                        <i class="glyphicon glyphicon-home"></i>
                    </a>
                </li>
                <li class="btn btn2">
                    <a href="<?php echo base_url('login') ?>">sign up</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--//breadcrumbs ends here-->
<!-- signin and signup form -->
<div class="login-form section text-center">
    <div class="container">
        <h4 class="rad-txt">
            <span class="abtxt1">Sign in</span>
            <span class="abtext">sign up</span>
        </h4>
        <!-- <div id="signupbox" style="display:none; margin-top:50px" class="mainbox loginbox"> -->
        <div style=" margin-top:50px" class="mainbox loginbox">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Sign Up</div>
                    <div class="fpassword">
                        <a href="<?php echo base_url('login') ?>">Sign in</a>
                    </div>
                </div>
                <div class="panel-body" style="padding-top:30px">
                <?php
                // // cetak error
                // if($this->session->flashdata('Success')) {
                //   echo '<div class="alert alert-danger">';
                //   echo $this->session->flashdata('Success');
                //   echo '</div>';
                // }
                echo form_open(base_url('register'));

                ?>
                    <!-- <form id="signupform" class="form-horizontal" action="<?php echo base_url('register') ?>" method="post"> -->
                        <div id="signupalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>
                        <!-- <div class="input-group" style="margin-bottom: 25px"> -->
                        <div class="col-lg-12 form-group">
                            <div class="input-group" >
                              <!-- <label class="col-md-3 col-sm-3 col-xs-3 control-label">Nama</label>
                                <div class="col-md-9 col-sm-9 col-xs-9"></div> -->
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo set_value('nama'); ?>">
                            </div>
                            <?php echo form_error('nama','<small class="text-danger" >','</small>') ?>
                        </div>

                        <div class="col-lg-12 form-group">
                            <!-- <div class="input-group" style="margin-bottom: 25px"> -->
                            <div class="input-group">
                                <!-- <label class="col-md-3 col-sm-3 col-xs-3 control-label">Email</label>
                                <div class="col-md-9 col-sm-9 col-xs-9"></div> -->
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                </span>
                                <input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo set_value('email'); ?>">
                            </div>
                            <?php echo form_error('email','<small class="text-danger" >','</small>') ?>
                        </div>

                        <div class="col-lg-12 form-group">
                            <!-- <div class="input-group" style="margin-bottom: 25px"> -->
                            <div class="input-group">
                                <!-- <label class="col-md-3 col-sm-3 col-xs-3 control-label">Username</label>
                                <div class="col-md-9 col-sm-9 col-xs-9"></div> -->
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
                            </div>
                            <?php echo form_error('username','<small class="text-danger" >','</small>') ?>
                        </div>

                        <div class="col-lg-6 form-group">
                            <!-- <div class="input-group" style="margin-bottom: 25px"> -->
                            <div class="input-group" >
                                <!-- <label class="col-md-3 col-sm-3 col-xs-3 control-label">Password</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    </div> -->
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password" placeholder="Password" >
                            </div>
                            <?php echo form_error('password','<small class="text-danger" >','</small>') ?>
                        </div>
                        <div class="col-lg-6 form-group">
                            <!-- <div class="input-group" style="margin-bottom: 25px"> -->
                            <div class="input-group" >
                                <!-- <label class="col-md-3 col-sm-3 col-xs-3 control-label">Password</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    </div> -->
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password1" placeholder="Konfirmasi Password" >
                            </div>
                            <!-- <?php echo form_error('password1','<small class="text-danger" >','</small>') ?> -->
                        </div>


                        <!-- <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-3 control-label">Foto</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="file" class="form-control" name="Foto" placeholder="Foto" >
                            </div>
                        </div> -->

                        <div class="form-group col-lg-12">
                            <!-- Button -->
                            <!-- <div class="signup-btn">
                                <button id="btn-signup" type="button" class="btn btn-info">
                                    <i class="icon-hand-right"></i> &nbsp; Sign Up
                                </button>
                            </div> -->
                            <input type="submit" value="Register" class="btn btn-info btn-lg">
                        </div>
                        <div style="border-top: 1px solid #999; padding-top:20px" class="form-group col-lg-12">
                            <div class="f-btn">
                                <button id="btn-fbsignup" type="button" class="btn btn-primary btn-lg">
                                    <i class="icon-facebook"></i>   Sign Up with Facebook
                                </button>
                            </div>
                        </div>
                    <!-- </form> -->
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<!--//signin and signup form ends here-->
