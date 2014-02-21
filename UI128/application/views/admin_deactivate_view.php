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
    <!--FLATSTRAP-->
    <link href=<?php echo "\"".base_url()."assets/flatstrap/bootstrap.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/flatstrap/bootstrap-responsive.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/flatstrap/docs.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/flatstrap/prettify.css"."\""?> rel="stylesheet">
    <!--GLYPHICONS-->
    <link href=<?php echo "\"".base_url()."assets/dist/glyphicons/png"."\""?> rel="stylesheet">
  </head>

<!-- Wrap all page content here -->
<div id="wrap">

<?php include"header.php";?>

<body>

      <!-- Begin page content -->
      <div class="container">
      <div class="row">
      <div class="span4 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav affix">
          <h2>Hi ADMIN!</h2>
          <li class=""><a href="/UI128/index.php/elib/admin_default"><i class="icon-chevron-right"></i>Books</a></li>
          <li class="active"><a href="/UI128/index.php/elib/admin_account"><i class="icon-chevron-right"></i>Accounts</a></li>
          <li class=""><a href="/UI128/index.php/elib/admin_profile"><i class="icon-chevron-right"></i>Edit Profile</a></li>
          <li class=""><a href="/UI128/index.php/elib/logout"><i class="icon-chevron-right"></i>Log Out</a></li>
        </ul>
      </div>
  		</div>
      </div>
</div>

    <div class="floatright">
      <a class="btn btn-primary" href="/UI128/index.php/elib/admin_account"><< Back</a>

        <form class="form-horizontal">
        <div id="cut">
            <h3 class="page-header">Deactivate Account</h3>
        </div>
        <div class="control-group">
          <label class="control-label">Name</label>
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
          <label class="control-label">Email</label>
              <div class="controls">
              <input type="text">
              </div>
        </div>
        <div class="control-group">
          <label class="control-label">Reason/s</label>
              <div class="controls">
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox1"> The user is no longer affiliated with the Institute and University
                  </label></br>
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox2"> The user violated the terms and conditions of the website
                  </label></br>
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox3"> Scam and Viruses
                  </label></br>
              </div>
          </div>
        <div class="form-actions" id="cut">
            <button type="submit" class="btn btn-primary">Deactivate Account</button>
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