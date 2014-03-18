$(document).ready(function(){

    $.ajax({
        type: "GET",
        url: "/ICSelib/index.php/notification/get_notification_ajax",
        cache: false,
        success: function(html){

            $(".notification").html(html);

        }
    });

    $.ajax({
        type: "GET",
        url: "/ICSelib/index.php/notification/print_notification",
        cache: false,
        success: function(html){

            $(".notifs").html(html);

        }
    });

    setInterval(function(){

        $.ajax({
            type: "GET",
            url: "/ICSelib/index.php/notification/get_notification_ajax",
            cache: false,
            success: function(html){

                $(".notification").html(html);

            }
        });

        $.ajax({
            type: "GET",
            url: "/ICSelib/index.php/notification/print_notification",
            cache: false,
            success: function(html){

                $(".notifs").html(html);

            }
        });

    },2000);

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

$('.result_header').click(function(){


		$('.result_details').slideUp();
		$(this).next().slideDown();

});