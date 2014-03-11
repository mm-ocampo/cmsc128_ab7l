<?php include "includes/authen.php"; ?>

<?php include "includes/header.php"; ?>

<?php include "includes/navigation_bar.php";?>

  <body>
    <div id="wrap">
      <!-- Begin page content -->
      <div id="width_limit">
        <?php include "includes/admin_sidebar.php"; ?>
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