<!DOCTYPE html>
<?php
    include "includes/authen.php";
?>
<html id="nativehtml">
	<head>
		<link rel="stylesheet" type="text/css" href=<?php echo "\"".base_url()."assets/bootstrap.css"."\""?> />
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

		<?php include "includes/header.php";?>
		</br></br>

			</br>
				<div id="request">
					<?php
						echo "<table class=\"table table-hover\" id=\"request\" border=\"2\" class=\"nativetable\">";
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
						echo "<td>";
						echo "<form method=\"POST\" action=\"" . base_url() . "/index.php/admin_reserve/add_readyforpickup\">";
						echo "<button class=\"btn btn-success\" value=\"$row->accession_number\" name=\"request\" onclick=\"alert('This material has been approved and may now be picked up. An email has been sent to the borrower.')\"><img href = \"/admin/index.php/admin/load_readyForPickUp\" height=\"20pt\" height=\"125px\"><span class=\"glyphicon glyphicon-ok glyphicon-medium\"></span></button></form></td>";

							echo "</tr>";

						}
						echo "</table>";
					?>
					
				</div>
			</br>
				<div id="reserve">
					<?php
						echo "<table class=\"table table-hover\" id=\"reserve\" border=\"2\" class=\"nativetable\">";
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
						echo "<td><form method=\"POST\" action=\"" . base_url() . "index.php/admin_reserve/do_approve\"><button class=\"btn btn-success\" value=\"$row->accession_number\" name=\"reserve\" onclick=\"alert('This material has been claimed.')\"><img href = \"/admin/index.php/admin/load_readyForPickUp\" height=\"20pt\" height=\"125px\"><span class=\"glyphicon glyphicon-ok glyphicon-medium\"></span></button></form></td>";

							echo "</tr>";

						}
						echo "</table>";
					?>
				</div>
			</br>
				<div id="borrowed">
					<?php
						echo "<table class=\"table table-hover\" id=\"borrowed\" border=\"2\" class=\"nativetable\">";
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
							$stat = (strtotime("".date("Y-m-d")." 00:00:00") - strtotime($db))/ 86400;
							if($stat<3) echo "\t<td>Ok</td>\n";
							else{
								echo "\t<td>Overdue</td>\n";
								$CI =& get_instance();
								$message = "Your borrowing period on the book ".$row->title." has expired. Please return the book as soon as possible\r\n\r\nYours truly,\r\nThe Institute of Computer Science\r\nUniversity of the Philippines Los Ba&ntilde;os\r\nF.O. Santos Hall, UPLB, College, Laguna 4031";
								$subject = "Overdue Reservation";
								$receiver = $row->email;
								$CI->do_send_email($message,$subject,$receiver);			//if overdue, then send email
							}
						}
						else echo "\t<td>Ok</td>\n";
						echo "<td><form method=\"POST\" action=\"".base_url()."index.php/admin_reserve/do_return\"><button class=\"btn btn-danger\" value=\"$row->accession_number\" name=\"borrowed\" onclick=\"alert('This material has been returned to the library.')\"><img href = \"/admin/index.php/admin/load_readyForPickUp\" height=\"20pt\"  height=\"125px\"><span class=\"glyphicon glyphicon-remove glyphicon-medium\"></span></button></form></td>";

							echo "</tr>";

						}
						echo "</table>";
					?>
				</div>

		</br></br></br>
	</body>
</html>
