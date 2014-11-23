<?php 
$error_message = '';
if( form_error('username') !=''){
    $error_message = "<small class=\"error\">".form_error('username')."</small>";
}

if(isset($errors['reg_number'])){
    $error_message .= "<small class=\"error\">".form_error('reg_number')."</small>";
}

if( form_error('college') !='' ){
    $error_message .= "<small class=\"error\">".form_error('college')."</small>";
}

if($this->session->flashdata('danger') == TRUE) 
  echo '<div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$this->session->flashdata('danger').'</div>';


?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Campus | <?php echo $info['firstname']."  ".$info['lastname']  ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="<?php echo asset_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo asset_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo asset_url(); ?>css/mycampus.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="<?php echo asset_url(); ?>img/favicon.ico">

    <script src="<?php echo asset_url()?>js/jquery-1.11.1.min.js"></script>

</head>
<body class="skin-blue">
    <!-- header logo: style can be found in header.less -->

    <header class="header">
        <a href="<?php echo base_url('home')?>" class="logo">
            <img src="<?php echo asset_url()?>img/logo6.png" style="height:50px">
        </a>
        <!-- Header Navbar: style can be found in header.less -->

    </header>


    <div class="row-offcanvas row-offcanvas-left">


        <aside class="right-side">

            <section class="content-header">
                <h1>
                    Hi <?php echo $info['firstname']."  ".$info['lastname']  ?> ! 
                </h1>
           
          

              <ol class="breadcrumb">
                <li> 
                  <a href="<?php echo base_url('auth/logout') ?>" class="btn btn-default btn-flat"><i class="fa fa-fw fa-sign-out"></i> Sign out</a>
                 </li>

                <li><a href="<?php echo base_url('home')?>"><i class="fa fa-arrow-circle-right"></i> Campus.Net</a></li>
                <li class="active">First Login</li>
            </ol>
        </section>

        <script>
        $(document).ready(function(){
            $("#sbi").click(function()
            {
                $("#bi").css("display","none");
                $("#ci").css("display","none");
                $("#si").css("display","");

                $("#ssi").css("display","");
                $("#sbi").css("display","none");
                $("#sci").css("display","none");
            });

            $("#ssi").click(function()
            {
                $("#bi").css("display","none");
                $("#si").css("display","none");
                $("#ci").css("display","");

                $("#sci").css("display","");
                $("#sbi").css("display","none");
                $("#ssi").css("display","none");
            });

            $("#ssib").click(function()
            {
                $("#bi").css("display","");
                $("#si").css("display","none");
                $("#ci").css("display","none");

                $("#sci").css("display","none");
                $("#sbi").css("display","");
                $("#ssi").css("display","none");
            });

            $("#scib").click(function()
            {
                $("#bi").css("display","none");
                $("#si").css("display","");
                $("#ci").css("display","none");

                $("#sci").css("display","none");
                $("#sbi").css("display","none");
                $("#ssi").css("display","");
            });

    // $("#sci").click(function()
    // {
    //         alert(" thnxx saved");
    //         window.location.reload('home');
    // });




});
</script>
<section class="content">

   <form action="<?php echo base_url("auth/confirm")?>"  id="confirm_det" method="post">
    <div class="modal-dialog"> 

        <div class="modal-content" id="bi" style="display:">
            <div class="modal-header">
             <div class="box-tools pull-right">
                <div class="label bg-aqua"><i class="fa fa-fw fa-angle-double-right"></i> &nbsp;Step 1 of 3</div>
            </div>
            <h3 class="modal-title"><i class="fa fa-user"></i> &nbsp; Basic Info</h3>
            
        </div>

        <div class="box-body" style="padding:15px"> 
            <div class="row">
                <div class="col-md-12">
                    <!-- Primary box -->
                    <div class="box box-danger">    
                        <table class="table table-striped">
                            <tbody>
                             <tr>
                                <td><b>E-Mail</b></td>
                                <td> <?php echo $info['email'] ?> </td>

                            </tr>

                            <tr>
                                <td><b>Username</b></td>
                                <td><input data-validation="alphanumeric" data-validation-error-msg="Alpha numeric allowed" type="text" class="form-control"  placeholder='<?php echo "suggested username: ".$suggested_username ?>' id="username" name="username"></td>

                            </tr>

                            <tr>
                                <td><b>College</b></td>
                                <td>
                                    <select data-validation="alphanumeric" data-validation-error-msg="select college" id="college" name="college" class="form-control" >
                                        <option value="">Select College</option>
                                        <?php foreach ($colleges as $key => $value) { ?>                                                      
                                        <option value="<?php echo $value['college_code']; if($value['college_code']=="NITW") echo '" selected=selected' ?>"> <?php echo $value['college'] ?></option>
                                        <?php } ?>
                                    </select>


                                </td>
                            </tr>

                            <tr>
                                <td><b>Reg. Number</b></td>
                                <td><input data-validation="alphanumeric" data-validation-length="4-8" data-validation-error-msg="Alpha numeric allowed" type="text" class="form-control"  id="reg_number" name="reg_number" placeholder="Ex- H11007"></td>

                            </tr>
                            <tr>
                                <td><b>Roll Number</b></td>
                                <td><input data-validation="alphanumeric" data-validation-error-msg="Alpha numeric allowed" type="text" class="form-control" id="roll_number" name="roll_number"  placeholder="Ex- 112118"></td>

                            </tr>



                        </tbody>
                    </table>

                </div><!-- /.box -->
            </div>


        </div>
    </div>  
    <div class="modal-footer clearfix">

        <button type="button" class="btn btn-success" id="sbi" ><i class="fa fa-arrow-circle-right"></i> &nbsp;PROCEED</button>

    </div>
