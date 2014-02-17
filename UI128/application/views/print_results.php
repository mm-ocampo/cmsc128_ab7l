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
                $_SESSION['usertype'] = "user";
                $accession_number = "";
                $i = 0;

                foreach ($search as $row) {

                    if($accession_number != $row->accession_number && $i==0){       

                        $accession_number = $row->accession_number;

                        echo "<div class='results'>";
                            echo "<div class='result_information'>";
                                $title = $row->title;
                                $publisher = $row->publisher;
                                $author = $row->author;
                                echo "<ul>";
                                echo "<li>".$title."</li>";
                                echo "<li>".$publisher."</li>";
                                if($author!=NULL) echo "<li>".$author."</li>";
                            

                        $i = 1;

                    }

                    else if($accession_number != $row->accession_number && $i!=0){

                        if($_SESSION['usertype']=="admin"){
?>
                            echo "<a href = 'delete?id={$accession_number}'><input class='btn btn-primary' type='button' name='".$row->accession_number."' value='Delete'/></a>";
                            <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/update_material">
                            <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
                            <input type="submit" value="Edit" />
                </form>
    
                    <?php
                        }
                        else if($_SESSION['usertype']=="user"){
?>
                            <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/main/load_book">
                            <button class="btn btn-primary" name="viewbook" type="submit" value="<?php echo $row->accession_number; ?>">Reserve</button>
                            </form>
                            <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/bookmark">
                                <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
                                <input type="hidden" value="gjpgagno@gmail.com" id="email" name="email"><!-- Hard coded email; MUST change to session-->
                                <input class="btn btn-primary" type="submit" value="Bookmark"/>
                            </form>
<?php
                        }
                        echo "</ul>";
                        echo "</div></div>";

                        $accession_number = $row->accession_number;

                        echo "<div class='results'>";
                            echo "<div class='result_information'>";
                                $title = $row->title;
                                $publisher = $row->publisher;
                                $author = $row->author;
                                echo "<ul>";
                                echo "<li>".$title."</li>";
                                echo "<li>".$publisher."</li>";
                                if($author!=NULL) echo "<li>".$author."</li>";

                    }

                    else{

                        $author = $row->author;
                        echo "<li>".$author."</li>";

                    }

                }

                if($accession_number!="" && $_SESSION['usertype'] == "admin"){

                    echo "<a href = 'delete?id={$accession_number}'><input class='btn btn-primary' type='button' name='".$row->accession_number."' value='Delete'/></a>";
                    ?>
                    <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/update_material">
                        <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
                        <input type="submit" value="Edit" />
                    </form>
                    <?php
                    echo "</ul>";
                    echo "</div></div>";

                }

                else if($accession_number!="" && $_SESSION['usertype'] == "user"){
?>
                    <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/main/load_book">
                        <button class="btn btn-primary" name="viewbook" type="submit" value="<?php echo $row->accession_number; ?>">Reserve</button>
                    </form>
                    <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/bookmark">
                        <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
                        <input type="hidden" value="gjpgagno@gmail.com" id="email" name="email"><!-- Hard coded email; MUST change to session-->
                        <input type="submit" value="Bookmark"/>
                    </form><?php
                    echo "</ul>";
                    echo "</div></div>";

                }


?>