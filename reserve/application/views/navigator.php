<?php 

				/*
				*		NAVIGATOR
				*		Eto yung nagcocompute kung ilang tabs ang kailangan sa navigator. Eto rin yung navigator mismo
				*
				*/

				$count;

				foreach ($result_count as $row){

					$count =  $row->result_count;

				}

				if(isset($_GET['page_number']))		$page_number = $_GET['page_number'];
				else 								$page_number = 1;

					$format_count = count($_GET['format']);

					$format_link = "&format[]=".$_GET['format'][0];

					for($i=1; $i < $format_count; $i++)
					{
					  $format_link = $format_link."&format[]=".$_GET['format'][$i];		  
					}

					if($count>10){

						$link =  "&search_query=".str_replace(' ','+',$_GET['search_query'])."&filter=".$_GET['filter']."&sort=".$_GET['sort'].$format_link."\">";

						if($page_number!=1){

						echo "<a href=\"search?page_number=".($page_number-1),$link."Previous</a>";

						}

						if($count%10!=0)	$max = floor($count/10 + 1);
						else $max = $count/10;

						if($page_number!=$max){

						echo "<a href=\"search?page_number=",($page_number + 1),$link."Next</a>";

						}

						$i=1;
						while($i<=$max){

							echo "<a href=\"search?page_number=".$i,$link,$i."</a>";
							$i++;

						}

					}

			?>