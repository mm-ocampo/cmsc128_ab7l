<DOCTYPE! html>
<head>
    <title>Manage Account</title>
</head>
<body>
    <div id="accounts">
        <?php
            $user_count = sizeof($result);
            for($i=0; $i<$user_count; $i++){
                echo "<div class=\"account\" id=\"" . $result[$i]->email . "\">";
                echo $result[$i]->last_name . ", " . $result[$i]->first_name . " " . $result[$i]->middle_name . "</br>";
                echo $result[$i]->email . "</br>";
                if($result[$i]->is_student == 1)
                    echo $result[$i]->student_number . "</br>";
                else
                    echo $result[$i]->employee_number . "</br>";
                echo $result[$i]->degree_program . "</br>";
                echo "<em>" . $result[$i]->status . "</em></br>";
        ?>
        <?php $this->load->helper('url'); ?>
        <form name="main_form" action="<?php echo base_url();?>index.php/manage_account/manipulate_account/" method="post">
            <?php
                    echo "<input type=\"text\" name=\"email\" hidden value=\"" . $result[$i]->email . "\">";
                    if($result[$i]->status == "Pending Approval")
                        echo "<button type=\"submit\" name=\"approve\" value=\"" . $result[$i]->email . "\">Approve</button>";
                    else if($result[$i]->status == "Active"){
                        echo "<button type=\"submit\" name=\"deactivate\" value=\"" . $result[$i]->email . "\">Deactivate</button>";
                        echo "<button type=\"submit\" name=\"delete\" value=\"" . $result[$i]->email . "\">Delete</button>";
                    }
                    else{
                        echo "<button type=\"submit\" name=\"activate\" value=\"" . $result[$i]->email . "\">Activate</button>";
                        echo "<button type=\"submit\" name=\"delete\" value=\"" . $result[$i]->email . "\">Delete</button>";
                    }
                    echo "</div></br>";
                }
            ?>
        </form>
    </div>

    <style>
        .account{
            border: 1px solid black;
        }
    </style>

</body>