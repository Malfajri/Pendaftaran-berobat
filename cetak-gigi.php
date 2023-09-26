<?php
session_start();

if (!isset($_SESSION['dokter'])) {
    echo "<script>
 window.location.replace('../session/login.php');
 </script>";
    exit;
}

require 'functions.php';
$paisen_umum = mysqli_query($conn, "SELECT * FROM keluhan WHERE pilihan_poli = 'Poli Umum' ORDER BY keluhan.id DESC");

$pasien_gigi = mysqli_query($conn, "SELECT * FROM keluhan WHERE pilihan_poli = 'Poli Gigi' ORDER BY keluhan.id DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'link.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>


    <h3 class="my-3 text-cemter">
        Data Antrian Poli Gigi
    </h3>

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
        window.print();
    </script>

</body>

</html>