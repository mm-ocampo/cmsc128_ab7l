<?php

?>

 <!-- Bootstrap core CSS -->
    <link href=<?php echo "\"".base_url()."assets/dist/css/bootstrap.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/signin.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/carousel.css"."\""?> rel="stylesheet">

<!DOCTYPE html>

<html>

    <head>
        <title>Sign Up</title>
    </head>

    <body>


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
              <li class="active"><a href="/UI128/">Home</a></li>
              <li><a href="/UI128/index.php/elib/about_view">About ICS</a></li>
              <li><a href="/UI128/index.php/elib/contact_us_view">Contact Us</a></li>
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

    <div id="main">
        <div id="box">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                        <?php $this->load->helper('url'); ?>
                        <form name="main_form" action="<?php echo base_url();?>index.php/signup/insert_info/" method="post">
                            <h2>Sign Up</h2>
                            <hr>
                            <div class="row">

                                <div class="form-group">
                                    <input type="text" name="first_name" id="fname" class="form-control input-lg" placeholder="First Name" tabindex="3">
                                    <span name="promptfname"></span> <br/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="middle_name" id="mname" class="form-control input-lg" placeholder="Middle Name" tabindex="3">
                                    <span name="promptmname"></span> <br/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="last_name" id="lname" class="form-control input-lg" placeholder="Last Name" tabindex="3">
                                    <span name="promptlname"></span> <br/>
                                </div>

                                <div class="form-group">
                                    <input type="date" name="birthday" id="bday" class="form-control input-lg" placeholder="Birthday" tabindex="3">
                                    <span name="promptbday"></span> <br/>
                                </div>

                                <div id="gender" class="btn-group" data-toggle="buttons-radio">
                                    <label for="male"><div id ="male_button" class="btn btn-large btn-default custom" onclick="male_buttonfunc()">Male</div></label>
                                    <input name="sex" type="radio" data-toggle="tab" id="male" value="Male"/>
                                    <label for="female"><div id="female_button" class="btn btn-large btn-default custom" onclick="female_buttonfunc()">Female</div></label>
                                    <input name="sex" type="radio" data-toggle="tab" id="female" value="Female"/>
                                </div><br><br>

                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                                    <span name="promptemail"></span> <br/>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" maxlength="16" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                                            <span name="promptpassword"></span> <br/>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" maxlength="16" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                                            <span name="promptpassword2"></span> <br/>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <!--
                                    choose if student or faculty
                                    -->
                                    <div id="type" class="btn-group" data-toggle="buttons-radio">
                                        <label for="student"><div id="student_button" class="btn btn-large btn-default custom" onclick="show_student()">Student</div></label>
                                        <input id="student" name="type" data-toggle="tab" type="radio" value="Student"/>
                                        <label for="faculty"><div id="faculty_button" class="btn btn-large btn-default custom" onclick="show_faculty()">Faculty</div></label>
                                        <input id="faculty" name="type" data-toggle="tab" type="radio" value="Faculty"/>
                                    </div><br><br>

                                    <div id="student_form" class="invisible">
                                        <hr>

                                        <div class="form-group">
                                            <input type="text" name="student_number" id="student_number" class="form-control input-lg" placeholder="Student Number" tabindex="3">
                                            <span name="promptstudentnumber"></span> <br/>
                                        </div>
                                        <br/>
                                        <label for="classification">Classification</label>
                                        <select name="classification" class="form-control input-lg">
                                            <option value="freshman">Freshman</option>
                                            <option value="sophomore">Sophomore</option>
                                            <option value="junior">Junior</option>
                                            <option value="senior">Senior</option>
                                            <option value="graduate">Graduate</option>
                                        </select>
                                        <br/>

                                        <label for="degree_program">Degree Program</label>
                                        <select name="degree_program" class="form-control input-lg">
                                            <option value="BSABM">BS Agribusiness Management</option>
                                            <option value="BSABT">BS Agricultural Biotechnology</option>
                                            <option value="BSAgChem">BS Agricultural Chemistry</option>
                                            <option value="BSAgEcon">BS Agricultural Economics</option>
                                            <option value="BSABE">BS Agricultural and Biosystems Engineering</option>
                                            <option value="BSA">BS Agriculture</option>
                                            <option value="BSAMATH">BS Applied Mathematics</option>
                                            <option value="BSAPhy">BS Applied Physics</option>
                                            <option value="BSBio">BS Biology</option>
                                            <option value="BSChemEng">BS Chemical Engineering</option>
                                            <option value="BSChem">BS Chemistry</option>
                                            <option value="BSCE">BS Civil Engineering</option>
                                            <option value="BAComArts">BA Communication Arts</option>
                                            <option value="BSCS">BS Computer Science</option>
                                            <option value="BSDevCom">BS Development Communication</option>
                                            <option value="BSEcon">BS Economics</option>
                                            <option value="BSEE">BS Electrical Engineering</option>
                                            <option value="BSFT">BS Food Technology</option>
                                            <option value="BSF">BS Forestry</option>
                                            <option value="BSHumanEco">BS Human Ecology</option>
                                            <option value="BSIE">BS Industrial Engineering</option>
                                            <option value="BSMATH">BS Mathematics</option>
                                            <option value="BSMST">BS Mathematics and Science Teaching</option>
                                            <option value="BSN">BS Nutrition</option>
                                            <option value="BAPhilo">BA Philosophy</option>
                                            <option value="BASocio">BA Sociology</option>
                                            <option value="BSSTAT">BS Statistics</option>
                                            <option value="DVetMed">D Veterinary Medicine</option>

                                        </select>

                                        <br/>
                                    </div>

                                    <div id="faculty_form" class="invisible">
                                        <hr>
                                        <div class="form-group">
                                            <input type="text" name="employee_number" id="employee_number" class="form-control input-lg" placeholder="Employee Number" tabindex="3">
                                            <br/>
                                        </div>
                                        <hr/>
                                    </div>

                                    <input type="submit" name="submit" value="Submit" class="btn btn-block btn-primary"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--footer---------------------------------------------------------------------------------------------------------->
    <?php include("includes/footer.php"); ?>

    <script type="text/javascript">
        var type;

        function male_buttonfunc(){
            document.getElementById("male_button").setAttribute("class","btn btn-primary");
            document.getElementById("female_button").setAttribute("class","btn btn-default custom");
            document.getElementById("gender").value = 'Male';
            console.log(document.getElementById("gender").value);
        }

        function female_buttonfunc(){

            document.getElementById("female_button").setAttribute("class","btn btn-primary");
            document.getElementById("male_button").setAttribute("class","btn btn-default custom");
            document.getElementById("gender").value = 'Female';
            console.log(document.getElementById("gender").value);
        }

        function show_student(){
            reset();
            document.getElementById("student_form").setAttribute("class", " ");
            document.getElementById("student_button").setAttribute("class","btn btn-primary");
            document.getElementById("type").value = "Student";
            console.log(document.getElementById("type").value);
        }

        function show_faculty(){
            reset();
            document.getElementById("faculty_form").setAttribute("class", " ");
            document.getElementById("faculty_button").setAttribute("class","btn btn-primary");
            document.getElementById("type").value = "Faculty";
            console.log(document.getElementById("type").value);
        }

        function reset(){
            document.getElementById("student_form").setAttribute("class", "invisible");
            document.getElementById("faculty_form").setAttribute("class", "invisible");
            document.getElementById("faculty_button").setAttribute("class","btn btn-large  btn-default custom");
            document.getElementById("student_button").setAttribute("class","btn btn-large  btn-default custom");
        }

        window.onload=function(){
            main_form.first_name.onblur=checkfName;
            main_form.middle_name.onblur=checkmName;
            main_form.last_name.onblur=checklName;
            main_form.password.onblur=checkPassword;
            main_form.birthday.onblur=checkBday;
            main_form.student_number.onblur=checksNumber;
            main_form.onsubmit=checkAll;
        }

        function checksNumber() {
            str=main_form.student_number.value;
            msg="";
            if(str=="") msg += " Please fill this out this field.";
            else if(!str.match(/^[0-9]{4}\-[0-9]{5}$/))
                msg += "Invalid student number.";
            document.getElementsByName('promptstudentnumber')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkfName(){
            str=main_form.first_name.value;
            msg="";
            if(str=="") msg += " Please fill this out this field.";
            else if(!str.match(/^[a-zA-Z\ \-\.]+$/))
                msg += " Only letters hyphens and spaces are allowed.";
            console.log(str.match(/^[a-zA-Z\ \-\.]+$/));
            document.getElementsByName('promptfname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkmName(){
            str=main_form.middle_name.value;
            msg="";
            if(str=="") msg += " Please fill this out this field.";
            else if(!str.match(/^[a-zA-Z\ \-\.]+$/))
                msg += " Only letters hyphens and spaces are allowed.";
            document.getElementsByName('promptmname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checklName(){
            str=main_form.last_name.value;
            msg="";
            if(str=="") msg += " Please fill this out this field.";
            else if(!str.match(/^[a-zA-Z\ \-\.]+$/))
                msg += " Only letters, hyphens and spaces are allowed.";
            document.getElementsByName('promptlname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkBday(){
            str=main_form.birthday.value;
            msg="";
            if(str=="") msg += " Please fill this out this field.";
            else if(!str.match(/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/))
                msg += " Invalid date format (YYYY-MM-DD).";
            document.getElementsByName('promptbday')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkemail(){
            str=main_form.email.value;
            msg="";
            if(str=="") msg += " Please fill this out this field.";
            else if(!str.match(/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/))
                msg += "Invalid E-mail.";
            document.getElementsByName('promptemail')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkPassword(){
            str=main_form.password.value;
            msg=" ";
            if(str=="") msg = "Please fill this out this field.";
            else if(str.match(/^[a-zA-Z0-9]{1,3}$/)){
                msg+=" Password must be 4-16 long.";
                document.getElementsByName('promptpassword')[0].innerHTML=msg;
            }
            else if(!str.match(/^[a-zA-Z0-9]+$/)){
                msg+="Special characters not allowed.";
                document.getElementsByName('promptpassword')[0].innerHTML=msg;
            }
            else if(str.match(/^[a-z]+$/)){
                msg+=" Weak :(";
                document.getElementsByName('promptpassword')[0].innerHTML=msg;
                msg = "";
            }
            else if(str.match(/^[0-9]+$/)){
                msg+=" Weak :(";
                document.getElementsByName('promptpassword')[0].innerHTML=msg;
                msg = "";
            }
            else if(str.match(/^[a-z0-9]+$/)){
                msg+=" Fair :|";
                document.getElementsByName('promptpassword')[0].innerHTML=msg;
                msg = "";
            }
            else if(str.match(/^[a-zA-Z0-9]+$/)){
                msg+=" Strong :)";
                document.getElementsByName('promptpassword')[0].innerHTML=msg;
                msg = "";
            }
            document.getElementsByName('promptpassword')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function matchPassword(){
            str1=main_form.password.value;
            str2=main_form.password_confirmation.value;
            msg="";
            if(str2=="") msg += " Please fill this out this field.";
            if(!(str1==str2))
                msg+=" Passwords do not match";
            document.getElementsByName('promptpassword2')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkAvailEmail(){
            var input = $('#email').val();
            var query = {"email":input};
            var result;

            function setResult(i){
                result = i;
            }

            if(checkemail()){
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>index.php/signup/checkAvailEmail",
                    data: query,
                    cache: false,
                    success: function(html){
                        $('span[name="promptemail"]').html(html);
                        $('span[name="promptemail"]').val(html);
                    }
                });
            }

            var result = ($('span[name="promptemail"]').val());
            var regex = new RegExp("available");
            if(result.match(regex)){
                return true;
            }
            return false;
        }

        function checkAll(){
            if(checkfName() && checklName() && checkBday() && checkemail() && checkmName() && checkPassword() && matchPassword() && checkAvailEmail()){
                return true;
            }
            return false;
        }
    </script>

    <script src="<?php echo base_url();?>/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url();?>/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url();?>/js/main.js"></script>
    <script>

        $(document).ready(function(){

            $("#email").keyup(function(){
               checkAvailEmail();
            });

            $("#password_confirmation").keyup(function(){
               matchPassword();
            });

        });

    </script>

    <style>
        [type="radio"]{
            display:none;
        }
    </style>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
        <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
        <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
        <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
	</body>
</html>                                                                        