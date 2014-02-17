<?php

?>

<link href="css/bootstrap.css" rel="stylesheet">
 
<link href="css/bootstrap-theme.min.css" rel="stylesheet">

<link href="css/pattern.css" rel="stylesheet">

<!DOCTYPE html>

<html>

    <head>
        <title>Sign Up</title>
    </head>

    <body>

    <!--header---------------------------------------------------------------------------------------------------------->
    <!--?php include('header.html');?-->

    <!--navigator------------------------------------------------------------------------------------------------------>
    <div id="navigator">

    </div>
    <!--main------------------------------------------------------------------------------------------------------------>

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
                                    <input type="text" maxlength="16" name="user_name" id="uname" class="form-control input-lg" placeholder="Desired Username" tabindex="3">
                                    <span name="promptusername"></span> <br/>
                                </div>
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
                                        <label for="faulty"><div id="faculty_button" class="btn btn-large btn-default custom" onclick="show_faculty()">Faculty</div></label>
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

                                    <input type="submit" name="submit" value="submit" class="btn btn-block btn-primary"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--footer---------------------------------------------------------------------------------------------------------->
    <?php include("footer.html"); ?>

    <script type="text/javascript">
        var type;

        function male_buttonfunc(){
            document.getElementById("male_button").setAttribute("class","btn btn-large  btn-default custom active");
            document.getElementById("female_button").setAttribute("class","btn btn-large  btn-default custom");
            document.getElementById("gender").value = 'Male';
            console.log(document.getElementById("gender").value);
        }

        function female_buttonfunc(){

            document.getElementById("female_button").setAttribute("class","btn btn-large  btn-default custom active");
            document.getElementById("male_button").setAttribute("class","btn btn-large  btn-default custom");
            document.getElementById("gender").value = 'Female';
            console.log(document.getElementById("gender").value);
        }

        function show_student(){
            reset();
            document.getElementById("student_form").setAttribute("class", " ");
            document.getElementById("student_button").setAttribute("class","btn btn-large  btn-default custom active");
            document.getElementById("type").value = 0;
        }

        function show_faculty(){
            reset();
            document.getElementById("faculty_form").setAttribute("class", " ");
            document.getElementById("faculty_button").setAttribute("class","btn btn-large  btn-default custom active");
            document.getElementById("type").value = 1;
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
            main_form.password_confirmation.onblur=matchPassword;
            main_form.user_name.onblur=checkuName;
            main_form.email.onblur=checkemail;
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
            console.log("snumber");
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
            console.log("fname");
        }
		
		function checkmName(){
            str=main_form.middle_name.value;
            msg="";
            if(str=="") msg += " Please fill this out this field.";
            else if(!str.match(/^[a-zA-Z\ \-\.]+$/))
                msg += " Only letters hyphens and spaces are allowed.";
			document.getElementsByName('promptmname')[0].innerHTML=msg;
            if(msg=="") return true;
            console.log("mname");
        }

        function checklName(){
            str=main_form.last_name.value;
            msg="";
            if(str=="") msg += " Please fill this out this field.";
            else if(!str.match(/^[a-zA-Z\ \-\.]+$/))
                msg += " Only letters, hyphens and spaces are allowed.";
            document.getElementsByName('promptlname')[0].innerHTML=msg;
            if(msg=="") return true;
            console.log("lname");
        }

        function checkBday(){
            str=main_form.birthday.value;
            msg="";
            if(str=="") msg += " Please fill this out this field.";
            else if(!str.match(/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/))
                msg += " Invalid date format (YYYY-MM-DD).";
            document.getElementsByName('promptbday')[0].innerHTML=msg;
            if(msg=="") return true;
            console.log("bday");
        }

        function checkuName(){
            str=main_form.user_name.value;
            msg="";
            if(str=="") msg += " Please fill this out this field.";
            else if(!str.match(/^[a-zA-Z0-9._]{4,16}$/))
                msg += " Must be 4-16 characters. Only letters, numbers, hyphens and dots are allowed.";
            document.getElementsByName('promptusername')[0].innerHTML=msg;
            if(msg=="") return true;
            console.log("uname");
        }

        function checkemail(){
            str=main_form.email.value;
            msg="";
            if(str=="") msg += " Please fill this out this field.";
            else if(!str.match(/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/))
                msg += "Invalid E-mail.";
            document.getElementsByName('promptemail')[0].innerHTML=msg;
            if(msg=="") return true;
            console.log("mail");
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
            console.log("pword1");
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
            console.log("pword2");
        }

        function checkAll(){
            if(checkfName()&& checklName() && checkBday() && checkemail() && checkemail() && checkmName() && checkPassword() && matchPassword() && checksNumber() && checkuName()){
                return true;
            }
            alert("omg");
            return false;
        }
    </script>

    <style>
        [type="radio"]{
           display:none;
        }
    </style>
	</body>
</html>