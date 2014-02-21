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
  <div id="wrap">
      <!-- Begin page content -->
      <div class="col-sm-4 sidebar">
        <ul class="nav nav-sidebar ">
          <h2 class="panel-heading">Hi ADMIN!</h2>
          <li><a class="list-group-item active" href="/UI128/index.php/elib/admin_default">Books<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/admin_account">Accounts<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/admin_profile">Edit Profile<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/logout">Log Out<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
            <div id="footer">
              <div class="container">
                <p class="text-muted">&copy; 2014 ICS eLib &middot; All rights reserved.</p>
              </div>
            </div>
        </ul>
      </div>

      
  <div class="col-sm-9 col-sm-offset-3 main">
      <h1 class="page-header">Manage Library</h1>
    <div class="row placeholders">

      <div class="col-xs-6 col-sm-3 placeholder">
          <a class="btn btn-primary circle" href="/UI128/index.php/elib/admin_add_book"><br/><span class="glyphicon glyphicon-plus glyphicon-large"></span></a>
          <h4>Add Book</h4>
          <p>Expand your collection of books, thesis, special problems, journals and other materials.</p>
       </div>
      <div class="col-xs-6 col-sm-3 placeholder">
          <a class="btn btn-primary circle" href="/UI128/index.php/elib/admin_delete_book"><br/><span class="glyphicon glyphicon-remove glyphicon-large"></span></a>
          <h4>Delete Book</h4>
          <p>Remove deprecated, lost, and unavailable books from the library collection.</p>
        </div><!-- /.col-lg-4 -->
      <div class="col-xs-6 col-sm-3 placeholder">
          <a class="btn btn-primary circle" href="/UI128/index.php/elib/admin_update_book"><br/><span class="glyphicon glyphicon-edit glyphicon-large"></span></a> 
          <h4>Update Book Info</h4>
          <p>Edit information of books, thesis, special problems, journals and other materials for an up-to-date library collection.</p>
        </div><!-- /.col-lg-4 -->

      <div class="col-xs-6 col-sm-3 placeholder">
          <a class="btn btn-primary circle" href="/UI128/index.php/elib/admin_search_book"><br/><span class="glyphicon glyphicon-search glyphicon-large"></span></a>
          <h4>Search Book</h4>
          <p>Discover more by searching for books in the library collection. Offers advanced search for more extensive and easy lookup.</p>
        </div><!-- /.col-lg-4 -->
      <div class="col-xs-6 col-sm-3 placeholder">
          <a class="btn btn-primary circle" href="/UI128/index.php/elib/admin_approve"><br/><span class="glyphicon glyphicon-check glyphicon-large"></span></a><br>
          <h4>Approve Book Requests</h4>
          <p>Manage your system by determining viewing, accepting or declining book requests from library users.</p>
        </div><!-- /.col-lg-4 -->

    </div>
  </div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
</body>
</html>