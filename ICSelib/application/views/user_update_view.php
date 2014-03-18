<!DOCTYPE html> 
<html> 
    <head>    
        <title>Edit Account Details</title>        
    </head> 
  
    <body>
        <div id="user_update_profile"> 
            <form name="user_update" method="POST" action="<?php echo base_url();?>index.php/site/update_account" onsubmit="return checkAll();"> 
                <input type="hidden" id="email" name="email" value="<?php echo($results['email'] != ''?$results['email']:'');?>"/> 
                <!--Name-->
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="first_name" id="fname" maxlength="30" class="form-control input-lg" placeholder="First Name" value="<?php echo($results['first_name'] != '')?$results['first_name']:'';?>"tabindex="1">
                    <span name="promptfname"></span> <br/>
                </div>
                <div class="form-group">
                    <label for="mname">Middle Name</label>
                    <input type="text" name="middle_name" id="mname" maxlength="30" class="form-control input-lg" placeholder="Middle Name" value="<?php echo($results['middle_name'] != '')?$results['middle_name']:'';?>" tabindex="1">
                    <span name="promptmname"></span> <br/>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="last_name" id="lname" maxlength="30" class="form-control input-lg" placeholder="Last Name" value="<?php echo($results['last_name'] != ''?$results['last_name']:'');?>" tabindex="1">
                    <span name="promptlname"></span> <br/>
                </div>
                <!--End of Name-->

                <div class="form-group">
                    <label for="birth_date">Date of Birth</label>
                    <input type="date" name="birth_date" id="birth_date" class="form-control input-lg" placeholder="Birthday" value="<?php echo($results['birth_date'] != ''?$results['birth_date']:'');?>" tabindex="4">
                    <span name="promptbday"></span> <br/>
                </div>

                        <div id="student_form" class="<?php echo($results['is_student'] == 0)?'invisible':'';?>">
                            <hr>

                        <div class="form-group">
                            <label for="student_number">Student No.</label>
                            <input type="text" name="student_number" id="student_number" maxlength="10" class="form-control input-lg" placeholder="Student Number" value="<?php echo($results['student_number'] != ''?$results['student_number']:'');?>" tabindex="5">
                            <span name="promptstudentnumber"></span> <br/>
                        </div>
                        <br/>
                        <label for="classification">Classification</label>
                        <select name="classification" class="form-control input-lg" tabindex="6">
                            <option value="FM" <?php echo($results['classification'] == 'FM')?'selected':'';?>>Freshman</option>
                            <option value="SO" <?php echo($results['classification'] == 'SO')?'selected':'';?>>Sophomore</option>
                            <option value="JR" <?php echo($results['classification'] == 'JR')?'selected':'';?>>Junior</option>
                            <option value="SR" <?php echo($results['classification'] == 'SR')?'selected':'';?>>Senior</option>
                            <option value="G" <?php echo($results['classification'] == 'G')?'selected':'';?>>Graduate</option>
                        </select>
                        <br/>

                        <label for="degree_program">Degree Program</label>
                        <select name="degree_program" class="form-control input-lg" tabindex="7">
                            <option value="BSABM" <?php echo($results['degree_program'] == 'BSABM')?'selected':'';?> >BS Agribusiness Management</option>
                                            <option value="BSABT" <?php echo($results['degree_program'] == 'BSABT')?'selected':'';?> >BS Agricultural Biotechnology</option>
                                            <option value="BSAgChem" <?php echo($results['degree_program'] == 'BSAgChem')?'selected':'';?> >BS Agricultural Chemistry</option>
                                            <option value="BSAgEcon" <?php echo($results['degree_program'] == 'BSAgEcon')?'selected':'';?> >BS Agricultural Economics</option>
                                            <option value="BSABE" <?php echo($results['degree_program'] == 'BSABE')?'selected':'';?> >BS Agricultural and Biosystems Engineering</option>
                                            <option value="BSA" <?php echo($results['degree_program'] == 'BSA')?'selected':'';?> >BS Agriculture</option>
                                            <option value="BSAMATH" <?php echo($results['degree_program'] == 'BSAMATH')?'selected':'';?> >BS Applied Mathematics</option>
                                            <option value="BSAPhy" <?php echo($results['degree_program'] == 'BSAPhy')?'selected':'';?> >BS Applied Physics</option>
                                            <option value="BSBio" <?php echo($results['degree_program'] == 'BSBio')?'selected':'';?> >BS Biology</option>
                                            <option value="BSChemEng" <?php echo($results['degree_program'] == 'BSChemEng')?'selected':'';?> >BS Chemical Engineering</option>
                                            <option value="BSChem" <?php echo($results['degree_program'] == 'BSChem')?'selected':'';?> >BS Chemistry</option>
                                            <option value="BSCE" <?php echo($results['degree_program'] == 'BSCE')?'selected':'';?> >BS Civil Engineering</option>
                                            <option value="BAComArts" <?php echo($results['degree_program'] == 'BAComArts')?'selected':'';?> >BA Communication Arts</option>
                                            <option value="BSCS" <?php echo($results['degree_program'] == 'BSCS')?'selected':'';?> >BS Computer Science</option>
                                            <option value="BSDevCom" <?php echo($results['degree_program'] == 'BSDevCom')?'selected':'';?> >BS Development Communication</option>
                                            <option value="BSEcon" <?php echo($results['degree_program'] == 'BSEcon')?'selected':'';?> >BS Economics</option>
                                            <option value="BSEE" <?php echo($results['degree_program'] == 'BSEE')?'selected':'';?> >BS Electrical Engineering</option>
                                            <option value="BSFT" <?php echo($results['degree_program'] == 'BSFT')?'selected':'';?> >BS Food Technology</option>
                                            <option value="BSF" <?php echo($results['degree_program'] == 'BSF')?'selected':'';?> >BS Forestry</option>
                                            <option value="BSHumanEco" <?php echo($results['degree_program'] == 'BSHumanEco')?'selected':'';?> >BS Human Ecology</option>
                                            <option value="BSIE" <?php echo($results['degree_program'] == 'BSIE')?'selected':'';?> >BS Industrial Engineering</option>
                                            <option value="BSMATH" <?php echo($results['degree_program'] == 'BSMATH')?'selected':'';?> >BS Mathematics</option>
                                            <option value="BSMST"<?php echo($results['degree_program'] == 'BSMST')?'selected':'';?> >BS Mathematics and Science Teaching</option>
                                            <option value="BSN" <?php echo($results['degree_program'] == 'BSN')?'selected':'';?> >BS Nutrition</option>
                                            <option value="BAPhilo" <?php echo($results['degree_program'] == 'BAPhilo')?'selected':'';?> >BA Philosophy</option>
                                            <option value="BASocio" <?php echo($results['degree_program'] == 'BASocio')?'selected':'';?> >BA Sociology</option>
                                            <option value="BSSTAT" <?php echo($results['degree_program'] == 'BSSTAT')?'selected':'';?> >BS Statistics</option>
                                            <option value="DVetMed" <?php echo($results['degree_program'] == 'DVetMed')?'selected':'';?> >D Veterinary Medicine</option>

                        </select>
                    </div>
                      
                    </br>  
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control input-lg" placeholder="Password" value="<?php for($i=0; $i<strlen($results['password'] != ''?$results['password']:''); $i++) echo "*";?>" disabled tabindex="8">
                        </div> 
                    
                    <a data-toggle="modal" href="#change_password_modal">Change Password</a>
                
                </br></br>

                    <div id="faculty_form" class="<?php echo($results['is_faculty'] == 0)?'invisible':'';?>">
                        <hr>
                        <div class="form-group">
                            <input type="text" name="employee_number" id="employee_number" maxlength="15" class="form-control input-lg" placeholder="Employee Number" tabindex="9"> <span name="promptemployeenumber"></span>
                        </div>
                        <hr/>
                    </div>
                <div class="form-actions col-sm-offset-4" id="cut">
                <button type="submit" id="submit" class="btn btn-primary" tabindex="10">Save changes</button>
                <a href="<?php echo base_url();?>index.php/site/get_my_library_data"><button type="button" class="btn" tabindex="11">Cancel</button></a>
                </div>
            </form>
        </div>      
        </div> 
    </body>

    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."js/main.js"."\""?> ></script>
    <script type="text/javascript" language="javascript">
        window.onload=function(){
            user_update.first_name.onblur=checkfName;
            user_update.middle_name.onblur=checkmName;
            user_update.last_name.onblur=checklName;
            user_update.student_number.onblur=checksNumber;
            user_update.employee_number.onblur=checkeNumber;
            user_update.birthday.onblur=checkBday;
            user_update.onsubmit=checkAll;
        }

        function checksNumber() {
            str=user_update.student_number.value;
            msg="";
            if(str.trim().length==0) msg += " Please fill this out this field.";
            else if(!str.match(/^[0-9]{4}\-[0-9]{5}$/))
                msg += "Invalid student number.";
            document.getElementsByName('promptstudentnumber')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkeNumber() {
            str=user_update.employee_number.value;
            msg="";
            if(str.trim().length==0) msg += " Please fill this out this field.";
            else if(!str.match(/^[0-9]{9}$/))
                msg += "Invalid employee number. Must consist of only 9 digits.";
            document.getElementsByName('promptemployeenumber')[0].innerHTML=msg;
            if(msg=="") return true;
        }


        function checkfName(){
            str=user_update.first_name.value;
            msg="";
            if(str.trim().length==0) msg += " Please fill this out this field.";
            else if(!str.match(/^[a-zA-Z\ \-\.]+$/))
                msg += " Only letters hyphens and spaces are allowed.";
//            console.log(str.match(/^[a-zA-Z\ \-\.]+$/));
            document.getElementsByName('promptfname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkmName(){
            str=user_update.middle_name.value;
            msg="";
            if(str.trim().length==0) msg += " Please fill out this field.";
            else if(!str.match(/^[a-zA-Z\ \-\.]+$/))
                msg += " Only letters hyphens and spaces are allowed.";
            document.getElementsByName('promptmname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checklName(){
            str=user_update.last_name.value;
            msg="";
            if(str.trim().length==0) msg += " Please fill out this field.";
            else if(!str.match(/^[a-zA-Z\ \-\.]+$/))
                msg += " Only letters, hyphens and spaces are allowed.";
            document.getElementsByName('promptlname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkBday(){
            str=user_update.birth_date.value;
            msg="";
            if(str.trim().length==0) msg += " Please fill out this field.";
            else if(!str.match(/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/))
                msg += " Invalid date format (YYYY-MM-DD).";
            document.getElementsByName('promptbday')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkAll(){
                if(checkfName() && checkmName() && checklName() && checkBday() && (checksNumber() || checkeNumber())){
                    alert('You have updated your profile.');
                    return true;
                }
                return false;
        }

    </script>
    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>

</html>