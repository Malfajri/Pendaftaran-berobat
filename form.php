<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>
 window.location.replace('session/login.php');
 </script>";
    exit;
}

require 'functions.php';

if (isset($_POST["register"])) {
    if (add($_POST) > 0) {
        // Check the value of the 'poli' field
        if ($_POST['pilihan_poli'] == 'Poli Gigi') {
            $redirect_url = 'cetak-tiket-gigi.php';
        } else {
            $redirect_url = 'cetak-tiket-umum.php';
        }
        echo "<script>
        alert('Data Berhasil Dikirim!');
        window.location.href = '$redirect_url';
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}



// $username = $_SESSION['username'];
$id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'link.php'; ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h3 class="my-5 text-center">Form Pengisian Keluhan</h3>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col mb-4">
                            <!-- form -->
                            <div class="card shadow mb-4 p-3">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" id="id" name="id" value="<?= $id; ?>">
                                    <div class="mb-3">
                                        <select name="pilihan_poli" id="pilihan_poli" required>
                                            <option value="" hidden>Pilih Poliklinik</option>
                                            <option value="Poli Umum">Poli Umum</option>
                                            <option value="Poli Gigi">Poli Gigi</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" id="keluhan" name="keluhan" value="" placeholder="Keluhan"></input>
                                    </div>
                                    <button type="submit" name="register" class="btn btn-info text-white" style="width: 100%;">Kirim Keluhan</button>
                            </div>
                            </span>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; BATALYON KESEHATAN TNI AU 2023
                        </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>