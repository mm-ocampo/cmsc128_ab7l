<!DOCTYPE html>
<html>
<body>
<?php

$count = 0;

foreach ($results as $row) {

    echo "<div class='results'>";
    echo "<div class='result_information'>";
    $title = $row->title;
    $publisher = $row->publisher;
    $accession_number = $row->accession_number;
    echo "<ul>";
    echo "<li>Accession number: ".$row->accession_number."</li>";
    echo "<li>Title: ".$title."</li>";
    echo "<li>Publisher: ".$publisher."</li>";
    echo "<ul>Author(s):</ul>";
    foreach($results2 as $row2){
        if($row2->accession_number==$accession_number){
            $author= $row2->author;
            echo "<li>".$author."</li>";
        }
    }
    echo "</ul>";
    echo "</div>";
    ?>


    <?php

        if($row->remail!="" || $row->bemail!=""){

            echo "RESERVED";

        }
        else{

            ?>

            <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/reserve/load_book">  <?php //main->reserve?>
            <button name="viewbook" type="submit" value="<?php echo $row->accession_number; ?>">Reserve</button>
            </form>

            <?php

        }

    ?>


    <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/remove_bookmark">
        <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
        <input type="hidden" value="<?php echo $this->session->userdata('email');?>" id="email" name="email"><!-- Hard coded email; MUST change to session-->
        <input type="submit" class="btn btn-primary" value="Remove bookmark"/>
    </form>
    <?php
    echo "</div>";

    $count++;

}

if($count==0){
    echo "</br></br></br><p class=\"text-center\"><span class=\"circle\" <br/><span class=\"glyphicon glyphicon-floppy-remove glyphicon-large\"></span></span></br><h3 class=\"text-center\">Shelf Empty</h3></p>";

    if(isset($statistics)){
        $search = $statistics;
        echo "<a data-toggle=\"modal\" href=\"#top_modal\" ><span class=\"glyphicon glyphicon-star glyphicon-medium\"></span> Most Borrowed Books</a>";
    }
}

?>

<div class="modal fade" id="top_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h1 class="modal-title">Top Ten Books</h1>
        </div>
        <div class="modal-body">
          <?php include "top_view.php" ?>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

</body>