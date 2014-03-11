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
          <a class="navbar-brand" href="<?php echo base_url();?>index.php/elib/load_home"><img src=<?php echo "\"".base_url()."assets/header2.png"."\""?>/></a>
        </div>
     
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url();?>index.php/elib/load_home"><i class="glyphicon glyphicon-home glyphicon-navbar space"></i>Home</a></li>
            <li><a href="<?php echo base_url();?>index.php/elib/load_about"><i class="fa fa-desktop fa-lg space"></i>About ICS</a></li>
            <li><a href="<?php echo base_url();?>index.php/elib/contact_us_view"><i class="fa fa-phone fa-lg space"></i>Contact Us</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Rules and Regulations</a></li>
                <li><a href="#">Forums</a></li>
                <li><a href="#">Gallery</a></li>
              </ul>
            </li>
            <li><a href="http://www.facebook.com"><i class="fa fa-facebook-square fa-lg"></i></li></a>
            <li><a href="http://twitter.com"><i class="fa fa-twitter-square fa-lg"></i></a></li>
            <li><a href="http://"><i class="fa fa-google-plus-square fa-lg"></i></a></li>
          </ul>          
          
        </div><!--/.nav-collapse -->
      </div><!--container-->
    </div>
  </div>
</header>