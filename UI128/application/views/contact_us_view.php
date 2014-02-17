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

    <header>
      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top" margin-up="2%" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="/UI128/"><img class="navbar-brand" src=<?php echo "\"".base_url()."assets/header2.png"."\""?>/></a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="/UI128/">Home</a></li>
              <li><a href="/UI128/index.php/elib/about_view">About ICS</a></li>
              <li class="active"><a href="/UI128/index.php/elib/contact_us_view">Contact Us</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Rules and Regulations</a></li>
                  <li><a href="#">Forums</a></li>
                  <li><a href="#">Gallery</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <div id="search">
                  <table>
                  <tr>
                    <td><input type="text" name="search_query" id="searchbar" placeholder="Guest Search Here"/></td>
                    <td><img src=<?php echo "\"".base_url()."assets/search-icon.png"."\""?> id="image" value= "submit"/></td>
                  </tr>
                  </table>
                </div>      
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
</header>


<div class="container">




<div id="content">
  <form role="form" id="contact_form">
    <div class="form-group">
      <label for="input_email">Email address</label>
      <input type="email" class="form-control" id="input_email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="query">Message</label>
      <textarea class="form-control" id="query_box" rows="10" placeholder="Enter your query here"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
  
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
    <script type="text/javascript" language="javascript">
      function checkContents() {

        if(document.getElementById('input_email').value == "") {
          
        }
      }
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
  </body>
</html>
