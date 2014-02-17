$(".filter_select").change(function(){

	if(this.value=="subject"){

		$("#search_bar").attr('name','dummy');
		$("#search_subject").attr('name','search_query');

		$("#search_bar").css('display','none');
		$("#search_subject").css('display','inline');

	}

	else{

		$("#search_bar").attr('name','search_query');
		$("#search_subject").attr('name','dummy');

		$("#search_bar").css('display','inline');
		$("#search_subject").css('display','none');

	}

});

$("body").click(function(){

	$("#display_suggestion").css("display","none");
	$("#display_suggestion").html("");

});