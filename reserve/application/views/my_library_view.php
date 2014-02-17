<!DOCTYPE html>
<html>

<head>My Library</head>
<body>
<?php
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
    <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>index.php/site/remove_bookmark">
        <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
        <input type="hidden" value="gjpgagno@gmail.com" id="email" name="email"><!-- Hard coded email; MUST change to session-->
        <input type="submit" value="Remove bookmark"/>
    </form>
    <?php
    echo "</div>";

}
?>
</body>