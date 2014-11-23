  <?php 
    if($this->session->flashdata('success') == TRUE) 
      echo '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$this->session->flashdata('success').'</div>';

  if($this->session->flashdata('warning') == TRUE) 
      echo '<div class="alert alert-warning"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$this->session->flashdata('warning').'</div>';

  if($this->session->flashdata('info') == TRUE)
      echo '<div class="alert alert-info"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$this->session->flashdata('info').'</div>';

  if($this->session->flashdata('danger') == TRUE)
      echo '<div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$this->session->flashdata('danger').'</div>';
  
  ?>

<body>
  <aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <style>
    #imagepreview 
    {
        width: 250px;
        height: 250px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    }
    </style>
    

 <div class="user-panel" style="width:220px;">
    <div class="pull-left imageHolder" style="width:200px;">
     <style type="text/css"> 
     .imageHolder {
        position: relative;} 


        .imageHolder .caption { opacity: 0; position: absolute; 
            height:50px; width: 100%; bottom: -1px; left: 0px; padding:
            0px 0px; color: black; background: white; text-align: center;
            font-weight:bold; }
            .imageHolder:hover .caption { opacity: 0.7; } 
            </style>
            <img id="hover" src="<?php  echo $profile_image ?>" style="cursor:pointer" class="img" alt="User Image" data-toggle="modal" data-target="#compose-modal-upp" style="max-width: 100%; ">
            <!-- <img id="hover" src="<?php echo asset_url()?>uploads/profile_pics/<?php echo $basic_info['profile_image'] ?>" style="cursor:pointer" class="img" alt="User Image" data-toggle="modal" data-target="#compose-modal-upp" style="max-width: 100%; "> -->
            <div class="caption" style="cursor:pointer" data-toggle="modal" data-target="#compose-modal-upp">
                <br><a href="">Change Profile Picture</a></div>
            </div>

        </div>



        <div class="modal fade in" id="compose-modal-upp" tabindex="-1" role="dialog" aria-hidden="true">
            <form action="<?php echo base_url()?>profile/upload_photo" method="post" enctype="multipart/form-data" id="uploadform">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-user"></i> Change Profile Picture</h4>
                        </div>

                        <div class="box-body" style="padding:15px"> 
                            <div class="row">
                                <div class="col-md-6"   >
                                    <!-- Primary box -->
                                    <div class="box box-primary">    

                                        <div class="box-body" >

                                            <div class="form-group" >
                                                <label for="exampleInputFile">Current Profile</label>

                                            </div>
                                            <img id="imgpreview" src="<?php echo asset_url()?>uploads/profile_pics/<?php echo $basic_info['profile_image'] ?>">

                                            <div id="imagepreview" style="display:none"></div>
                                        </div>

                                    </div><!-- /.box -->
                                </div><!-- /.col -->


                                <div class="col-md-6">
                                    <!-- Info box -->
                                    <div class="box box-info">

                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Choose Your Profile Picture *</label>
                                                <input type="file" name="files" id="uploadFile" required>
                                            </div>



                                        </div><!-- /.box-body -->

                                    </div><!-- /.box -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Info box -->
                                    <div class="box box-danger">

                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Note</label>

                                            </div>



                                            <p class="text-danger">* File should be of type .jpg, .png, etc</p>

                                            <p class="text-danger">* File Size should not exceed 1.5 MB</p>

                                            <div id="loader" style="display:none;">
                                             <center><img src="<?php echo asset_url()?>img/load.gif" /></center>
                                         </div>


                                     </div><!-- /.box-body -->

                                 </div><!-- /.box -->
                             </div><!-- /.col -->
                         </div>
                     </div>  
                     <div class="modal-footer clearfix">

                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>


                        <button  type="submit"  id="SubmitButton" class="btn btn-success pull-left"><i class="fa fa-check"></i> Update Profile Picture</button>
                    </div>

                </div><!-- /.modal-content -->
            </div>
        </form>
    </div>
    
<h1>
     <a href="<?php echo base_url()."profile/viewProfile/".$user_id ?>" ><?php echo $basic_info['firstname']." ".$basic_info['lastname'] ?></a>

     <button class="btn btn-sm btn-default1 " data-toggle="modal" data-target="#compose-modal-edit_profile" style="margin-left:5px" id="load"><i class="fa fa-edit" ></i> &nbsp;Edit</button>
 <h6>Hover over the image to change the profile pic</h6>

 </h1>
</section>


