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
        <h1 class="page-header">Edit Info</h1>
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

          <div class="form-group">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" class="form-control input-lg" placeholder="Password" value="*****" disabled tabindex="3">
            </div>
            <a data-toggle="modal" href="#change_password_modal">Change Password</a>

          </br></br>

          <div class="form-actions" id="cut">
          <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
          <a href="<?php echo base_url();?>index.php/elib/admin_default"><button type="button" class="btn">Cancel</button></a>
          </div>
        </form>
        
      </div>
    </div>

    <div class="modal fade" id="change_password_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h1 class="modal-title">Change Password</h1>
        </div>
        <div class="modal-body">
          <?php include "admin_change_password_view.php" ?>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

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
            else if(!str.match(/^[a-zA-Z0-9\ ]+[\-\.]?[a-zA-Z0-9\ \-]*$/))
                msg += " Only letters hyphens and spaces are allowed.";
//            console.log(str.match(/^[a-zA-Z\ \-\.]+$/));
            document.getElementsByName('promptfname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkmName(){
            str=admin_update.middle_name.value;
            msg="";
            if(!str.match(/^[a-zA-Z\ ]+[\.\-]?[a-zA-Z]*$/))
                msg += " Only letters hyphens and spaces are allowed.";
            document.getElementsByName('promptmname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checklName(){
            str=admin_update.last_name.value;
            msg="";
            if(str.trim().length==0) msg += " Please fill out this field.";
            else if(!str.match(/^[a-zA-Z\ ]+[\.\-]?[a-zA-Z]*$/))
                msg += " Only letters, hyphens and spaces are allowed.";
            document.getElementsByName('promptlname')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkAll(){
                if(checkfName() && checkmName() && checklName() && checkeNumber()){
                    alert(  'You have updated your profile.');
                    return true;
                }
                return false;
        }
        $(document).ready(function(){
            $("#fname").keyup(function(){
                checkfName();
            });
            $("#mname").keyup(function(){
               checkmName();
            });
            $("#lname").keyup(function(){
               checklName();
            });
            $("#birth_date").keyup(function(){
               checkBday();
            });
            $("#employee_number").keyup(function(){
               checkeNumber();
            });

        });

</script>

</html>