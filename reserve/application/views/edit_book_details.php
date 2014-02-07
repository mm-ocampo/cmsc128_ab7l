<!DOCTYPE html>
<html>
  <head>
      <title>Update</title>
  </head>
  <body>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit Details</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" method="post" action="http://localhost/cmsc128/index.php/site/update_book_database">
              <input name="accession_number" type="hidden" class="form-control" value="<?php foreach($results as $row){echo $row->accession_number;} ?>">
              <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputTitle" name="inputTitle" value="<?php foreach($results as $row){echo $row->title;} ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputType" class="col-sm-2 control-label">Type</label>
                <div class="row" id="inputType">
                      <div class="col-lg-6">
                        <div class="input-group">
                            <label for="book">Book</label>
                            <input type="radio" name="type" value="book" id="book">
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                      <div class="col-lg-6">
                        <div class="input-group">
                            <label for="thesissp">Thesis</label>
                            <input type="radio" name="type" value="thesissp" id="thesissp">
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
              </div>
              <div class="form-group">
                <label for="inputPublisher" class="col-sm-2 control-label">Publisher</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputPublisher" name="inputPublisher" value="<?php foreach($results as $row){echo $row->publisher;} ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputYear" class="col-sm-2 control-label">Year</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputYear" name="inputYear" value="<?php foreach($results as $row){echo $row->copyright_year;} ?>">
                </div>
              </div>
              <div class="col-lg-10">
              <table id="author_table" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr class="success">
                    <th>Author</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($results2 as $row): ?>
                  <tr>
                    <td><input type="text" name="inputAuthor[]" value="<?php echo $row->author?>"/></td>
                  </tr>
                  <?php endforeach; ?> 
                </tbody>
              </table>
              <input class="add_more" type="button" value="Add More" name="add_more" />
            </div>
            <button type="submit" value="<?php foreach($results as $row){echo $row->accession_number;}?>" class="editButton btn btn-primary">Save Changes</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script src="<?php echo base_url();?>/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url();?>/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url();?>/js/main.js"></script>
    <script type="text/javascript">
    var str="<?php foreach($results as $row){echo $row->type;}?>";
      if (str=="book") {
        document.getElementById("book").checked=true;
      }
      else {
        console.log(str);
        document.getElementById("thesissp").checked=true;
      }
      
      $(function () {
          $('input.add_more').on('click', function () {
              var $table = $('#author_table');
              var $tr = $table.find('tr').eq(1).clone();
              $tr.appendTo($table).find('input').val('');
          });
      });
    </script>
    <!--<link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">-->
  </body>
</html>