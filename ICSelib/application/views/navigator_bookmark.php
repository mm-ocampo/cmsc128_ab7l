<?php 

				/*
				*		NAVIGATOR
				*		Eto yung nagcocompute kung ilang tabs ang kailangan sa navigator. Eto rin yung navigator mismo
				*
				*/

				$count = 0;

				foreach ($bookmark_count as $row){

					$count =  $row->bookmark_count;

				}

				if(isset($_GET['page_number']))		$page_number = $_GET['page_number'];
				else 								$page_number = 1;

					if($count>5){

						if($page_number!=1){

						echo "<a href=\"get_my_library_data?page_number=".($page_number-1)."\">Previous</a>";

						}

						if($count%5!=0)	$max = floor($count/5 + 1);
						else $max = $count/5;

						$i=1;
						while($i<=$max){

							echo "<a href=\"get_my_library_data?page_number=".$i."\">".$i."</a>";
							$i++;

						}

						if($page_number!=$max){

						echo "<a href=\"get_my_library_data?page_number=".($page_number+1)."\">Next</a>";

						}

					}

			?>