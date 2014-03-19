<!DOCTYPE html> 
<?php
    include "includes/authen.php";
?>
<html> 
    <head>    
        <title>Change Password</title>
    </head> 
  
    <body> 
        <div id="user_update_password">
            <form name="user_update_password" method="POST" action="<?php echo base_url();?>index.php/site/change_password_user" onsubmit="return checkAllPassword();"> 
                <div class="form-group">
                    <input type="password" name="current_password" id="current_password" class="form-control input-lg" placeholder="Current Password" tabindex="5">
                    <span name="prompt_current_password"></span>
                </div>
                <br/>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" maxlength="16" name="password_new" id="password_new" class="form-control input-lg" placeholder="New Password" tabindex="5">
                            <span name="promptpassword"></span> <br/>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" maxlength="16" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                            <span name="promptpassword2"></span> <br/>
                        </div>
                    </div>
                </div>
                <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
                <a href="<?php echo base_url();?>index.php/elib/admin_profile?page_number=4"><button type="button" class="btn">Cancel</button></a>
            </form> 
              
        </div> 

    </body> 
    
    <script type="text/javascript" language="javascript">

        function checkPassword(){
            str=document.getElementById('password_new').value;
            msg="";
            if(str.trim().length==0) msg = "Please fill out this field.";
            else if(str.match(/^[a-zA-Z0-9]{1,3}$/)){
                msg+=" Password must be 4-16 long.";
                document.getElementsByName('promptpassword')[0].innerHTML=msg;
            }
            else if(!str.match(/^[a-zA-Z0-9]+$/)){
                msg+="Special characters not allowed.";
                document.getElementsByName('promptpassword')[0].innerHTML=msg;
            }
            else if(str.match(/^[a-z]+$/)){
                msg+=" Weak :(";
                document.getElementsByName('promptpassword')[0].innerHTML=msg;
                msg = "";
            }
            else if(str.match(/^[0-9]+$/)){
                msg+=" Weak :(";
                document.getElementsByName('promptpassword')[0].innerHTML=msg;
                msg = "";
            }
            else if(str.match(/^[a-z0-9]+$/)){
                msg+=" Fair :|";
                document.getElementsByName('promptpassword')[0].innerHTML=msg;
                msg = "";
            }
            else if(str.match(/^[a-zA-Z0-9]+$/)){
                msg+=" Strong :)";
                document.getElementsByName('promptpassword')[0].innerHTML=msg;
                msg = "";
            }
            document.getElementsByName('promptpassword')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function matchPassword(){
            str1=document.getElementById('password_new').value;
            str2=document.getElementById('password_confirmation').value;
            msg="";
            if(str2=="") msg += " Please fill out this field.";
            if(str1!=str2)
                msg+=" Passwords do not match";
            document.getElementsByName('promptpassword2')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkAllPassword(){
            if(checkPassword() && matchPassword() ){
                return true;
            }
            return false;
        }

    </script>
    <script src="<?php echo base_url();?>/js/jquery-1.9.1.js"></script>
    <script>

        $(document).ready(function(){
            $("#password_new").keyup(function(){
               checkPassword();
            });
            $("#password_confirmation").keyup(function(){
               matchPassword();
            });
            $("#submit").click(function(){
               checkAllPassword();
            });

        });

    </script>
    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>

</html>