<DOCTYPE! html>
<head>
    <title>Manage Account</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ICSeLib</title>
    <link rel="shortcut icon" href=<?php echo "\"".base_url()."assets/thumbnail.png"."\""?> >

    <!-- Bootstrap core CSS -->
    <link href=<?php echo "\"".base_url()."assets/dist/css/bootstrap.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/signin.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/carousel.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/docs.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/prettify.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/dashboard.css"."\""?> rel="stylesheet">
  </head>

<!-- Wrap all page content here -->

<?php include"header.php";?>

<body>

      <!-- Begin page content -->
<div id="wrap">
      <!-- Begin page content -->
      <div class="row container">
      <div class="col-sm-4 sidebar">
        <ul class="nav nav-sidebar ">
          <h2 class="panel-heading">Hi ADMIN!</h2>
          <li><a class="list-group-item" href="/UI128/index.php/elib/admin_default">Books<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
          <li><a class="list-group-item active" href="/UI128/index.php/elib/admin_account">Accounts<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/admin_profile">Edit Profile<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
          <li><a class="list-group-item" href="/UI128/index.php/elib/logout">Log Out<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
            <div id="footer">
              <div class="container">
                <p class="text-muted">&copy; 2014 ICS eLib &middot; All rights reserved.</p>
              </div>
            </div>
        </ul>
      </div>
      </div>


  <div class="col-sm-9 col-sm-offset-3 main">
    <h1 class="page-header">Approve Accounts</h1>
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

            echo "<table class='table table-striped'>";
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

