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

    <!--Inline javascript powered by JQuery2.0.3-->
  <script language="javascript" type="text/javascript" src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
  <script>
    $(document).ready(function(){
      $('#reserve').hide();
      $('#borrowed').hide();
      $('#requestbtn').click(function(){
        $('#request').toggle();
        $('#reserve').hide();
        $('#borrowed').hide();
      });
      $('#reservebtn').click(function(){
        $('#reserve').toggle();
        $('#request').hide();
        $('#borrowed').hide();
      });
      $('#borrowedbtn').click(function(){
        $('#borrowed').toggle();
        $('#request').hide();
        $('#reserve').hide();
      });
    });
  </script>

<!-- Wrap all page content here -->
<div id="wrap">

<?php include"header.html";?>

<body>

      <!-- Begin page content -->
      <div class="container">
      <div class="row">
      <div class="span4 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav affix">
          <h2>Hi ADMIN!</h2>
          <li class="active"><a href="/UI128/index.php/elib/admin_default"><i class="icon-chevron-right"></i>Books</a></li>
          <li class=""><a href="/UI128/index.php/elib/admin_account"><i class="icon-chevron-right"></i>Accounts</a></li>
          <li class=""><a href="/UI128/index.php/elib/admin_profile"><i class="icon-chevron-right"></i>Edit Profile</a></li>
          <li class=""><a href="/UI128/index.php/elib/logout"><i class="icon-chevron-right"></i>Log Out</a></li>
        </ul>
      </div>
  		</div>
      </div>
</div>

    <div class="floatright">
      <a class="btn btn-primary" href="/UI128/index.php/elib/admin_default"><< Back</a>

        <form class="form-horizontal">
        <div id="cut">
            <h3 class="page-header">Book Reservations and Availability</h3>
        </div>
        <input type="text" class="input-xlarge search-query">
        <button type="submit" class="btn">Search</button></br></br></br>


        <!--TABLE SAMPLE - BUT THIS MUST HIDE AFTER OPENING OTHER TABLES-->
          <div id="cut">

          <button class="btn" name="requestbtn">Book Request/s</button>
          <button class="btn" name="reservebtn">List of Reserved Book/s</button>
          <button class="btn" name="borrowedbtn">List of Borrowed Book/s</button>

          <table class="table table-hover" id="request">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>ID Number</th>
                  <th>Book Title</th>
                  <th>Book ID</th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Mark Froilan Tandoc</td>
                  <td>2008-67349</td>
                  <td>Analysis of Algorithm</td>
                  <td>CS1427887</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>James IKnowNothing Plaras</td>
                  <td>2006-74639</td>
                  <td>Artificial Intelligence</td>
                  <td>CS1703324</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Gabby Gagno The Great</td>
                  <td>2011-83647</td>
                  <td>Legend of Kara</td>
                  <td>CS1434456</td>
                  <td> </td>
                </tr>
              </tbody>
            </table>

            <table class="table table-hover" id="reserve">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>ID Number</th>
                  <th>Book Title</th>
                  <th>Book ID</th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Ara Basbas</td>
                  <td>2010-89256</td>
                  <td>Advance C Programming</td>
                  <td>CS2175627</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>James IKnowNothing Plaras</td>
                  <td>2006-74639</td>
                  <td>Artificial Intelligence</td>
                  <td>CS1703324</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Gabby Gagno The Great</td>
                  <td>2011-83647</td>
                  <td>Legend of Kara</td>
                  <td>CS1434456</td>
                  <td> </td>
                </tr>
              </tbody>
            </table>


            <table class="table table-hover" id="borrowed">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>ID Number</th>
                  <th>Book Title</th>
                  <th>Book ID</th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Shaneeeey Delos Santos</td>
                  <td>2011-26735</td>
                  <td>Web Designs</td>
                  <td>CS10057887</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>James IKnowNothing Plaras</td>
                  <td>2006-74639</td>
                  <td>Artificial Intelligence</td>
                  <td>CS1703324</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Gabby Gagno The Great</td>
                  <td>2011-83647</td>
                  <td>Legend of Kara</td>
                  <td>CS1434456</td>
                  <td> </td>
                </tr>
              </tbody>
            </table>

          </div>
        <!---->
        </form>

    </div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
</body>
</html>