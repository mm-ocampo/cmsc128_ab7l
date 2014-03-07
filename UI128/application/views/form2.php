<form action="<?php echo base_url();?>index.php/site/search?page_number=1" method="get" accept-charset="utf-8">


    <script language="javascript" type="text/javascript" src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script>
    $(document).ready(function(){
        $('#display_suggestion').hide();
      $('#search_bar').click(function(){
        $('#display_suggestion').show();
        return false;
      });
      $('#search_bar').keyup(function(){
        if(document.guest_search.search_bar.value.length==0)
           $('#display_suggestion').hide(); 
        else{
            $('#display_suggestion').show();
        }
      });
    });
    </script>

    <?php

    /*
    *   FORM
    *   Ito yung mga form na ginamit ko sa home_view at search_view
    *
    */


    //Initialization lang ng variables
    $filter = "";
    if(isset($_GET['filter']))      $filter = $_GET['filter'];

    $sort = "";
    if(isset($_GET['sort']))        $sort = $_GET['sort'];

    if(isset($_GET['format']))      $format = $_GET['format'];

    ?>


<div class="input-group">  
    <input type="text" name="search_query" autocomplete= "off" id="search_bar" class="search-query form-custom-search" placeholder="Search library"        <?php
        if(isset($_GET['search_query']) && $_GET['filter']!="subject")  
            echo "name='search_query' ";
        else if(isset($_GET['search_query']) && $_GET['filter']=="subject")
            echo "name='dummy' style='display:none'";
        else 
            echo "name='search_query' ";
        ?>
    value="<?php
        if(isset($_GET['search_query']))    echo str_replace('+',' ',$_GET['search_query']);
    ?>"/>
        <div class="input-group-btn"><a href="/UI128/index.php/site/callResults" class="btn btn-primary search-icon"><i class="fa fa-search fa-lg "></i></a></div>
</div>

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


        <option value="cmsc2" <?php if($query=="cmsc2") echo " selected='selected'";?>>CMSC 2</option>
        <option value="cmsc11" <?php if($query=="cmsc11")   echo " selected='selected'";?>>CMSC 11</option>
        <option value="cmsc21" <?php if($query=="cmsc21")   echo " selected='selected'";?>>CMSC 21</option>
        <option value="cmsc22" <?php if($query=="cmsc22")   echo " selected='selected'";?>>CMSC 22</option>
        <option value="cmsc56" <?php if($query=="cmsc56")   echo " selected='selected'";?>>CMSC 56</option>
        <option value="cmsc57" <?php if($query=="cmsc57")   echo " selected='selected'";?>>CMSC 57</option>
        <option value="cmsc100" <?php if($query=="cmsc100") echo " selected='selected'";?>>CMSC 100</option>
        <option value="cmsc123" <?php if($query=="cmsc123") echo " selected='selected'";?>>CMSC 123</option>
        <option value="cmsc124" <?php if($query=="cmsc124") echo " selected='selected'";?>>CMSC 124</option>
        <option value="cmsc125" <?php if($query=="cmsc125") echo " selected='selected'";?>>CMSC 125</option>
        <option value="cmsc127" <?php if($query=="cmsc127") echo " selected='selected'";?>>CMSC 127</option>
        <option value="cmsc128" <?php if($query=="cmsc128") echo " selected='selected'";?>>CMSC 128</option>
        <option value="cmsc129" <?php if($query=="cmsc129") echo " selected='selected'";?>>CMSC 129</option>
        <option value="cmsc130" <?php if($query=="cmsc130") echo " selected='selected'";?>>CMSC 130</option>
        <option value="cmsc131" <?php if($query=="cmsc131") echo " selected='selected'";?>>CMSC 131</option>
        <option value="cmsc132" <?php if($query=="cmsc132") echo " selected='selected'";?>>CMSC 132</option>
        <option value="cmsc137" <?php if($query=="cmsc137") echo " selected='selected'";?>>CMSC 137</option>
        <option value="cmsc141" <?php if($query=="cmsc141") echo " selected='selected'";?>>CMSC 141</option>
        <option value="cmsc142" <?php if($query=="cmsc142") echo " selected='selected'";?>>CMSC 142</option>
        <option value="cmsc150" <?php if($query=="cmsc150") echo " selected='selected'";?>>CMSC 150</option>
        <option value="cmsc161" <?php if($query=="cmsc161") echo " selected='selected'";?>>CMSC 161</option>
        <option value="cmsc165" <?php if($query=="cmsc165") echo " selected='selected'";?>>CMSC 165</option>
        <option value="cmsc172" <?php if($query=="cmsc172") echo " selected='selected'";?>>CMSC 172</option>
        <option value="cmsc180" <?php if($query=="cmsc180") echo " selected='selected'";?>>CMSC 180</option>
        <option value="cmsc190" <?php if($query=="cmsc190") echo " selected='selected'";?>>CMSC 190</option>
        <option value="cmsc191" <?php if($query=="cmsc191") echo " selected='selected'";?>>CMSC 191</option>
        <option value="cmsc199" <?php if($query=="cmsc199") echo " selected='selected'";?>>CMSC 199</option>

    </select>

    <!--<input class="btn btn-primary" href="/UI128/index.php/site/callResults" type="submit"/><br/>
