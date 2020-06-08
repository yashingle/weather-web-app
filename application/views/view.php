<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- My own style -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" rel="stylesheet">
    
    <!-- Chartjs -->
    <link href="<?= base_url('assets/vendor/chartjs/Chart.min.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/vendor/chartjs/Chart.bundle.min.js') ?>"></script>

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/simple-sidebar.css') ?>" rel="stylesheet">
</head>

<body>
    
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <?= $sidebar ?>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid p-4">
                <div class="col-sm-12 m-0 p-0">
                    <!-- Search City -->
                    <?= $search_form ?>
                </div>
                
                <!-- Content -->
                <?= $content ?>
                
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    <!-- Tooltip -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>

</html>