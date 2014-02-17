<?php
/**
 * Created by PhpStorm.
 * User: Jr Bautista
 * Date: 1/24/14
 * Time: 12:18 AM
 */
?>

<html>
    <head>
        <title>
            Result
        </title>
    </head>
    <body>
            <?php
                $result = $_POST;
                $keys = array_keys((array)$result);
            for($i = 0, $j = count($keys); $i < $j; $i++){
                echo "<input type=&quot;text&quot; value=" . $keys[$i] . " size=15 disabled>";
            }
            echo "<br/>";
            for($i = 0, $j = count($result); $i < $j; $i++){
                foreach(((array)$result[$i]) as $values){
                    if($values == "")
                        $values = "NULL";
                    echo "<input type=&quottext&quot value=" . $values . " size=15>";
                }
                echo "<br/>";
            }

            ?>
    </body>
</html>