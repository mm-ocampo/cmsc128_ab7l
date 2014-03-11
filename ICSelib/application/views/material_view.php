<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php include "includes/authen.php"; ?>

<?php include "includes/header.php"; ?>

<?php include "includes/navigation_bar.php";?>

	<body>
	
  	<div id="wrap">
    <!-- Begin page content -->
    <div id="width_limit">
    
    <?php include "includes/admin_sidebar.php"; ?>
<div class="content_right main">
		
				<?php echo validation_errors('<p class="error">'); ?>
				<!-- action="<?php echo base_url();?>index.php/material_controller/add" -->
				<form id="material_form" action="<?php echo base_url();?>index.php/material_controller/add" class="form" role="form" name="material_form" method="post">
					<div class="form-group">
                        <label for="inputType">Type</label>
                        <div name="radio_gender">
                            <input type="text" id="type" name="type" hidden value=""/>
                            <div id="book" class="btn btn-primary custom" style="width:24%" onclick="book_buttonfunc()">Book</div>
                            <div id="thesis" class="btn btn-primary custom" style="width:24%" onclick="thesis_buttonfunc()">Thesis</div>
                            <div id="sp" class="btn btn-primary custom" style="width:24%" onclick="sp_buttonfunc()">Special Project</div>
                            <div id="journal" class="btn btn-primary custom" style="width:24%" onclick="journal_buttonfunc()">Journal</div>
                        </div>
                        <br/>
                    </div>					

					<!-- Subject for books only -->
					<div  id= "subject_book" class="add_book_inputs">
						<div class="form-group">
							<label for="subject" class="col-sm- control-label">Subject</label>
							<select name="subject" class="form-control input-mini" id="subject">
								<option value="cmsc2">CMSC 2</option>
						        <option value="cmsc11">CMSC 11</option>
						        <option value="cmsc21">CMSC 21</option>
						        <option value="cmsc22">CMSC 22</option>
						        <option value="cmsc56">CMSC 56</option>
						        <option value="cmsc57">CMSC 57</option>
						        <option value="cmsc100">CMSC 100</option>
						        <option value="cmsc123">CMSC 123</option>
						        <option value="cmsc124">CMSC 124</option>
						        <option value="cmsc125">CMSC 125</option>
						        <option value="cmsc127">CMSC 127</option>
						        <option value="cmsc128">CMSC 128</option>
						        <option value="cmsc129">CMSC 129</option>
						        <option value="cmsc130">CMSC 130</option>
						        <option value="cmsc131">CMSC 131</option>
						        <option value="cmsc132">CMSC 132</option>
						        <option value="cmsc137">CMSC 137</option>
						        <option value="cmsc141">CMSC 141</option>
						        <option value="cmsc142">CMSC 142</option>
						        <option value="cmsc150">CMSC 150</option>
						        <option value="cmsc161">CMSC 161</option>
						        <option value="cmsc165">CMSC 165</option>
						        <option value="cmsc172">CMSC 172</option>
						        <option value="cmsc180">CMSC 180</option>
						        <option value="cmsc190">CMSC 190</option>
						        <option value="cmsc191">CMSC 191</option>
						        <option value="cmsc199">CMSC 199</option>
							</select>
						</div>
					</div>

					<!-- Quantity -->
					<div id="quantity_div" class="add_book_inputs">
						<div class="form-group">
							<label for="quantity" class="col-sm- control-label">Quantity</label>
							<input type="number" name="quantity" min="1" max="10" class="form-control input-mini" id="quantity" required="true">
							<span class="prompt" name="quantity_prompt"></span>
						</div>
					</div>

					<!-- Title -->
					<div id="title_div" class="add_book_inputs">
						<div class="form-group">
							<label for="title" class="col-sm- control-label">Title</label>
							<input type="text" name="title" class="form-control input-mini" id="title" required="true">
							<span class="prompt" name="title_prompt"></span>
						</div>
					</div>

					<!-- Abstract -->
					<div id="abstract" class="add_book_inputs">
						<div class="form-group">
							<label for="abstract_title" class="col-sm- control-label">Abstract</label>
							<textarea id="abstract_title" name="abstract" class="form-control input-mini" rows="5"></textarea>
						</div>
					</div>			

					<!-- Author -->
					 <div id="author_div" class="form-group add_book_inputs">
                        <table id="author_table" class="control-group table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="success">
                                <th>Author</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input type="text" class="form-control input-mini" name="inputAuthor[]" value="" style="border: none;"></td>
                            </tr>
                            </tbody>
                        </table>
                        <input onclick="add_author()" class="add_more btn btn-custom" type="button" value="Add More Author" name="add_more"/>
                    </div>		

					<!-- Copyright Year -->
					<div id="copyright_year_div" class="add_book_inputs">
						<div class="form-group col-xs-5">
							<label for="copyright_year" class="col-sm- control-label">Copyright Year</label>
							<input type="number" name="copyright_year" min="1900" max="2014" class="form-control input-mini" id="copyright_year" >
							<span class="prompt" name="copyright_year_prompt"></span>
						</div>
					</div>			

					<!-- Publisher -->
					<div id="publisher_div" class="add_book_inputs">
						<div class="form-group">
							<label for="publisher" class="col-sm- control-label">Publisher</label>
							<input type="text" name="publisher" class="form-control input-mini" id="publisher">
							<span class="prompt" name="publisher_prompt"></span>
						</div>
					</div>

					<!-- Topics -->
					<div id="topic_div" class="add_book_inputs">
						<div class="form-group">
							<label for="tags" class="col-sm- control-label">Topics</label>
							<textarea id="tags" name="tags" class="form-control" placeholder="Enter tags separated by comma" rows="5"></textarea>
						</div>
					</div>		

					<div>
						<!-- <input type="submit" class="btn btn-primary" name="Add Reading Material" data-toggle="modal" data-target="#myModal"> -->
				      	<!--<input type="submit" class="btn btn-primary" name="add_button" onclick="check_all_fields()"/>-->
				      	<input type="button" id="show_modal" class="btn btn-primary" name="add_button" value="Add Reading Material" data-toggle="modal" data-target="#myModal"/>
				    </div>

				    <!-- MODAL -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Add Reading Material</h4>
								</div>
								<div class="modal-body">
									<p id="modal_content"></p>
								</div>
								<div class="modal-footer">
									<form method="post" >
										<input name="add" type="submit" class="btn btn-primary">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- END MODAL -->
				</form>
		</div>
	</body>
	<script type="text/javascript" language="javascript" src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script type="text/javascript" language="javascript" src=<?php echo "\"".base_url()."assets/input_checker.js"."\""?>></script>  
    <script type="text/javascript" language="javascript" src=<?php echo "\"".base_url()."assets/js/bootstrap.min.js"."\""?>></script>  
    <script type="text/javascript" language="javascript" >
    var author_counter = 1;
        window.onload = function(){
            $('#title_div').hide();
            $('#copyright_year_div').hide();
            $('#publisher_div').hide();
            $('#topic_div').hide();
            $('#author_div').hide();
            $("#abstract").hide();
            $('#subject_thesissp').hide();
            $('#subject_book').hide();
            $('#quantity_div').hide();
            $('#show_modal').hide();
        }

        function book_buttonfunc(){
            document.getElementById("book").setAttribute("class","btn btn-primary");
            document.getElementById("thesis").setAttribute("class","btn btn-default custom");
            document.getElementById("sp").setAttribute("class","btn btn-default custom");
            document.getElementById("journal").setAttribute("class","btn btn-default custom");
            document.getElementById("type").value = "book";
            console.log(document.getElementById("type").value);

            change_div();
        }

        function thesis_buttonfunc(){
            document.getElementById("book").setAttribute("class","btn btn-default custom");
            document.getElementById("thesis").setAttribute("class","btn btn-primary");
            document.getElementById("sp").setAttribute("class","btn btn-default custom");
            document.getElementById("journal").setAttribute("class","btn btn-default custom");
            document.getElementById("type").value = "thesis";
            console.log(document.getElementById("type").value);
            change_div();
        }

        function sp_buttonfunc(){
            document.getElementById("book").setAttribute("class","btn btn-default custom");
            document.getElementById("thesis").setAttribute("class","btn btn-default custom");
            document.getElementById("sp").setAttribute("class","btn btn-primary");
            document.getElementById("journal").setAttribute("class","btn btn-default custom");
            document.getElementById("type").value = "sp";
            console.log(document.getElementById("type").value);
            change_div();
        }

        function journal_buttonfunc(){
            document.getElementById("book").setAttribute("class","btn btn-default custom");
            document.getElementById("thesis").setAttribute("class","btn btn-default custom");
            document.getElementById("sp").setAttribute("class","btn btn-default custom");
            document.getElementById("journal").setAttribute("class","btn btn-primary");
            document.getElementById("type").value = "journal";
            console.log(document.getElementById("type").value);
            change_div();
        }

        function add_author() {
            console.log("boom");
            var $table = $('#author_table');
            var $tr = $table.find('tr').eq(1).clone();
            $tr.appendTo($table).find('input').val('');
        }


        function change_div(){
            var textarea = $('#abstract');
            var select   = $('#type').val();

            if (select == "sp" || select == "thesis"){
                $('#subject_book').hide();
                $('#subject_thesissp').slideDown("fast");
                $('#quantity_div').slideDown("fast");
                textarea.slideDown("fast");
                $('#title_div').slideDown("fast");
                $('#author_div').slideDown("fast");
                $('#copyright_year_div').slideDown("fast");
                $('#publisher_div').slideDown("fast");
                $('#topic_div').slideDown("fast");
            }
            else if(select == "book"){
                $('#subject_book').slideDown("fast");
                $('#quantity_div').slideDown("fast");
                textarea.hide();
                $('#subject_thesissp').hide();
                $('#title_div').slideDown("fast");
                $('#author_div').slideDown("fast");
                $('#copyright_year_div').slideDown("fast");
                $('#publisher_div').slideDown("fast");
                $('#topic_div').slideDown("fast");
            }
            else if(select == "journal"){
                $('#subject_book').hide();
                $('#subject_thesissp').hide();
                $('#quantity_div').slideDown("fast");
                textarea.hide();
                $('#subject_thesissp').hide();
                $('#title_div').slideDown("fast");
                $('#author_div').slideDown("fast");
                $('#copyright_year_div').slideDown("fast");
                $('#publisher_div').slideDown("fast");
                $('#topic_div').slideDown("fast");
            }
            $('#show_modal').slideDown();
        }

        $('#show_modal').click(function(){
      var type = $('#type').val();
      var title = $('#title').val();
      var subject_book = $('#subject').val();
      var publisher = $('#publisher').val();
      var copyright_year = $('#copyright_year').val();
      var topics = $('#tags').val();
      var abstract = $('#abstract_title').val();
      
      /* start table tag */
      var str = "<table>";

      /* show type */
      str += "<tr><td>Type: </td>";
      str += "<td>";
      if(type == "book")
        str += "Book";
      else if(type == "sp")
        str += "Special Problem";
      else if(type == "thesis")
        str += "Thesis";
      else if(type == "journal")
        str += "Journal";
      str += "</td></tr>";
      /* end type */

      /* show subject if the type is book */
      if(type == "book"){
        str += "<tr><td>Subject: </td>";
        str += "<td>" + $('#subject').val() + "</td></tr>";
      }
      /* end subject */

      /* show title */
      str += "<tr><td>Title: </td>";
      str += "<td>" + $('#title').val() + "</td></tr>";
      /* end title */

      /* show author */
      str += "<tr><td>Author: </td>";
      str += "<td>";
      /* if more than one author, show only 1 author and append et al*/
      if(author_counter > 1)
        str += $('[name="inputAuthor[]"]').val() + " et al"; 
      else
        str += $('[name="inputAuthor[]"]').val();
      str += "</td></tr>";
      /* end author */

      /* show publisher if it exists */
      if(publisher != ""){
        str += "<tr><td>Publisher: </td>";
        str += "<td>" + $('#publisher').val() + "</td></tr>";
      }
      /* end  publisher */

      /* show copyright year if it exists */
      if(copyright_year != ""){
        str += "<tr><td>Copyright Year: </td>";
        str += "<td>" + $('#copyright_year').val() + "</td></tr>";
      }
      /* end copyright year */

      /* show topic if it exists */
      if(topics != ""){
        str += "<tr><td>Topics: </td>";
        str += "<td>" + $('#tags').val() + "</td></tr>";
      }
      /* end topic */

      /* show abstract if it exists in sp and thesis */
      if(type == "sp" || type == "thesis"){
        if(abstract != ""){
          str += "<tr><td>Abstract: </td>";
          str += "<td>" + $('#abstract_title').val() + "</td></tr>";
        }
      }
      //
      str += "</table>";

      $('#modal_content').html(str);
    });
    </script>
</html>