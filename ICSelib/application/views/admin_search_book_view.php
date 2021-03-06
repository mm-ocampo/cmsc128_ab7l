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
        <form action="<?php echo base_url();?>index.php/site/search" class="form-horizontal">
              <!--a class="btn btn-primary" href="<?php echo base_url();?>index.php/elib/admin_default?page_number=1"><span class="fa fa-arrow-left"></span> Back</a-->
            <h1 class="page-header">Search</h1>
          <section id="search_module">
            <?php include "form.php";?>
          </section>

          <?php if(isset($search)){?>
          <nav class="navigate_module">
            <?php include "navigator.php";?>
          </nav>

          <section id="view_module">
            <?php include "print_results.php";?>
          </section>
          <?php }

          else if(isset($statistics)){

            $search = $statistics;

            include "print_results.php";

          }

          ?>

          <script src="<?php echo base_url();?>/js/jquery-1.9.1.js"></script>
          <script src="<?php echo base_url();?>/js/jquery-1.9.1.min.js"></script>
          <script src="<?php echo base_url();?>/js/main.js"></script>
              <script>
                  $(document).ready(function(){
                      search_bar.onblur = check_word;
                      $("#search_bar").keyup(function(){
                          var input = $(this).val();
                          var filter = $(".filter_select").val();
                          var sort = $(".sort").val();

                          format = new Array();
                          $('#checklist input[type=checkbox]:checked').each(function(){
                              format.push($(this).val());     //pushes the food into the array
                          });

                          var query = {"search_query":input,
                              "filter":filter,
                              "sort":sort,
                              "format":format,
                              '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                          };
                          if(input.length < 3){}
                          else{
                              $.ajax({
                                  type: "GET",
                                  url: "<?php echo base_url(); ?>index.php/site/suggest/",
                                  data: query,
                                  cache: false,
                                  success: function(html){
                                    if(html.length>9){
                                      $("#display_suggestion").css("display","block");
                                      $("#display_suggestion").html(html);
                                    }
                                  }
                              });
                          }
                          return false;
                      });
                  });

                  function check_word(){
                    var prompt = "";
                    str = search_bar.value;
                    if(str == "")
                      prompt = "This is a required field.";              
                    else if(!str.match(/^[0-9a-zA-Z\-\ \.\,\+#]+$/))
                      prompt = "Invalid input.";
                    $('#search_prompt').text(prompt);
                    if(prompt == "")
                      return true;
                    else return false;
                  }
              </script>
          <!--END-->
        </form>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
</body>
</html>