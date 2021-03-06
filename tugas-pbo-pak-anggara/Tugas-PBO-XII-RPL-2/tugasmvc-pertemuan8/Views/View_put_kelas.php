<html>

<head>
    <title>Aplikasi Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">



</head>

<style>
    body {
        background-color: pink;
        height: auto;
    }
</style>

<body>
    <?php

    // Memanggil fungsi dari CSRF
    include('../Config/Csrf.php');

    include '../Controllers/Controller_kelas.php';
    // Membuat Object dari Class kelas
    $kelas = new Controller_kelas();
    $id_kelas = base64_decode($_GET['id_kelas']);
    $GetKelas = $kelas->GetData_Where($id_kelas);
    ?>



    <?php
    foreach ($GetKelas as $Get) {
    ?>

        <form action="../Config/Routes.php?function=put_kelas" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
            <table border="1">
                <input type="hidden" name="id_kelas" value="<?php echo $Get['id_kelas']; ?>">
                <tr>
                    <td>Nama Kelas</td>
                    <td><input type="text" name="nama_kelas" value="<?php echo $Get['nama_kelas']; ?>"></td>
                </tr>
                <tr>
                    <td>Kompetensi Keahlian</td>
                    <td><input type="text" name="kompetensi_keahlian" value="<?php echo $Get['kompetensi_keahlian']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
                </tr>
            </table </form>

        <?php
    }
        ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>