<?php include "includes/header.php"; ?>

<?php include "includes/navigation_bar.php";?>

  <body>
      <!-- Begin page content -->

    <!-- Wrap all page content here -->

<div class="width_limit main rulesandreg">
  <div id="pic_rules">
    <img src=<?php echo "\"".base_url()."assets/rulesandreg.jpg"."\"";?>>
  </div>
  <div id="content">
        <h2 class="page-header" style="color: #428bce;">Rules and Regulation</h2>
        <ul>
          <ul class="nav nav-tabs" id="myTab">
             <li class="active"><a href="#general" data-toggle="tab">General</a></li>
             <li><a href="#borrowing" data-toggle="tab">Borrowing</a></li>
        </ul>

          <div class="tab-content">
            <div class="tab-pane fade in active" id="general">
              <br><br>
          <ul>
          <li>Students must wear in their student ID's before entering the ICS Library and during the stay inside the reading room.</li>
          <li>Students must log-in their respective student number, full name, time in and time out on the log book.</li>
          <li>Please remain quiet while inside the library.</li>
          <li>Students are not allowed to eat or bring food and drinks inside the library.</li>
          <li>Playing games and/or watching movies and even using facebook inside the ICS Library is not allowed. The ICS Library is for research and studying purposes only.</li>
          <li>Violators wll not be permitted to enter or will be requested to leave the ICS Library.</li>
          <li>Desks and furniture should not be moved without the permission of the Librarian.</li>
          <li>Users should demonstrate courtesy to other users and staff at all times.</li>
          </ul>
            </div>
            <div class="tab-pane fade in" id="borrowing">
              <br><br>
          <ul>
          <li>Lost books or other materials must be reported to the library immediately to stop overdue fines.
          <li>The number of items that a user may borrow at any given time will be as follows:<br>
            <strong>Students:</strong> 5 books for 3 days<br>
            <strong>Faculty:</strong> unlimited<br>
          <li>Note that SP's can only be used items inside the library, with the permission of the Registrar.
          <li>Some items in the Library cannot be copied because of copyright laws, poor condition, or donor restriction.
          <li>Borrowed items should not be lent to other third parties.
          </ul>
            </div>
          </div>

    </div>
    
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
    <script>
      $(function () {
      $('#myTab a:first').tab('show')
      })
    </script>
  </body>
</html>