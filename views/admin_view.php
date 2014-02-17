
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href=<?php echo "\"".base_url()."assets/designs.css"."\""?> />
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
	<body>

		<?php include"header.html";?>
		</br></br>

			</br>
			<button class="css3fullwidthbutton" id="requestbtn" name="request">Book Requests</button>
			</br>
				<div id="request">
					<table>
						<tr>
							<th>Name of Student</th><th>Student Number</th><th>Book Title</th><th>Accession Number</th><th></th>
						</tr>
						<tr>
							<td>Jason</td><td>2011-50983</td><td>For Him Magazine</td><td>uplb0000000001</td>
							<td><form method="POST" action="/admin/index.php/sample/add_readyForPickUp"><button><img href = "/admin/index.php/sample/load_readyForPickUp" height="20pt" src=<?php echo "\"".base_url()."assets/check.png"."\""?> height="125px"></button></form></td>	
						</tr>
						<tr>
							<td>Frei</td><td>2011-51296</td><td>Princess Diaries</td><td>uplb0000000002</td>
							<td><form method="POST" action="/admin/index.php/sample/add_readyForPickUp"><button><img href = "/admin/index.php/sample/load_readyForPickUp" height="20pt" src=<?php echo "\"".base_url()."assets/check.png"."\""?> height="125px"></button></form></td>
						</tr>
					</table>
				</div>
			</br>
			<button class="css3fullwidthbutton" id="reservebtn" name="reserve">List of Reserved Books</button>
			</br>
				<div id="reserve">
					<table border="2" class="nativetable">
						<tr>
							<th>Name of Student</th><th>Student Number</th><th>Book Title</th><th>Accession Number</th><th></th>
						</tr>
						<tr>
							<td>Jason</td><td>2011-50983</td><td>For Him Magazine</td><td>uplb0000000001</td>
							<td><form method="POST" action="/admin/index.php/sample/add_borrowed"><button><img href = "/admin/index.php/sample/load_readyForPickUp" height="20pt" src=<?php echo "\"".base_url()."assets/check.png"."\""?> height="125px"></button></form></td>	
						</tr>
						<tr>
							<td>Frei</td><td>2011-51296</td><td>Princess Diaries</td><td>uplb0000000002</td>
							<td><form method="POST" action="/admin/index.php/sample/add_borrowed"><button><img href = "/admin/index.php/sample/load_readyForPickUp" height="20pt" src=<?php echo "\"".base_url()."assets/check.png"."\""?> height="125px"></button></form></td>
						</tr>
					</table>
				</div>
			</br>
			<button class="css3fullwidthbutton" id="borrowedbtn" name="borrowed">List of Borrowed Books</button>
			</br>
				<div id="borrowed">
					<table border="2" class="nativetable">
						<tr>
							<th>Name of Student</th><th>Student Number</th><th>Book Title</th><th>Accession Number</th><th></th>
						</tr>
						<tr>
							<td>Jason</td><td>2011-50983</td><td>For Him Magazine</td><td>uplb0000000001</td>
							<td><form method="POST" action="/admin/index.php/sample/backToAvailable"><button><img href = "/admin/index.php/sample/load_readyForPickUp" height="20pt" src=<?php echo "\"".base_url()."assets/check.png"."\""?> height="125px"></button></form></td>	
						</tr>
						<tr>
							<td>Frei</td><td>2011-51296</td><td>Princess Diaries</td><td>uplb0000000002</td>
							<td><form method="POST" action="/admin/index.php/sample/backToAvailable"><button><img href = "/admin/index.php/sample/load_readyForPickUp" height="20pt" src=<?php echo "\"".base_url()."assets/check.png"."\""?> height="125px"></button></form></td>
						</tr>
					</table>
				</div>

		</br></br></br>

		<?php include"footer.html"?>

	</body>
</html>
