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

<!-- Wrap all page content here -->
<div id="wrap">

<?php include"header.php";?>

<body>

      <!-- Begin page content -->
      <div class="col-sm-4 sidebar">
        <ul class="nav nav-sidebar ">
          <h2 class="panel-heading">Hi ADMIN!</h2>
          <li><a class="list-group-item active" href="/UI128/index.php/elib/admin_default">Books<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/admin_account">Accounts<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/admin_profile">Edit Profile<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/logout">Log Out<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
            <div id="footer">
              <div class="container">
                <p class="text-muted">&copy; 2014 ICS eLib &middot; All rights reserved.</p>
              </div>
            </div>
        </ul>
      </div>
</div>

    <div class="floatright">
        <form action="<?php echo base_url();?>index.php/site/search" class="form-horizontal">
        <div id="cut">
            <h3 class="page-header">Search</h3>
        </div>
          <!--AYAW GUMANA PAG INCLUDE KAYA GANITO GINAWA KO :<-->
          <section id="search_module">
            <?php include "form.php";?>
          </section>

          <script src="<?php echo base_url();?>/js/jquery-1.9.1.js"></script>
          <script src="<?php echo base_url();?>/js/jquery-1.9.1.min.js"></script>
          <script src="<?php echo base_url();?>/js/main.js"></script>
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




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
</body>
</html>