<?php /*

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ICSeLib</title>
    <link rel="shortcut icon" href=<?php echo "\"".base_url()."assets/thumbnail.png"."\""?> >

    <!-- Bootstrap core CSS -->
    <link href=<?php echo "\"".base_url()."assets/dist/css/bootstrap.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/signin.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/carousel.css"."\""?> rel="stylesheet">
    <!--FLATSTRAP-->
    <link href=<?php echo "\"".base_url()."assets/flatstrap/bootstrap.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/flatstrap/bootstrap-responsive.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/flatstrap/docs.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/flatstrap/prettify.css"."\""?> rel="stylesheet">
    <!--GLYPHICONS-->
    <link href=<?php echo "\"".base_url()."assets/dist/glyphicons/png"."\""?> rel="stylesheet">
  </head>

<?php include"header_default.html";?>  */?>

<?php include"includes/header.php";?>

<?php include"includes/navigation_bar.php";?>

<body>
<div class="width_limit">

     <div id="float_right2">
      <!--SEARCH-->
      <form name="guest_search" class="form-signin" action="<?php echo base_url(); ?>index.php/site/search?page_number=1">
        <h2 class="form-signin-heading">Discover more</h2>
        <table>
          <tr>
            <td><?php include "search_home2.php";?>
            </td>
           
          </tr>
        </table>
      </form>    
      <!--END SEARCH-->
    </div><!--END FLOAT_RIGHT-->




  <div class="content_left2 main">
  <fieldset>
        <form action="<?php echo base_url();?>index.php/site/search" class="form-horizontal">
            <h1 class="page-header">Search Results</h1>

          <nav class="navigate_module">
            <?php include "navigator.php";?>
          </nav>
          <div id="guest_print_results">
            <section id="view_module" class="guest_search_view_module">
             <?php include "print_results.php";?>
            </section>
          </div>

          <script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
              <script src="<?php echo base_url();?>js/jquery-1.9.1.min.js"></script>
              <script src="<?php echo base_url();?>js/main.js"></script>
              <script>

                  $(document).ready(function(){

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

                                      $("#display_suggestion").css("display","block");
                                      $("#display_suggestion").html(html);
                                  }
                              });
                          }
                          return false;
                      });
                  });
              </script>
          <!--END-->
        </form>
    </fieldset>
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