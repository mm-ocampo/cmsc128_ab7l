$(document).ready(function(){

	$.ajax({
           	type: "GET",
            url: "/UI128/index.php/notification/get_notification",
            cache: false,
            success: function(html){

                $(".notification").html(html);

            }
    });

	setInterval(function(){

		$.ajax({
           	type: "GET",
            url: "/UI128/index.php/notification/get_notification",
            cache: false,
            success: function(html){

                $(".notification").html(html);

            }
        });

	},10000);

});


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


//PARA SA ADVANCED SEARCH
$(".filter_select1").change(function(){

	if(this.value=="subject"){

		$("#search_bar1").attr('name','dummy');
		$("#search_subject1").attr('name','search_query1');

		$("#search_bar1").css('display','none');
		$("#search_subject1").css('display','inline');

	}

	else{

		$("#search_bar1").attr('name','search_query1');
		$("#search_subject1").attr('name','dummy');

		$("#search_bar1").css('display','inline');
		$("#search_subject1").css('display','none');

	}

});

$(".filter_select2").change(function(){

	if(this.value=="subject"){

		$("#search_bar2").attr('name','dummy');
		$("#search_subject2").attr('name','search_query2');

		$("#search_bar2").css('display','none');
		$("#search_subject2").css('display','inline');

	}

	else{

		$("#search_bar2").attr('name','search_query2');
		$("#search_subject2").attr('name','dummy');

		$("#search_bar2").css('display','inline');
		$("#search_subject2").css('display','none');

	}

});

$(".filter_select3").change(function(){

	if(this.value=="subject"){

		$("#search_bar3").attr('name','dummy');
		$("#search_subject3").attr('name','search_query3');

		$("#search_bar3").css('display','none');
		$("#search_subject3").css('display','inline');

	}

	else{

		$("#search_bar3").attr('name','search_query3');
		$("#search_subject3").attr('name','dummy');

		$("#search_bar3").css('display','inline');
		$("#search_subject3").css('display','none');

	}

});
//ADVANCED SEARCH END

$("body").click(function(){

	$("#display_suggestion").css("display","none");
	$("#display_suggestion").html("");

});




$('.material_header').click(function(){

	$('.material_details').slideToggle();

});