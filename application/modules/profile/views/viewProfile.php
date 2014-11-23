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
          
        </div>



<h1>
     <a href="<?php echo base_url()."profile/viewProfile/".$user_id ?>" ><?php echo $others_info['firstname']." ".$others_info['lastname'] ?></a>

   

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
                                    <td ><?php echo $others_info['firstname'] ?></td>

                                </tr>

                                <tr>
                                    <td><b>Last Name</b></td>
                                    <td ><?php echo $others_info['lastname'] ?></td>

                                </tr>



                                <tr>
                                    <td><b>Date of Birth</b></td>
                                    <td ><?php echo $others_info['birthday'] ?></td>

                                </tr>

                                <tr>
                                    <td><b>Contact Number</b></td>
                                    <td><?php echo $others_info['phone'] ?></td>

                                </tr>

                                <tr>
                                    <td><b>E-Mail ID</b></td>
                                    <td><?php echo $others_info['email'] ?></td>

                                </tr>
                                <tr>
                                    <td><b>College</b></td>
                                    <td ><?php echo $others_info['college_code'] ?></td>

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
                                        <td><input  class="form-control input-md" type="date" style="width:100%;" value="<?php echo $basic_info['birthday'] ?>" id="birthday"></td>

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
  //det['firstname']=document.getElementById('firstname').value;
  //det['lastname']=document.getElementById('lastname').value;
  
  
  det['title']=document.getElementById('title').value;

  // det['course']=document.getElementById('course').value;
  det['birthday']=document.getElementById('birthday').value;
  det['joining_year']=document.getElementById('joining_year').value;
  //det['branch']=document.getElementById('branch').value;
  det['gender']=document.getElementById('gender').value;
  det['hostel']=document.getElementById('hostel').value;
  det['native_place']=document.getElementById('native_place').value;
  det['country']=document.getElementById('country').value;
  det['mobile']=document.getElementById('mobile').value; 
  det['cprivacy']=document.getElementById('cprivacy').value; 

  det['languages']=document.getElementById('languages').value;
  //det['website']=document.getElementById('website').value;
  //det['fb']=document.getElementById('fb1').value;

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



function weblinks_edit(){  

   document.getElementById('weblinks_edt').style.display="none";   
   document.getElementById('weblinks_upd').style.display=""; 

   $('#website').html(
     '<input type="text" type="url" data-validation="alphanumeric" data-validation-allowing=".," id="website2" value="<?php echo $basic_info['website'] ?>"  class="form-control input-sm" >');


   $('#fb').html(
     '<input type="text" data-validation="alphanumeric" data-validation-allowing=".," id="fb2" value="<?php echo $basic_info['fb'] ?>"  class="form-control input-sm" >');


   $('#google').html(
     '<input type="text" data-validation="alphanumeric" data-validation-allowing=".," id="google2" value="<?php echo $basic_info['google'] ?>"  class="form-control input-sm" >');

   $('#github').html(
     '<input type="text" data-validation="alphanumeric" data-validation-allowing=".," id="github2" value="<?php echo $basic_info['github'] ?>"  class="form-control input-sm" >');

   $('#linkedin').html(
     '<input type="text" data-validation="alphanumeric" data-validation-allowing=".," id="linkedin2" value="<?php echo $basic_info['linkedin'] ?>"  class="form-control input-sm" >');


   $('#twitter').html(
     '<input type="text" data-validation="alphanumeric" data-validation-allowing=".," id="twitter2" value="<?php echo $basic_info['twitter'] ?>"  class="form-control input-sm" >');


   $('#hackerrank').html(
     '<input type="text" data-validation="alphanumeric" data-validation-allowing=".," id="hackerrank2" value="<?php echo $basic_info['hackerrank'] ?>"  class="form-control input-sm" >');


   $('#hackerearth').html(
     '<input type="text" data-validation="alphanumeric" data-validation-allowing=".," id="hackerearth2" value="<?php echo $basic_info['hackerearth'] ?>"  class="form-control input-sm" >');

   $('#codechef').html(
     '<input type="text" data-validation="alphanumeric" data-validation-allowing=".," id="codechef2" value="<?php echo $basic_info['codechef'] ?>"  class="form-control input-sm" >');


}

