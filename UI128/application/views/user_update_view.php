<!DOCTYPE html> 
<html> 
    <head>    
        <title>Edit Account Details</title> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css"> 
        <link href=<?php echo "\"".base_url()."assets/carousel.css"."\""?> rel="stylesheet" type="text/css">
        
    </head> 
  
    <body> 
        <div id="user_update_profile"> 
            <form name="user_update" method="POST" action="<?php echo base_url();?>index.php/site/update_account" onsubmit="return validate_update();"> 
                <input type="hidden" id="user" name="email" value="<?php  echo($results['email'] != ''?$results['email']:'');?>"/> 
                <div class="control-group">
                  <label class="control-label">First Name</label>
                      <div class="controls">
                      <input class="textfield" type="text" placeholder="First name" id="first_name" name="first_name" value="<?php echo($results['first_name'] != '')?$results['first_name']:'';?>"/>
                      </div>
                </div> 
                <div class="control-group">
                  <label class="control-label">Middle Name</label>
                      <div class="controls">
                      <input class="textfield" type="text" placeholder="Middle name" id="middle_name" name="middle_name" value="<?php echo($results['middle_name'] != '')?$results['middle_name']:'';?>"/>
                      </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Last Name</label>
                      <div class="controls">
                      <input class="textfield" type="text" placeholder="Last name" id="last_name" name="last_name" value="<?php echo($results['last_name'] != ''?$results['last_name']:'');?>"/> 
                      </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Password</label>
                      <div class="controls">
                      <input class="textfield" type="password" name="password" id="password" value="<?php echo($results['password'] != ''?$results['password']:'');?>"/> 
                      </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Student Number</label>
                      <div class="controls">
                      <input class="textfield" type="text" placeholder="####-#####" id="student_number" name="student_number" value="<?php echo($results['student_number'] != ''?$results['student_number']:'');?>"/> 
                      </div>
                </div>
                  <div class="control-group">
                   <label for="degree_program">Degree Program</label>
                                        <select name="degree_program" class="form-control input-lg span4">
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
                <br> 
                  
                                    <label for="classification">Classification</label>
                                        <select name="classification" class="form-control input-lg span4">
                                            <option value="FM" <?php echo($results['classification'] == 'FM')?'selected':'';?> >Freshman</option>
                                            <option value="SO" <?php echo($results['classification'] == 'SO')?'selected':'';?>>Sophomore</option>
                                            <option value="JR" <?php echo($results['classification'] == 'JR')?'selected':'';?>>Junior</option>
                                            <option value="SR" <?php echo($results['classification'] == 'SR')?'selected':'';?>>Senior</option>
                                            <option value="G" <?php echo($results['classification'] == 'G')?'selected':'';?>>Graduate</option>
                                        </select>
                                        <br/><br> 
                  
                <label>Sex:</label> 
                        <input type="radio" name="sex" <?php echo($results['sex'] == 'M')?'checked':'';?> value="M" checked>Male 
                        <input type="radio" name="sex" <?php echo($results['sex'] == 'F')?'checked':'';?> value="F">Female 
                <br>
  
                <label>Birthday: </label> 
                    <input class="textfield" type="text" placeholder="yyyy-mm-dd" name="birth_date" id="birth_date" value="<?php echo($results['birth_date'] != ''?$results['birth_date']:'');?>"/> 
                <br><br> 
                  
                <label>Employee number: </label> <input class="textfield" type="employee_number" placeholder="##########" id="employee_number" name="employee_number" value="<?php echo($results['employee_number'] != ''?$results['employee_number']:'');?>"/> 
                <br> 
                <div class="form-actions" id="cut">
                <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
                <a href="/UI128/index.php/site/get_my_library_data"><button type="button" class="btn">Cancel</button></a>

                </div>
            </form> 
              
        </div> 
    </body> 
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery-2.0.3.min.js"></script>  
    <script type="text/javascript" language="javascript"> 
        function validate_update(){ 
            var ret = true; 
            var first_name = $('#first_name').val(); 
            var middle_name = $('#middle_name').val(); 
            var last_name = $('#last_name').val(); 
            var password = $('#password').val(); 
            var student_number = $('#student_number').val(); 
            var degree_program = $('#degree_program').val(); 
            var classification = $('#classification').val(); 
            var sex = $('#sex').val(); 
            var birth_date = $('#birth_date').val(); 
            var number_pattern = /[0-9]|[,.'-=<>?:"{}+_!@#$%^&*()]/; 
              
            if(first_name == ''){ 
                alert('First name cannot be empty.'); $('#first_name').focus(); ret=false; 
            }else if(number_pattern.test(first_name)){ 
                alert('First name cannot have digits or special characters.'); $('#first_name').focus(); ret=false; 
            }else{ 
                if(middle_name == ''){ 
                    alert('Middle name cannot be empty.'); $('#middle_name').focus(); ret=false; 
                }else if(number_pattern.test(middle_name)){ 
                    alert('Middle name cannot have digits or special characters.'); $('#middle_name').focus(); ret=false; 
                }else{ 
                    if(last_name == ''){ 
                        alert('Last name cannot be empty.'); $('#last_name').focus(); ret=false; 
                    }else if(number_pattern.test(last_name)){ 
                        alert('Last name cannot have digits or special characters.'); $('#last_name').focus(); ret=false; 
                    }else{ 
                        if(password == ''){ 
                            alert('Password cannot be empty.'); $('#password').focus(); ret=false; 
                        }else{ 
                            var stdno_pattern=/(^[0-9]{4}-[0-9]{5}$)/;   
                            if(student_number == ''){ 
                                alert('Student number cannot be empty.'); $('#student_number').focus(); ret=false; 
                            }else if(student_number.match(stdno_pattern)==null){ 
                                alert('Student number must have 4 digits followed by a dash and 5 digits.'); $('#student_number').focus(); ret=false; 
                            }else{ 
                                var dp_pattern = /^B[SA][A-Z]{2}$/g; 
                                if(degree_program == ''){ 
                                    alert('Degree program cannot be empty.'); $('#degree_program').focus(); ret=false; 
                                }else if(degree_program.match(dp_pattern)==null){ 
                                    alert('Degree program must exist.'); $('#degree_program').focus(); ret=false; 
                                }else{ 
                                    var class_pattern = /(FR|SO|JR|SR)/g; 
                                    if(classification == ''){ 
                                        alert('Classification cannot be empty.'); $('#classification').focus(); ret=false; 
                                    }else if(classification.match(class_pattern)==null){ 
                                        alert('Classification can only either be FR, SO, JR, or SR.'); $('#classification').focus(); ret=false; 
                                    }else{ 
                                        var birthday_pattern = /^((19|20)[0-9]{2})$-^(0?[1-9]{1}|1[012])$-^(0?[1-9]{1}|[12][0-9]|3[01])$/; 
                                        if(birth_date == ''){ 
                                            alert('Birthday cannot be empty.'); $('#birth_date').focus(); ret=false; 
                                        }else{ 
                                            if(birth_date.match(birthday_pattern)==null){ 
                                                alert('Birthday must have the ff format: yyyy-mm-dd, and valid year(19XX and 20XX only), month(12), and day(31).'); $('#birth_date').focus(); ret=false; 
                                            }
                                        } 
                                    } 
                                } 
                            } 
                        } 
                    } 
                } 
            } 
            if(ret!=false)
                alert('Profile Update Successful');
            return ret; 
        } 
    </script>

</html>