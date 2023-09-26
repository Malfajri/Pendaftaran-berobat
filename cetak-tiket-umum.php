<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>
    window.location.replace('../session/login.php');
    </script>";
    exit;
}

require 'functions.php';

$pasien_umum = mysqli_query($conn, "SELECT * FROM keluhan WHERE pilihan_poli = 'Poli Umum' ORDER BY keluhan.id DESC LIMIT 1");

$pasien_gigi = mysqli_query($conn, "SELECT * FROM keluhan WHERE pilihan_poli = 'Poli Gigi' ORDER BY keluhan.id DESC LIMIT 1");

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
        TIKET
    </h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No Tiket</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pasien_umum as $data) : ?>
                <tr>
                    <th>A <?= $data['id']; ?></th>
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
