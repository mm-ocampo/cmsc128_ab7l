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
      <?php

   
  
        echo "<a data-toggle=\"modal\" href=\"#top_modal\" ><span class=\"glyphicon glyphicon-star glyphicon-medium\"></span> Most Borrowed Books</a>";
      
      ?>
      <h1 class="page-header">My Bookshelf</h1>

      <ul class="nav nav-tabs" id="about_tab">
             <li class="active"><a href="#mission" data-toggle="tab">Bookmarked</a></li>
             <li><a href="#vision" data-toggle="tab">Borrowed</a></li>
             <li><a href="#history" data-toggle="tab">Overdue</a></li>
             <li><a href="#aboutICS" data-toggle="tab">History</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade in active" id="mission">
                <fieldset>
                  <h2 style="color: #428bce;">Bookmarked</h2>
                  <?php 
                  $search = $results;
                  ?>
                  <?php include "print_results.php" ?>
                </fieldset>
              </div>
              <div class="tab-pane fade" id="vision">
                <fieldset>
                  <h2 style="color: #428bce;">Borrowed</h2>
                  <?php 
                  $search = $borrowed;
                  $search_details = $borrowed_details;?>
                  <?php include "print_results.php" ?>
                </fieldset>
              </div>
              <div class="tab-pane fade" id="history">
                <fieldset>
                  <h2 style="color: #428bce;">Overdue</h2>
                  <?php 
                  $search = $overdue;
                  $search_details = $overdue_details;?>
                  <?php include "print_results.php" ?>
                </fieldset>
              </div>
              <div class="tab-pane fade" id="aboutICS">
                <fieldset>
                  <h2 style="color: #428bce;">History</h2>
                <?php 
                  $search = $history;
                  $search_details = $history_details;?>
                  <?php include "print_results.php" ?>
                </fieldset>
              </div>
            </div>
          </div>
    </div>

    <div class="modal fade" id="top_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h1 class="modal-title">Top Ten Books</h1>
        </div>
        <div class="modal-body">
          <?php include "top_view.php" ?>
          <p>ICS eLib Copyright 2014</p>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>/js/jquery-2.0.3.min.js"></script>
      <script src="<?php echo base_url();?>/js/jquery-1.9.1.min.js"></script>
      <script src="<?php echo base_url();?>/js/main.js"></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
  </body>
</html>