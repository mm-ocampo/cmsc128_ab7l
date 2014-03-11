<?php include "includes/authen.php"; ?>

<?php include "includes/header.php"; ?>

<?php include "includes/navigation_bar.php";?>

    <body>
        <div id="wrap">
        <!-- Begin page content -->
            <div id="width_limit">
                <?php include "includes/admin_sidebar.php"; ?>

        <div class="content_right main">
            <h1 class="page-header">Activity Log</h1>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
        <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
        <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
    </body>
</html>