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
          <li class=""><a href="/UI128/index.php/elib/admin_default"><i class="icon-chevron-right"></i>Materials</a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/admin_manage"><i class="fa fa-cogs fa-lg space"></i>Library Management<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
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
            <h3 class="page-header">Message</h3>
        </div>
        <div class="control-group">
          <label class="control-label">Email</label>
              <div class="controls">
              <input class="span5" type="text">
              </div>
        </div>
        <div class="control-group">
          <label class="control-label">Subject</label>
              <div class="controls">
                <select class="span4">
                <option>Book Overdue</option>
                <option>Ready for pickup book/s</option>
                <option>We will be pleased to see you</option>
                </select>
              </div>
        </div>
        <div class="control-group">
          <label class="control-label">Message</label>
              <div class="controls">
                <textarea class="span5" rows="5"></textarea>
              </div>
        </div>
        <div class="form-actions" id="cut">
            <button type="submit" class="btn btn-primary">Send Message</button>
            <button type="submit" class="btn">Cancel</button>
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