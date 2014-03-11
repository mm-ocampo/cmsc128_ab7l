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
        <h1 class="page-header">Manage Accounts</h1>
        <div class="row placeholders">
          <div class="col-xs-6 col-sm-4 placeholder">
            <a id="approve_account" class="btn btn-primary circle" href="<?php echo base_url();?>index.php/elib/submit_operation?operation=approve&page_number=3"><br/><span class="glyphicon glyphicon-user glyphicon-large"></span></a>
            <h4>Approve Account</h4>
            <?php echo "<span class=\"btn-danger badge badge-error\"><b>" . $pendingCount . "</b></span>";?>
          </div>
          <div class="col-xs-6 col-sm-4 placeholder">
            <a id="reactivate_account" class="btn btn-primary circle" href="<?php echo base_url();?>index.php/elib/submit_operation?operation=reactivate&page_number=3"><br/><span class="glyphicon glyphicon-check glyphicon-large"></span></a>
            <h4>Reactivate Account</h4>
          </div>
          <div class="col-xs-6 col-sm-4 placeholder">
            <a id="message" class="btn btn-primary circle" href="<?php echo base_url();?>index.php/query/get_rows?page_number=3"><br/><span class="glyphicon glyphicon-envelope glyphicon-large"></span></a>
            <h4>Message</h4>      
          </div>
        </div>
        <div class="row placeholders">
                
          <div class="col-xs-6 col-sm-4 placeholder">
            <a id="deactivate_account" class="btn btn-primary circle" href="<?php echo base_url();?>index.php/elib/submit_operation?operation=deactivate&page_number=3"><br/><span class="glyphicon glyphicon-remove glyphicon-large"></span></a>
            <h4>Deactivate Account</h4>
          </div>
          <div class="col-xs-6 col-sm-4 placeholder">
            <a id="delete_account" class="btn btn-primary circle" href="<?php echo base_url();?>index.php/elib/submit_operation?operation=delete&page_number=3"><br/><span class="glyphicon glyphicon-trash glyphicon-large"></span></a>
            <h4>Delete Account</h4>
          </div>
        </div>
      </div>      

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
      <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
      <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
      <script src=<?php echo "\"".base_url()."assets/jquery.balloon.js"."\""?> ></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#approve_account').balloon({
            contents: "<div id='balloon'><p align='center'>Expand your collection of books, thesis, special problems, journals and other materials and offer a wide range of choices that suits the need of the users.</p></div>",
            position: 'bottom'
          });
          $('#add_account').balloon({
            contents: "<div id='balloon'><p align='center'>Add new users of the e-Lib. Users include students, faculties and other constituents of the university.</p></div>",
            position: 'bottom'
          });
          $('#reactivate_account').balloon({
            contents: "<div id='balloon'><p align='center'>Remove deprecated, lost, and unavailable books from the library collection.</p></div>",
            position: 'bottom'
          });
          $('#deactivate_account').balloon({
            contents: "<div id='balloon'><p align='center'>Edit information of books, thesis, special problems, journals and other materials for an up-to-date library collection.</p></div>",
            position: 'bottom'
          });
          $('#message').balloon({
            contents: "<div id='balloon'><p align='center'>Discover more by searching for books in the library collection. Offers advanced search for more extensive and easy lookup.</p></div>",
            position: 'bottom'
          });
          $('#delete_account').balloon({
            contents: "<div id='balloon'><p align='center'>Manage your system by determining viewing, accepting or declining book requests from library users.</p></div>",
            position: 'bottom'
          });
        });
      </script>
  </body>
</html>