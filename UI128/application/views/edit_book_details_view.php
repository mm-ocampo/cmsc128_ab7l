<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update</title>
    <link rel="shortcut icon" href=<?php echo "\"".base_url()."assets/thumbnail.png"."\""?> >

    <!-- Bootstrap core CSS -->
    <link href=<?php echo "\"".base_url()."assets/dist/css/bootstrap.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/signin.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/carousel.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/docs.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/prettify.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/dashboard.css"."\""?> rel="stylesheet">

</head>
<body>
    <div id="main">
        <div id="box">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                        <?php $this->load->helper('url'); ?>
                        <br/>
                        <form name="material_form" class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>index.php/site/update_material_details" onsubmit="return validateAll();">
                            <input name="accession_number" type="hidden" class="form-control" value="<?php foreach($results as $row){echo $row->accession_number;} ?>">

                            <div class="form-group">
                                <label for="inputTitle">Title</label>
                                <input type="text" class="form-control input-mini" id="inputTitle" name="inputTitle" value="<?php foreach($results as $row){echo $row->title;} ?>">
                                <span class="prompt" name="title_prompt"></span><br/>
                            </div>

                            <div class="form-group">
                                <label for="inputType" style="text-align: center">Type</label>
                                <div name="radio_gender" style="text-align: center">
                                    <input type="text" id="type" name="type" hidden value="<?php foreach($results as $row){echo $row->type;} ?>">
                                    <div id="book" class="btn btn-mini <?php foreach($results as $row){if($row->type == 'book') echo 'btn-primary'; else echo 'btn-default';}?> custom" style="width:24%" onclick="book_buttonfunc()">Book</div>
                                    <div id="thesis" class="btn btn-mini <?php foreach($results as $row){if($row->type == 'thesis') echo 'btn-primary'; else echo 'btn-default';}?> custom" style="width:24%" onclick="thesis_buttonfunc()">Thesis</div>
                                    <div id="sp" class="btn btn-mini <?php foreach($results as $row){if($row->type == 'sp') echo 'btn-primary'; else echo 'btn-default';}?> custom" style="width:24%" onclick="sp_buttonfunc()">Special Project</div>
                                    <div id="journal" class="btn btn-mini <?php foreach($results as $row){if($row->type == 'journal') echo 'btn-primary'; else echo 'btn-default';}?> custom" style="width:24%" onclick="journal_buttonfunc()">Journal</div>
                                </div>
                                <br/>
                            </div>

                            <div class="form-group">
                                <label for="inputPublisher">Publisher</label>
                                <input type="text" class="form-control input-mini" id="inputPublisher" name="inputPublisher" value="<?php foreach($results as $row){echo $row->publisher;} ?>">
                                <span class="prompt" name="publisher_prompt"></span><br/>
                            </div>
                            <div class="form-group">
                                <label for="inputYear">Year</label>
                                <input type="number" class="form-control input-mini" id="inputYear" name="inputYear" value="<?php foreach($results as $row){echo $row->copyright_year;} ?>" min="1900">
                                <span class="prompt" name="year_prompt"></span><br/>
                            </div>
                            <div class="form-group">
                                <label for="inputSubject">Subject</label>
                                <select class="form-control input-mini" id="inputSubject" name="inputSubject">
                                    <option value="cmsc2" <?php foreach($results as $row){if($row->subject == 'cmsc2') echo 'selected';}?>>CMSC 2</option>
                                    <option value="cmsc11" <?php foreach($results as $row){if($row->subject == 'cmsc11') echo 'selected';}?>>CMSC 11</option>
                                    <option value="cmsc21" <?php foreach($results as $row){if($row->subject == 'cmsc21') echo 'selected';}?>>CMSC 21</option>
                                    <option value="cmsc22" <?php foreach($results as $row){if($row->subject == 'cmsc22') echo 'selected';}?>>CMSC 22</option>
                                    <option value="cmsc56" <?php foreach($results as $row){if($row->subject == 'cmsc56') echo 'selected';}?>>CMSC 56</option>
                                    <option value="cmsc57" <?php foreach($results as $row){if($row->subject == 'cmsc57') echo 'selected';}?>>CMSC 57</option>
                                    <option value="cmsc100" <?php foreach($results as $row){if($row->subject == 'cmsc100') echo 'selected';}?>>CMSC 100</option>
                                    <option value="cmsc123" <?php foreach($results as $row){if($row->subject == 'cmsc123') echo 'selected';}?>>CMSC 123</option>
                                    <option value="cmsc124" <?php foreach($results as $row){if($row->subject == 'cmsc124') echo 'selected';}?>>CMSC 124</option>
                                    <option value="cmsc125" <?php foreach($results as $row){if($row->subject == 'cmsc125') echo 'selected';}?>>CMSC 125</option>
                                    <option value="cmsc127" <?php foreach($results as $row){if($row->subject == 'cmsc127') echo 'selected';}?>>CMSC 127</option>
                                    <option value="cmsc128" <?php foreach($results as $row){if($row->subject == 'cmsc128') echo 'selected';}?>>CMSC 128</option>
                                    <option value="cmsc129" <?php foreach($results as $row){if($row->subject == 'cmsc129') echo 'selected';}?>>CMSC 129</option>
                                    <option value="cmsc130" <?php foreach($results as $row){if($row->subject == 'cmsc130') echo 'selected';}?>>CMSC 130</option>
                                    <option value="cmsc131" <?php foreach($results as $row){if($row->subject == 'cmsc131') echo 'selected';}?>>CMSC 131</option>
                                    <option value="cmsc132" <?php foreach($results as $row){if($row->subject == 'cmsc132') echo 'selected';}?>>CMSC 132</option>
                                    <option value="cmsc137" <?php foreach($results as $row){if($row->subject == 'cmsc137') echo 'selected';}?>>CMSC 137</option>
                                    <option value="cmsc141" <?php foreach($results as $row){if($row->subject == 'cmsc141') echo 'selected';}?>>CMSC 141</option>
                                    <option value="cmsc142" <?php foreach($results as $row){if($row->subject == 'cmsc142') echo 'selected';}?>>CMSC 142</option>
                                    <option value="cmsc150" <?php foreach($results as $row){if($row->subject == 'cmsc150') echo 'selected';}?>>CMSC 150</option>
                                    <option value="cmsc161" <?php foreach($results as $row){if($row->subject == 'cmsc161') echo 'selected';}?>>CMSC 161</option>
                                    <option value="cmsc165" <?php foreach($results as $row){if($row->subject == 'cmsc165') echo 'selected';}?>>CMSC 165</option>
                                    <option value="cmsc172" <?php foreach($results as $row){if($row->subject == 'cmsc172') echo 'selected';}?>>CMSC 172</option>
                                    <option value="cmsc180" <?php foreach($results as $row){if($row->subject == 'cmsc180') echo 'selected';}?>>CMSC 180</option>
                                    <option value="cmsc190" <?php foreach($results as $row){if($row->subject == 'cmsc190') echo 'selected';}?>>CMSC 190</option>
                                    <option value="cmsc191" <?php foreach($results as $row){if($row->subject == 'cmsc191') echo 'selected';}?>>CMSC 191</option>
                                    <option value="cmsc199" <?php foreach($results as $row){if($row->subject == 'cmsc199') echo 'selected';}?>>CMSC 199</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <table id="author_table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr class="success">
                                        <th>Author</th>
                                    </tr>
                                    </thead>
                                    <tbody style="width:100%;">
                                    <?php foreach($results2 as $row): ?>
                                        <tr>
                                            <td><input type="text" name="inputAuthor[]" value="<?php echo $row->author;?>" style="width:100%;border: none;"/></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td><input type="text" name="inputAuthor[]" value="" style="width:100%;border: none;"></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input class="add_more btn btn-custom" type="button" value="Add More Author" name="add_more" style="width:100%;"/>
                            </div>
                            <button type="submit" value="<?php foreach($results as $row){echo $row->accession_number;}?>" class="editButton btn btn-primary input-mini" style="width:100%;">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo base_url();?>/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url();?>/js/main.js"></script>
