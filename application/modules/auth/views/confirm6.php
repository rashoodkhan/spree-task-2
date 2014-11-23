

<?php

$iusername = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'class'	=> 'form-control',
);
$reg_number= array(
	'name'	=> 'reg_number',
	'id'	=> 'reg_number',
	'class'	=> 'form-control',	

);
$college = array(
	'name'	=> 'college',
	'id'	=> 'college',
	'value' =>  $college,
	'class'	=> 'form-control',
);


$error_message = '';
if( form_error($iusername['name']) !=''){
$error_message = "<small class=\"error\">".form_error($iusername['name'])."</small>";
}

if(isset($errors[$reg_number['name']])){
$error_message .= "<small class=\"error\">".form_error($reg_number['name'])."</small>";
}

if( form_error($college['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($college['name'])."</small>";
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Confirm details</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Language" content="en-us"/>
<meta http-equiv="Content-Style-Type" content="text/css"/>
<meta http-equiv="imagetoolbar" content="no"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url()?>css/main.css" media="all" rel="stylesheet" type="text/css"/>
  <link href="<?php echo asset_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

					<div id="header">
						<h1>confirm details</h1>
					</div>
					
					<?php echo $error_message."  ".$submitted; ?>
                    Suggested username :<?php echo $suggested_username ?>
					<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
						<div class="control-group">
					       <form action="<?php echo base_url("auth/confirm")?>"  id="confirm_det" method="post">
							<?php echo form_label('username', $iusername['id']); ?>
							<?php echo form_input($iusername); ?>
							
							
							<?php echo form_label('reg_number', $reg_number['id']); ?>
							<?php echo form_input($reg_number); ?>

							<!--  <?php echo form_label('date of birth', $college['id']); ?>
							<?php echo form_input($reg_number); ?>


				            <?php echo form_label('Gender', $college['id']); ?>
							<?php echo form_input($reg_number); ?>

				            <?php echo form_label('college', $college['id']); ?>
							<?php echo form_input($reg_number); ?>

							 <?php echo form_label('course', $college['id']); ?>
							<?php echo form_input($reg_number); ?>

							 <?php echo form_label('branch', $college['id']); ?>
							<?php echo form_input($reg_number); ?>

							 <?php echo form_label('year of admission', $college['id']); ?>
							<?php echo form_input($reg_number); ?> -->
							

				
							
						
							   <div class="logbtn logbtn_margin">
								<button type="submit" id="nextBtn" class="nice radius button white">Next</button>
							</div>
						</form>
					</div>
					</div>
					
					
				
</body>

<script>

</script>
</html>