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
    <link href=<?php echo "\"".base_url()."assets/docs.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/prettify.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/dashboard.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/font-awesome/css/font-awesome.min.css"."\""?> rel="stylesheet">

  </head>


    <!-- Wrap all page content here -->
    <div id="wrap">

    <?php include "header.php";?>

<div class="container">






<div id="content">
  <h1>INSERT ABOUT CONTENT HERE</h1>
</div>
 <div id="sign-in">
         <form class="form-signin" role="form" method="POST" action="<?php echo base_url();?>index.php/site/login">
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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
  </body>
</html>
