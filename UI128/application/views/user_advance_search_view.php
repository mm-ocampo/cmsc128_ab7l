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
          <h2>Hi <?php echo $this->session->userdata('name');?>!</h2>
          <li class=""><a href="/UI128/index.php/site/get_my_library_data"><i class="icon-chevron-right"></i>Books</a></li>
          <li class="active"><a href="/UI128/index.php/elib/user_search_book"><i class="icon-chevron-right"></i>Search</a></li>
          <li class=""><a href="/UI128/index.php/site/user_update_view"><i class="/UI128/index.php/elib/user_profile"></i>Edit Profile</a></li>
          <li class=""><a href="/UI128/index.php/site/user_notification" class="notification"><i class="icon-chevron-right"></i>Notifications (0)</a></li>
          <li class=""><a href="/UI128/index.php/elib/logout"><i class="icon-chevron-right"></i>Log Out</a></li>
        </ul>
        </div>
      </div>
      </div>
</div>

    <div class="floatright">
        <form action="<?php echo base_url();?>index.php/site/advanced_search" class="form-horizontal">
        <div id="cut">
            <h3 class="page-header">Search</h3>
        </div>
          <!--AYAW GUMANA PAG INCLUDE KAYA GANITO GINAWA KO :<-->
          <section id="search_module">
            <?php include "advanced_form.php";?>
          </section>

          <script src="<?php echo base_url();?>/js/jquery-2.0.3.min.js"></script>
          <script src="<?php echo base_url();?>/js/jquery-1.9.1.min.js"></script>
          <script src="<?php echo base_url();?>/js/main.js"></script>
              
          <!--END-->
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