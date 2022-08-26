<?php
    include("sidebar.php");
    include("topbar.php");
    include("footer.php");
    
    echo "
    <!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>$judul</title>
            <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' rel='stylesheet'>
            <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'/>

            <!-- Custom styles for this template-->
            <link href='./assets/css/sb-admin-2.css?time();' rel='stylesheet'>
            <link href='./assets/vendor/bootstrap/css/bootstrap.css' rel='stylesheet'>

        </head>
        <body>
            <!-- Page Wrapper -->
            <div id='wrapper'>

                <!-- Sidebar -->
                    $sidebar
                <!-- End of Sidebar -->

                <!-- Content Wrapper -->
                <div id='content-wrapper' class='d-flex flex-column'>

                    <!-- Main Content -->
                    <div id='content'>

                        <!-- Topbar -->
                            $topbar
                        <!-- End of Topbar -->

                        $konten
                    </div>

                <footer>
                    <div class='sticky-footer'>
                        $footer
                    </div>
                </footer>



            <!-- Bootstrap core JavaScript-->
            <script src='./assets/vendor/jquery/jquery.min.js'></script>
            <script src='./assets/vendor/bootstrap/js/bootstrap.js'></script>

            <!-- Core plugin JavaScript-->
            <script src='./assets/vendor/jquery-easing/jquery.easing.min.js'></script>

            <!-- Custom scripts for all pages-->
            <script src='./assets/js/sb-admin-2.min.js'></script>

            <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            $alert

        </body>
    </html>
    ";
?>