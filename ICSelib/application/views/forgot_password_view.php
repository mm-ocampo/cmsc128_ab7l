   <!-- Bootstrap core CSS -->
    <link href=<?php echo "\"".base_url()."assets/dist/css/bootstrap.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/signin.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/carousel.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/docs.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/prettify.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/dashboard.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/font-awesome/css/font-awesome.min.css"."\""?> rel="stylesheet">
 
<!DOCTYPE html>

<html>

    <head>
        <title>Forgot Password</title>
    </head>

    <body>

    <?php include('header_default.php'); ?>

    <div id="">
        <div id="">
            <div class="">
                <div class="container">
                    <div class="col-sm-7 col-sm-offset-2 main container">

                        <?php $this->load->helper('url'); ?>
						<h1>Forgot Password</h1>
                        <form name="main_form" action="<?php echo base_url();?>index.php/forgot_password/create_password/" method="post">
                            <hr>
                            <div class="row">
                                
                                <div class="form-group">
                                    <label for="email" style="text-align: center">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control input-mini" tabindex="5" required>
                                    <span name="promptemail"></span> <br/>
                                </div>
                                
                                

                                <div>
									<div class="form-group" style="width:80%">
										<label for="security_code" style="text-align: center">Security Code</label>
										<p style="font-size:0.8em">Please enter the characters that are shown in the picture below (without spaces, and upper or lower case can be used). If you cannot identify the captcha even after reloading it please contact the administrator of this site.</p>
										<img style="border:1px solid black;width:90px;height:50px;" src=<?php echo "\"".base_url()."assets/create_image.php"."\""?>>
										<input type="text" name="vercode" />
									</div>
								</div>
								
								<input type="submit" name="submit" value="Submit" class="btn btn-block btn-primary"/>
                        </form>
					</div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var type;
		
		 window.onload=function(){
			window.onsubmit=checkAll;
		 }

        function checkemail(){
            str=main_form.email.value;
            msg="";
            if(str=="") msg += " Please fill out this field.";
            else if(!str.match(/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/))
                msg += "Invalid E-mail.";
            document.getElementsByName('promptemail')[0].innerHTML=msg;
            if(msg=="") return true;
        }

        function checkAvailEmail(){
            var input = $('#email').val();
            var query = {"email":input};
            var result;

            function setResult(i){
                result = i;
            }

            if(checkemail()){
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>index.php/forgot_password/checkEmailExist",
                    data: query,
                    cache: false,
                    success: function(html){
                        $('span[name="promptemail"]').html(html);
                        $('span[name="promptemail"]').val(html);
                    }
                });
            }

            var result = ($('span[name="promptemail"]').val());
            var regex = new RegExp("available");
            if(result.match(regex)){
                return true;
            }
            return false;
        }
		
		function checkAll(){
			if(checkAvailEmail){
				return true;
			}
			return false;
		}


        </script>
        <script src="<?php echo base_url();?>/js/jquery-1.9.1.js"></script>
        <script>
        $(document).ready(function(){

            $("#email").keyup(function(){
                checkAvailEmail();
            });
        });

    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
        <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
        <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>

    <!--footer---------------------------------------------------------------------------------------------------------->
    <?php include("includes/footer.php"); ?>

	</body>
</html>