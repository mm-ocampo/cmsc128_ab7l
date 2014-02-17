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

<?php include"header.html";?>

<body>

      <!-- Begin page content -->
      <div class="container">
      <div class="row">
      <div class="span4 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav affix">
          <h2>Hi ADMIN!</h2>
          <li class="active"><a href="/UI128/index.php/elib/admin_default"><i class="icon-chevron-right"></i>Books</a></li>
          <li class=""><a href="/UI128/index.php/elib/admin_account"><i class="icon-chevron-right"></i>Accounts</a></li>
          <li class=""><a href="/UI128/index.php/elib/admin_profile"><i class="icon-chevron-right"></i>Edit Profile</a></li>
          <li class=""><a href="/UI128/index.php/elib/logout"><i class="icon-chevron-right"></i>Log Out</a></li>
        </ul>
      </div>
  		</div>
      </div>
</div>

    <div class="floatright">
      <a class="btn btn-primary" href="/UI128/index.php/elib/admin_default"><< Back</a>

        <?php echo validation_errors('<p class="error">'); ?>
       <?php echo form_open("material_controller/add"); ?>

  <div class="container">
    <form name="material_form" class="form" role="form" method="post">
      
      <div class="form-group">
        <label for="accession_number">Accession Number</label>
          <input type="text" name="accession_number" class="form-control" value="<?php echo set_value('accession_number'); ?>" id="accession_number" placeholder="Enter Accession Number" required="true">
          <span name="accesion_number_prompt"></span>
      </div>

      <div class="form-group">
        <label for="subject">Subject</label>
          <input type="text" class="form-control" name="subject" value="<?php echo set_value('subject'); ?>" id="subject" placeholder="Enter Subject" required="true">
          <span name="subject_prompt"></span>
      </div>

      <div class="form-group">
        <label for="title" class="col-sm- control-label">Title</label>
          <input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>" id="title" placeholder="Enter Title" required="true">
          <span name="title_prompt"></span>
      </div>

      <div class="form-group">
        <label for="author" class="col-sm- control-label">Author</label>
          <input type="text" name="author" class="form-control" value="<?php echo set_value('author'); ?>" id="author" placeholder="Enter Author" required="true">
          <span name="author_prompt"></span>
      </div>

      <div class="form-group">
        <label for="copyright_year" class="col-sm- control-label">Copyright Year</label>
          <input type="number" name="copyright_year" min="1900" max="2014" class="form-control" value="<?php echo set_value('copyright_year'); ?>" id="copyright_year" placeholder="Enter Copyright Year" required="true">
          <span name="copyright_year_prompt"></span>
      </div>

      <div class="form-group">
        <label for="publisher" class="col-sm- control-label">Publisher</label>
          <input type="text" name="publisher" class="form-control" value="<?php echo set_value('publisher'); ?>" id="publisher" placeholder="Enter Publisher" required="true">
          <span name="publisher_prompt"></span>
      </div>

      <div class="form-group">
        <label for="type" class="col-sm- control-label">Type</label>
                    <select name="type" class="form-control" value="<?php echo set_value('type'); ?>" id="type">
              <option value="book">Book</option>
              <option value="sp">Special Problem</option>
              <option value="thesis">Thesis</option>
              <option value="journal">Journal</option>
                    </select>
          <span name="type_prompt"></span>
      </div>

      <div>
            <input type="submit" class="btn btn-primary" name="Add Reading Material">
        </div>
    </form>
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