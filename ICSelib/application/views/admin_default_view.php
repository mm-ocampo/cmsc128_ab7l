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
      <h1 class="page-header">Manage Materials</h1>
    <div class="row placeholders">

      <div class="col-xs-6 col-sm-4 placeholder">
          <a class="btn btn-primary circle" href="<?php echo base_url();?>index.php/elib/admin_add_book?page_number=1"><br/><span class="glyphicon glyphicon-plus glyphicon-large"></span></a>
          <h4>Add Material</h4>
          <p>Expand your collection of books, thesis, special problems, journals and other materials.</p>
       </div>
      <div class="col-xs-6 col-sm-4 placeholder">
          <a class="btn btn-primary circle" href="<?php echo base_url();?>index.php/elib/admin_search_book?page_number=1"><br/><span class="glyphicon glyphicon-search glyphicon-large"></span></a>
          <h4>Search Material</h4>
          <p>Discover more by searching for books in the library collection. Offers advanced search for more extensive and easy lookup.</p>
        </div>
      <div class="col-xs-6 col-sm-4 placeholder">
          <a class="btn btn-primary circle" href="<?php echo base_url();?>index.php/admin_reserve/indexes?page_number=1"><br/><span class="glyphicon glyphicon-check glyphicon-large"></span></a><br>
          <h4>Approve Material Requests</h4>
          <p>Manage your system by determining viewing, accepting or declining book requests from library users.</p>
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
