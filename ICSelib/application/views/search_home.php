          
            <?php include "form2.php";?>
          

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
                                      if(html.length>9){
                                      $("#display_suggestion").css("display","block");
                                      $("#display_suggestion").addClass("suggested_results");
                                      $("#display_suggestion").html(html);
                                    }
                                  }
                              });
                          }
                          return false;
                      });
                  });
          </script>
          <script>
            $('#close_advanced').click(function () {
              $('#collapse_advanced_search').hide();
            })
          </script>
          <script>
            $('#adv_link').click(function () {
              $('#collapse_advanced_search').show();
            })
          </script>

          <!--END-->
