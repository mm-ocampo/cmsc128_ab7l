<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ICSeLib</title>
    <link rel="shortcut icon" href=<?php echo "\"".base_url()."assets/thumbnail.png"."\""?> >

    <!-- Bootstrap core CSS -->
    <link href=<?php echo "\"".base_url()."assets/dist/css/bootstrap.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/signin.css"."\""?> rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=<?php echo "\"".base_url()."assets/carousel.css"."\""?> rel="stylesheet">
    <!--FLATSTRAP-->
    <link href=<?php echo "\"".base_url()."assets/flatstrap/bootstrap.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/flatstrap/bootstrap-responsive.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/flatstrap/docs.css"."\""?> rel="stylesheet">
    <link href=<?php echo "\"".base_url()."assets/flatstrap/prettify.css"."\""?> rel="stylesheet">
    <!--GLYPHICONS-->
    <link href=<?php echo "\"".base_url()."assets/dist/glyphicons/png"."\""?> rel="stylesheet">
</head>

<!-- Wrap all page content here -->
<div id="wrap">

    <?php include"header.php";?>

    <body>

    <!-- Begin page content -->
    <div class="container">
        <div class="row">
            <div id="width_limit">
                <div class="sidebar">
                    <div class= "panel-group profile_bar">
                        <img class="img-circle2" src=<?php echo "\"".base_url()."assets/profile.jpg"."\""?>/>
                        <h2 class="panel-heading profile_greet">Welcome Admin!</h2>
                        <p class="text-muted"><?php echo $this->session->userdata('email');?></p>
                    </div>
                    <ul class="nav nav-sidebar ">
                    <h2>Hi <?php echo $this->session->userdata('name');?>!</h2>
                    <li><a class="list-group-item active" href="/UI128/index.php/elib/admin_default"><i class="fa fa-book fa-lg space"></i>Materials<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
                    <li><a class="list-group-item" href="/UI128/index.php/elib/admin_manage"><i class="fa fa-cogs fa-lg space"></i>Library Management<span class="fa fa-chevron-right fa-lg space pull-right"></span></a></li>
                    <li><a class="list-group-item" href="/UI128/index.php/elib/admin_account"><i class="fa fa-users fa-lg space"></i>Accounts<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
                    <li><a class="list-group-item" href="/UI128/index.php/elib/admin_profile"><i class="fa fa-edit fa-lg space"></i>Edit Profile<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
                    <li><a class="list-group-item" href="/UI128/index.php/elib/logout"><i class="fa fa-sign-out fa-lg space"></i>Log Out<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="content_right main">

    <div id="cut">
        <h3 class="page-header">Search</h3>
    </div>
    <!--SAME HERE, AYAW GUMANA :<-->
    <div id="cut">
        <?php include "advanced_form.php";?>

        <script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
        <script src="<?php echo base_url();?>js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url();?>js/main.js"></script>
        <script>

            $(document).ready(function(){

                $("#search_bar").keyup(function(){

                    var input = $(this).val();
                    var filter = $(".filter_select").val();
                    var sort = $(".sort").val();

                    format = new Array();
                    $('#checklist input[type=checkbox]:checked').each(function(){
                        format.push($(this).val());     //pushes the food into the array
                    });

                    var query = {"search_query":input,
                        "filter":filter,
                        "sort":sort,
                        "format":format,
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    };

                    if(input.length < 3){}
                    else{
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url(); ?>index.php/site/suggest/",
                            data: query,
                            cache: false,
                            success: function(html){

                                $("#display_suggestion").css("display","block");
                                $("#display_suggestion").html(html);
                            }
                        });
                    }
                    return false;
                });
            });
        </script>
        <!--END-->
    </div>

</div>




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
<script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
</body>
</html>