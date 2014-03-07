<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

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
            <a href="<?php echo base_url();?>"><img class="navbar-brand" src=<?php echo "\"".base_url()."assets/header2.png"."\""?>/></a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href=<?php echo base_url();?>>Home</a></li>
              <li><a href="<?php echo base_url();?>index.php/elib/about_view">About ICS</a></li>
              <li class="active"><a href="<?php echo base_url();?>index.php/query/load_view">Contact Us</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Rules and Regulations</a></li>
                  <li><a href="#">Forums</a></li>
                  <li><a href="#">Gallery</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
</header>


<div class="container">
<br><br><br><br><br><br>

<div id="contact_content" class="col-md-9">
  <form role="form" id="contact_form" name="contact_form" method="post" onsubmit=checkContents() action=<?php echo "\"".base_url()."index.php/query/insertquery?confirm="."\"";?>>
    <div>
      <?php if(!$this->session->userdata('email')){?>
      <div class="form-group" id="input1">
       <label for="input_email">Email address</label>
       <input type="email" class="form-control" id="input_email" name="input_email" placeholder="Enter email here" value="<?php if(isset($_POST['submit'])) echo $_POST['input_email'];?>">
       <font color="red"><span name="promptemail"></span></font>
      </div>
      <?php }?>
      
        <div class="form-group" id="input2">
        <label for="header">Header</label>
        <input type="text" class="form-control" id="header" name="header" placeholder="Enter header here" value="<?php if(isset($_POST['submit'])) echo $_POST['header'];?>">
        <font color="red"><span name="promptheader"></span></font>
      </div>
    </div>

      <div class="form-group" id="input3">
       <label for="query">Message</label>
       <textarea class="form-control" id="query_box" name="query_box" rows="10" placeholder="Enter your query here"  /><?php if(isset($_POST['submit'])) echo $_POST['query_box'];?></textarea>
       
      </div>
    <font color="red"><span name="promptmessage"></span></font><br><br>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    <button class="btn btn-default" onclick=resetFields()>Reset Fields</button>
  </form>
</div>
  
 <div id="float_right">
  <!--SEARCH-->
  <form>
    <h2 class="form-signin-heading">Discover more</h2>
    <table>
      <tr>
        <td><input type="text" name="search_query" class="search-query form-custom-search" placeholder="Search library"/></td>
        <td><!--<img src=<?php echo "\"".base_url()."assets/search-icon.png"."\""?> id="image" value= "submit"/>--><i class="glyphicon glyphicon-search search-icon"></i></td>
      </tr>
    </table>
  </form>    
    <!--END SEARCH-->

      <!--LOG-IN-->
        <div id="sign-in">
         <form class="form-signin" role="form" method="POST" action="<?php echo base_url();?>index.php/site/login">
          <h2 class="form-signin-heading">Please sign in</h2>
          <input type="text" class="form-custom" placeholder="Username" name="email" required autofocus>
          <input type="password" class="form-custom" placeholder="Password" name="password" required>
          <label class="checkbox">
            <input type="checkbox" name="AdminLogIn" value="remember-me">Log-in as Administrator
          </label>
          <button class="btn btn-large btn-block btn-primary" name="SignIn" type="submit" width="100%">Sign in</button>
         </form>

        <img src=<?php echo "\"".base_url()."assets/ICS Logo.png"."\""?> class="footer_logo" alt="ICS Logo"/>
        <img src=<?php echo "\"".base_url()."assets/UPLB Logo.png"."\""?> class="footer_logo" alt="UPLB Logo"/>

        </div>
      </div>
</div>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
    <script type="text/javascript" language="javascript">


      function checkemail(){
            str=contact_form.input_email.value;
            msg="";
            if(str=="") msg += " Please enter a valid email.";
            else if(!str.match(/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/))
                msg += "Invalid E-mail.";
            document.getElementsByName('promptemail')[0].innerHTML=msg;
            if(msg=="") return true;
        }

      function checkmessage(){
            str=contact_form.query_box.value;
            msg="";
            if(str=="") msg += " Please enter a message.";
            document.getElementsByName('promptmessage')[0].innerHTML=msg;
            if(msg=="") return true;
      }

      function checkheader(){
        str=contact_form.header.value;
            msg="";
            if(str=="") msg += " Please enter a header.";
            document.getElementsByName('promptheader')[0].innerHTML=msg;
            if(msg=="") return true;
      }

      function resetFields() {
        if(confirm("Do you really want to RESET all the fields?")) {
          document.getElementById('input_email').value = "";
          document.getElementById('header').value = "";
          document.getElementById('query_box').value = "";
        }
        document.getElementById("contact_form").action = document.getElementById("contact_form").action + "false";
      }

      function checkContents() {
        if(checkemail() && checkmessage() && checkheader()){
          
          if(!confirm("Are you sure of your message?")){
            document.getElementById("contact_form").action = document.getElementById("contact_form").action + "false";
            return false;
          }
          document.getElementById("contact_form").action = document.getElementById("contact_form").action + "true";
          return true;
        }
        document.getElementById("contact_form").action = document.getElementById("contact_form").action + "false";
        return false;

      } 

    </script>
  </body>
</html>