<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'class'	=> 'form-control',
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or Username';
	$login['placeholder' ]='Email or Username';

} else if ($login_by_username) {
	$login_label = 'Username';
	$login['placeholder' ]='Username';
} else {
	$login_label = 'Email';
	$login['placeholder' ]='Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
    'value' => set_value('password'),
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'form-control',
	'placeholder' =>'Password',
);
$confirm_password = array(
    'name'  => 'confirm_password',
    'id'    => 'confirm_password',
    'value' => set_value('confirm_password'),
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'class' => 'form-control',
    'placeholder' =>'Confirm Password',
);
$email = array(
    'name'  => 'email',
    'id'    => 'email',
    'value' => set_value('email'),
    'maxlength' => 80,
    'class' => 'form-control',
    'placeholder' =>'email',
);
$firstname = array(
    'name'  => 'firstname',
    'id'    => 'firstname',
    'value' => set_value('firstname'),
    'maxlength' => 20,
    'class' => 'form-control',
    'placeholder' =>'firstname',
);
$lastname = array(
    'name'  => 'lastname',
    'id'    => 'lastname',
    'value' => set_value('lastname'),
    'maxlength' => 20,
    'class' => 'form-control',
    'placeholder' =>'lastname',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);


$error_message = '';
if( form_error($login['name']) !=''){
$error_message = "<small class='error'>".str_replace("Login field", "Email field", form_error($login['name']) )."</small>";
}

if(isset($errors[$login['name']])){
$error_message .= "<small class=\"error\">".str_replace("Login", "Email", $errors[$login['name']] )."</small>";
}

