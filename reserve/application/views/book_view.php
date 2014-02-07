
<!DOCTYPE html>
<html>
	<!--This is where all javascripts for this page can be found-->
	<script>
		function reserveButton(){
			alert("Book in reservation queue!")
		}		
	</script>

	<head>
		<link rel="stylesheet" type="text/css" href=<?php echo "\"".base_url()."assets/icslib.css"."\""?>/>				
		<title>UPLB-ICS Library</title>
	</head>
	<body>

	<?php include"header.html"?>	
		<div id="viewbook">
		</br></br></br>
			<div class="bookpic">
			    <img  width="50%" src=<?php echo "\"".base_url()."assets/bookdefault.jpg"."\""?>/>
			</div>

			<div class="bookinfo">
				</br></br></br></br>
				<?php
					foreach($result as $row2){
						echo "Title: $row2->title</br>";
						echo "Author/s:</br>";
						foreach($result as $row){
							echo "-> $row->author</br>";
						}
						echo "Publisher: $row->publisher</br>";
						echo "Year of Publishing: $row->copyright_year</br>";
						echo "Accession Number: $row->accession_number</br></br>";
						break;
					}
				
					echo "<form method=\"POST\" action=\"/reserve/index.php/main/reservation\">";
					if($this->session->userdata('email')&&$row->status!='available') echo "<button class=\"css3button\" disabled>Unavailable</button>";
					else if($this->session->userdata('books_reserved')==3) echo "<button class=\"css3button\" disabled>Books reserved reached its limit!!</button>";
					else if($this->session->userdata('email')&&($this->session->userdata('books_reserved')<3)&&$row->status=='available') echo "<button class=\"css3button\" name=\"reserve\">Reserve</button>";

						
			 	?>
			 	</form>
			 	</br></br></br></br>   
			</div>

		</br></br></br>
		</div>
		<?php include"footer.html"?>

	</body>
</html>


