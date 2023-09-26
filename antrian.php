<?php
session_start();

if (!isset($_SESSION['dokter'])) {
    echo "<script>
 window.location.replace('../session/login.php');
 </script>";
    exit;
}

require 'functions.php';

$pasien_umum = mysqli_query($conn, "SELECT * FROM keluhan WHERE pilihan_poli = 'Poli Umum' ORDER BY keluhan.id DESC");

$pasien_gigi = mysqli_query($conn, "SELECT * FROM keluhan WHERE pilihan_poli = 'Poli Gigi' ORDER BY keluhan.id DESC");



if (isset($_POST["register"])) {

    if (edit($_POST) > 0) {
        echo "<script>
   alert('Berhasil Mendiagnosa!');
   window.location.href='keluhan.php';
   </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'link.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
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

                    <!-- Content Row -->
                    <div class="row">


                        <div class="col mb-4">

                            <!-- Data -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#card-pegawai" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="card-pegawai">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Antrian Poli Umum</h6>
                                </a>
                                <a href="cetak-umum.php" class="btn btn-info ml-3 mt-3 w-50">Cetak Data</a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-pegawai">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No Tiket</th>
                                                        <th>Nama</th>
                                                        <th>Pilihan Poli</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pasien_umum as $data) : ?>
                                                        <tr>
                                                            <th>A <?= $data['id']; ?></th>
                                                            <?php
                                                            $id_pasien = $data['id_pasien'];
                                                            $pasien = query("SELECT * FROM pasien WHERE id = '$id_pasien'")[0]; ?>
                                                            <td><?= $pasien['nama']; ?></td>
                                                            <td><?= $data['pilihan_poli']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col mb-4">

                            <!-- Data -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#card-pegawai" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="card-pegawai">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Antrian Poli Gigi</h6>
                                </a>
                                <a href="cetak-gigi.php" class="btn btn-info ml-3 mt-3 w-50">Cetak Data</a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="card-pegawai">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No Tiket</th>
                                                        <th>Nama</th>
                                                        <th>Pilihan Poli</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pasien_gigi as $data) : ?>
                                                        <tr>
                                                            <th>B <?= $data['id']; ?></th>
                                                            <?php
                                                            $id_pasien = $data['id_pasien'];
                                                            $pasien = query("SELECT * FROM pasien WHERE id = '$id_pasien'")[0]; ?>
                                                            <td><?= $pasien['nama']; ?></td>
                                                            <td><?= $data['pilihan_poli']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script>
        // Schedule a refresh every 5 seconds
        setInterval(function() {
            location.reload();
        }, 5000);
    </script>

</body>

</html>