</div>

<div class="modal-content" id="si" style="display:none">
    <div class="modal-header">
     <div class="box-tools pull-right">
        <div class="label bg-aqua"><i class="fa fa-fw fa-angle-double-right"></i> &nbsp;Step 2 of 3</div>
    </div>
    <h3 class="modal-title"><i class="fa fa-user"></i> &nbsp; Student College Info</h3>

</div>

<div class="box-body" style="padding:15px"> 
    <div class="row">
        <div class="col-md-12">
            <!-- Primary box -->
            <div class="box box-danger">    
                <table class="table table-striped">
                    <tbody>



                       <tr>
                        <td><b>Date of Birth</b></td>
                        <td>
                            <input type="date" class="form-control" id="birthday" name="birthday"></td>

                        </tr>
                        <tr>
                            <td><b>Gender</b></td>
                            <td>
                                <select data-validation="alphanumeric" data-validation-error-msg="Select gender" id="gender" name="gender" class="form-control" >
                                    <option value="">Select Gender</option>
                                    <option value="M" selected="selected">Male</option>
                                    <option value="F">Female</option>


                                </select>
                                <!-- <input  type="text" style="width:100%;" value="Male" id="gender"></td> -->

                            </td>
                        </tr>


                        <tr>
                            <td><b>Course</b></td>
                            <td>
                               <select data-validation="alphanumeric" data-validation-error-msg="Alpha numeric allowed" data-validation-allowing="-." name="course" class="form-control" id="course">
                                <option value="">-- Select One --</option>
                                <option value="B.Tech" selected="selected">B.Tech</option>
                                <option value="M.Tech">M.Tech</option>
                                <option value="PhD">PhD</option>
                                <option value="Msc">MSc</option>
                                <option value="MCA">MCA</option>
                                <option value="MBA">MBA</option>
                                <option value="Msc Tech">MSc Tech</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td><b>Branch</b></td>
                        <td>
                            <select class="form-control" name="branch" id="branch" style="width:100%;">
                                <option value="">-- Select One --</option>
                                <option value="Civil">Civil Engineering</option>
                                <option value="EEE">Electrical and Electronics Engineering</option>
                                <option value="Mech">Mechnical Engineering</option>
                                <option value="ECE">Electronics and Communication Engineering</option>
                                <option value="MME">Metallurgical and Materials Engineering</option>
                                <option value="Chemical">Chemical Engineering</option>
                                <option value="CSE">Computer Science and Engineering</option>
                                <option value="Biotech">Biotechnology</option>
                                <option value="Math">Mathematics</option>
                                <option value="Physics">Physics</option>
                                <option value="Chemistry">Chemistry</option>
                                <option value="HSC">Humanities and Social Science</option>
                                <option value="SOM">School of Management</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td><b>Joining year</b></td>
                        <td><input class="form-control input-md" data-validation-error-msg="invalid year" data-validation-length="4-5" type="number" class="form-control" name="joining_year" id="joining_year" placeholder="Ex- 2011"></td>

                    </tr>

                </tbody>
            </table>

        </div><!-- /.box -->
    </div>


