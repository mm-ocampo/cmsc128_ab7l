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
      <form action="<?php echo base_url();?>index.php/site/advanced_search" class="form-horizontal">
      <div id="cut">
        <h1 class="page-header">Search</h1>
      </div>
      <!--AYAW GUMANA PAG INCLUDE KAYA GANITO GINAWA KO :<-->
      <section id="search_module">
        <?php include "advanced_form.php";?>
      </section>
       <?php if(isset($search)){?>
          <nav class="navigate_module">
            <?php include "navigator_advanced.php";?>
          </nav>

          <section id="view_module">
            <?php include "print_results.php";?>
          </section>
          <?php }

          

          ?>

            <div class="modal fade" id="top_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" id="modal_top_ten">
        <div class="modal-content" id="modal_top_ten">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h1 class="modal-title">Top Ten Books</h1>
          </div>
          <div class="modal-body">
            <?php include "top_view.php" ?>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

      <script src="<?php echo base_url();?>/js/jquery-2.0.3.min.js"></script>
      <script src="<?php echo base_url();?>/js/jquery-1.9.1.min.js"></script>
      <script src="<?php echo base_url();?>/js/main.js"></script>
      <!--END-->
      </form>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
  </body>
</html>