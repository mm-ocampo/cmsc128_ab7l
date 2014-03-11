<?php include "includes/authen.php"; ?>

<?php include "includes/header.php"; ?>

<?php include "includes/navigation_bar.php";?>

  <body>
    <div id="wrap">
      <!-- Begin page content -->
      <div id="width_limit">
        <?php include "includes/admin_sidebar.php"; ?>
      </div>

    <div class="floatright">
      <a class="btn btn-primary" href="<?php echo base_url();?>index.php/elib/admin_account?page_number=3"><< Back</a>

        <form class="form-horizontal">
        <div id="cut">
            <h3 class="page-header">Reactivate Account</h3>
        </div>
        <label>Please type the name of the user</label>
        <input type="text" class="input-xlarge search-query">
        <button type="submit" class="btn" placeholder="Type name">Search</button>
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