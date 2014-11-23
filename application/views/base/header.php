<html>
    <head>
        <meta charset="UTF-8">
        <title>Dev Auth | <?php echo $basic_info['firstname']?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo asset_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo asset_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo asset_url(); ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo asset_url(); ?>css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo asset_url(); ?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo asset_url(); ?>css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo asset_url(); ?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo asset_url(); ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo asset_url(); ?>css/mycampus.css" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="<?php echo asset_url(); ?>img/favicon.ico">     
        <script src="<?php echo asset_url()?>js/jquery-1.11.1.min.js"></script>
     
      
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
   
    <header class="header">
           <a href="<?php echo base_url('home')?>" class="logo">
               
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                 <div class="col-xs-5 navbar-btn" id="sr">
                        <input type="text" id="searchid" class="form-control searchfor" placeholder="Start searching for your friends here !">
                        
                        
               <div id="result"  ></div>
                </div>
               

                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                      
                     
                      
                      
                    
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>&nbsp;<?php if($username!="") echo $username; else echo $basic_info['firstname'] ?>
                                <span> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php  echo $profile_image ?>" class="img" alt="User Image" style="border: 1px solid white; max-height:90px; width:auto">
                                    <p>
                                    <?php echo $basic_info['firstname']." ". $basic_info['lastname'] ?>
                                       
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Help</a>
                                    </div>
                                 
                                    <div class="col-xs-4 text-center">
                                      <a href="#">Team</a>
                                    </div>
                                     <div class="col-xs-4 text-center">
                                        <a href="#">Careers</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#fakelink" class="btn btn-default btn-flat"><i class="fa fa-fw fa-cog"></i> Privacy</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('auth/logout') ?>" class="btn btn-default btn-flat"><i class="fa fa-fw fa-sign-out"></i> Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
               
            </nav>
        </header>


    <div class="row-offcanvas row-offcanvas-left">
  
<style type="text/css">
    
  
    #result
    {
        position:absolute;
        width:94%;
        padding:5px;
        display:none;
        margin-top:-1px;
        border-top:0px;
        overflow:hidden;
        border:1px #CCC solid;
        background-color:white;
    }
    .show
    {   
        padding:0px;
        margin-top: 2px; 
        border-bottom:1px #999 dashed;
        font-size:15px; 
        height:55px;
    }
    .show:hover
    {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
</style>
       
<script type="text/javascript">
$(document).click(function() {jQuery("#result").fadeOut(); });
$(function(){

$(".searchfor").keyup(function() { 
var searchid = $(this).val();
var dataString = 'searchid='+ searchid;
console.log(dataString);
if(searchid!='')
{
    $.ajax({
    type: "POST",
    url: "<?php echo base_url()?>profile/liveSearch",
    data: dataString,
    cache: false,
     beforeSend:function(){
        
     },
    success: function(res)
    { live_srch= JSON.parse(res);     
       console.log(live_srch.liveresult);
      $.each(live_srch.liveresult,function(i, value){       
         var img_path=value['profile_image'];   
           if(i==0){

               $('#result').html('<div class="show" align="left">'+
                  '<a href="<?php echo base_url("profile/viewProfile/'+value['id']+'")?>" >'+
                  '<img src="'+img_path+'" style="width:50px; height:50px; float:left; margin-right:6px;"/>'+
                  '<span class="name">'+value['firstname']+'</span>&nbsp;<br/>'+value['email']+'<br><br><br>'+
                  '</a>'+
                  '</div>').show();
           }else{
            $('#result').append('<div class="show" align="left">'+
                  '<a href="<?php echo base_url("profile/viewProfile/'+value['id']+'")?>" >'+
                  '<img src="'+img_path+'" style="width:50px; height:50px; float:left; margin-right:6px;"/>'+
                  '<span class="name">'+value['firstname']+'</span>&nbsp;<br/>'+value['email']+'<br><br><br>'+
                  '</a>'+
                  '</div>').show();
           }
          
       });
    
    }
 });
}return false;    
});

jQuery("#result").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find('.name').html();
    var decoded = $("<div/>").html($name).text();
    $('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("form-control searchfor")){
      jQuery("#result").fadeOut(); 
    }
});
$('#searchid').click(function(){
    jQuery("#result").fadeIn();
});
});
</script>