<!--Validation from add material-->
<script type="text/javascript">

    function book_buttonfunc(){
        document.getElementById("book").setAttribute("class","btn btn-primary");
        document.getElementById("thesis").setAttribute("class","btn btn-default custom");
        document.getElementById("sp").setAttribute("class","btn btn-default custom");
        document.getElementById("journal").setAttribute("class","btn btn-default custom");
        document.getElementById("type").value = "book";
        console.log(document.getElementById("type").value);
    }

    function thesis_buttonfunc(){
        document.getElementById("book").setAttribute("class","btn btn-default custom");
        document.getElementById("thesis").setAttribute("class","btn btn-primary");
        document.getElementById("sp").setAttribute("class","btn btn-default custom");
        document.getElementById("journal").setAttribute("class","btn btn-default custom");
        document.getElementById("type").value = "thesis";
        console.log(document.getElementById("type").value);
    }

    function sp_buttonfunc(){
        document.getElementById("book").setAttribute("class","btn btn-default custom");
        document.getElementById("thesis").setAttribute("class","btn btn-default custom");
        document.getElementById("sp").setAttribute("class","btn btn-primary");
        document.getElementById("journal").setAttribute("class","btn btn-default custom");
        document.getElementById("type").value = "sp";
        console.log(document.getElementById("type").value);
    }

    function journal_buttonfunc(){
        document.getElementById("book").setAttribute("class","btn btn-default custom");
        document.getElementById("thesis").setAttribute("class","btn btn-default custom");
        document.getElementById("sp").setAttribute("class","btn btn-default custom");
        document.getElementById("journal").setAttribute("class","btn btn-primary");
        document.getElementById("type").value = "journal";
        console.log(document.getElementById("type").value);
    }

    window.onload = function(){

      material_form.inputTitle.onblur = validate_title;
      material_form.inputPublisher.onblur = validate_publisher;
      material_form.inputYear.onblur = validate_year;
      material_form.inputSubject.onblur = validate_subject;
//      material_form.inputAuthor[0].onblur = validate_author;
    }

    function validate_title(){
      prompt = "";
      str = material_form.inputTitle.value;
      if(str.trim().length==0)
        prompt = "This is a required field.";
      else if(!str.match(/^[a-zA-Z][0-9a-zA-Z\-\ \.]+$/))
        prompt = "Only Letters, Numbers, Spaces, Period and Hypen are allowed in this field. title";
      document.getElementsByName('title_prompt')[0].innerHTML = prompt;
      if(prompt == "")
        return true;
    }

    function validate_publisher(){
      prompt = "";
      str = material_form.inputPublisher.value;
      if(str.trim().length==0)
        prompt = "This is a required field.";
      else if(!str.match(/^[a-zA-Z][0-9a-zA-Z\-\ \.\,]+$/))
        prompt = "Only Letters, Numbers, Spaces, Period and Hypen are allowed in this field.";
      document.getElementsByName('publisher_prompt')[0].innerHTML = prompt;
      if(prompt == "") 
        return true;
    }

    function validate_year(){
      prompt = "";
      str = material_form.inputYear.value;
      if(str.trim().length==0)
        prompt = "This is a required field.";
      else if(!str.match(/^[0-9]{4}$/))
        prompt = "Must be a 4-digit number.";
      document.getElementsByName('year_prompt')[0].innerHTML = prompt;
      if(prompt == "") 
        return true;
    }

    function validate_subject(){
      prompt = "";
      str = material_form.inputSubject.value;
      if(str.trim().length==0)
        prompt = "This is a required field.";
      else if(!str.match(/^[a-zA-Z][0-9a-zA-Z]+$/))
        prompt = "Only Letters and Numbers are allowed in this field.";
      document.getElementsByName('subject_prompt')[0].innerHTML = prompt;
      if(prompt == "")
        return true;
    }

    function validate_author(){
      for(i=0;i<material_form.inputAuthor.length;i++){
        prompt = "";
        str= material_form.inputAuthor[i].value;
        if(str.trim().length==0)
          prompt = "This is a required field.";
        document.getElementsByName('author_prompt')[0].innerHTML = prompt;
      }
    }

    function validateAll(){
      if(validate_title() && validate_publisher() && validate_year() && validate_subject()){
                alert('You have updated '+material_form.inputTitle.value+' details');
                return true;
            }
            return false;
    }

    $(function () {
        $('input.add_more').on('click', function () {
            var $table = $('#author_table');
            var $tr = $table.find('tr').eq(1).clone();
            $tr.appendTo($table).find('input').val('');
        });
    });
</script>
<link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
</html>