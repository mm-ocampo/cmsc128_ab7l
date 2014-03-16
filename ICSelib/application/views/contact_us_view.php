<?php include "includes/header.php"; ?>

<?php include "includes/navigation_bar.php"; ?>


    <!-- Wrap all page content here -->
<div class="width_limit">
  <div id="staff_contact">

  </div>
<div id="contact_content">
  <form role="form" id="contact_form" name="contact_form" method="post" onsubmit=checkContents() action=<?php echo "\"".base_url()."index.php/query/insertquery?confirm="."\"";?>>
    <div>
      <?php if(!$this->session->userdata('email')){?>
      <div class="form-group" id="input1">
       <label for="input_email">Email address</label>
       <input type="email" class="form-control" id="input_email" name="input_email" onchange="checkemail()" placeholder="Enter email here" value="<?php if(isset($_POST['submit'])) echo $_POST['input_email'];?>">
       <font color="red"><span name="promptemail"></span></font>
      </div>
      <?php }else{?>
      <div class="form-group" id="input1">
       <label for="input_email">Email address</label>
       <input type="email" class="form-control" id="input_email" name="input_email" placeholder="Enter email here" value="<?php echo $this->session->userdata('email'); ?>">
       <font color="red"><span name="promptemail"></span></font>
      </div>
      <?php }?>
      
        <div class="form-group" id="input2">
        <label for="header">Header</label>
        <input type="text" class="form-control" id="header" name="header" placeholder="Enter header here" value="<?php if(isset($_POST['submit'])) echo $_POST['header'];?>">
        <font color="red"><span name="promptheader"></span></font>
      </div>
    </div>

      <div class="form-group" id="input3">
       <label for="query">Message</label>
       <textarea class="form-control" id="query_box" name="query_box" rows="10" placeholder="Enter your query here"  /><?php if(isset($_POST['submit'])) echo $_POST['query_box'];?></textarea>
       
      </div>
    <font color="red"><span name="promptmessage"></span></font><br><br>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    <button id="resetbutton" class="btn btn-default" onclick='resetFields()'>Reset Fields</button>
  </form>
</div>
  
</div>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
    <script type="text/javascript" language="javascript">


      function checkemail(){
            str=contact_form.input_email.value;
            msg="";
            if(str=="") msg += " Please enter a valid email.";
            else if(!str.match(/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/))
                msg += "Invalid E-mail.";
            document.getElementsByName('promptemail')[0].innerHTML=msg;
            if(msg=="") return true;
        }

      function checkmessage(){
            str=contact_form.query_box.value;
            var temp;
            msg="";
            if(str=="") msg += " Please enter a message.";
            else if(str.length > 500)
              msg += " Invalid message length.";
            document.getElementsByName('promptmessage')[0].innerHTML=msg;
            if(msg=="") return true;
      }

      function checkheader(){
        str=contact_form.header.value;
        var temp;
            msg="";
            if(str=="") msg += " Please enter a header.";
            else if(str.length > 50)
              msg += " Invalid header length.";
            document.getElementsByName('promptheader')[0].innerHTML=msg;
            if(msg=="") return true;
      }

      function resetFields() {
        if(confirm("Do you really want to RESET all the fields?")) {
          document.getElementById('input_email').value = "";
          document.getElementById('header').value = "";
          document.getElementById('query_box').value = "";
        }
      }

      function checkContents() {
        if(checkemail() && checkmessage() && checkheader()){
          
          if(!confirm("Are you sure of your message?")){
            document.getElementById("contact_form").action = document.getElementById("contact_form").action + "false";
            return false;
          }
          document.getElementById("contact_form").action = document.getElementById("contact_form").action + "true";

          <?php echo 'str=contact_form.header.value;
          temp = str.replace(/script/g,"-script-");
          temp = temp.replace(/php/g,"-php-");
          temp = temp.replace(/\"/g,"*"); '?>

          <?php echo "temp = temp.replace(/\'/g,";?>

          <?php echo ' "*"); ';?>

          <?php echo '
          contact_form.header.value = temp;
          str=contact_form.query_box.value;
          temp = str.replace(/script/g,"-script-");
          temp = temp.replace(/php/g,"-php-");
          temp = temp.replace(/\"/g,"*"); ';?>

          <?php echo "temp = temp.replace(/\'/g,";?>

          <?php echo ' "*"); 

          contact_form.query_box.value = temp; ';?>

          return true;
        }
      } 

    </script>
  </body>
</html>