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


                echo "<table class='table table-striped'>";
                foreach ($search as $row) {

                        echo "<div class='results'>";
                            echo "<div class='result_information'>";
                                $title = $row->title;
                                $publisher = $row->publisher;
                                $accession_number = $row->accession_number;
                                
                                echo "<tr>";
                                echo "<td>".$title."</td>";
                                echo "<td>".$publisher."</td>";
                                echo "<td>".$accession_number."</td>";

                                $author = $this->get_database->get_book_author($accession_number);
                                foreach($author as $row2){

                                    $authors = $row2->author;
                                    echo "<td>".$authors."</td>";

                                }

                        $i = 1;

                        if($this->session->userdata['type']=="admin"){
?>
                            <?php echo "<td><a name='link' id='link' href = '".base_url()."index.php/site/delete?id={$accession_number}' onclick='return confirm_delete()'><input type='button' name='".$row->accession_number."' value='Delete' /></a></td>"; ?>
                            <td><form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/update_material">
        <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
        <input type="submit" value="Edit" />
    </form></td>
    <?php
                        }

                        else if($this->session->userdata['type']=="user"){
?>
                           
                            <?php 

                                $count = 0;
                                foreach ($reserved as $row2) {
                                    
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

                                        <td> <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/reserve/load_book">
                                            <button name="viewbook" type="submit" value="<?php echo $row->accession_number; ?>">Reserve</button>
                                        </form></td>

                                    <?php

                                }

                                else echo "<td>Reserved</td>";



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

                                         <td> 
                                            <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/bookmark">
                                                <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
                                                <input type="hidden" value="<?php echo $this->session->userdata('email');?>" id="email" name="email"><!-- Hard coded email; MUST change to session-->
                                                <input type="submit" value="Bookmark"/>
                                            </form>
                                        </td>

                                    <?php

                                }

                                else echo "<td>Bookmarked</td>";

                            ?>

                           
<?php
                        }
                        echo "</tr>";
                        
                        
                        
                        echo "</div></div>";

                 
                    
                }

                echo "</table>";

                if($i==0){

                    echo "No results found. :(";

                }

?>

 
<script type='text/javascript' language='javascript'>

    function confirm_delete(){
    var temp = confirm("Do you really want to delete this material?");
    
    /* changes value of href in link to pass variable to isset function in delete function in site.php */
    document.getElementById("link").href = document.getElementById("link").href + "&confirm=" + temp;
}

</script>