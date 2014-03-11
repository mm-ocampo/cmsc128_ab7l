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
 
<!DOCTYPE html>

<html>

    <head>
        <title>Sign Up</title>
    </head>

    <body>

    <?php include('header_default.php'); ?>

    <div id="">
        <div id="">
            <div class="">
                <div class="container">
                    <div class="col-sm-7 col-sm-offset-2 main container">

                        <?php $this->load->helper('url'); ?>
                        <br/>
                        <form name="main_form" action="<?php echo base_url();?>index.php/signup/insert_info/" method="post">
                            <hr>
                            <div class="row">
                                <div class="form-group">
                                    <label for="fname" style="text-align: center">First Name</label>
                                    <input type="text" name="first_name" id="fname" class="form-control input-mini" tabindex="1">
                                    <span name="promptfname"></span><br/>
                                </div>
                                <div class="form-group">
                                    <label for="mname" style="text-align: center">Middle Name</label>
                                    <input type="text" name="middle_name" id="mname" class="form-control input-mini" tabindex="2">
                                    <span name="promptmname"></span><br/>
                                </div>
                                <div class="form-group">
                                    <label for="lname" style="text-align: center">Last Name</label>
                                    <input type="text" name="last_name" id="lname" class="form-control input-mini" tabindex="3">
                                    <span name="promptlname"></span><br/>
                                </div>

                                <div class="form-group">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" name="birthday" id="bday" class="form-control input-mini" placeholder="Birthday" tabindex="4">
                                    <span name="promptbday"></span><br/>
                                </div>

                                <label for="radio_gender" style="text-align: center">Sex</label>
                                <div name="radio_gender" style="text-align: center">
                                    <input type="text" id="gender" name="gender" hidden>
                                    <div id="male_button" class="btn btn-primary" style="width:49%" onclick="male_buttonfunc()">Male</div>
                                    <div id="female_button" class="btn btn-mini btn-default custom" style="width:49%" onclick="female_buttonfunc()">Female</div>
                                </div>
                                <br/><br/>

                                <div class="form-group">
                                    <label for="email" style="text-align: center">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control input-mini" tabindex="5">
                                    <span name="promptemail"></span> <br/>
                                </div>
                                <div class="form-group" style="width:49%;float:right;">
                                    <label for="password_confirmation" style="text-align: center">Confirm Password</label>
                                    <input type="password" maxlength="16" name="password_confirmation" id="password_confirmation" class="form-control input-mini" tabindex="7">
                                    <span name="promptpassword2"></span> <br/>
                                </div>
                                <div class="form-group" style="width:49%; ">
                                    <label for="password" style="text-align: center">Password</label>
                                    <input type="password" maxlength="16" name="password" id="password" class="form-control input-mini" tabindex="6">
                                    <span name="promptpassword"></span> <br/>
                                </div>

                                <hr>

                                <!--
                                choose if student or faculty
                                -->
                                <label for="radio_type" style="text-align: center">Type</label>
                                <div name="radio_type" style="text-align: center">
                                <input type="text" id="type" name="type" hidden>
                                <div id="student_button" class="btn btn-primary" style="width:49%" onclick="show_student()">Student</div>
                                <div id="faculty_button" class="btn btn-mini btn-default custom" style="width:49%" onclick="show_faculty()">Faculty</div>
                                </div>

                                <div id="student_form" style="z-index: 2;">
                                    <hr>

                                    <div class="form-group">
                                        <label for="student_number" style="text-align: center">Student Number</label>
                                        <input type="text" name="student_number" id="student_number" class="form-control input-mini" tabindex="8">
                                        <span name="promptstudentnumber"></span> <br/>
                                    </div>

                                    <?php $classification = array('Freshman', 'Sophomore', 'Junior', 'Senior', 'Graduate'); ?>
                                    <label for="classification">Classification</label>
                                    <select id="classification" name="classification" class="form-control input-mini">
                                        <?php
                                            foreach($classification as $class){
                                                echo "<option value=\"$class\">$class</option>";
                                            }
                                        ?>
                                    </select>
                                    <br/>

                                    <label for="degree_program">Degree Program</label>
                                    <select id="degree_program" name="degree_program" class="form-control input-mini">
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


                                <div id="faculty_form" readonly style="z-index: 1;">
                                    <div class="form-group">
                                        <label for="employee_number" style="text-align: center">Employee Number</label>
                                        <input type="text" name="employee_number" id="employee_number" class="form-control input-mini" tabindex="9" readonly="readonly">
                                    </div>
                                </div>

                                <input type="submit" name="submit" value="Submit" class="btn btn-block btn-primary"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
		
			alert("Success! You have completed providing the required information. Please wait for the librarian's confirmation via email before using your account.");
			window.location.href = "../../";
    </script>

	</body>
</html>
    

