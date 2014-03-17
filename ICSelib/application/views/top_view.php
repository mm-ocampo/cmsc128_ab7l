<!DOCTYPE html> 
<?php
    include "includes/authen.php";
?>
<html> 
    <head>    
        <title>Most Borrowed Books</title>
    </head> 
  
    <body>
<?php
	$search = $statistics;
	include "print_results.php";
?>
    </body>

	<script src="<?php echo base_url();?>/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url();?>/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url();?>/js/main.js"></script>
</html>