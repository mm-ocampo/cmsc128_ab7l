<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$i = 0;
echo "<div id='message_results'>";
foreach($result as $row){
		echo "<div class='results'>";
            echo "<div class='result_information'>";
				$id = $row->id;
				$email = $row->email;
				$header = $row->header;
				$message = $row->message;
				echo "<ul>";
				echo "<li class='result_header'><i class='fa fa-book fa-lg space'></i>".$header."<input type='button' class='message_delete' onclick='confirm_delete({$i})' id='link{$i}' name='".$id."' value='Delete' /></li>";
                echo "<div class='result_details'>";
                		echo "<li>From: ".$email."</li>";
                		echo "<li>Message: ".$message."</li>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	$i += 1;
}
echo "</div>";
 
?>
<script type='text/javascript' language='javascript'>

    function confirm_delete(num){
        var temp = confirm("Do you really want to delete this material?");

        location.replace("<?php echo base_url();?>index.php/query/deletemessage?id=" + document.getElementById('link' + num).name + "&confirm=" + temp);
    }
</script>
