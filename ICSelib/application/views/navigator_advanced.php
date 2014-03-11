<?php 

				/*
				*		NAVIGATOR
				*		Eto yung nagcocompute kung ilang tabs ang kailangan sa navigator. Eto rin yung navigator mismo
				*
				*/

				$count = 0;

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

					$search_query1 = str_replace('+','%2B',$this->input->get('search_query1'));
					$search_query2 = str_replace('+','%2B',$this->input->get('search_query2'));
					$search_query3 = str_replace('+','%2B',$this->input->get('search_query3'));

					if($count>10){

						$link =  "&filter1=".$this->input->get('filter1')."&search_query1=".str_replace(' ','+',$search_query1)."&boolean1=".$this->input->get('boolean1')."&filter2=".$this->input->get('filter2')."&search_query2=".str_replace(' ','+',$search_query2)."&boolean2=".$this->input->get('boolean2')."&filter3=".$this->input->get('filter3')."&search_query3=".str_replace(' ','+',$search_query3).$format_link."\">";

						if($page_number!=1){

						echo "<a href=\"advanced_search?page_number=".($page_number-1),$link."Previous</a>";

						}

						if($count%10!=0)	$max = floor($count/10 + 1);
						else $max = $count/10;

						$i=1;
						while($i<=$max){

							echo "<a href=\"advanced_search?page_number=".$i,$link,$i."</a>";
							$i++;

						}

						if($page_number!=$max){

						echo "<a href=\"advanced_search?page_number=",($page_number + 1),$link."Next</a>";

						}

					}

			?>