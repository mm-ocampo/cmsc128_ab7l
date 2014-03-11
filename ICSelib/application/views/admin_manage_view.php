<?php include "includes/authen.php"; ?>

<?php include "includes/header.php"; ?>

<?php include "includes/navigation_bar.php";?>

  <body>
    <div id="wrap">
      <!-- Begin page content -->
      <div id="width_limit">
        <?php include "includes/admin_sidebar.php"; ?>
      </div>
  <div class="content_right main">
      <h1 class="page-header">Manage Library</h1>
    <div class="row placeholders">

      <div class="col-xs-6 col-sm-4 placeholder">
          <a class="btn btn-primary circle" href="<?php echo base_url();?>index.php/elib/activity?page_number=2"><br/><span class="glyphicon glyphicon-calendar glyphicon-large"></span></a>
          <h4>Activity Log</h4>
          <p>Check recent activity on ICS e-Lib.</p>
       </div>
      <div class="col-xs-6 col-sm-4 placeholder">
          <a class="btn btn-primary circle" href="<?php echo base_url();?>index.php/pdf/generate_pdf"><br/><span class="glyphicon glyphicon-print glyphicon-large"></span></a>
          <h4>Print Inventory</h4>
          <p>Save a digital copy of your current collection.</p>
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
</body>
</html>
