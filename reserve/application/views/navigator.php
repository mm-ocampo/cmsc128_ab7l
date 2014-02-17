<?php 
				$count;

				foreach ($result_count as $row){

					$count =  $row->result_count;

				}

				if(isset($_POST['search_query'])){

					$format_count = count($_POST['format']);

					$format_link = "&format[]=".$_POST['format'][0];

					for($i=1; $i < $format_count; $i++)
					{
					  $format_link = $format_link."&format[]=".$_POST['format'][$i];		  
					}

					if($count>10){

						$link =  "&q=".str_replace(' ','+',$_POST['search_query'])."&f=".$_POST['filter']."&s=".$_POST['sort'].$format_link."\">";

						echo "<a href=\"search_page?page_number=".($_GET['page_number'] + 1),$link."Next</a>";

						if($count%10!=0)	$max = floor($count/10 + 1);
						else $max = $count/10;

						$i=1;
						while($i<=$max){

							echo "<a href=\"search_page?page_number=".$i,$link,$i."</a>";
							$i++;

						}

					}

				}

				else{

					$format_count = count($_GET['format']);

					$format_link = "&format[]=".$_GET['format'][0];

					for($i=1; $i < $format_count; $i++)
					{
					  $format_link = $format_link."&format[]=".$_GET['format'][$i];		  
					}

					if($count>10){

						$link =  "&q=".str_replace(' ','+',$_GET['q'])."&f=".$_GET['f']."&s=".$_GET['s'].$format_link."\">";

						if($_GET['page_number']!=1){

						echo "<a href=\"search_page?page_number=".($_GET['page_number']-1),$link."Previous</a>";

						}

						if($count%10!=0)	$max = floor($count/10 + 1);
						else $max = $count/10;

						if($_GET['page_number']!=$max){

						echo "<a href=\"search_page?page_number=",($_GET['page_number'] + 1),$link."Next</a>";

						}

						$i=1;
						while($i<=$max){

							echo "<a href=\"search_page?page_number=".$i,$link,$i."</a>";
							$i++;

						}

					}

				}

			?>