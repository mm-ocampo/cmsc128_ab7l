<?php
    if($this->session->userdata('email')){}
    else header('Location: home');

?>


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
            <img class="navbar-brand" src=<?php echo "\"".base_url()."assets/header2.png"."\""?>/>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About ICS</a></li>
              <li><a href="#contact">Contact Us</a></li>
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
                <form class="navbar-form pull-left">
                  <table>
                  <tr>
                    <td><input type="text" name="search_query" class="search-query" id="searchbar" placeholder="Search"/></td>
                    <td><!--<img src=<?php echo "\"".base_url()."assets/search-icon.png"."\""?> id="image" value= "submit"/>--><i class="glyphicon glyphicon-search search-icon2"></i></td>
                  </tr>
                  </table>
                </form>      
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
</header>