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
            <h3 class="page-header">Deactivate Account</h3>
        </div>
        <div class="control-group">
          <label class="control-label">Name</label>
              <div class="controls">
              <input type="text">
              </div>
        </div>
        <div class="control-group">
          <label class="control-label">ID Number</label>
              <div class="controls">
              <input type="text">
              </div>
        </div>
        <div class="control-group">
          <label class="control-label">Email</label>
              <div class="controls">
              <input type="text">
              </div>
        </div>
        <div class="control-group">
          <label class="control-label">Reason/s</label>
              <div class="controls">
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox1"> The user is no longer affiliated with the Institute and University
                  </label></br>
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox2"> The user violated the terms and conditions of the website
                  </label></br>
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox3"> Scam and Viruses
                  </label></br>
              </div>
          </div>
        <div class="form-actions" id="cut">
            <button type="submit" class="btn btn-primary">Deactivate Account</button>
            <button type="button" class="btn">Cancel</button>
        </div>
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