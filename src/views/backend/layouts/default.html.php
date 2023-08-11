<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>  + Música :: {{ title }}</title>

    <!-- Custom fonts for this template -->
    <link href="/admin/lib/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/admin/lib/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/backend/style.css">
</head>

<body id="page-top" class="d-flex flex-column h-100 theme-<?= Utilities\AppSession::UserThemeGet() ?> ">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php \Framework\View::include_part( 'nav', $data ) ;?>  

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php \Framework\View::include_part( 'topbar', $data ) ;?>  

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Contenido  -->
                    <?php \Framework\View::include_content( $view_file, $data ) ;?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php // \Framework\View::include_part( 'footer', $data ) ;?> 
            <!-- End of Footer -->


            <footer class="footer mt-auto py-3">
                <div class="container">
                        <?php \Framework\View::include_part( 'dev', [] ) ;?>
                </div>
            </footer>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Logout Modal-->
    <?php \Framework\View::include_part( 'logout', $data ) ;?> 

    <!-- Bootstrap core JavaScript-->
    <script src="/admin/lib/jquery/jquery.min.js"></script>
    <script src="/admin/lib/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/admin/lib/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/admin/lib/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/lib/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/admin/js/demo/datatables-demo.js"></script>


    <script src="/js/backend/scripts.js"></script>
</body>

</html>