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
          <h2 class="panel-heading profile_greet">Hi <?php echo $this->session->userdata('name');?>!</h2>
            <p class="text-muted">username@domain.com</p>          
          </div>
        <ul class="nav nav-sidebar ">          
          <li><a class="list-group-item active" href="/UI128/index.php/site/get_my_library_data?page_number=1"><i class="fa fa-book fa-lg space"></i>My Library<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
          <li><a class="list-group-item "href="/UI128/index.php/elib/user_search_book"><i class="fa fa-search fa-lg space"></i>Search<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
          <li><a class="list-group-item "href="/UI128/index.php/site/user_update_view"><i class="fa fa-edit fa-lg space"></i>Edit Profile<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
          <li><a class="list-group-item "href="/UI128/index.php/elib/logout"><i class="fa fa-sign-out fa-lg space"></i>Log Out<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
        </ul>
          <div id="footer">
            <div id="container">
              <p class="text-muted">&copy; 2014 ICS eLib &middot; All rights reserved.</p>
            </div>
          </div>          
        </div>


 <div class="content_right main">
        <div id="cut">
            <h1 class="page-header">Search</h1>
        </div>
          <!--SAME HERE, AYAW GUMANA :<-->
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
          <!--END-->
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