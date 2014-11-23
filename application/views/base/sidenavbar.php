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
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
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
        <div class="box" style="margin-bottom:0px; ">

            <div class="box-body" style="padding:0px">
                <a class="btn btn-default1" href="<?php echo base_url()."profile/viewProfile/".$user_id ?>" style="width:100%; color:white" ><?php echo $basic_info['firstname'] ?> <?php echo $basic_info['lastname'] ?></a>
            </div>

        </div>
        <ul class="sidebar-menu">
            <li >
                <a href="<?php echo base_url('home')?>">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#"> <i class="fa fa-fw fa-meh-o"></i>
                   <b>Personal</b>
                   <i class="fa pull-right fa-angle-left"></i>
               </a>
               <ul class="treeview-menu" style="display: none;">
                <li>
                    <a href="<?php echo base_url('profile')?>">
                        <i class="fa fa-user"></i> <span>Profile</span>
                    </a>
                </li>

                <li >
                    <a href="<?php echo base_url('profile/resume')?>">
                        <i class="fa fa-fw fa-clipboard"></i> <span>Resume</span>
                    </a>
                </li>

            </ul>
        </li>


        <li >
            <a href="<?php echo base_url('estore')?>">
                <i class="fa fa-shopping-cart"></i> <span>E-Store</span><small class="badge pull-right bg-yellow">sell</small>
            </a>
        </li>


         <li >
                        <a href="<?php echo base_url('college/clubs')?>">
                            <i class="fa fa-fw fa-bell"></i> <span>Clubs</span>
                        </a>
                    </li>

            <!--     <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-sitemap"></i><b>College</b>
                    <i class="fa pull-right fa-angle-left"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">


                                       <li >
                        <a href="<?php echo base_url('college/council')?>">
                            <i class="fa fa-fw fa-bullhorn"></i> <span>Posts and Updates</span>
                        </a>
                    </li>

                    

                    <li >
                        <a href="<?php echo base_url('council/problems')?>">
                            <i class="fa fa-fw fa-cogs"></i> <span>Problems and Solutions</span>
                        </a>
                    </li>
                   
                    <li >
                        <a href="<?php echo base_url('council/petitions')?>">
                            <i class="fa fa-fw fa-certificate"></i> <span>Surveys and Feedbacks</span>
                        </a>
                    </li> 
                </ul>
            </li> -->

          <li >
        <a href="<?php echo base_url('stuff')?>">
            <i class="fa fa-external-link"></i> <span>Stuff</span><small class="badge pull-right bg-green">new</small>
        </a>
        </li>
      <li >
        <a href="<?php echo base_url('college/aroundus')?>">
            <i class="fa fa-fw fa-star"></i> <span>Around Us</span>
        </a>
    </li>

    <li >
 <a href="<?php echo base_url('college/timeline')?>">
    <i class="fa fa-fw fa-calendar"></i> <span>Events timeline</span>
</a>
</li>

 <li >
            <a href="<?php echo base_url('college/taps')?>">
                <i class="fa fa-fw fa-pencil-square-o"></i> <span>T & P Reviews</span><small class="badge pull-right bg-maroon">add</small>
            </a>
        </li>

    <li class="treeview">
        <a href="#"><i class="fa fa-fw fa-pencil"></i>
           <b>Discuss</b>
           <i class="fa pull-right fa-angle-left"></i>
       </a>
       <ul class="treeview-menu" style="display: none;">
          <!--  <li >
            <a href="<?php echo base_url('discuss/questions')?>">
                <i class="fa fa-question"></i> <span>Questions</span>
            </a>
        </li> -->
               
        <!-- <li>
            <a href="<?php echo base_url('discuss/ideas')?>">
                <i class="fa fa-fw fa-code"></i> <span>Ideas</span>
            </a>
        </li> -->

        <li >
            <a href="<?php echo base_url('discuss/forum')?>">
                <i class="fa fa-fw fa-tasks"></i> <span>Forum</span>
            </a>
        </li>

    </ul>
