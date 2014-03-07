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
    <link href=<?php echo "\"".base_url()."assets/signin.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/carousel.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/docs.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/prettify.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/dashboard.css"."\""?> rel="stylesheet">    
    <link href=<?php echo "\"".base_url()."assets/font-awesome/css/font-awesome.min.css"."\""?> rel="stylesheet">
  </head>

<?php include"header.php";?>

<body>
  <div id="wrap">
      <!-- Begin page content -->
    <div id="width_limit">
      <div class="sidebar">
          <div class= "panel-group profile_bar">
            <img class="img-circle2" src=<?php echo "\"".base_url()."assets/profile.jpg"."\""?>/>
            <h2 class="panel-heading profile_greet">Welcome Admin!</h2>
            <p class="text-muted">username@domain.com</p>          
          </div>
        <ul class="nav nav-sidebar ">          
          <li><a class="list-group-item active" href="/UI128/index.php/elib/admin_default"><i class="fa fa-book fa-lg space"></i>Books<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/admin_account"><i class="fa fa-users fa-lg space"></i>Accounts<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/admin_profile"><i class="fa fa-edit fa-lg space"></i>Edit Profile<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/logout"><i class="fa fa-sign-out fa-lg space"></i>Log Out<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
        </ul>

          <div id="footer">
            <div id="container">
              <p class="text-muted">&copy; 2014 ICS eLib &middot; All rights reserved.</p>
            </div>
          </div>
    </div>         

    <div class="content_right main">

        <form action="<?php echo base_url();?>index.php/site/search" class="form-horizontal">
        <div id="cut">
            <h1 class="page-header">Search</h1>
        </div>
          <!--SAME HERE, AYAW GUMANA :<-->
          <div id="cut">
          <section id="search_module">
            <?php include "form.php";?>
          </section>

          <nav class="navigate_module">
            <?php include "navigator.php";?>
          </nav>

          <section id="view_module">
            <?php include "print_results.php";?>
          </section>

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
      </div>

    </div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
</body>
</html>