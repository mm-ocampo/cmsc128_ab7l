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
      <!-- Custom styles for this template -->
      <link href=<?php echo "\"".base_url()."assets/signin.css"."\""?> rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href=<?php echo "\"".base_url()."assets/carousel.css"."\""?> rel="stylesheet">
      <link href=<?php echo "\"".base_url()."assets/docs.css"."\""?> rel="stylesheet">
      <link href=<?php echo "\"".base_url()."assets/prettify.css"."\""?> rel="stylesheet">
      <link href=<?php echo "\"".base_url()."assets/dashboard.css"."\""?> rel="stylesheet">
  </head>

<!-- Wrap all page content here -->
<div id="wrap">

<?php include"header.php";?>

<body>

      <!-- Begin page content -->
      <div class="col-sm-4 sidebar">
          <ul class="nav nav-sidebar ">
              <h2 class="panel-heading">Hi ADMIN!</h2>
              <li><a class="list-group-item" href="/UI128/index.php/elib/admin_default">Books<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              <li><a class="list-group-item" href="/UI128/index.php/elib/admin_account">Accounts<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              <li><a class="list-group-item active" href="/UI128/index.php/elib/admin_profile">Edit Profile<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              <li><a class="list-group-item" href="/UI128/index.php/elib/logout">Log Out<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              <div id="footer">
                  <div class="container">
                      <p class="text-muted">&copy; 2014 ICS eLib &middot; All rights reserved.</p>
                  </div>
              </div>
          </ul>
      </div>

      <div class="col-sm-9 col-sm-offset-3 main">
          <h1 class="page-header">Edit Info</h1>

      <div class="floatright">
        <div class="control-group">
          <label class="control-label">Name</label>
              <div class="controls">
              <label></label>
              </div>
          </div>
          <div class="control-group">
          <label class="control-label">Code name</label>
              <div class="controls">
              <label></label>
              </div>
          </div>
          <div class="control-group">
          <label class="control-label">ID Number</label>
              <div class="controls">
              <label></label>
              </div>
          </div>
          <div class="control-group">
          <label class="control-label">Email Address</label>
              <div class="controls">
              <label></label>
              </div>
          </div>
          <label class="control-label">Password</label>
              <div class="controls">
              <a>Change Password?</a>
              </div>
          </div>
          <div class="row placeholders">
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