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
      <h1 class="page-header">Book Reservations and Availability</h1>

      <!--TABLE SAMPLE - BUT THIS MUST HIDE AFTER OPENING OTHER TABLES-->

      <input type="button" class="btn btn-primary requestbtn" value="Book Request/s"/>
      <input type="button" class="btn btn-primary reservebtn" value="List of Reserved Book/s"/>
      <input type="button" class="btn btn-primary borrowedbtn" value="List of Borrowed Book/s"/>

      <?php include "admin_view.php" ?>
    </div>
</div>


   <!--Inline javascript powered by JQuery2.0.3-->
  <script language="javascript" type="text/javascript" src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
  <script>
    $(document).ready(function(){
      $('.requestbtn').click(function(){
        $('#request').toggle();
        $('#reserve').hide();
        $('#borrowed').hide();
      });
      $('.reservebtn').click(function(){
        $('#reserve').toggle();
        $('#request').hide();
        $('#borrowed').hide();
      });
      $('.borrowedbtn').click(function(){
        $('#borrowed').toggle();
        $('#request').hide();
        $('#reserve').hide();
      });
    });
  </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
</body>
</html>