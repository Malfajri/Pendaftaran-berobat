<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>
 window.location.replace('../session/login.php');
 </script>";
    exit;
}

require 'functions.php';

$username = $_SESSION['username'];
$pasien = query("SELECT * FROM pasien WHERE username = '$username'")[0];
$id_pasien = $pasien['id'];
$keluhan = mysqli_query($conn, "SELECT * FROM keluhan WHERE id_pasien = '$id_pasien' ORDER BY keluhan.id DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'link.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>


    <h3 class="my-3 text-cemter">
        Histori Pengobatan
    </h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No Tiket</th>
                <th>Nama</th>
                <th>Pilihan Poli</th>
                <th>Keluhan</th>
                <th>Hasil Diagnosa</th>
                <th>Saran Dokter</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($keluhan as $data) : ?>
            <tr>
                
                <th>
                <?php if ($data['pilihan_poli'] == "Poli Umum") : ?>
                    A
                <?php else : ?>
                    B
                <?php endif; ?>
                <?= $data['id']; ?>
                </th>
                <td><?= $pasien['nama']; ?></td>
                <td><?= $data['pilihan_poli']; ?></td>
                <td><?= $data['keluhan']; ?></td>
                <td><?= $data['hasil_diagnosa']; ?></td>
                <td><?= $data['hasil_saran']; ?></td>
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

        window.onafterprint = function(e){
            closePrintView();
        };

        function closePrintView() {
            window.location.href = 'histori.php';   
        }
    </script>

</body>

</html>