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
                    <a href="<?php echo base_url('login') ?>">sign in </a>
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
        <!-- <div id="loginbox" style="margin-top:30px;" class="mainbox  loginbox"> -->
        <div style="margin-top:30px;" class="mainbox  loginbox">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                    <div class="fpassword">
                        <a href="#">Forgot password?</a>
                    </div>
                </div>
                <div style="padding-top:30px" class="panel-body">
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <?php
                    // cetak error
                    echo $this->session->flashdata('pesan');

                    echo form_open(base_url('login'));

                    ?>
                    <!-- <form id="loginform" class="form-horizontal" action="<?php echo base_url('login') ?>" method="post"> -->
                    <div class="form-group col-lg-12">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input id="login-username" type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username" >
                        </div>
                        <?php echo form_error('username','<small class="text-danger" >','</small>') ?>
                    </div>

                    <div class="form-group col-lg-12">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password" >
                        </div>
                        <?php echo form_error('password','<small class="text-danger" >','</small>') ?>
                    </div>

                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>

                        <div  class="form-group col-lg-12">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <!-- <a id="btn-login" href="#" class="btn btn-success">Login </a> -->
                                <input type="submit" value="Login" class="btn btn-success">
                                <!-- <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a> -->
                            </div>
                        </div>

                        <div class="form-group col-lg-12">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                    Don't have an account!
                                    <!-- <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()"> -->
                                    <a href="<?php echo base_url('register') ?>">
                                        Sign Up Here
                                    </a>
                                </div>
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