</div>
</div>  
<div class="modal-footer clearfix">

    <button type="button" class="btn btn-danger pull-left" id="ssib"><i class="fa fa-arrow-circle-left"></i> &nbsp;Go Back</button>
    <button type="button" class="btn btn-success pull-right" id="ssi" onclick="proceed_step3()"><i class="fa fa-arrow-circle-right"></i> &nbsp;PROCEED</button>


    <!--  <button  type="button" data-dismiss="modal" onClick="basic_save()" class="btn btn-success pull-left"><i class="fa fa-check"></i> Update</button> -->
</div>
</div>
</div>


<div class="modal-content col-md-12" id="ci" style="display:none" >
    <div class="modal-header">
     <div class="box-tools pull-right">
        <div class="label bg-aqua"><i class="fa fa-fw fa-angle-double-right"></i> &nbsp;Step 3 of 3</div>
    </div>
    <h3 class="modal-title"><i class="fa fa-user"></i> &nbsp; Verify your Details</h3>
    <h4 class="modal-title" style="color:blue">On successful saving of the details, you will earn campus.net credits of 25 </h4>

</div>

<div class="box-body" style="padding:15px"> 
    <div class="row">
        <div class="col-md-6">
            <!-- Primary box -->
            <div class="box box-warning">  
                <table class="table table-striped">
                    <tbody>

                       <tr>
                        <td><b>E-Mail</b></td>
                        <td><?php echo $info['email'] ?></td>

                    </tr> 

                    <tr>
                        <td><b>Username</b></td>
                        <td id="td_username"></td>

                    </tr>

                    <tr>
                        <td><b>College</b></td>
                        <td id="td_college"></td>

                    </tr>

                    <tr>
                        <td><b>Reg. Number</b></td>
                        <td id="td_reg_number"></td>

                    </tr>

                    <tr>
                        <td><b>Roll Number</b></td>
                        <td id="td_roll_number"></td>

                    </tr>

                </tbody>
            </table>
        </div>
        <br>
        <code>
         You cannot edit these fields later !</code>
     </div>
     <div class="col-md-6">
        <!-- Primary box -->
        <div class="box box-warning">  
            <table class="table table-striped">
                <tbody>



                  <tr>
                    <td><b>Date of Birth</b></td>
                    <td id="td_birthday"></td>

                </tr>
                <tr>
                    <td><b>Gender</b></td>
                    <td id="td_gender"></td>

                </tr>       

                <tr>
                    <td><b>Course</b></td>
                    <td id="td_course"></td>

                </tr>
                <tr>
                    <td><b>Branch</b></td>
                    <td id="td_branch"></td>

                </tr>

                <tr>
                    <td><b>Joining Year</b></td>
                    <td id="td_joining_year"></td>

                </tr>

            </tbody>
        </table>

    </div>
    <br>
    <input type="checkbox" id="terms" required> &nbsp; I Accept <a href="https://drive.google.com/file/d/0BzSOqE03ZMSIYk9zdXFKNDMyZFk/edit?usp=sharing" target="_blank">Terms and Conditions.</a>  

</div>




</div>
</div>  

<div class="modal-footer clearfix">
   <button type="button" class="btn btn-danger pull-left" id="scib"><i class="fa fa-arrow-circle-left"></i> &nbsp;Go Back</button>
   <button type="submit" class="btn btn-success" data-dismiss="modal" id="sci"><i class="fa fa-save"></i> &nbsp;Save Details</button>


   <!--  <button  type="button" data-dismiss="modal" onClick="basic_save()" class="btn btn-success pull-left"><i class="fa fa-check"></i> Update</button> -->
</div>
</div><!-- /.modal-content -->
</form>   

</section>
</aside>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
<script>

$.validate();

function form_validate_step1(){
   $.validate();
}

function proceed_step3(){
    $.validate();
    $('#td_reg_number').html($('#reg_number').val());
    $('#td_roll_number').html($('#roll_number').val());
    $('#td_username').html($('#username').val());
    $('#td_college').html($('#college').val());
    $('#td_course').html($('#course').val());
    $('#td_birthday').html($('#birthday').val());
    $('#td_joining_year').html($('#joining_year').val());
    $('#td_branch').html($('#branch').val());
    $('#td_gender').html($('#gender').val());
}


</script>