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

             <div class="container">
                    <div class="col-sm-7 col-sm-offset-2 main container">

                        <?php $this->load->helper('url'); ?>
				<h1>Forgot Password</h1>
				</div>
				</div>

    <script type="text/javascript">
		window.onload=function(){
			alert("You have successfully reset your password. Check your e-mail for your new password. Thank you!");
			window.location.href = "../../";
		}
    </script>

    <!--footer---------------------------------------------------------------------------------------------------------->
    <?php include("includes/footer.php"); ?>

	</body>
</html>