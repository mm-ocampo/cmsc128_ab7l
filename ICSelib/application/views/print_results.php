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
                $j = 0;

                foreach ($search as $row) {

                        echo "<div class='results'>";
                            echo "<div class='result_information'>";
                                $title = $row->title;
                                $publisher = $row->publisher;
                                $accession_number = $search_details[$j];
                                
                                echo "<ul>";
                                echo "<li class='result_header'><i class='fa fa-book fa-lg space'></i>".$title."</li>";
                                echo "<div class='result_details'>";
                                echo "<li>".$publisher."</li>";
                                echo "<li>".$accession_number."</li>";

                                $author = $this->get_database->get_book_author($accession_number);
                                foreach($author as $row2){

                                    $authors = $row2->author;
                                    echo "<li>".$authors."</li>";

                                }

                        $i = 1;
                        if($this->session->userdata('type')){
                        if($this->session->userdata['type']=="admin"){
?>
    <?php echo "<li><a name='link' id='link' onclick='return confirm_delete()' href = '".base_url()."index.php/site/delete?id={$accession_number}&confirm='><input type='button' name='".$accession_number."' value='Delete' /></a></li>"; ?>
        <li><form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/update_material">
        <input type="hidden" value="<?php echo $accession_number; ?>" id="accession_number" name="accession_number">
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
                                    
                                    if($this->session->userdata('email') == $row2->email)$number_reserved++;

                                }

                                foreach ($reserved as $row2) {
                                    
                                    if($row2->title == $title){

                                        if($row2->email==$this->session->userdata('email')){

                                            $count = 1;
                                            break;

                                        }

                                        else $count = -1;

                                        break;

                                    }

                                }

                                if($count==1) echo "<li>Reserved</li>";

                                else if($number_reserved==3){

                                    echo "<li>Maximum</li>";

                                }

                                else if($count==0){

                                    ?>

                                        <li> <form class="form_reserve" method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/reserve/load_book">
                                            <button class="button_reserve" name="viewbook" type="submit" value="<?php echo $accession_number; ?>" onclick="confirm_reserve()">Reserve</button>
                                        </form></li>

                                    <?php

                                }

                                
                                else               echo "<li>Not available</li>";


                                 $count = 0;
                                foreach ($bookmarked as $row2) {
                                    
                                    if($row2->title == $title){

                                        if($row2->email==$this->session->userdata('email')){

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
                                                <input type="hidden" value="<?php echo $accession_number; ?>" id="accession_number" name="accession_number">
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

                 $j++;
                    
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

    function confirm_reserve(){
        var r=confirm("Do you really want to reserve this material?");
        if (r==true){
            //refresh the page
            document.getElementById("link").setAttribute("href",document.getElementById("link").href + r);
        }
        else{
            return false;
        }
    }

</script>