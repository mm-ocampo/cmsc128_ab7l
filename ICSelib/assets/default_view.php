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
  </head>

   
    <!-- Wrap all page content here -->
    <div id="wrap">
      <?php include"header.html";?>
      <!-- Begin page content -->
  <body>
      <div class="container">

    <!-- Carousel
    ================================================== -->
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
              <strong><h2>University of the Philippines</br>Los Baños</br>Institute of Computer Science</h2></strong>
              <p>Leading the Philippines in computer science education, research & extension.</p>
              <p><button class='btn btn-large btn-block btn-primary' data-toggle='modal' data-target='#signup_modal'>Sign up today</button>
              <!--  <a class="btn btn-large btn-block btn-primary" href="/UI128/index.php/signup/index" role="button">Sign up today</a></p>-->
            </div>
          </div>
        </div>
        <div class="item">
          <img src=<?php echo "\"".base_url()."assets/lib2.jpg"."\""?> alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-large btn-block btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src=<?php echo "\"".base_url()."assets/lib3.jpg"."\""?>  alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-large btn-block btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->



      <!--LOG-IN-->
        <div id="sign-in">
         <form class="form-signin" role="form" method="POST" action="/UI128/index.php/site/login">
          <h2 class="form-signin-heading">Please sign in</h2>
          <input type="text" class="form-custom" placeholder="Username" required autofocus>
          <input type="password" class="form-custom" placeholder="Password" required>
          <label class="checkbox">
            <input type="checkbox" name="AdminLogIn" value="remember-me">Log-in as Administrator
          </label>
          <button class="btn btn-large btn-block btn-primary" name="SignIn" type="submit" width="100%">Sign in</button>
         </form>
        </div>
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted">ICS iLib &copy;2014. All rights reserved.</p>
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



<!-- Modal -->
<div class="modal fade" id="signup_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Sign Up!</h4>
      </div>
      <div class="modal-body">
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Reserve</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->