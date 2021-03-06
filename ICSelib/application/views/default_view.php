<?php include "includes/header.php"; ?>

<?php include "includes/navigation_bar.php"; ?>

  <body>

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
          <img src="<?php echo base_url();?>assets/lib1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h3 class="form-heading">University of the Philippines Los Baños</br>Institute of Computer Science</h3>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?php echo base_url();?>assets/lib2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h2 class="form-heading">Leading the Philippines in computer <br/>science education,research & extension.</h2>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?php echo base_url();?>assets/lib3.jpg" alt="Third slide">
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
      <form name="guest_search" class="form-signin" action="<?php echo base_url(); ?>index.php/site/search?page_number=1">
        <h2 class="form-signin-heading">Discover more</h2>
        <table>
          <tr>
            <td><?php include "search_home.php";?></td>
           
          </tr>
        </table>
      </form>    
      <!--END SEARCH-->

      <!--LOG-IN-->
      <div id="sign-in">
             <form name="signin_form" class="form-signin" role="form" method="POST" action="<?php echo base_url();?>index.php/site/login">
              <h2 class="form-signin-heading">Sign In</h2>
                <div class="left-inner-addon ">
                  <i class="fa fa-user fa-lg"></i>
                  <input type="text" class="form-custom" placeholder="Email" id="email" name="email" required autofocus>
                </div>
                <div class="left-inner-addon ">
                  <i class="fa fa-key fa-lg"></i>
                  <input type="password" class="form-custom" placeholder="Password" id="password" name="password" required>
                </div>
                <span name="loginprompt" id="loginprompt" hidden></span>
                <a href="/ICSelib/index.php/elib/forgot_password">Forgot password?</a>
                
              <h5 style="color: red"><?php if(isset($message)) echo $message; ?></h5>
              <label class="checkbox">
                <input type="checkbox" name="AdminLogIn" value="remember-me" data-toggle="checkbox">Log-in as Administrator
              </label>
              <button class="btn btn-large btn-block btn-primary" name="SignIn" type="submit" width="100%">Sign in</button>
             </form></br>
             <p>Not yet registered? <a data-toggle="modal" href="#signup_modal" >Sign up today</a></p>
        <img src="<?php echo base_url();?>assets/ICS Logo.png" class="footer_logo" alt="ICS Logo"/>
        <img src="<?php echo base_url();?>assets/UPLB Logo.png" class="footer_logo" alt="UPLB Logo"/>
      </div>
      <!--END LOG-IN-->
    </div><!--END FLOAT_RIGHT-->
    <div id="footer_home">
      <p class="text-muted">&copy; 2014 ICS eLib &middot; All rights reserved.</p>
    </div> 
</div>

<div class="modal fade" id="signup_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  
          <?php include "signup_view.php" ?>
  </div><!-- /.modal -->
</div>
    <script>
        window.onload=function(){
            main_form.first_name.onblur=checkfName;
            main_form.middle_name.onblur=checkmName;
            main_form.last_name.onblur=checklName;
            main_form.password.onblur=checkPassword;
            main_form.birthday.onblur=checkBday;
            main_form.student_number.onblur=checkAvailsNumber;
            main_form.employee_number.onblur=checkeNumber;
            main_form.email.onblur=checkAvailEmail;
            main_form.onsubmit=checkAll;
            signin_form.email.onblur = checkEmail;
            signin_form.onsubmit = checkAll;
        }

        function checkEmail(){
            var input = $('#email').val();
            var query = {"email":input};

            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>index.php/site/checkEmail",
                data: query,
                cache: false,
                success: function(html){
                    $('span[name="loginprompt"]').html(html);
                    $('span[name="loginprompt"]').val(html);
                }
            });

            var result = $('#loginprompt').val();
            var regex = new RegExp("Invalid");
            if(result.match(regex)){
                return false;
            }
            return true;
        }

        function checkAll(){
            if(checkEmail()){
                return true;
            }
            return false;
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