if( form_error($password['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($password['name'])."</small>";
}

if(isset($errors[$password['name']])){
$error_message .= "<small class=\"error\">".$errors[$password['name']]."</small>";
}

if( form_error($email['name']) !=''){
$error_message = "<small class=\"error\">".str_replace("Login field", "Email field", form_error($email['name']) )."</small>";
}

if(isset($errors[$email['name']])){
$error_message .= "<small class=\"error\">".str_replace("Login", "Email", $errors[$email['name']] )."</small>";
}

if( form_error($firstname['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($firstname['name'])."</small>";
}

if(isset($errors[$firstname['name']])){
$error_message .= "<small class=\"error\">".$errors[$firstname['name']]."</small>";
}

if( form_error($lastname['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($lastname['name'])."</small>";
}

if(isset($errors[$lastname['name']])){
$error_message .= "<small class=\"error\">".$errors[$lastname['name']]."</small>";
}

if( form_error($password['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($password['name'])."</small>";
}

if( form_error($confirm_password['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($confirm_password['name'])."</small>";
}


$captcha_content = '';
if ($show_captcha or $captcha_registration) {
	if ($use_recaptcha) {
		$captcha_content = '
		<div id="account-signup-divider" class="shared-divider">
			<div class="shared-divider-label">
				<span>Confirmation Code</span>
			</div>
		</div>

		<div id="recaptcha_image"></div>
		<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
		<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type(\'audio\')">Get an audio CAPTCHA</a></div>
		<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type(\'image\')">Get an image CAPTCHA</a></div>

		<div class="recaptcha_only_if_image">Enter the words above</div>
		<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />

		<div id="account-signup-divider" class="shared-divider"></div>
		';

		$captcha_content .= $recaptcha_html;
	} else {
		$captcha_content = '
		<div id="account-signup-divider" class="shared-divider">
			<div class="shared-divider-label">
				<span>Confirmation Code</span>
			</div>
		</div>

		<p>Enter the code exactly as it appears:</p>
		'.$captcha_html.'
		<p>'.form_label('Confirmation Code', $captcha['id']).'</p>
		<p>'.form_input($captcha).'</p>

		<div id="account-signup-divider" class="shared-divider"></div>
		';
	}
}

if( form_error('recaptcha_response_field') !=''){
$error_message = "<small class=\"error\">".form_error('recaptcha_response_field')."</small>";
}

if( form_error($captcha['name']) !=''){
$error_message = "<small class=\"error\">".form_error($captcha['name'])."</small>";
}
?>
<!DOCTYPE html>

<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Spring spree</title>
         <link href="<?php echo asset_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo asset_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo asset_url();?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo asset_url();?>css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo asset_url();?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo asset_url();?>css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo asset_url();?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo asset_url();?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo asset_url();?>css/mycampus.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo asset_url();?>css/login/demo.css" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="shortcut icon" href="<?php echo asset_url();?>img/favicon.ico">
        <script src="<?php echo asset_url() ?>js/jquery.js"></script>
<script>
$(document).ready(function(){
    $("#login1").click(function()
    {
    $("#signup1").attr("class", "text-light-blue");
    $("#login1").attr("class", "");
    $("#signin-form").css("display","");
    $("#toregister1").css("display","none");
    $("#reset").css("display","none");
    $("#activation").css("display","none");
    $("#forgot").attr("class", "");
     $("#resend").attr("class", "");
    });

  $("#signup1").click(function(){
    $("#signup1").attr("class", "");
    $("#login1").attr("class", "text-light-blue");
    $("#signin-form").css("display","none");
    $("#toregister1").css("display","");
    $("#reset").css("display","none");
    $("#activation").css("display","none");
     $("#resend").attr("class", "");
     $("#forgot").attr("class", "");
  });

  $("#forgot").click(function(){
    $("#signin-form").css("display","");
    $("#toregister1").css("display","none");
    $("#reset").css("display","");
    $("#activation").css("display","none");
    $("#login1").attr("class", "text-light-blue");
    $("#forgot").attr("class", "text-black");
     $("#resend").attr("class", "");
  });

  $("#resend").click(function(){
    $("#signin-form").css("display","");
    $("#toregister1").css("display","none");
    $("#reset").css("display","none");
    $("#activation").css("display","");
    $("#login1").attr("class", "text-light-blue");
    $("#resend").attr("class", "text-black");
    $("#forgot").attr("class", "");
  });


});
</script>
    </head>
    <body>
        <aside>

               <section class="content-header no-margin" style="text-align:center">
                    
                      
             <h1>Spring Spree</h1>
              
                    
                </section>

                <section class="content" style="background-color:hsla(0, 0%, 98%, 0)">
                    <div class="row">
                           
                            <div class="col-md-4">
                                &nbsp;
                            </div>
                            <div class="col-md-4">
                             <div class="box box-primary" style="background:rgba(234, 234, 236, 0.5)">
                    <div class="box-header">

                        <h3 class="box-title pull-left"><a href="#signin" id="login1" class="">Login</a></h3>
                        <h3 class="box-title pull-right"><a href="#signup" id="signup1" class="text-light-blue">Register</a></h3>
                       
                    </div> 
                    <?php echo $error_message; ?>
                    <div class="box-body"> 
                       <form action="<?php echo base_url("auth/login")?>" id="signin-form"  method="post">
                            <div class="body">
                                <div class="form-group">
                                 
                                   <?php echo form_input($login); ?>
                                </div>
                                <div class="form-group">
                                
							        <?php echo form_password($password); ?>
                                </div>          
                                <div class="form-group">
                                   <?php echo form_checkbox($remember); ?> Remember me on this computer.
                                </div>
                                  <?php echo $captcha_content; ?>
                            </div>
                            <div class="footer">                                                               
                                <input type="submit" id="loginBtn" name="submit" class="btn bg-blue btn-block" value="Sign me in">
                            </div>
                            <div class="form-group" style="margin-top:8px">                                                               
                                <a href="#forgotpasswd" id="forgot" style="display:"><p class="pull-left">I forgot my Password</p></a>

                               <a href="#activation" id="resend" style="display:"> <p class="pull-right">Resend Activation Link</p></a>
                                <br>
                            </div>
                        </form>

                        <form id="reset" style="display:none" action="<?php echo base_url("auth/forgot_password")?>" method="POST">
                            <div class="form-group">
                                <input id="emailreset" name="emailreset" required="required" type="email" placeholder="Enter your E-mail ID" class="form-control">
                            </div>
                            <div class="footer">                                                               
                                <input type="submit" name="send" class="btn bg-olive btn-block" value="Send Password Reset Link"> 
                            </div>
                        </form>

                        <form id="activation" style="display:none">
                            <div class="form-group">
                                <input id="emailresend" name="emailreset" required="required" type="email" placeholder="Enter your E-mail ID" class="form-control">
                            </div>
                            <div class="footer">                                                               
                                <input type="submit" name="send" class="btn bg-olive btn-block" value="Send Account Activation Link"> 
                            </div>
                        </form>

                        <form action="<?php echo base_url("auth/register")?>" style="display:none" id="toregister1" method="post">
                            <div class="body">
                                <div class="form-group"  style="padding:0px 0px 0px 6px">
                                   <?php echo form_input($firstname); ?>

                                </div>
                                <div class="form-group"  style="padding:0px 0px 0px 6px">
                                    <?php echo form_input($lastname); ?>

                                </div>

                                <div class="form-group"  style="padding:0px 0px 0px 6px">
                                   <?php echo form_input($email); ?>
                                </div>
                                <div class="form-group" style="padding:0px 0px 0px 6px">
                                    <input id="phone" name="phone" required="required" type="text" placeholder="Phone Number" class="form-control" required>

                                </div>

                                 <div class="form-group " style="padding:0px 0px 0px 6px">
                                    
                                <input data-provide="datepicker" class="form-control input-sm" name="birthday" id="datapicker" placeholder="Date of birth" type="text">
                                </div>

                                <div class="form-group" style="padding:0px 0px 0px 6px">
                                    <select data-validation="alphanumeric" data-validation-error-msg="select college" id="college" name="college" class="form-control" >
                                        <option value="">Select College</option>
                                        <?php foreach ($colleges as $key => $value) { ?>                                                      
                                        <option value="<?php echo $value['college_code']; if($value['college_code']=="NITW") echo '" selected=selected' ?>"> <?php echo $value['college'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!--<div class="form-group col-lg-6" style="padding:0px 0px 0px 6px">
                                    <input id="reg_number" name="reg_number" required="required" type="text" placeholder="Registeration Number" class="form-control" required>

                                </div> -->
                                 
                                <div class="form-group"  style="padding:0px 0px 0px 6px">
                                    <?php echo form_password($password); ?>
                                </div>
                              
                                <div class="form-group"  style="padding:0px 0px 0px 6px">
                                   <?php echo form_password($confirm_password); ?>
                                </div>
                                  <?php echo $captcha_content; ?>
                            </div>
                            <div class="footer">                    

                                <button type="submit" id="loginBtn"  class="btn bg-blue btn-block">Sign me up</button>
                            </div>
                        </form> 


                    </div>
                                </div> 
                                
                            </div>

                    </div>

                
                </section>
            </aside>
            <!--   <script src="<?php echo asset_url(); ?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        datepicker -->
        <script src="<?php echo asset_url(); ?>js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        </body>
    </html>
    