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
        <div id="cut">
            <h1 class="page-header">Search</h1>
        </div>
        
        <div id="cut">
          <nav class="navigate_module">
            <?php include "navigator_advanced.php";?>
          </nav>
          <section id="view_module">
            <?php include "print_results.php";?>
          </section>
          <script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
          <script src="<?php echo base_url();?>js/jquery-1.9.1.min.js"></script>
          <script src="<?php echo base_url();?>js/main.js"></script>
          <script>
              $(document).ready(function(){

                  $(".bookmark_button").click(function(){

                      var accession_number = $(this).val();
                      var bookmark_button = $(this);

                      var query = {"accession_number":accession_number,
                          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                      };

                          $.ajax({
                              type: "POST",
                              url: "<?php echo base_url();?>index.php/site/bookmark",
                              data: query,
                              cache: false,
                              success: function(html){

                                  bookmark_button.html("Remove Bookmark");
                                  bookmark_button.attr("class","remove_bookmark_button");

                              }
                          });

                      return false;
                  });

                  $(".remove_bookmark_button").click(function(){

                      var accession_number = $(this).val();
                      var remove_bookmark_button = $(this);

                      var query = {"accession_number":accession_number,
                          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                      };

                          $.ajax({
                              type: "POST",
                              url: "<?php echo base_url();?>index.php/site/remove_bookmark_ajax",
                              data: query,
                              cache: false,
                              success: function(html){

                                  remove_bookmark_button.html("Bookmark");
                                  remove_bookmark_button.attr("class","bookmark_button");

                              }
                          });
                    
                    return false;
                     
                  });


              });
              </script>
            </div>
          </div>
        </div>
      </div>
          <!--END-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
  </body>
</html>