<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ICSeLib</title>
    <link rel="shortcut icon" href=<?php echo "\"".base_url()."assets/thumbnail.png"."\""?> >

    <!-- Bootstrap core CSS -->
    <link href=<?php echo "\"".base_url()."assets/dist/css/bootstrap.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/signin.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/carousel.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/docs.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/prettify.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/dashboard.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/font-awesome/css/font-awesome.min.css"."\""?> rel="stylesheet">
    
  </head>

    <!--Inline javascript powered by JQuery2.0.3-->
  <script language="javascript" type="text/javascript" src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
  <script>
    $(document).ready(function(){
      $('.requestbtn').click(function(){
        $('#request').toggle();
        $('#reserve').hide();
        $('#borrowed').hide();
      });
      $('.reservebtn').click(function(){
        $('#reserve').toggle();
        $('#request').hide();
        $('#borrowed').hide();
      });
      $('.borrowedbtn').click(function(){
        $('#borrowed').toggle();
        $('#request').hide();
        $('#reserve').hide();
      });
    });
  </script>


  <?php include"header.php";?>

<body>
  <div id="wrap">
      <!-- Begin page content -->
    <div id="width_limit">
      <div class="sidebar">
          <div class= "panel-group profile_bar">
            <img class="img-circle2" src=<?php echo "\"".base_url()."assets/profile.jpg"."\""?>/>
            <h2 class="panel-heading profile_greet">Welcome Admin!</h2>
              <p class="text-muted"><?php echo $this->session->userdata('email');?></p>
          </div>
          <ul class="nav nav-sidebar ">
              <li><a class="list-group-item active" href="/UI128/index.php/elib/admin_default"><i class="fa fa-book fa-lg space"></i>Materials<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
              <li><a class="list-group-item" href="/UI128/index.php/elib/admin_manage"><i class="fa fa-cogs fa-lg space"></i>Library Management<span class="fa fa-chevron-right fa-lg space pull-right"></span></a></li>
              <li><a class="list-group-item" href="/UI128/index.php/elib/admin_account"><i class="fa fa-users fa-lg space"></i>Accounts<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
              <li><a class="list-group-item" href="/UI128/index.php/elib/admin_profile"><i class="fa fa-edit fa-lg space"></i>Edit Profile<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
              <li><a class="list-group-item" href="/UI128/index.php/elib/logout"><i class="fa fa-sign-out fa-lg space"></i>Log Out<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
          </ul>

          <div id="footer">
            <div id="container">
              <p class="text-muted">&copy; 2014 ICS eLib &middot; All rights reserved.</p>
            </div>
          </div>
    </div>         

    <div class="content_right main">
              <a class="btn btn-primary pull-right" href="/UI128/index.php/elib/admin_default"><span class="fa fa-arrow-left"></span> Back</a>  

        
            <h1 class="page-header">Book Reservations and Availability</h1>

        <!--TABLE SAMPLE - BUT THIS MUST HIDE AFTER OPENING OTHER TABLES-->

          <input type="button" class="btn btn-primary requestbtn" value="Book Request/s"/>
          <input type="button" class="btn btn-primary reservebtn" value="List of Reserved Book/s"/>
          <input type="button" class="btn btn-primary borrowedbtn" value="List of Borrowed Book/s"/>

          <?php include "admin_view.php" ?>


    </div>
</div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
</body>
</html>