<section class="content">


    <div class="row">
      <div class="col-md-9">
        <!-- Success box -->
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"> <i class="fa fa-user"></i> Basic Information</h3>
                <div class="box-tools pull-right">
                    <button  class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!-- <button id="bas_edit" class="btn btn-success btn-sm" data-widget="" onClick="basic_edit()" ><i class="fa fa-edit"></i></button> -->
                    <!-- <button id="bas_save" class="btn btn-success btn-sm" data-widget="" onClick="basic_save()" style="display:none" ><i class="fa fa-check"></i></button> -->

                </div>
            </div>
            <div class="box-body">
                <div class="box">

                    <div class="box-body no-padding" id="b_save" style="display:">
                        <table class="table table-striped">
                            <tbody>

                                <tr>
                                    <td><b>First Name</b></td>
                                    <td ><?php echo $basic_info['firstname'] ?></td>

                                </tr>

                                <tr>
                                    <td><b>Last Name</b></td>
                                    <td ><?php echo $basic_info['lastname'] ?></td>

                                </tr>



                                <tr>
                                    <td><b>Date of Birth</b></td>
                                    <td ><?php echo $basic_info['birthday'] ?></td>

                                </tr>

                                <tr>
                                    <td><b>Contact Number</b></td>
                                    <td><?php echo $basic_info['phone'] ?></td>

                                </tr>

                                <tr>
                                    <td><b>E-Mail ID</b></td>
                                    <td><?php echo $basic_info['email'] ?></td>

                                </tr>
                                <tr>
                                    <td><b>College</b></td>
                                    <td ><?php echo $basic_info['college_code'] ?></td>

                                </tr>


                            </tbody>
                        </table>
                    </div>


                    <!-- /.box-body -->
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->



</div>





</section>

<div class="modal fade in" id="compose-modal-edit_profile" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog" style="width:60%">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i> &nbsp; Update Profile Details</h4>
            </div>

            <div class="box-body" style="padding:15px"> 
                <div class="row">
                    <div class="col-md-12"   >
                        <!-- Primary box -->
                        <div class="box box-danger">    
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td><b>First Name</b></td>
                                        <td><input class="form-control input-md" type="text" style="width:100%;" value="<?php echo $basic_info['firstname'] ?>" id="firstname" ></td>

                                    </tr>
                                    <tr>
                                        <td><b>Last Name</b></td>
                                        <td><input  class="form-control input-md" type="text" style="width:100%;" value="<?php echo $basic_info['lastname'] ?>" id="lastname" ></td>

                                    </tr>

                                    <tr>
                                        <td><b>Date of Birth</b></td>
                                        <td><input  class="form-control input-md" type="text" style="width:100%;" value="<?php echo $basic_info['birthday'] ?>" id="birthday"></td>

                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td><input class="form-control input-md" type="text" style="width:100%;" value="<?php echo $basic_info['email'] ?>" id="email" ></td>

                                    </tr>
                                    <tr>
                                        <td><b>Phone number</b></td>
                                        <td><input  class="form-control input-md" type="text" style="width:100%;" value="<?php echo $basic_info['phone'] ?>" id="phone" ></td>

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
                                   
                                        

                                    </tbody>
                                </table>

                            </div><!-- /.box -->
                        </div><!-- /.col -->


            </div>
        </div>  
        <div class="modal-footer clearfix">

            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>


            <button  type="button" data-dismiss="modal" onClick="basic_save()" class="btn btn-success pull-left"><i class="fa fa-check"></i> Update</button>
        </div>

    </div><!-- /.modal-content -->
</div>
</div>


</aside><!-- /.right-side -->



<script type="text/javascript">




function basic_save(){

   var det = {}; // for associative array
  det['firstname']=document.getElementById('firstname').value;
  det['lastname']=document.getElementById('lastname').value; 
  
  det['birthday']=document.getElementById('birthday').value;

  det['college_code']=document.getElementById('college').value;
  det['phone']=document.getElementById('phone').value; 
 
   det['email']=document.getElementById('email').value;

  basic_info="basic_info="+JSON.stringify(det);
  console.log(basic_info);

  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>profile/update_basic_info", 
    data: basic_info,
    beforeSend:function(){

    },
    success: 
    function(data){
        window.location.reload(true);
        data=JSON.parse(data);
        console.log(data);
            // $.each(data.result,function(i, value){  
           // document.getElementById('fb').value="dev";
            // console.log("i"+i+"  "+value);
            // }

        }
    });


}






</script>