function weblinks_update(){
   document.getElementById('weblinks_upd').style.display="none";   
   document.getElementById('weblinks_edt').style.display=""; 

var det = {}; // for associative array
det['website']=document.getElementById('website2').value;
det['fb']=document.getElementById('fb2').value;
det['google']=document.getElementById('google2').value;
det['twitter']=document.getElementById('twitter2').value;
det['linkedin']=document.getElementById('linkedin2').value;
det['hackerearth']=document.getElementById('hackerearth2').value;
det['hackerrank']=document.getElementById('hackerrank2').value;
det['codechef']=document.getElementById('codechef2').value;
det['github']=document.getElementById('github2').value;

$('#website').html("<a href="+$('#website2').val()+">"+$('#website2').val()+"</a>");
$('#fb').html("<a href="+$('#fb2').val()+">"+$('#fb2').val()+"</a>");
$('#google').html("<a href="+$('#website2').val()+">"+$('#google2').val()+"</a>");

$('#twitter').html("<a href="+$('#website2').val()+">"+$('#twitter2').val()+"</a>");

$('#linkedin').html("<a href="+$('#website2').val()+">"+$('#linkedin2').val()+"</a>");

$('#hackerearth').html("<a href="+$('#website2').val()+">"+$('#hackerearth2').val()+"</a>");

$('#hackerrank').html("<a href="+$('#website2').val()+">"+$('#hackerrank2').val()+"</a>");

$('#github').html("<a href="+$('#website2').val()+">"+$('#github2').val()+"</a>");

$('#codechef').html("<a href="+$('#website2').val()+">"+$('#codechef2').val()+"</a>");



var weblinks_info;
weblinks_info="weblinks_info="+JSON.stringify(det);
console.log(weblinks_info);

$.ajax({
    type: "POST",
    url: "<?php echo base_url();?>profile/update_links_info", 
    data:  weblinks_info,
    beforeSend:function(){

    },
    success: 
    function(data){

      data=JSON.parse(data);
             // console.log("dora"+data);
         }
     });


}



function add_row(activity_id,text_id,div_id,class_added_row,pname){
    var _button =document.createElement('button');
    _button.className="close";
    _button.innerHTML="×";
    _button.setAttribute("data-dismiss","alert");
    _button.setAttribute("aria-hidden","true");

    var _para=document.createElement('p');
    _para.setAttribute("name",pname);
    var txtvalue=document.getElementById(text_id).value;
    if(txtvalue.length>0)
       { _para.innerHTML=txtvalue;

           document.getElementById(text_id).value="";
           var _row =document.createElement('div');
           _row.className=class_added_row;
           _row.appendChild(_button);
           _row.appendChild(_para);

           var ref=document.getElementById(div_id);
           document.getElementById(activity_id).insertBefore(_row,ref);
       }
       else
        window.alert("Empty value can be added");


} 

function activity_edit(activity,activity_type){
   document.getElementById(activity_type+"_edit").style.display="none";   
   document.getElementById(activity_type+"_save").style.display="";
   document.getElementById("add_"+activity_type).style.display="";
   var ca=document.getElementsByName(activity);
   for (var i = 0; i <ca.length; i++) {
      ca[i].setAttribute("style","display:' '"); //showing the close btns
  };

}

function activity_save(activity,pname,update_activity,activity_type){
   document.getElementById(activity_type+"_save").style.display="none";   
   document.getElementById(activity_type+"_edit").style.display=""; 
   document.getElementById("add_"+activity_type).style.display="none";

   var xa=document.getElementsByName(activity);
   for (var i = 0; i <xa.length; i++) {
      xa[i].setAttribute("style","display:none");
  };

  var x=document.getElementsByName(pname);
  var Data={};

  for (var i = 0; i < x.length; i++) {
    Data[i] = x[i].innerHTML;
};
var postData="postData="+JSON.stringify(Data);
// console.log(postData);

$.ajax({
    type: "POST",
    url: "<?php echo base_url();?>profile/"+update_activity ,
    data: postData,
    beforeSend:function(){

    },
    success: 
    function(data){

    }
});
}




function quote_edit(){
   document.getElementById('quote_edt').style.display="none";   
   document.getElementById('quote_upd').style.display=""; 

   $('#quote').html(
     '<input type="text" style="width:90%" data-validation="alphanumeric" data-validation-allowing="-. "  id="quoteinput" value="<?php echo $quote ?>"  class="form-control input-xs" >');

}  

function quote_update(){ 

    document.getElementById('quote_upd').style.display="none";   
    document.getElementById('quote_edt').style.display=""; 

    var q=$('#quoteinput').val().replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#039;");
    $('#quote').html(q);  
    var dataString="quote="+q;

    $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>profile/update_myquote", 
        data: dataString,
        beforeSend:function(){

        },
        success: 
        function(data){
         console.log(data);
     }
 });
}





</script>
