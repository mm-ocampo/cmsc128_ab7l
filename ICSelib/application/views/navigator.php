<?php 

				/*
				*		NAVIGATOR
				*		Eto yung nagcocompute kung ilang tabs ang kailangan sa navigator. Eto rin yung navigator mismo
				*
				*/

				$count = 0;
				echo "<ul class='pagination'>";
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

					$search_query = str_replace('+','%2B',$this->input->get('search_query'));

					if($count>10){

						$link =  "&search_query=".str_replace(' ','+',$_GET['search_query'])."&filter=".$_GET['filter']."&sort=".$_GET['sort'].$format_link."\">";

						if($page_number!=1){

						echo "<li><a href=\"search?page_number=".($page_number-1),$link."Previous</a></li>";

						}else {
							echo "<li class='disabled'><a href='#'>Previous</a></li>";
						}

						if($count%10!=0)	$max = floor($count/10 + 1);
						else $max = $count/10;

						$i=1;
						while($i<=$max){
							if($_GET['page_number'] == $i)
								echo "<li class='active'><a href=\"search?page_number=".$i,$link,$i."</a></li>";
							else
								echo "<li><a href=\"search?page_number=".$i,$link,$i."</a></li>";
							$i++;

						}

						if($page_number!=$max){

						echo "<li><a href=\"search?page_number=",($page_number + 1),$link."Next</a></li>";

						}else {
							echo "<li class='disabled'><a href='#'>Next</a></li>";
						}

					}

					echo "</ul>";

			?>