</br>
    <div id="">
        <div id="">
            <div class="">
                <div class="container">
                    <div class="col-sm-6 col-sm-offset-3 main">
                    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h1 class="page-header">Sign-up</h1>
                        <?php $this->load->helper('url'); ?>
                        <br/>
                        <form name="main_form" action="<?php echo base_url();?>index.php/signup/insert_info/" method="post">
                            <div class="">

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
                                    <input type="date" name="birthday" id="bday" class="form-control input-mini" placeholder="YYYY-MM-DD" tabindex="4">
                                    <span name="promptbday"></span><br/>
                                </div>

                                <label for="radio_gender" style="text-align: center">Sex</label>
                                <div name="radio_gender" style="text-align: center">
                                    <input type="text" id="gender" name="gender" hidden>
                                    <div id="male_button" class="btn btn-mini btn-default custom" style="width:49%; border: 1px solid #bbbbbb;" onclick="male_buttonfunc()" tabindex="5">Male</div>
                                    <div id="female_button" class="btn btn-mini btn-default custom" style="width:49%; border: 1px solid #bbbbbb;" onclick="female_buttonfunc()" tabindex="6">Female</div>
                                </div>
                                <br/><br/>

                                <div class="form-group">
                                    <label for="email" style="text-align: center">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control input-mini" tabindex="7">
                                    <span name="promptemail"></span> <br/>
                                </div>
                                <div class="form-group" style="width:49%;float:right;">
                                    <label for="password_confirmation" style="text-align: center">Confirm Password</label>
                                    <input type="password" maxlength="16" name="password_confirmation" id="password_confirmation" class="form-control input-mini" tabindex="9">
                                    <span name="promptpassword2"></span> <br/>
                                </div>
                                <div class="form-group" style="width:49%; ">
                                    <label for="password" style="text-align: center">Password</label>
                                    <input type="password" maxlength="16" name="password" id="password" class="form-control input-mini" tabindex="8">
                                    <span name="promptpassword"></span> <br/>
                                </div>

                                <hr>

                                <!--
                                choose if student or faculty
                                -->
                                <label for="radio_type" style="text-align: center">Type</label>
                                <div name="radio_type" style="text-align: center">
                                <input type="text" id="type" name="type" hidden>
                                <div id="student_button" class="btn btn-mini btn-default custom" style="width:49%; border: 1px solid #bbbbbb;" onclick="show_student()" tabindex="10">Student</div>
                                <div id="faculty_button" class="btn btn-mini btn-default custom" style="width:49%; border: 1px solid #bbbbbb;" onclick="show_faculty()" tabindex="11">Faculty</div>
                                </div>
                                <div class="tab-content">
                                <hr>
                                <div id="student_form" style="z-index: 2;" class="tab-pane fade">

                                    <div class="form-group">
                                        <label for="student_number" style="text-align: center">Student Number</label>
                                        <input type="text" name="student_number" id="student_number" class="form-control input-mini" tabindex="12">
                                        <span name="promptstudentnumber"></span> <br/>
                                    </div>

                                    <?php $classification = array('Freshman', 'Sophomore', 'Junior', 'Senior', 'Graduate'); ?>
                                    <label for="classification">Classification</label>
                                    <select id="classification" name="classification" class="form-control input-mini" tabindex="13">
                                        <?php
                                        foreach($classification as $class){
                                            echo "<option value=\"$class\">$class</option>";
                                        }
                                        ?>
                                    </select>
                                    <br/>

                                    <label for="degree_program">Degree Program</label>
                                    <select id="degree_program" name="degree_program" class="form-control input-mini" tabindex="14">
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


                                <div id="faculty_form" style="z-index: 1;" class="tab-pane fade">
                                    <div class="form-group">
                                        <label for="employee_number" style="text-align: center">Employee Number</label>
                                        <input type="text" name="employee_number" id="employee_number" class="form-control input-mini" tabindex="15" >
                                        <span name="promptemployeenumber"></span> <br/>
                                    </div>
                                </div>
                                </div>
                                <?php /*?>
                                <div>
                                    <div class="form-group" style="width:80%">
                                        <label for="security_code" style="text-align: center">Security Code</label>
                                        <p style="font-size:0.8em">Please enter the characters that are shown in the picture below (without spaces, and upper or lower case can be used). If you cannot identify the captcha even after reloading it please contact the administrator of this site.</p>
                                        <img style="border:1px solid black;width:90px;height:50px;" src=<?php echo "\"".base_url()."assets/create_image.php"."\""?>>
                                        <input type="text" name="vercode" />
                                    </div>
                                </div>
                                <?php */?>

                                <input type="submit" name="submit" value="Submit" class="btn btn-block btn-primary"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var type;

        function male_buttonfunc(){
            document.getElementById("male_button").setAttribute("class","btn btn-primary");
            document.getElementById("female_button").setAttribute("class","btn btn-default custom");
            document.getElementById("gender").value = "Male";
        }

        function female_buttonfunc(){

            document.getElementById("female_button").setAttribute("class","btn btn-primary");
            document.getElementById("male_button").setAttribute("class","btn btn-default custom");
            document.getElementById("gender").value = "Female";
        }

        function show_student(){
            reset();
            document.getElementById("faculty_form").setAttribute("class", "tab-pane fade");
            document.getElementById("student_button").setAttribute("class","btn btn-primary");
            document.getElementById("student_form").setAttribute("class", "tab-pane fade in active");
            document.getElementById("student_number").setAttribute("required", "required");
            document.getElementById("classification").setAttribute("required","required");
            document.getElementById("degree_program").setAttribute("required", "required");
            document.getElementById("type").value = "Student";
            document.getElementsByName('promptemployeenumber')[0].innerHTML="";
        }

        function show_faculty(){
            reset();
            document.getElementById("student_form").setAttribute("class", "tab-pane fade");
            document.getElementById("faculty_button").setAttribute("class","btn btn-primary");
            document.getElementById("faculty_form").setAttribute("class", "tab-pane fade in active");
            document.getElementById("type").value = "Faculty";
            document.getElementsByName('promptstudentnumber')[0].innerHTML="";
            document.getElementById("employee_number").setAttribute("required", "required");
        }

        function reset(){
            document.getElementById("student_form").setAttribute("class", "tab-pane fade");
            document.getElementById("faculty_form").setAttribute("class", "tab-pane fade");
            document.getElementById("faculty_button").setAttribute("class","btn btn-large btn-default custom");
            document.getElementById("student_button").setAttribute("class","btn btn-large btn-default custom");

            document.getElementById("student_number").removeAttribute("required", "required");
            document.getElementById("classification").removeAttribute("required", "required");
            document.getElementById("degree_program").removeAttribute("required", "required");
            document.getElementById("employee_number").removeAttribute("required", "required");
        }

        window.onload=function(){
            main_form.first_name.onblur=checkfName;
            main_form.middle_name.onblur=checkmName;
            main_form.last_name.onblur=checklName;
            main_form.password.onblur=checkPassword;
            main_form.birthday.onblur=checkBday;
            main_form.student_number.onblur=checksNumber;
            main_form.employee_number.onblur=checkeNumber;
            main_form.onsubmit=checkAll;
        }

        function checksNumber() {
            str=main_form.student_number.value;
            msg="";
            if(str=="") msg += " Please fill out this field.";
            else if(!str.match(/^[0-9]{4}\-[0-9]{5}$/))
                msg += "Invalid student number.";
            document.getElementsByName('promptstudentnumber')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkeNumber() {
            str=main_form.employee_number.value;
            msg="";
            if(str=="") msg += " Please fill out this field.";
            else if(!str.match(/^[0-9]{15}$/))
                msg += "Invalid employee number.";
            document.getElementsByName('promptemployeenumber')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkfName(){
            str=main_form.first_name.value;
            msg="";
            if(str=="") msg += " Please fill this out this field.";
            else if(!str.match(/^[a-zA-Z0-9\ \-]+[\.]?[a-zA-Z0-9\ \-]*$/))
                msg += " Only letters hyphens and spaces are allowed.";
            console.log(str.match(/^[a-zA-Z\ \-\.]+$/));
            document.getElementsByName('promptfname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkmName(){
            str=main_form.middle_name.value;
            msg="";
            if(!str.match(/^[a-zA-Z\ \-]+$/))
                msg += " Only letters hyphens and spaces are allowed.";
            if(str.trim().length==0) msg ="";
            document.getElementsByName('promptmname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checklName(){
            str=main_form.last_name.value;
            msg="";
            if(str=="") msg += " Please fill out this field.";
            else if(!str.match(/^[Ñña-zA-Z0-9\ \-\.]+$/))
                msg += " Only alphanumeric characters, hyphens, dots and spaces are allowed.";
            document.getElementsByName('promptlname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkBday(){
            str=main_form.birthday.value;
            bdate = new Date(str);
            date = new Date();
            diff = date.getFullYear() - bdate.getFullYear();

            if(date.getMonth() < bdate.getMonth()){
                diff--;
            }
            else if(date.getDate() < bdate.getDate()){
                diff--;
            }
            alert(date.getDate() + " " + bdate.getDate());
            alert(diff);
            msg="";
            if(str=="") msg += " Please fill out this field.";
            else if(!str.match(/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/))
                msg += " Invalid date format (MM/DD/YYYY).";
            else if(diff < 13)
                msg += " Registrant is too young to use the system.";
            document.getElementsByName('promptbday')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkemail(){
            str=main_form.email.value;
            msg="";
            if(str=="") msg += " Please fill out this field.";
            else if(!str.match(/^([a-zA-Z0-9_-]+[\.]?[a-zA-Z0-9])+@([\da-z\.-]+)\.([a-z\.]{2,6})$/))
                msg += "Invalid E-mail.";
            document.getElementsByName('promptemail')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkPassword(){
            str=main_form.password.value;
            msg="";
            if(str=="") msg = "Please fill out this field.";
            else if(str.match(/^[a-zA-Z0-9]{1,3}$/)){
                msg+=" Password must be 4-16 long.";
            }
            else if(!str.match(/^[a-zA-Z0-9]+$/)){
                msg+="Special characters not allowed.";
            }
            else if(str.match(/^[a-z]+$/) || str.match(/^[0-9]+$/)){
                msg="Is that all you got?";
                if(str.match(/^[a-z]+$/) && str.match(/^[0-9]+$/)){
                    msg="You can do better man.";
                    console.log('average');
                    if(str.match(/^([a-z]+[A-Z]+[0-9]+)+$/) || 
                    str.match(/^([a-z]+[0-9]+[A-Z]+)+$/) || 
                    str.match(/^([0-9]+[a-z]+[A-Z]+)+$/) || 
                    str.match(/^([0-9]+[A-Z]+[a-z]+)+$/) || 
                    str.match(/^([A-Z]+[0-9]+[a-z]+)+$/) ||
                    str.match(/^([A-Z]+[a-z]+[0-9]+)+$/)){
                        console.log('strong');
                        msg="Good job. :)";
                    }
                }
            }
            
            document.getElementsByName('promptpassword')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function matchPassword(){
            str1=main_form.password.value;
            str2=main_form.password_confirmation.value;
            msg="";
            if(str2=="") msg += " Please fill out this field.";
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

        function checkAvailsNumber(){
            var input = $('#student_number').val();
            var query = {"student_number":input};
            var result;
            
            function setResult(i){
                result = i;
            }
            
            if(checksNumber()){
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>index.php/signup/checkAvailsNumber",
                    data: query,
                    cache: false,
                    success: function(html){
                        $('span[name="promptstudentnumber"]').html(html);
                        $('span[name="promptstudentnumber"]').val(html);
                    }
                });
            }

            var result = ($('span[name="promptstudentnumber"]').val());
            var regex = new RegExp("available"); 
            if(result.match(regex)){
                return true;
            }
            return false;
        }
        
        function checkAll(){

           if(checkfName() && checklName() && checkBday() && checkemail() && checkmName() && checkPassword() && matchPassword() && checkAvailEmail() && checkAvailsNumber()){
                if(document.getElementById("type").value == "Student" && checksNumber())
                    return true;
                else if(document.getElementById("type").value == "Faculty" && checkeNumber())
                    return true;
            }
            return false;
        }

        </script>
        <script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
        <script>
        $(document).ready(function(){

            $("#email").keyup(function(){
                checkAvailEmail();
            });

            $("#student_number").keyup(function(){
                checkAvailsNumber();
            });

            $("#password_confirmation").keyup(function(){
                matchPassword();
            });

        });

    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
        <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
        <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>

</br>