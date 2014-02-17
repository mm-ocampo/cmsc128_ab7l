<?php 

                /*
                *   PRINT_RESULTS
                *   trabaho nito ang pagfetch ng data galing sa database tapos ipprint niya yung mga data na iyon
                *
                */



                /*
                *
                *TEMPORARY ONLY. Pangcheck kung user ba o admin
                *
                */
                $_SESSION['usertype'] = "admin";
                $accession_number = "";
                $i = 0;
                echo "<table class='table table-striped'>";
                foreach ($search as $row) {

                    if($accession_number != $row->accession_number && $i==0){       

                        $accession_number = $row->accession_number;

                        echo "<div class='results'>";
                            echo "<div class='result_information'>";
                                $title = $row->title;
                                $publisher = $row->publisher;
                                $author = $row->author;
                                
                                echo "<tr>";
                                echo "<td>".$title."</td>";
                                echo "<td>".$publisher."</td>";
                                if($author!=NULL) echo "<td>".$author."</td>";
                            

                        $i = 1;

                    }

                    else if($accession_number != $row->accession_number && $i!=0){

                        if($_SESSION['usertype']=="admin"){
?>
                            <?php echo "<td><a name='link' id='link' href = '".base_url()."index.php/site/delete?id={$accession_number}' onclick='return confirm_delete()'><input type='button' name='".$row->accession_number."' value='Delete' /></a></td>"; ?>
                            <td><form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/update_material">
        <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
        <input type="submit" value="Edit" />
    </form></td>
    <?php
                        }
                        else if($_SESSION['usertype']=="user"){
?>
                           <td> <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/main/load_book">
                                <button name="viewbook" type="submit" value="<?php echo $row->accession_number; ?>">Reserve</button>
                            </form></td>
                           <td> <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/bookmark">
                                <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
                                <input type="hidden" value="gjpgagno@gmail.com" id="email" name="email"><!-- Hard coded email; MUST change to session-->
                                <input type="submit" value="Bookmark"/>
                            </form></td>
<?php
                        }
                        echo "</tr>";
                        
                        
                        
                        echo "</div></div>";

                        $accession_number = $row->accession_number;

                        echo "<div class='results'>";
                            echo "<div class='result_information'>";
                                $title = $row->title;
                                $publisher = $row->publisher;
                                $author = $row->author;
                                echo "<td>".$title."</td>";
                                echo "<td>".$publisher."</td>";
                                if($author!=NULL) echo "</td>".$author."</td>";

                    }

                    else{

                        $author = $row->author;
                        echo "<td>".$author."</td>";

                    }
                    
                }
                

                if($accession_number!="" && $_SESSION['usertype'] == "admin"){

                    echo "<td><a name='link' id='link' href = '".base_url()."index.php/site/delete?id={$accession_number}' onclick='return confirm_delete()'><input type='button' name='".$row->accession_number."' value='Delete'/></a></td>";
                    ?>
                    <td><form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/update_material">
                        <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
                        <input type="submit" value="Edit" />
                    </form></td>
                    <?php
                    echo "</div></div>";

                }

                else if($accession_number!="" && $_SESSION['usertype'] == "user"){
?>
                   <td> <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/main/load_book">
                        <button name="viewbook" type="submit" value="<?php echo $row->accession_number; ?>">Reserve</button>
                    </form></td>
                   <td> <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/bookmark">
                        <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
                        <input type="hidden" value="gjpgagno@gmail.com" id="email" name="email"><!-- Hard coded email; MUST change to session-->
                        <input type="submit" value="Bookmark"/>
                    </form></td><?php
                    echo "</div></div>";

                }

                echo "</table>";

?>

 
<script type='text/javascript' language='javascript'>

    function confirm_delete(){
    var temp = confirm("Do you really want to delete this material?");
    
    /* changes value of href in link to pass variable to isset function in delete function in site.php */
    document.getElementById("link").href = document.getElementById("link").href + "&confirm=" + temp;
}

</script>