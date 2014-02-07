<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8"/>
		<style>
		
			.results{
			
				float: left;
				clear: both;
				height: 100px;
				width: 400px;
				margin: 10px;
			
			}

			.results:hover{
			
				background: beige;
			
			}
			
			.results img{
			
				float: left;
			
			}
			
			.results .result_information{
			
				float: left;
			
			}

			.results form{

				float: left;
				clear: left;

			}

			.result_window{

				border: 1px solid black;
				height: 400px;
				width: 500px;
				position: fixed;
				left: 400px;
				display: none;

			}
		
		</style>

	</head>

	<body>

		<section id="search_module">

			<?php include "form.php";?>

		</section>

		<nav class="navigate_module">
			<?php include "navigator.php";?>
		</nav>

		<section id="view_module">
			<?php include "print_results.php";?>
		</section>

		<script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
		<script src="<?php echo base_url();?>js/jquery-1.9.1.min.js"></script>
		<script src="<?php echo base_url();?>js/main.js"></script>

	</body>

</html>