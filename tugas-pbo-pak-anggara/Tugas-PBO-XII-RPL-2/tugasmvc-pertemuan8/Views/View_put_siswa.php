<?php

// Memanggil fungsi dari CSRF
include('../Config/Csrf.php');

include '../Controllers/Controller_siswa.php';
// Membuat Object dari Class siswa
$siswa = new Controller_siswa();
$nisn = base64_decode($_GET['nisn']);
$GetSiswa = $siswa->GetData_Where($nisn);

?>

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
    foreach ($GetSiswa as $Get) {
    ?>

        <form action="../Config/Routes.php?function=put_siswa" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
            <table border="1">
                <input type="hidden" name="nisn" value="<?php echo $Get['nisn']; ?>">
                <tr>
                    <td>NIS</td>
                    <td><input type="text" name="nis" value="<?php echo $Get['nis']; ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?php echo $Get['nama']; ?>"></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>
                        <select name="id_kelas">
                            <?php
                            $GetKelas = $siswa->GetData_Kelas();
                            foreach ($GetKelas as $GetK) : ?>
                                <option value="<?php echo $GetK['id_kelas'] ?>"><?php echo $GetK['nama_kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>


                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="<?php echo $Get['alamat']; ?>"></td>
                </tr>
                <tr>
                    <td>No Telepon</td>
                    <td><input type="text" name="no_telp" value="<?php echo $Get['no_telp']; ?>">
                </tr>
                <tr>
                    <td>Nominal SPP</td>
                    <td>
                        <select name="id_spp">

                            <!-- Logic combo Get database -->
                            <option value="<?php echo $Get['id_spp']; ?>">
                                <?php
                                if ($Get['id_spp'] == "1") {
                                    echo "30000";
                                } else if ($Get['id_spp'] == "2") {
                                    echo "25000";
                                } elseif ($Get['id_spp'] == "3") {
                                    echo "20000";
                                } else {
                                    echo "15000";
                                }
                                ?>
                            </option>
                            <!-- Logic combo Get database -->

                            <option value="1">30000</option>
                            <option value="2">25000</option>
                            <option value="3">20000</option>
                            <option value="4">15000</option>
                        </select>

                    </td>
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