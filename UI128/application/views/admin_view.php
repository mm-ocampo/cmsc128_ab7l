
<!DOCTYPE html>
<html id="nativehtml">
	<head>
		<link rel="stylesheet" type="text/css" href=<?php echo "\"".base_url()."assets/bootstrap.css"."\""?> />
		<!--<link language="javascript" type="text/javascript" href=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?> />-->
		<title>UPLB-ICS Library</title>
	</head>	
	<script language="javascript" type="text/javascript" src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
	<script>
		$(document).ready(function(){
			$('#request').hide();
			$('#reserve').hide();
			$('#borrowed').hide();
			$('#requestbtn').click(function(){
				$('#request').toggle();
				$('#reserve').hide();
				$('#borrowed').hide();
			});
			$('#reservebtn').click(function(){
				$('#reserve').toggle();
				$('#request').hide();
				$('#borrowed').hide();
			});
			$('#borrowedbtn').click(function(){
				$('#borrowed').toggle();
				$('#request').hide();
				$('#reserve').hide();
			});


		});
	</script>
	<body id="nativebody">

		<?php include"header.php";?>
		</br></br>

			</br>
			<button class="css3button" id="requestbtn" name="request">Book Requests</button>
			</br>
				<div id="request">
					<?php
						echo "<table border=\"2\" class=\"nativetable\">";
						echo "<tr>";
						echo "<th>Name of Student</th><th>Student/Employee Number</th><th>Book Title</th><th>Accession Number</th><th></th>";
						echo "</tr>";
					
					foreach($result as $row){
						echo "<tr>";
						echo "\t<td>$row->first_name $row->middle_name $row->last_name</td>\n";
						if($row->is_student==1)
							echo "\t<td>$row->student_number</td>\n";
						else
							echo "\t<td>$row->employee_number</td>\n";
						echo "\t<td>$row->title</td>\n";
						echo "\t<td>$row->accession_number</td>\n";
						echo "<td><form method=\"POST\" action=\"" . base_url() . "/index.php/main/add_readyforpickup\"><button value=\"$row->accession_number\" name=\"request\"><img href = \"/admin/index.php/admin/load_readyForPickUp\" height=\"20pt\" src=\"".base_url()."assets/check.png"."\" height=\"125px\"></button></form></td>";

							echo "</tr>";

						}
						echo "</table>";
					?>
					
				</div>
			</br>
			<button class="css3button" id="reservebtn" name="reserve">List of Reserved Books</button>
			</br>
				<div id="reserve">
					<?php
						echo "<table border=\"2\" class=\"nativetable\">";
						echo "<tr>";
						echo "<th>Name of Student</th><th>Student/Employee Number</th><th>Book Title</th><th>Accession Number</th><th></th>";
						echo "</tr>";
					
					foreach($result2 as $row){
						echo "<tr>";
						echo "\t<td>$row->first_name $row->middle_name $row->last_name</td>\n";
						if($row->is_student==1)
							echo "\t<td>$row->student_number</td>\n";
						else
							echo "\t<td>$row->employee_number</td>\n";
						echo "\t<td>$row->title</td>\n";
						echo "\t<td>$row->accession_number</td>\n";
						echo "<td><form method=\"POST\" action=\"" . base_url() . "index.php/main/do_approve\"><button value=\"$row->accession_number\" name=\"reserve\"><img href = \"/admin/index.php/admin/load_readyForPickUp\" height=\"20pt\" src=\"".base_url()."assets/check.png"."\" height=\"125px\"></button></form></td>";

							echo "</tr>";

						}
						echo "</table>";
					?>
				</div>
			</br>
			<button class="css3button" id="borrowedbtn" name="borrowed">List of Borrowed Books</button>
			</br>
				<div id="borrowed">
					<?php
						echo "<table border=\"2\" class=\"nativetable\">";
						echo "<tr>";
						echo "<th>Name of Student</th><th>Student/Employee Number</th><th>Book Title</th><th>Accession Number</th><th>Status</th><th></th>";
						echo "</tr>";
					
					foreach($result3 as $row){
						echo "<tr>";
						echo "\t<td>$row->first_name $row->middle_name $row->last_name</td>\n";
						if($row->is_student==1)
							echo "\t<td>$row->student_number</td>\n";
						else
							echo "\t<td>$row->employee_number</td>\n";
						echo "\t<td>$row->title</td>\n";
						echo "\t<td>$row->accession_number</td>\n";
						if($row->is_student==1){
							$db = $row->date_borrowed;
							$stat = (strtotime("".date("Y-m-d")." 00:00:00") - strtotime("".$db." 00:00:00"))/ 86400;
							if($stat<3) echo "\t<td>Ok</td>\n";
							else{
								echo "\t<td>Overdue</td>\n";
								$CI =& get_instance();
								$message = "Your book ".$row->title." is now Overdue";
								$subject = "Overdue";
								$receiver = $row->email;
								$CI->do_send_email($message,$subject,$receiver);			//if overdue, then send email
							}
						}
						else echo "\t<td>Ok</td>\n";
						echo "<td><form method=\"POST\" action=\"".base_url()."index.php/main/do_return\"><button value=\"$row->accession_number\" name=\"borrowed\"><img href = \"/admin/index.php/admin/load_readyForPickUp\" height=\"20pt\" src=\"".base_url()."assets/cross.png"."\" height=\"125px\"></button></form></td>";

							echo "</tr>";

						}
						echo "</table>";
					?>
				</div>

		</br></br></br>

		<?php include"footer.html"?>

	</body>
</html>
