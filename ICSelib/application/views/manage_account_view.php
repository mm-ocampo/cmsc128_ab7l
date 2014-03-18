<?php include "includes/authen.php"; ?>

<?php include "includes/header.php"; ?>

<?php include "includes/navigation_bar.php";?>

  <body>
    <div id="wrap">
      <!-- Begin page content -->
      <div id="width_limit">
        <?php include "includes/admin_sidebar.php"; ?>
      </div>      

    <div class="content_right main">
        <h1 class="page-header"><?php echo ucfirst($result["operation"]);?> Accounts</h1>
    
      <div class="row placeholders">


    <div id="accounts">
        <?php
        //$operation = "approve";
            $expected_status = "";
            switch($result["operation"]){
                case "approve":             $expected_status = "Pending Approval";
                                            break;
                case "deactivate":          $expected_status = "Active";
                                            break;
                case "reactivate":
                case "delete":              $expected_status = "Deactivated";
                                            break;
            }
            $user_count = sizeof($result);

            echo "<table class='table table-hover'>";
            echo "<tr>".
                "<td>Name</td>".
                "<td>Email</td>".
                "<td>Identification</td>".
                "<td>Degree Program</td>".
                "<td>Approve?</td>".
            "</tr>";

            for($i=0; $i<$user_count-1; $i++){
                if($result[$i]->status == $expected_status){
                    echo "<tr class=\"account\" id=\"" . $result[$i]->email . "\">";
                    echo "<td>" . $result[$i]->last_name . ", " . $result[$i]->first_name . " " . $result[$i]->middle_name . "</td>";
                    echo "<td>" . $result[$i]->email . "</td>";
                    if($result[$i]->is_student == 1)
                        echo "<td>" .  $result[$i]->student_number . "</td>";
                    else
                        echo "<td>" . $result[$i]->employee_number . "</td>";
                    echo "<td>" . $result[$i]->degree_program . "</td>";
        ?>
        <?php $this->load->helper('url'); ?>
        <form name="main_form" action="<?php echo base_url();?>index.php/manage_account/manipulate_account/" method="post">
        <?php
                    echo "<input type=\"text\" name=\"email\" hidden value=\"" . $result[$i]->email . "\">";
                    switch($result["operation"]){
                        case "approve":             echo "<td><button type=\"submit\" name=\"approve\" value=\"" . $result[$i]->email . "\" class='btn btn-primary' >Approve</button></td>";
                                                    break;
                        case "deactivate":          echo "<td><button type=\"submit\" name=\"deactivate\" value=\"" . $result[$i]->email . "\" class='btn btn-primary'>Deactivate</button></td>";
                                                    break;
                        case "reactivate":          echo "<td><button type=\"submit\" name=\"delete\" value=\"" . $result[$i]->email . "\" class='btn btn-primary'>Reactivate</button></td>";
                                                    break;
                        case "delete":              echo "<td><button type=\"submit\" name=\"delete\" value=\"" . $result[$i]->email . "\" class='btn btn-primary'>Delete</button></td>";
                                                    break;
                    }
                    
                }
                echo "</tr>";
            }
            echo "</table>"
        ?>
        </form>
    </div>

        
      </div>
  </div>
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
</body>
</html>

