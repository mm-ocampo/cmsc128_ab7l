<?php
    foreach ($search as $row) {

        echo "<div class='results'>";
            echo "<div class='result_information'>";
                $title = $row->title;
                $publisher = $row->publisher;
                echo "<ul>";
                echo "<li>".$title."</li>";
                echo "<li>".$publisher."</li>";
                echo "<a href = 'delete?id={$row->accession_number}'><input type='button' name='".$row->accession_number."' value='Delete'/></a>";
                echo "</ul>";
            echo "</div>";
            ?>
        <form action="/reserve/index.php/main/load_book" method="POST">
            <input type="hidden" value="<?php echo $row->accession_number; ?>" id="accession_number" name="accession_number">
            <input type="button" value="Reserve"/>
            <input type="button" value="Bookmark"/>
            <input type="submit" value="Edit" href="#myModal"/>
            <button name="viewbook" value="<?php echo $row->accession_number ?>">Reserve</button>
        </form>
            <?php
        echo "</div>";
    }
 ?>