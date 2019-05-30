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
                    <a href="login.html">sign in & sign up</a>
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
        <div id="loginbox" style="margin-top:30px;" class="mainbox  loginbox">
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
                    if($this->session->flashdata('Success')) {
                      echo '<div class="alert alert-danger">';
                      echo $this->session->flashdata('Success');
                      echo '</div>';
                    }

                    // Cetak validasi error
                    echo validation_errors('<div class="alert alert-success">','</div>');
                    // echo form_open(base_url('auth/login'));
                    
                    ?>
                    <form id="loginform" class="form-horizontal" action="<?php echo base_url('login') ?>" method="post">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input id="login-username" type="text" class="form-control <?php echo form_error('user_kode') ? 'is-invalid' : '' ?>" name="username" value="<?php echo set_value('user_kode'); ?>" placeholder="Username" required>
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <!-- <a id="btn-login" href="#" class="btn btn-success">Login </a> -->
                                <input type="submit" value="Login" class="btn btn-success">
                                <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                    Don't have an account!
                                    <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
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
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox loginbox">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Sign Up</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px">
                        <a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="signupform" class="form-horizontal" action="<?php echo base_url('home/register') ?>" method="post">
                        <div id="signupalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 col-sm-3 col-xs-3 control-label">Nama</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" name="nama" placeholder="Nama" required="">
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-3 control-label">Email</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="email" placeholder="Email Address" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-3 control-label">Username</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="username" placeholder="Username" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-3 control-label">Password</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="">
                                <input type="hidden" name="akses_level" value="User" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-3 control-label">Foto</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="file" class="form-control" name="Foto" placeholder="Foto" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- Button -->
                            <div class="signup-btn">
                                <!-- <button id="btn-signup" type="button" class="btn btn-info">
                                    <i class="icon-hand-right"></i> &nbsp; Sign Up
                                </button> -->
                                <input type="submit" value="Register" class="btn btn-info">
                            </div>
                        </div>
                        <div style="border-top: 1px solid #999; padding-top:20px" class="form-group">

                            <div class="f-btn">
                                <button id="btn-fbsignup" type="button" class="btn btn-primary">
                                    <i class="icon-facebook"></i>   Sign Up with Facebook
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--//signin and signup form ends here-->
