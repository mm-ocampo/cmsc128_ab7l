<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$i = 0;
$temp = "";

foreach($result as $row){
	foreach ($row as $data) {
		if($i==0){
			$temp = $data;
		}
		else if($i == 1){
			echo "<div class='col-md-3'>".$data."</div>";
		}
		else if($i == 2){
			echo "<div class='col-md-3'>".$data."</div>";
		}
		else{
			echo "<div class='col-md-5'>".$data."</div>";
		}

		$i++;
	}
	echo "<div class='col-md-1'><a name='link' id='link' href='".base_url()."index.php/query/deletemessage?id={$temp}&confirm=' onclick='confirm_delete()'><button name='".$temp."'><span class='glyphicon glyphicon-trash'></span></button></a></div>";
	$i = 0;
}

?>
<script type='text/javascript' language='javascript'>

    function confirm_delete(){
    var temp = confirm("Do you really want to delete this message?");
    
    /* changes value of href in link to pass variable to isset function in delete function in site.php */
    document.getElementById("link").href = document.getElementById("link").href + temp;
}
</script>