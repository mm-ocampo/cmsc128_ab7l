<!DOCTYPE html>
<html>
	<head`	
		<title>User Update</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
		<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery-2.0.3.min.js"></script>
	</head>

	<body>
		<div>
			<form name="user_update" method="POST" action="<?php echo base_url();?>index.php/site/update/" onsubmit="return validate_update();">
				<input type="hidden" id="user" name="email" value="<?php  echo($results['email'] != ''?$results['email']:'');?>"/>
				
				<label>First name: </label> <input class="textfield" type="text" placeholder="First name" id="first_name" name="first_name" value="<?php echo($results['first_name'] != '')?$results['first_name']:'';?>"/>
			
				<label>Middle name: </label> <input class="textfield" type="text" placeholder="Middle name" id="middle_name" name="middle_name" value="<?php echo($results['middle_name'] != ''?$results['middle_name']:'');?>"/>
				
				<label>Last name: </label> <input class="textfield" type="text" placeholder="Last name" id="last_name" name="last_name" value="<?php echo($results['last_name'] != ''?$results['last_name']:'');?>"/>
				<br>
				
				<label>Password:</label> <input class="textfield" type="password" name="password" id="password" value="<?php echo($results['password'] != ''?$results['password']:'');?>"/>
				<br><br>
				
				<label>Student number: </label> <input class="textfield" type="text" placeholder="####-#####" id="student_number" name="student_number" value="<?php echo($results['student_number'] != ''?$results['student_number']:'');?>"/>
				<br>
				
				<label>Degree: </label> <input class="textfield" type="text" placeholder="BSCS" id="degree_program" name="degree_program" value="<?php echo($results['degree_program'] != ''?$results['degree_program']:'');?>"/>
				<br>
				
				<label>Classification: </label> <input class="textfield" type="text" placeholder="JR" id="classification" name="classification" value="<?php echo($results['classification'] != ''?$results['classification']:'');?>"/>
				<br><br>
				
				<label>Sex:</label>
						<input type="radio" name="sex" <?php echo($results['sex'] == 'M')?'checked':'';?> value="M" checked>Male
						<input type="radio" name="sex" <?php echo($results['sex'] == 'F')?'checked':'';?> value="F">Female
				<br>

				<label>Birthday: </label>
					<input class="textfield" type="text" placeholder="yyyy-mm-dd" name="birth_date" id="birth)date" value="<?php echo($results['birth_date'] != ''?$results['birth_date']:'');?>"/>
				<br><br>
				
				<label>Employee number: </label> <input class="textfield" type="employee_number" placeholder="##########" id="employee_number" name="employee_number" value="<?php echo($results['employee_number'] != ''?$results['employee_number']:'');?>"/>
				<br>
				<input type="submit" id="submit" value="Save"/>
			</form>
			
		</div>
	</body>
	
	<script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."js/main.js"."\""?> ></script>
	<script type="text/javascript">
		function validate_update()
		{
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
			var numPatt = /[0-9]|[,.'-=<>?:"{}+_!@#$%^&*()]/;
			
			if(first_name == '')
			{
				alert('First name cannot be empty.'); $('#first_name').focus(); ret=false;
			}
			else if(numPatt.test(first_name))
			{
				alert('First name cannot have digits or special characters.'); $('#first_name').focus(); ret=false;
			}
			else
			{
				if(middle_name == '')
				{
					alert('Middle name cannot be empty.'); $('#middle_name').focus(); ret=false;
				}
				else if(numPatt.test(middle_name))
				{
					alert('Middle name cannot have digits or special characters.'); $('#middle_name').focus(); ret=false;
				}
				else
				{
					if(last_name == '')
					{
						alert('Last name cannot be empty.'); $('#last_name').focus(); ret=false;
					}
					else if(numPatt.test(last_name))
					{
						alert('Last name cannot have digits or special characters.'); $('#last_name').focus(); ret=false;
					}
					else
					{
						if(password == '')
						{
							alert('Password cannot be empty.'); $('#password').focus(); ret=false;
						}
						else
						{
							var stdPatt=/(^[0-9]{4}-[0-9]{5}$)/;	
							if(student_number == '')
							{
								alert('Student number cannot be empty.'); $('#student_number').focus(); ret=false;
							}
							else if(student_number.match(stdPatt)==null)
							{
								alert('Student number must have 4 digits followed by a dash and 5 digits.'); $('#student_number').focus(); ret=false;
							}
							else
							{
								var dpPatt = /^B[SA][A-Z]{2}$/g;
								if(degree_program == '')
								{
									alert('Degree program cannot be empty.'); $('#degree_program').focus(); ret=false;
								}
								else if(degree_program.match(dpPatt)==null)
								{
									alert('Degree program must exist.'); $('#degree_program').focus(); ret=false;
								}
								else
								{
									var classPatt = /(FR|SO|JR|SR)/g;
									if(classification == '')
									{
										alert('Classification cannot be empty.'); $('#classification').focus(); ret=false;
									}
									else if(classification.match(classPatt)==null)
									{
										alert('Classification can only either be FR, SO, JR, or SR.'); $('#classification').focus(); ret=false;
									}
									else
									{
										var bdayPatt = /^((19|20)[0-9]{2})$-^(0?[1-9]|1[012])$-^(0?[1-9]|[12][0-9]|3[01])$/;
										if(birth_date == '')
										{
											alert('Birthday cannot be empty.'); $('#birth_date').focus(); ret=false;
										}
										else
										{
											if(birth_date.match(bdayPatt)==null)
											{
												alert('Birthday must have the ff format: yyyy-mm-dd.'); $('#birth_date').focus(); ret=false;
											}
										}
									}
								}
							}
						}
					}
				}
			}
			return ret;
		}
	</script>
</html>