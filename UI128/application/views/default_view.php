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
    <link href=<?php echo "\"".base_url()."assets/font-awesome/css/font-awesome.min.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/signin.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/carousel.css"."\""?> rel="stylesheet">
  </head>


  <body>
    <!-- Wrap all page content here -->
<div id="wrap">
      
  <?php include "header_default.php" ?>

  <!--<div class="width_limit">-->
<div class="width_limit">
    <!-- Carousel-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src=<?php echo "\"".base_url()."assets/lib1.jpg"."\""?> alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <p><a class="btn btn-primary pull-right" href="/UI128/index.php/elib/signup_view" role="button">Sign up today</a></p>
              <h3 class="form-heading">University of the Philippines Los Baños</br>Institute of Computer Science</h3>
            </div>
          </div>
        </div>
        <div class="item">
          <img src=<?php echo "\"".base_url()."assets/lib2.jpg"."\""?> alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h2 class="form-heading">Leading the Philippines in computer <br/>science education,research & extension.</h2>
            </div>
          </div>
        </div>
        <div class="item">
          <img src=<?php echo "\"".base_url()."assets/lib3.jpg"."\""?>  alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h2 class="form-heading">Learn more from a number of special problems, theses, and books.</h2>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-circle-left fa-lg"></i></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-circle-right fa-lg"></i></a>
    </div><!-- /.carousel -->

    <div id="float_right">
      <!--SEARCH-->
      <form name="guest_search" class="form-signin" action="/UI128/index.php/site/search?page_number=1">
        <h2 class="form-signin-heading">Discover more</h2>
        <table>
          <tr>
            <td><section id="search_module"><?php include "search_home.php";?></section></td><!--<input type="text" name="search_query" class="search-query form-custom-search" placeholder="Search library"/></td>
           <td><!--<img src=<?php echo "\"".base_url()."assets/search-icon.png"."\""?> id="image" value= "submit"/><td><a href="/UI128/index.php/site/callResults"><i class="fa fa-search fa-lg search-icon"></i></a></td>-->
          </tr>
        </table>
      </form>    
      <!--END SEARCH-->

      <!--LOG-IN-->
      <div id="sign-in">
             <form class="form-signin" role="form" method="POST" action="/UI128/index.php/site/login">
              <h2 class="form-signin-heading">Please sign in</h2>
                <div class="left-inner-addon ">
                  <i class="fa fa-user fa-lg"></i>
                  <input type="text" class="form-custom" placeholder="Username" name="email" required autofocus>
                </div>
                <div class="left-inner-addon ">
                  <i class="fa fa-key fa-lg"></i>
                  <input type="password" class="form-custom" placeholder="Password" name="password" required>
                </div>
              <label class="checkbox">
                <input type="checkbox" name="AdminLogIn" value="remember-me" data-toggle="checkbox">Log-in as Administrator
              </label>
              <p>No yet registered? <a href="/UI128/index.php/elib/signup_view">Sign up today</a></p>              
              <button class="btn btn-large btn-block btn-primary" name="SignIn" type="submit" width="100%">Sign in</button>
             </form>
        <img src=<?php echo "\"".base_url()."assets/ICS Logo.png"."\""?> class="footer_logo" alt="ICS Logo"/>
        <img src=<?php echo "\"".base_url()."assets/UPLB Logo.png"."\""?> class="footer_logo" alt="UPLB Logo"/>
      </div>
      <!--END LOG-IN-->
    </div><!--END FLOAT_RIGHT-->
</div>
        <div id="footer_home">
        <div class="width_limit">
          <p class="text-muted">&copy; 2014 ICS eLib &middot; All rights reserved.</p>
        </div>
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
