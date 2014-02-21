	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

	<?php
		$this->load->view('includes/header');
	?>

	

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<?php echo validation_errors('<p class="error">'); ?>
				<form id="material_form" action="<?php echo base_url();?>index.php/material_controller/add" class="form" role="form" name="material_form" method="post">

					<!-- Accession Number -->
					<div class="row">
						<div class="form-group col-xs-5">
								<input type="text" name="accession_number" class="form-control" id="accession_number" placeholder="Accession Number" required="true">
								<span class="prompt" name="accession_number_prompt"></span>
						</div>
					</div>

					<!-- Subject -->
					<div class="row">
						<div class="form-group col-xs-5">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="true">
								<span class="prompt" name="subject_prompt"></span>
						</div>
					</div>			

					<!-- Title -->
					<div class="row">
						<div class="form-group col-xs-5">
								<input type="text" name="title" class="form-control" id="title" placeholder="Title" required="true">
								<span class="prompt" name="title_prompt"></span>
						</div>
					</div>			

					<!-- Author -->
					<div class="row">
						<div class="form-group col-xs-5">
								<input type="text" name="author" class="form-control" id="author" placeholder="Author" required="true">
								<span class="prompt" name="author_prompt"></span>
						</div>
					</div>			

					<!-- Copyright Year -->
					<div class="row">
						<div class="form-group col-xs-5">
								<input type="number" name="copyright_year" min="1900" max="2014" class="form-control" id="copyright_year" placeholder="Copyright Year" required="true">
								<span class="prompt" name="copyright_year_prompt"></span>
						</div>
					</div>			

					<!-- Publisher -->
					<div class="row">
						<div class="form-group col-xs-5">
								<input type="text" name="publisher" class="form-control" id="publisher" placeholder="Publisher" required="true">
								<span class="prompt" name="publisher_prompt"></span>
						</div>
					</div>			

					<!-- Type -->
					<div class="row">
						<div class="form-group col-xs-5">
							<label for="type" class="col-sm- control-label">Type</label>
								<select name="type" class="form-control" id="type">
									<option value="book">Book</option>
									<option value="sp">Special Problem</option>
									<option value="thesis">Thesis</option>
									<option value="journal">Journal</option>
								</select>
						</div>
					</div>			

					<div>
						<!-- <input type="submit" class="btn btn-primary" name="Add Reading Material" data-toggle="modal" data-target="#myModal"> -->
				      	<input type="submit" class="btn btn-primary" value="Click Me" data-toggle="modal" data-target="#myModal"/>
				    </div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Reading Material</h4>
	      </div>
	      <div class="modal-body">
	      <table>
	      	<tr>
	      		<td>Accession Number: </td>
	      		<td><?php echo $_POST['accession_number'];?></td>
	      	</tr>
	      	<tr>
	      		<td>Subject: </td>
	      		<td><?php echo $_POST['subject'];?></td>
	      	</tr>
	      	<tr>
	      		<td>Title: </td>
	      		<td><?php echo $_POST['title'];?></td>
	      	</tr>
	      	<tr>
	      		<td>Author: </td>
	      		<td><?php echo $_POST['author'];?></td>
	      	</tr>
	      	<tr>
	      		<td>Copyright Year: </td>
	      		<td><?php echo $_POST['copyright_year'];?></td>
	      	</tr>
	      	<tr>
	      		<td>Publisher: </td>
	      		<td><?php echo $_POST['publisher'];?></td>
	      	</tr>
	      	<tr>
	      		<td>Type: </td>
	      		<td><?php echo $_POST['type'];?></td>
	      	</tr>
	      </table>
	      </div>
	      <div class="modal-footer">
	      	<form name="modal_button" method="post">
	     		<input type="submit" class="btn btn-primary" name="confirm" value="Confirm" onclick="sample()"/>
	     		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>
	
	<?php echo form_close(); ?>	
	</body>

	<script>
		function sample(){
			alert("set");
		}			
	</script>
	<script src="assets/js/jquery-1.11.0.min.js"></script>
	<script src="assets/js/input_checker.js"></script>	
	<script src="assets/js/bootstrap.min.js"></script>
</html>