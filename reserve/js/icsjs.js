function reserveButton(){
	alert("The book is already booked!")


function confirm_delete(){
	var temp = confirm("Do you really want to delete this material?");
	
	/* changes value of href in link to pass variable to isset function in delete function in site.php */
	document.getElementById("link").href = document.getElementById("link").href + "&confirm=" + temp;
}