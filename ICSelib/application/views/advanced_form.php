<form action="<?php echo base_url();?>index.php/site/advanced_search?page_number=1" method="get" accept-charset="utf-8">
<div class="col-sm-3">

    <select class="filter_select1 form-control" name="filter1">
        <option value="topic">Topic</option>
        <option value="title" selected='selected' >Title</option>
        <option value="author" >Author</option>
        <option value="publisher">Publisher</option>
        <option value="subject">Subject</option>
        <option value="year" >Year of Publication</option>
        <option value="accession_number">Accession Number</option>
    </select>
</div>
<div class="col-sm-6">
    <input class="form-control"type="text" autocomplete="off" maxlength=80 id="search_bar1" name="search_query1" />
</div>
<div class="col-sm-3">
    <select id="search_subject1" class="form-control" name="dummy" style="display:none">

        <option value="cmsc2" selected="selected">CMSC 2</option>
        <option value="cmsc11" >CMSC 11</option>
        <option value="cmsc21" >CMSC 21</option>
        <option value="cmsc22" >CMSC 22</option>
        <option value="cmsc56" >CMSC 56</option>
        <option value="cmsc57" >CMSC 57</option>
        <option value="cmsc100" >CMSC 100</option>
        <option value="cmsc123" >CMSC 123</option>
        <option value="cmsc124" >CMSC 124</option>
        <option value="cmsc125" >CMSC 125</option>
        <option value="cmsc127" >CMSC 127</option>
        <option value="cmsc128" >CMSC 128</option>
        <option value="cmsc129" >CMSC 129</option>
        <option value="cmsc130" >CMSC 130</option>
        <option value="cmsc131" >CMSC 131</option>
        <option value="cmsc132" >CMSC 132</option>
        <option value="cmsc137" >CMSC 137</option>
        <option value="cmsc141" >CMSC 141</option>
        <option value="cmsc142" >CMSC 142</option>
        <option value="cmsc150" >CMSC 150</option>
        <option value="cmsc161" >CMSC 161</option>
        <option value="cmsc165" >CMSC 165</option>
        <option value="cmsc172" >CMSC 172</option>
        <option value="cmsc180" >CMSC 180</option>
        <option value="cmsc190" >CMSC 190</option>
        <option value="cmsc191" >CMSC 191</option>
        <option value="cmsc199" >CMSC 199</option>

    </select>
</div>

<div class="col-sm-2">
    <select name="boolean1" class="form-control">

        <option value="and">AND</option>
        <option value="or">OR</option>

    </select>
</div>
<div class="col-sm-3">
     <select class="filter_select2 form-control" name="filter2">
        <option value="topic">Topic</option>
        <option value="title" >Title</option>
        <option value="author" selected='selected'>Author</option>
        <option value="publisher">Publisher</option>
        <option value="subject">Subject</option>
        <option value="year" >Year of Publication</option>
        <option value="accession_number">Accession Number</option>
    </select>
</div>
<div class="col-sm-6">
    <input type="text" class="form-control" autocomplete="off" id="search_bar2" name="search_query2" />
</div>

<div class="col-sm-3">
    <select id="search_subject2" class="form-control" name="dummy" style="display:none">

        <option value="cmsc2" selected="selected">CMSC 2</option>
        <option value="cmsc11" >CMSC 11</option>
        <option value="cmsc21" >CMSC 21</option>
        <option value="cmsc22" >CMSC 22</option>
        <option value="cmsc56" >CMSC 56</option>
        <option value="cmsc57" >CMSC 57</option>
        <option value="cmsc100" >CMSC 100</option>
        <option value="cmsc123" >CMSC 123</option>
        <option value="cmsc124" >CMSC 124</option>
        <option value="cmsc125" >CMSC 125</option>
        <option value="cmsc127" >CMSC 127</option>
        <option value="cmsc128" >CMSC 128</option>
        <option value="cmsc129" >CMSC 129</option>
        <option value="cmsc130" >CMSC 130</option>
        <option value="cmsc131" >CMSC 131</option>
        <option value="cmsc132" >CMSC 132</option>
        <option value="cmsc137" >CMSC 137</option>
        <option value="cmsc141" >CMSC 141</option>
        <option value="cmsc142" >CMSC 142</option>
        <option value="cmsc150" >CMSC 150</option>
        <option value="cmsc161" >CMSC 161</option>
        <option value="cmsc165" >CMSC 165</option>
        <option value="cmsc172" >CMSC 172</option>
        <option value="cmsc180" >CMSC 180</option>
        <option value="cmsc190" >CMSC 190</option>
        <option value="cmsc191" >CMSC 191</option>
        <option value="cmsc199" >CMSC 199</option>

    </select>
</div>

<div class="col-sm-2">
    <select name="boolean2" class="form-control">

        <option value="and">AND</option>
        <option value="or">OR</option>

    </select>
</div>

<div class="col-sm-3">
     <select class="filter_select3 form-control" name="filter3">
        <option value="topic">Topic</option>
        <option value="title" >Title</option>
        <option value="author" >Author</option>
        <option value="publisher" selected='selected'>Publisher</option>
        <option value="subject">Subject</option>
        <option value="year" >Year of Publication</option>
        <option value="accession_number">Accession Number</option>
    </select>
</div>

<div class="col-sm-6">
    <input type="text" class="form-control" autocomplete="off" id="search_bar3" name="search_query3"  />
</div>

<div class="col-sm-3">
    <select id="search_subject3"class="form-control" name="dummy3" style="display:none" >

        <option value="cmsc2" selected="selected">CMSC 2</option>
        <option value="cmsc11" >CMSC 11</option>
        <option value="cmsc21" >CMSC 21</option>
        <option value="cmsc22" >CMSC 22</option>
        <option value="cmsc56" >CMSC 56</option>
        <option value="cmsc57" >CMSC 57</option>
        <option value="cmsc100" >CMSC 100</option>
        <option value="cmsc123" >CMSC 123</option>
        <option value="cmsc124" >CMSC 124</option>
        <option value="cmsc125" >CMSC 125</option>
        <option value="cmsc127" >CMSC 127</option>
        <option value="cmsc128" >CMSC 128</option>
        <option value="cmsc129" >CMSC 129</option>
        <option value="cmsc130" >CMSC 130</option>
        <option value="cmsc131" >CMSC 131</option>
        <option value="cmsc132" >CMSC 132</option>
        <option value="cmsc137" >CMSC 137</option>
        <option value="cmsc141" >CMSC 141</option>
        <option value="cmsc142" >CMSC 142</option>
        <option value="cmsc150" >CMSC 150</option>
        <option value="cmsc161" >CMSC 161</option>
        <option value="cmsc165" >CMSC 165</option>
        <option value="cmsc172" >CMSC 172</option>
        <option value="cmsc180" >CMSC 180</option>
        <option value="cmsc190" >CMSC 190</option>
        <option value="cmsc191" >CMSC 191</option>
        <option value="cmsc199" >CMSC 199</option>

    </select>
</div>


    <div id="checklist">
        <input type="checkbox" id="check1" value="book" name="format[]" checked/><label class="checkbox inline" for="check1">Book </label>
        <input type="checkbox" id="check2" value="sp" name="format[]" /><label class="checkbox inline" for="check2">SP </label>
        <input type="checkbox" id="check3" value="thesis" name="format[]"/><label class="checkbox inline" for="check3">Thesis </label>
        <input type="checkbox" id="check4" value="journal" name="format[]"/><label class="checkbox inline" for="check4">Journal </label>

    </div>
     <br/><input class="btn btn-primary pull-right" type="submit"/><br/>


</form>