-->
    <div id="display_suggestion">No Suggestion</div>
        <div class="advanced_search">   
            <p><a class="advanced_search_link" data-toggle="collapse" href="#collapse_advanced_search">
                <i class="fa fa-search-plus"></i> Advanced Search
            </a></p>
        </div>


    <div id="collapse_advanced_search" class="panel-collapse collapse">
   
            <fieldset><legend>Filter</legend>
        <select class="filter_select form-control" name="filter">
            <option value="title" <?php if($filter=="title")    echo " selected='selected'";?> >Title</option>
            <option value="author"<?php if($filter=="author")   echo " selected='selected'";?> >Author</option>
            <option value="publisher"<?php if($filter=="publisher") echo " selected='selected'";?> >Publisher</option>
            <option value="subject"<?php if($filter=="subject") echo " selected='selected'";?> >Subject</option>
            <option value="accession_number"<?php if($filter=="accession_number")   echo " selected='selected'";?> >Accession Number</option>
        </select>
            </fieldset>          
                <div id="sort">
                    <fieldset><legend>Sort by:</legend>
                        <div class="checkbox inline form-control">
                            <input type="radio" id="radio1" class="sort" name="sort" value="alphabetical" checked/><label for="radio1">Alphabetical</label>
                            <input type="radio" id="radio2" class="sort" name="sort" value="newest" <?php if($sort == "newest") echo "checked";?>/><label for="radio2">Newest</label>
                        </div>                   
                    </fieldset>
                </div>

                <div id="checklist">
                    <fieldset><legend>Format:</legend>
                         <div id="checklist ">
                            <label class="checkbox inline" for="check1"><input type="checkbox" id="check1" value="book" name="format[]" <?php if(!isset($format))echo "checked"; else if($format[0]=="book")echo "checked";?>/>Book </label>
                            <?php
                            $sp = false;
                            $thesis = false;
                            $journal = false;
                            if(isset($format)){
                                $count = count($format);
                                for($i = 0;$i < $count;$i++){
                                    if($format[$i]=="sp")   $sp = true;
                                    if($format[$i]=="thesis") $thesis = true;
                                    if($format[$i]=="journal")  $journal = true;
                                }
                            }
                            ?>
                            <label class="checkbox inline" for="check2"><input type="checkbox" id="check2" value="sp" name="format[]" <?php if($sp) echo "checked";?>/>SP </label><br/>
                            <label class="checkbox inline" for="check3"><input type="checkbox" id="check3" value="thesis" name="format[]"<?php if($thesis)  echo "checked";?>/>Thesis </label>
                            <label class="checkbox inline" for="check4"><input type="checkbox" id="check4" value="journal" name="format[]"<?php if($journal)    echo "checked";?>/>Journal </label>
                        </div>                  
                    </fieldset>
                </div>
      
    </div>

</form>
    <!--<a href="/UI128/index.php/site/callResults" type="submit"><span class="glyphicon glyphicon-search search-icon"></span></a><br/>-->