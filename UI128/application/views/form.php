<form action="<?php echo base_url();?>index.php/site/search?page_number=1" method="get" accept-charset="utf-8">

    <?php

    /*
    *	FORM
    *	Ito yung mga form na ginamit ko sa home_view at search_view
    *
    */


    //Initialization lang ng variables
    $filter = "";
    if(isset($_GET['filter']))		$filter = $_GET['filter'];

    $sort = "";
    if(isset($_GET['sort']))		$sort = $_GET['sort'];

    if(isset($_GET['format']))		$format = $_GET['format'];

    ?>

    <select class="filter_select" name="filter">
    <option value="topic" <?php if($filter=="topic")    echo " selected='selected'";?> >Topic</option>
        <option value="title" <?php if($filter=="title")	echo " selected='selected'";?> >Title</option>
        <option value="author"<?php if($filter=="author")	echo " selected='selected'";?> >Author</option>
        <option value="publisher"<?php if($filter=="publisher")	echo " selected='selected'";?> >Publisher</option>
        <option value="subject"<?php if($filter=="subject")	echo " selected='selected'";?> >Subject</option>
        <option value="accession_number"<?php if($filter=="accession_number")	echo " selected='selected'";?> >Accession Number</option>
    </select>

    <input type="text" autocomplete="off" id="search_bar"
        <?php
        if(isset($_GET['search_query']) && $_GET['filter']!="subject")	
            echo "name='search_query' ";
        else if(isset($_GET['search_query']) && $_GET['filter']=="subject")
            echo "name='dummy' style='display:none'";
        else 
            echo "name='search_query' ";
        ?>

    value="<?php
        if(isset($_GET['search_query']))	echo str_replace('+',' ',$_GET['search_query']);
    ?>"/><a href="<?php echo base_url(); if($this->session->userdata('type') == 'user') echo "index.php/elib/user_advanced_search"; else echo "index.php/elib/admin_advanced_search";?>">Advanced Search</a>

    <select id="search_subject"
        <?php
        if(isset($_GET['search_query']) && $_GET['filter']=="subject")	
            echo "name='search_query' ";
        else if(isset($_GET['search_query']) && $_GET['filter']!="subject")	
            echo "name='dummy' style='display:none'";
        else 
            echo "name='dummy' style='display:none'";
        ?>
    >


        <?php
        $query = "";
        if(isset($_GET['search_query']))		
            $query = $_GET['search_query'];
        ?>


        <option value="cmsc2" <?php if($query=="cmsc2")	echo " selected='selected'";?>>CMSC 2</option>
        <option value="cmsc11" <?php if($query=="cmsc11")	echo " selected='selected'";?>>CMSC 11</option>
        <option value="cmsc21" <?php if($query=="cmsc21")	echo " selected='selected'";?>>CMSC 21</option>
        <option value="cmsc22" <?php if($query=="cmsc22")	echo " selected='selected'";?>>CMSC 22</option>
        <option value="cmsc56" <?php if($query=="cmsc56")	echo " selected='selected'";?>>CMSC 56</option>
        <option value="cmsc57" <?php if($query=="cmsc57")	echo " selected='selected'";?>>CMSC 57</option>
        <option value="cmsc100" <?php if($query=="cmsc100")	echo " selected='selected'";?>>CMSC 100</option>
        <option value="cmsc123" <?php if($query=="cmsc123")	echo " selected='selected'";?>>CMSC 123</option>
        <option value="cmsc124" <?php if($query=="cmsc124")	echo " selected='selected'";?>>CMSC 124</option>
        <option value="cmsc125" <?php if($query=="cmsc125")	echo " selected='selected'";?>>CMSC 125</option>
        <option value="cmsc127" <?php if($query=="cmsc127")	echo " selected='selected'";?>>CMSC 127</option>
        <option value="cmsc128" <?php if($query=="cmsc128")	echo " selected='selected'";?>>CMSC 128</option>
        <option value="cmsc129" <?php if($query=="cmsc129")	echo " selected='selected'";?>>CMSC 129</option>
        <option value="cmsc130" <?php if($query=="cmsc130")	echo " selected='selected'";?>>CMSC 130</option>
        <option value="cmsc131" <?php if($query=="cmsc131")	echo " selected='selected'";?>>CMSC 131</option>
        <option value="cmsc132" <?php if($query=="cmsc132")	echo " selected='selected'";?>>CMSC 132</option>
        <option value="cmsc137" <?php if($query=="cmsc137")	echo " selected='selected'";?>>CMSC 137</option>
        <option value="cmsc141" <?php if($query=="cmsc141")	echo " selected='selected'";?>>CMSC 141</option>
        <option value="cmsc142" <?php if($query=="cmsc142")	echo " selected='selected'";?>>CMSC 142</option>
        <option value="cmsc150" <?php if($query=="cmsc150")	echo " selected='selected'";?>>CMSC 150</option>
        <option value="cmsc161" <?php if($query=="cmsc161")	echo " selected='selected'";?>>CMSC 161</option>
        <option value="cmsc165" <?php if($query=="cmsc165")	echo " selected='selected'";?>>CMSC 165</option>
        <option value="cmsc172" <?php if($query=="cmsc172")	echo " selected='selected'";?>>CMSC 172</option>
        <option value="cmsc180" <?php if($query=="cmsc180")	echo " selected='selected'";?>>CMSC 180</option>
        <option value="cmsc190" <?php if($query=="cmsc190")	echo " selected='selected'";?>>CMSC 190</option>
        <option value="cmsc191" <?php if($query=="cmsc191")	echo " selected='selected'";?>>CMSC 191</option>
        <option value="cmsc199" <?php if($query=="cmsc199")	echo " selected='selected'";?>>CMSC 199</option>

    </select>

    <input class="btn btn-primary" href="/UI128/index.php/site/callResults" type="submit"/><br/>

    <div id="display_suggestion">

    </div>

    Sort by:</br>
    <div class="checkbox inline">
        <input type="radio" id="radio1" class="sort" name="sort" value="alphabetical" checked/><label for="radio1">Alphabetical</label>
        <input type="radio" id="radio2" class="sort" name="sort" value="newest" <?php if($sort == "newest")	echo "checked";?>/><label for="radio2">Newest</label>
    </div>
    <br>
    Type:</br>
    <div id="checklist">
        <input type="checkbox" id="check1" value="book" name="format[]" <?php if(!isset($format))echo "checked"; else if($format[0]=="book")echo "checked";?>/><label class="checkbox inline" for="check1">Book </label>
        <?php
        $sp = false;
        $thesis = false;
        $journal = false;
        if(isset($format)){
            $count = count($format);
            for($i = 0;$i < $count;$i++){
                if($format[$i]=="sp")	$sp = true;
                if($format[$i]=="thesis") $thesis = true;
                if($format[$i]=="journal")	$journal = true;
            }
        }
        ?>
        <input type="checkbox" id="check2" value="sp" name="format[]" <?php if($sp)	echo "checked";?>/><label class="checkbox inline" for="check2">SP </label>
        <input type="checkbox" id="check3" value="thesis" name="format[]"<?php if($thesis)	echo "checked";?>/><label class="checkbox inline" for="check3">Thesis </label>
        <input type="checkbox" id="check4" value="journal" name="format[]"<?php if($journal)	echo "checked";?>/><label class="checkbox inline" for="check4">Journal </label>

    </div>

</form>