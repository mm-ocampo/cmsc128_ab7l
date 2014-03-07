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
<div id="wrap">

<?php include"header.php";?>

<body>

      <!-- Begin page content -->
      <div class="col-sm-4 sidebar">
          <ul class="nav nav-sidebar ">
              <h2 class="panel-heading">Hi ADMIN!</h2>
              <li><a class="list-group-item" href="/UI128/index.php/elib/admin_default">Books<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              <li><a class="list-group-item" href="/UI128/index.php/elib/admin_account">Accounts<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              <li><a class="list-group-item active" href="/UI128/index.php/elib/admin_profile">Edit Profile<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              <li><a class="list-group-item" href="/UI128/index.php/elib/logout">Log Out<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
              <div id="footer">
                  <div class="container">
                      <p class="text-muted">&copy; 2014 ICS eLib &middot; All rights reserved.</p>
                  </div>
              </div>
          </ul>
      </div>

      <div class="col-sm-9 col-sm-offset-3 main">
          <h1 class="page-header">Edit Info</h1>

      <div class="floatright">
  <form name="admin_update" method="POST" action="<?php echo base_url();?>index.php/elib/update_account_admin" onsubmit="return checkAll();"> 
                <input type="hidden" id="email" name="email" value="<?php foreach($results as $row){echo $row->email;}?>"/> 
                <!--Name-->
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="first_name" id="fname" class="form-control input-lg" placeholder="First Name" value="<?php foreach($results as $row){echo $row->first_name;}?>"tabindex="3">
                    <span name="promptfname"></span> <br/>
                </div>
                <div class="form-group">
                    <label for="mname">Middle Name</label>
                    <input type="text" name="middle_name" id="mname" class="form-control input-lg" placeholder="Middle Name" value="<?php foreach($results as $row){echo $row->middle_name;}?>" tabindex="3">
                    <span name="promptmname"></span> <br/>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="last_name" id="lname" class="form-control input-lg" placeholder="Last Name" value="<?php foreach($results as $row){echo $row->last_name;}?>" tabindex="3">
                    <span name="promptlname"></span> <br/>
                </div>
                <!--End of Name-->

                <div class="form-group">
                    <label for="employee_number">Employee Number</label>
                    <input type="text" name="employee_number" id="employee_number" class="form-control input-lg" placeholder="Employee Number" value="<?php foreach($results as $row){echo $row->employee_number;}?>" tabindex="3"> <span name="promptemployeenumber"></span>
                    <br/>
                </div>
                <div class="form-actions" id="cut">
                <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
                <a href="/UI128/index.php/elib/admin_default"><button type="button" class="btn">Cancel</button></a>

                </div>
            </form>
            <a href="<?php echo base_url()?>index.php/elib/change_password_view_admin">Change password</a>
      </div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
</body>
<script type="text/javascript" language="javascript">
        window.onload=function(){
            admin_update.first_name.onchange=checkfName;
            admin_update.middle_name.onblur=checkmName;
            admin_update.last_name.onblur=checklName;
            admin_update.employee_number.onblur=checkeNumber;
            admin_update.onsubmit=checkAll;
        }

        function checkeNumber() {
            str=admin_update.employee_number.value;
            console.log(str);
            msg="";
            if(str.trim().length==0) msg += " Please fill this out this field.";
            else if(!str.match(/^[0-9]{9}$/))
                msg += "Invalid employee number. Must consist of only 9 digits.";
            document.getElementsByName('promptemployeenumber')[0].innerHTML=msg;
            if(msg=="") return true;
        }


        function checkfName(){
            str=admin_update.first_name.value;
            msg="";
            if(str.trim().length==0) msg += " Please fill this out this field.";
            else if(!str.match(/^[a-zA-Z\ \-\.]+$/))
                msg += " Only letters hyphens and spaces are allowed.";
//            console.log(str.match(/^[a-zA-Z\ \-\.]+$/));
            document.getElementsByName('promptfname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkmName(){
            str=admin_update.middle_name.value;
            msg="";
            if(str.trim().length==0) msg += " Please fill out this field.";
            else if(!str.match(/^[a-zA-Z\ \-\.]+$/))
                msg += " Only letters hyphens and spaces are allowed.";
            document.getElementsByName('promptmname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checklName(){
            str=admin_update.last_name.value;
            msg="";
            if(str.trim().length==0) msg += " Please fill out this field.";
            else if(!str.match(/^[a-zA-Z\ \-\.]+$/))
                msg += " Only letters, hyphens and spaces are allowed.";
            document.getElementsByName('promptlname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkAll(){
                if(checkfName() && checkmName() && checklName() && checkeNumber()){
                    alert('You have updated your profile.');
                    return true;
                }
                return false;
        }

</script>

</html>