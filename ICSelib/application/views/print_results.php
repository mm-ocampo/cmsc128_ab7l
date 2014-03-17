


<?php 

                /*
                *   PRINT_RESULTS
                *   trabaho nito ang pagfetch ng data galing sa database tapos ipprint niya yung mga data na iyon
                *
                */
                $this->load->model('get_database');
                /*
                *
                *   TEMPORARY ONLY. Pangcheck kung user ba o admin
                *
                */
                $i = 0;
                $res = -1;
                foreach ($search as $row) {
                        $res += 1;
                        echo "<div class='results'>";
                        echo "<span class='glyphicon glyphicon-arrow-down' id='search_down_span'></span>";
                            echo "<div class='result_information'>";
                                $title = $row->title;
                                $publisher = $row->publisher;
                                $accession_number = $row->accession_number;
                                $copyright_year = $row->copyright_year;
                                $abstract = $row->abstract;
                                
                                echo "<ul>";
                                echo "<li class='result_header'>".$title."</li>";
                                echo "<div class='result_details'>";
                                echo "<li>".$accession_number."</li>";

                                $author = $this->get_database->get_book_author($accession_number);
                                foreach($author as $row2){

                                    $authors = $row2->author;
                                    echo "<li>".$authors."</li>";

                                }

                                echo "<li>".$copyright_year."</li>";
                                echo "<li>".$publisher."</li>";
                                echo "<li>".$abstract."</li>";

                        $i = 1;
                        if($this->session->userdata('type')){
                        if($this->session->userdata['type']=="admin"){
?>
    <?php echo "<li><input type='button' onclick='confirm_delete({$res})' id='link{$res}' name='".$row->accession_number."' value='Delete' /></li>"; ?>
        <li><form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/update_material">
        <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
        <input type="submit" value="Edit" />
        </form></li>
    <?php
                        }

                        else if($this->session->userdata['type']=="user"){
?>
                           
                            <?php 

                                $number_reserved = 0;
                                $count = 0;

                                foreach ($reserved as $row2) {
                                    
                                    $number_reserved++;

                                }

                                foreach ($reserved as $row2) {
                                    
                                    if($row2->accession_number == $accession_number){

                                        if($row2->email!=""){

                                            $count = 1;
                                            break;

                                        }
                                        break;

                                    }

                                }

                                if($number_reserved==3){

                                    echo "<li>Maximum</li>";

                                }

                                else if($count==0){

                                    ?>

                                        <li> <form class="form_reserve" method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/reserve/load_book">
                                            <button class="button_reserve" id="viewbook" name="viewbook" type="submit" value="<?php echo $row->accession_number; ?>" onclick="return disable_reserve()">Reserve</button>
                                        </form></li>

                                    <?php

                                }

                                else echo "<li>Reserved</li>";



                                 $count = 0;
                                foreach ($bookmarked as $row2) {
                                    
                                    if($row2->accession_number == $accession_number){

                                        if($row2->email!=""){

                                        $count = 1;
                                        break;

                                        }
                                        break;

                                    }

                                }

                                if($count==0){

                                    ?>

                                         <li> 
                                            <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/bookmark">
                                                <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
                                                <input type="hidden" value="<?php echo $this->session->userdata('email');?>" id="email" name="email"><!-- Hard coded email; MUST change to session-->
                                                <input type="submit" value="Bookmark"/>
                                            </form>
                                        </li>

                                    <?php

                                }

                                else echo "<li>Bookmarked</li>";

                            ?>

                           
<?php
                        }
                    }

                        else{
                            echo "";
                        }
                        echo "</div></ul>";
                        
                        
                        
                        echo "</div></div>";

                 
                    
                }



                if($i==0){

                    echo "</br><p class=\"text-center\"><span class=\"circle\" <br/><span class=\"glyphicon glyphicon-book glyphicon-large\"></span></span></br><h3 class=\"text-center\">404 Material Not Found!</h3></p>";

                }

?>

<script type='text/javascript' language='javascript'>

    function confirm_delete(num){
        var temp = confirm("Do you really want to delete this material?");

        location.replace("<?php echo base_url();?>index.php/site/delete?id=" + document.getElementById('link' + num).name + "&confirm=" + temp);
    }
</script>