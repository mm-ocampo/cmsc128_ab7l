<?php include "includes/authen.php"; ?>

<?php include "includes/header.php"; ?>

<?php include "includes/navigation_bar.php";?>

<body>
  <div id="wrap">
    <!-- Begin page content -->
    <div id="width_limit">
    
    <?php include "includes/admin_sidebar.php"; ?>

    <?php echo validation_errors('<p class="error">'); ?>
    <?php echo form_open("material_controller/add"); ?>

  <div class="content_right main">
      <a class="btn btn-primary pull-right" href="<?php echo base_url();?>index.php/elib/admin_default?page_number=1"><span class="fa fa-arrow-left"></span> Back</a>
      <h1 class="page-header">Add Material</h1>

    <div class="row">
            <?php echo validation_errors('<p class="error">'); ?>
            <form id="material_form" action="<?php echo base_url();?>index.php/material_controller/add" class="form" role="form" name="material_form" method="post">

                <div class="form-group">
                    <label for="inputType" style="text-align: center">Type</label>
                    <div name="radio_gender" style="text-align: center">
                        <input type="text" id="type" name="type" hidden value=""/>
                        <div id="book" class="btn btn-mini custom" style="width:10%" onclick="book_buttonfunc()">Book</div>
                        <div id="thesis" class="btn btn-mini custom" style="width:10" onclick="thesis_buttonfunc()">Thesis</div>
                        <div id="sp" class="btn btn-mini custom" style="width:10%" onclick="sp_buttonfunc()">Special Project</div>
                        <div id="journal" class="btn btn-mini custom" style="width:10%" onclick="journal_buttonfunc()">Journal</div>
                    </div>
                    <br/>
                </div>

                <!-- Subject for books only -->
                <div  id= "subject_book" class="row">
                    <div class="form-group col-xs-5">
                        <label for="subject" class="col-sm- control-label">Subject</label>
                        <select name="subject" class="form-control" id="subject">
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

                <!-- Subject for thesis and sp only -->
                <div  id= "subject_thesissp" class="row">
                    <div class="form-group col-xs-5" hidden="hidden">
                        <label for="thesissp_subject" class="col-sm- control-label">Subject</label>
                        <select name="thesissp_subject" class="form-control" id="thesissp_subject">
                            <option value=" "></option>
                        </select>
                    </div>
                </div>

                <!-- Quantity -->
                <div id="quantity_div" class="row">
                    <div class="form-group col-xs-5">
                        <label for="quantity" class="col-sm- control-label">Quantity</label>
                        <input type="number" name="quantity" min="1" max="10" class="form-control" id="quantity" required="true">
                        <span class="prompt" name="quantity_prompt"></span>
                    </div>
                </div>

                <!-- Title -->
                <div id="title_div" class="row">
                    <div class="form-group col-xs-5">
                        <label for="title" class="col-sm- control-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" required="true">
                        <span class="prompt" name="title_prompt"></span>
                    </div>
                </div>

                <!-- Abstract -->
                <div id="abstract" class="row">
                    <div class="form-group col-xs-5">
                        <label for="abstract_title" class="col-sm- control-label">Abstract</label>
                        <textarea id="abstract_title" name="abstract" class="form-control" rows="5"></textarea>
                    </div>
                </div>

                <!-- Author -->
                <div id="author_div" class="form-group">
                    <table id="author_table" class="control-group table table-striped table-bordered table-hover">
                        <thead>
                        <tr class="success">
                            <th>Author</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="inputAuthor[]" value="" style="border: none;"></td>
                        </tr>
                        </tbody>
                    </table>
                    <input onclick="add_author()" class="add_more btn btn-custom" type="button" value="Add More Author" name="add_more"/>
                </div>

                <!-- Copyright Year -->
                <div id="copyright_year_div" class="row">
                    <div class="form-group col-xs-5">
                        <label for="copyright_year" class="col-sm- control-label">Copyright Year</label>
                        <input type="number" name="copyright_year" min="1900" max="2014" class="form-control" id="copyright_year" required="true">
                        <span class="prompt" name="copyright_year_prompt"></span>
                    </div>
                </div>

                <!-- Publisher -->
                <div id="publisher_div" class="row">
                    <div class="form-group col-xs-5">
                        <label for="publisher" class="col-sm- control-label">Publisher</label>
                        <input type="text" name="publisher" class="form-control" id="publisher" required="true">
                        <span class="prompt" name="publisher_prompt"></span>
                    </div>
                </div>

                <!-- Topics -->
                <div id="topic_div" class="row">
                    <div class="form-group col-xs-5">
                        <label for="tags" class="col-sm- control-label">Topics</label>
                        <textarea id="tags" name="tags" class="form-control" placeholder="Enter tags separated by comma" rows="5"></textarea>
                    </div>
                </div>

                <div>
                    <!-- <input type="submit" class="btn btn-primary" name="Add Reading Material" data-toggle="modal" data-target="#myModal"> -->
                    <input type="submit" class="btn btn-primary" name="add_button"/>
                </div>
            </form>
        </div>
    </div>

  </body>
  

  </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the window so the pages load faster -->
    <script type="text/javascript" language="javascript" src="assets/js/jquery-2.0.3.js"></script>
    <script type="text/javascript" language="javascript" src="assets/js/input_checker.js"></script>  
    <script type="text/javascript" language="javascript" src="assets/js/bootstrap.min.js"></script>
    <script language="javascript" >

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
        }

        function book_buttonfunc(){
            window.getElementById("book").setAttribute("class","btn btn-primary");
            window.getElementById("thesis").setAttribute("class","btn btn-default custom");
            window.getElementById("sp").setAttribute("class","btn btn-default custom");
            window.getElementById("journal").setAttribute("class","btn btn-default custom");
            window.getElementById("type").value = "book";
            console.log(window.getElementById("type").value);
            change_div();
        }

        function thesis_buttonfunc(){
            window.getElementById("book").setAttribute("class","btn btn-default custom");
            window.getElementById("thesis").setAttribute("class","btn btn-primary");
            window.getElementById("sp").setAttribute("class","btn btn-default custom");
            window.getElementById("journal").setAttribute("class","btn btn-default custom");
            window.getElementById("type").value = "thesis";
            console.log(window.getElementById("type").value);
            change_div();
        }

        function sp_buttonfunc(){
            window.getElementById("book").setAttribute("class","btn btn-default custom");
            window.getElementById("thesis").setAttribute("class","btn btn-default custom");
            window.getElementById("sp").setAttribute("class","btn btn-primary");
            window.getElementById("journal").setAttribute("class","btn btn-default custom");
            window.getElementById("type").value = "sp";
            console.log(window.getElementById("type").value);
            change_div();
        }

        function journal_buttonfunc(){
            window.getElementById("book").setAttribute("class","btn btn-default custom");
            window.getElementById("thesis").setAttribute("class","btn btn-default custom");
            window.getElementById("sp").setAttribute("class","btn btn-default custom");
            window.getElementById("journal").setAttribute("class","btn btn-primary");
            window.getElementById("type").value = "journal";
            console.log(window.getElementById("type").value);
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
        }
    </script>
</body>
</html>