</li>






<li class="treeview">
    <a href="#">
       <b>Launching Soon</b>
       <i class="fa pull-right fa-angle-left"></i>
   </a>
   <ul class="treeview-menu" style="display: none;">


    <li >
        <a href="#fakelink" onClick="alert( 'This Section is in Under Construction Mode' )">
            <i class="fa fa-fw fa-microphone"></i> <span>Deans Portal</span>
        </a>
    </li>
    <li >
        <a href="#fakelink" onClick="alert( 'This Section is in Under Construction Mode' )">
            <i class="fa fa-fw fa-cogs"></i> <span>Branch Section</span>
        </a>
    </li>

    <li >
        <a href="#fakelink" onClick="alert( 'This Section is in Under Construction Mode' )">
            <i class="fa fa-fw fa-upload"></i> <span>Upload Section</span>
        </a>
    </li>
    <li >
        <a href="#fakelink" onClick="alert( 'This Section is in Under Construction Mode' )">
            <i class="fa fa-fw fa-cog"></i> <span>Technozion 2014</span>
        </a>
    </li>
    <li >
        <a href="#fakelink" onClick="alert( 'This Section is in Under Construction Mode' )">
            <i class="fa fa-fw fa-star"></i> <span>Spring Spree 2015</span>
        </a>
    </li>
      <li >
                        <a href="#fakelink" onClick="alert( 'This Section is in Under Construction Mode' )">
                            <i class="fa fa-fw fa-bullhorn"></i> <span>Posts and Updates</span>
                        </a>
                    </li>

                    

                    <li >
                        <a hhref="#fakelink" onClick="alert( 'This Section is in Under Construction Mode' )">
                            <i class="fa fa-fw fa-cogs"></i> <span>Problems and Solutions</span>
                        </a>
                    </li>
                   
                    <li >
                        <a href="#fakelink" onClick="alert( 'This Section is in Under Construction Mode' )">
                            <i class="fa fa-fw fa-certificate"></i> <span>Surveys and Feedbacks</span>
                        </a>
                    </li> 

                     <li >
                        <a href="#fakelink" onClick="alert( 'This Section is in Under Construction Mode' )">
                            <i class="fa fa-fw fa-question"></i> <span>Questionnaire</span>
                        </a>
                    </li> 
</ul>
</li>

</ul>
</section>
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
</aside>

<script src="//code.jquery.com/jquery-latest.min.js"></script>
<script src="http://malsup.github.io/jquery.form.js"></script>
<script>

$(function() {

    $("#uploadFile").on("change", function() {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            $("#imgpreview").css("display","none");
            $("#imagepreview").css("display","");
            reader.onloadend = function(){ // set image data as background of div

              $("#imagepreview").css("background-image", "url("+this.result+")");

          }
      }
  });

    $(".delete_file").click(function(){
        var txt;
        var r = confirm("Do you want to delete the file permanently and reload new photograph?");
        if (r == true) {
            txt = "You pressed OK!";
        } else {
            txt = "You pressed Cancel!";
            return;
        }
        name=$(this).data("filename");
        element_row=$(this).parent().parent();
        $.ajax({
            url : "<?php echo base_url('recruitgment/applypost/delete_photograph');?>",
            type: "POST",
            data : {'name':name},
            beforeSend: function (xhr) {
                element_row.html("Deleting...");
            },
            success: function(data, textStatus, jqXHR)
            {
                if(data==1)
                {
                    str='<div class="form-group">'+
                    '<label>Upload Passport size photograph *</label>'+
                    '<input id="uploadFile" type="file" name="photograph" class="img form-control" required />'+
                    '</div>';
                    $("#imagePreview").css("background-image", "url('<?php echo base_url('assets/img/no_pic.gif');?>')");
                    element_row.html(str);
                }
                else
                {
                    element_row.html('Error occured in deleting.Reload the page');
                }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {

            }
        });
});
});



</script>