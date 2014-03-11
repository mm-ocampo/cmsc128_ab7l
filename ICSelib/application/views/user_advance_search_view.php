<?php include "includes/authen.php"; ?>

<?php include "includes/header.php"; ?>

<?php include "includes/navigation_bar.php";?>

  <body>
    <div id="wrap">
      <!-- Begin page content -->
      <div id="width_limit">
        <?php include "includes/user_sidebar.php"; ?>
      </div>

    <div class="content_right main">
      <form action="<?php echo base_url();?>index.php/site/advanced_search" class="form-horizontal">
      <div id="cut">
        <h1 class="page-header">Search</h1>
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