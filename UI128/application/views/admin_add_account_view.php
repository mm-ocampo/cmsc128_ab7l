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


<?php include"header.php";?>

<body>
  <div id="wrap">
      <!-- Begin page content -->
    <div id="width_limit">
      <div class="sidebar">
          <div class= "panel-group profile_bar">
            <img class="img-circle2" src=<?php echo "\"".base_url()."assets/profile.jpg"."\""?>/>
            <h2 class="panel-heading profile_greet">Welcome Admin!</h2>
            <p class="text-muted">username@domain.com</p>          
          </div>
        <ul class="nav nav-sidebar ">          
          <li><a class="list-group-item" href="/UI128/index.php/elib/admin_default"><i class="fa fa-book fa-lg space"></i>Books<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
          <li><a class="list-group-item active" href="/UI128/index.php/elib/admin_account"><i class="fa fa-users fa-lg space"></i>Accounts<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
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
              <a class="btn btn-primary" href="/UI128/index.php/elib/admin_account"><span class="fa fa-arrow-left"></span> Back</a>  

        <form class="form-horizontal">
        <div id="cut">
            <h1 class="page-header">Add Account</h1>
        </div>

          <div class="control-group">
          <label class="control-label">Name</label>
              <div class="controls">
              <input type="text">
              </div>
          </div>
          <div class="control-group">
          <label class="control-label">Email Address</label>
              <div class="controls">
              <input type="text">
              </div>
          </div>
          <div class="control-group">
          <label class="control-label">ID Number</label>
              <div class="controls">
              <input type="text">
              </div>
          </div>
          <div class="control-group">
          <label class="control-label">Password</label>
              <div class="controls">
              <input type="password">
              </div>
          </div>
          <div class="control-group">
          <label class="control-label">Retype Password</label>
              <div class="controls">
              <input type="password">
              </div>
          </div>
          <div class="control-group">
          <label class="control-label">User Type</label>
              <div class="controls">
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox1" value="Faculty"> Faculty
                  </label>
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox2" value="Student"> Student
                  </label>
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox3" value="Administrator"> Administrator
                  </label>
              </div>
          </div>
        <div class="form-actions" id="cut">
            <button type="submit" class="btn btn-primary">Add Account</button>
            <button type="button" class="btn">Cancel</button>
        </div>
        </form>


    </div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
</body>
</html>