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
            <p class="text-muted"><?php echo $this->session->userdata('email');?></p>          
          </div>
        <ul class="nav nav-sidebar ">          
          <li><a class="list-group-item" href="/UI128/index.php/elib/admin_default"><i class="fa fa-book fa-lg space"></i>Materials<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/admin_manage"><i class="fa fa-cogs fa-lg space"></i>Library Management<span class="fa fa-chevron-right fa-lg space pull-right"></span></a></li>
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
      <h1 class="page-header">Manage Accounts</h1>
      <div class="row placeholders">
        <div class="col-xs-6 col-sm-4 placeholder">
          <a id="approve_account" class="btn btn-primary circle" href="/UI128/index.php/elib/submit_operation?operation=approve"><br/><span class="glyphicon glyphicon-user glyphicon-large"></span></a>
          <h4>Approve Account</h4>
          <?php echo "<span class=\"btn-danger badge badge-error\"><b>" . $pendingCount . "</b></span>";?>
        </div>

        <div class="col-xs-6 col-sm-4 placeholder">
          <a id="reactivate_account" class="btn btn-primary circle" href="/UI128/index.php/elib/submit_operation?operation=reactivate"><br/><span class="glyphicon glyphicon-check glyphicon-large"></span></a>
          <h4>Reactivate Account</h4>
        </div>
      </div>

      <div class="row placeholders">
        <div class="col-xs-6 col-sm-4 placeholder">
          <a id="message" class="btn btn-primary circle" href="/UI128/index.php/elib/submit_operation?operation=message"><br/><span class="glyphicon glyphicon-envelope glyphicon-large"></span></a>
          <h4>Message</h4>      
        </div>      
        <div class="col-xs-6 col-sm-4 placeholder">
          <a id="deactivate_account" class="btn btn-primary circle" href="/UI128/index.php/elib/submit_operation?operation=deactivate"><br/><span class="glyphicon glyphicon-remove glyphicon-large"></span></a>
          <h4>Deactivate Account</h4>
        </div>
        <div class="col-xs-6 col-sm-4 placeholder">
          <a id="delete_account" class="btn btn-primary circle" href="/UI128/index.php/elib/submit_operation?operation=delete"><br/><span class="glyphicon glyphicon-trash glyphicon-large"></span></a>
          <h4>Delete Account</h4>
        </div>
      </div>
      </div>
      </div>
    </div>      

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/jquery.balloon.js"."\""?> ></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#approve_account').balloon({
          contents: "<div id='balloon'><p align='center'>Expand your collection of books, thesis, special problems, journals and other materials and offer a wide range of choices that suits the need of the users.</p></div>",
          position: 'bottom'
        });
        $('#add_account').balloon({
          contents: "<div id='balloon'><p align='center'>Add new users of the e-Lib. Users include students, faculties and other constituents of the university.</p></div>",
          position: 'bottom'
        });
        $('#reactivate_account').balloon({
          contents: "<div id='balloon'><p align='center'>Remove deprecated, lost, and unavailable books from the library collection.</p></div>",
          position: 'bottom'
        });
        $('#deactivate_account').balloon({
          contents: "<div id='balloon'><p align='center'>Edit information of books, thesis, special problems, journals and other materials for an up-to-date library collection.</p></div>",
          position: 'bottom'
        });
        $('#message').balloon({
          contents: "<div id='balloon'><p align='center'>Discover more by searching for books in the library collection. Offers advanced search for more extensive and easy lookup.</p></div>",
          position: 'bottom'
        });
        $('#delete_account').balloon({
          contents: "<div id='balloon'><p align='center'>Manage your system by determining viewing, accepting or declining book requests from library users.</p></div>",
          position: 'bottom'
        });
      });
    </script>
</body>
</html>