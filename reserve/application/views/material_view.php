	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

	<?php
		$this->load->view('includes/header');
	?>

	<?php echo validation_errors('<p class="error">'); ?>
	<?php echo form_open("material_controller/add"); ?>

	<div class="container">
		<form name="material_form" class="form" role="form" method="post">
			
			<div class="form-group">
				<label for="accession_number">Accession Number</label>
					<input type="text" name="accession_number" class="form-control" value="<?php echo set_value('accession_number'); ?>" id="accession_number" placeholder="Enter Accession Number" required="true">
					<span name="accesion_number_prompt"></span>
			</div>

			<div class="form-group">
				<label for="subject">Subject</label>
					<input type="text" class="form-control" name="subject" value="<?php echo set_value('subject'); ?>" id="subject" placeholder="Enter Subject" required="true">
					<span name="subject_prompt"></span>
			</div>

			<div class="form-group">
				<label for="title" class="col-sm- control-label">Title</label>
					<input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>" id="title" placeholder="Enter Title" required="true">
					<span name="title_prompt"></span>
			</div>

			<div class="form-group">
				<label for="author" class="col-sm- control-label">Author</label>
					<input type="text" name="author" class="form-control" value="<?php echo set_value('author'); ?>" id="author" placeholder="Enter Author" required="true">
					<span name="author_prompt"></span>
			</div>

			<div class="form-group">
				<label for="copyright_year" class="col-sm- control-label">Copyright Year</label>
					<input type="number" name="copyright_year" min="1900" max="2014" class="form-control" value="<?php echo set_value('copyright_year'); ?>" id="copyright_year" placeholder="Enter Copyright Year" required="true">
					<span name="copyright_year_prompt"></span>
			</div>

			<div class="form-group">
				<label for="publisher" class="col-sm- control-label">Publisher</label>
					<input type="text" name="publisher" class="form-control" value="<?php echo set_value('publisher'); ?>" id="publisher" placeholder="Enter Publisher" required="true">
					<span name="publisher_prompt"></span>
			</div>

			<div class="form-group">
				<label for="type" class="col-sm- control-label">Type</label>
                    <select name="type" class="form-control" value="<?php echo set_value('type'); ?>" id="type">
					    <option value="book">Book</option>
					    <option value="sp">Special Problem</option>
					    <option value="thesis">Thesis</option>
					    <option value="journal">Journal</option>
                    </select>
					<span name="type_prompt"></span>
			</div>

			<div>
		      	<input type="submit" class="btn btn-primary" name="Add Reading Material">
		    </div>
		</form>
	</div>

	<?php echo form_close(); ?>		
	<script src="assets/js/jquery-1.11.0.min.js"></script>
	<script src="assets/js/input_checker.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<?php
		$this->load->view('includes/footer');
	?>