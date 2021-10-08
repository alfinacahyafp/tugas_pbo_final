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

    include '../Controllers/Controller_siswa.php';
    // Membuat Object dari Class siswa
    $siswa = new Controller_siswa();
    $GetKelas = $siswa->GetData_Kelas();
    ?>
    <form action="../Config/Routes.php?function=create_siswa" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
        <table border="1">
            <tr>
                <td>NISN</td>
                <td><input type="text" name="nisn" required></td>
            </tr>
            <tr>
                <td>NIS</td>
                <td><input type="text" name="nis" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Kelas</td>


                <td>
                    <select name="id_kelas" required>
                        <option value="">Pilih Kelas</option>
                        <?php
                        foreach ($GetKelas as $Get) : ?>
                            <option value="<?php echo $Get['id_kelas'] ?>"><?php echo $Get['nama_kelas'] ?></option>

                        <?php endforeach; ?>
                    </select>
                </td>

            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td>No Telepon</td>
                <td><input type="text" name="no_telp" required></td>
            <tr>
                <td>Nominal SPP</td>


                <td>
                    <select name="id_spp" required>

                        <option value="">Pilih Nominal SPP</option>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>