<?php
    if($this->session->userdata('email')){}
    else header('Location: home');

   ?>
    <header>
      <!-- Fixed navbar -->
    <div id="wrap">
      <div class="navbar navbar-default navbar-fixed-top" margin-up="2%" role="navigation">

        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/UI128/index.php/elib/load_home"><img src=<?php echo "\"".base_url()."assets/header2.png"."\""?>/></a>
          </div>

       
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="/UI128/index.php/elib/load_home"><i class="glyphicon glyphicon-home glyphicon-navbar space"></i>Home</a></li>
              <li><a href="/UI128/index.php/elib/load_about"><i class="fa fa-desktop fa-lg space"></i>About ICS</a></li>
              <li><a href="/UI128/index.php/query/load_view"><i class="fa fa-phone fa-lg space"></i>Contact Us</a></li>
              <li><a href="/UI128/index.php/elib/rules_and_regulations_view"><i class="fa fa-clipboard fa-lg space"></i>Library Rules</a></li>
            <li><a href="http://www.facebook.com"><i class="fa fa-facebook-square fa-lg"></i></li></a>
            <li><a href="http://twitter.com"><i class="fa fa-twitter-square fa-lg"></i></a></li>
            <li><a href="http://"><i class="fa fa-google-plus-square fa-lg"></i></a></li>

            </ul>          
          </div><!--/.nav-collapse -->
        </div><!--container-->
      </div>


    </div>
    </header>







<!--    <div id="wrap">

      <div class="container">
        <div class="page-header">
          <h1>Sticky footer</h1>
        </div>
        <p class="lead">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS.</p>
        <p>Use <a href="../sticky-footer-navbar">the sticky footer with a fixed navbar</a> if need be, too.</p>
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </div>-->