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

    include '../Controllers/Controller_pembayaran.php';
    // Membuat Object dari Class pembayaran
    $pembayaran = new Controller_pembayaran();
    $GetSpp = $pembayaran->GetData_Siswa();
    ?>


    <form action="../Config/Routes.php?function=create_pembayaran" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
        <table border="1">
            <input type="hidden" name="id_pembayaran">
            <tr>
                <td>ID Petugas</td>
                <td>
                    <select name="id_petugas">
                        <option value="">Pilih Petugas</option>
                        <option value="1061209">Petugas</option>

                    </select>
                </td>
            </tr>

            <tr>
                <td>Nama Siswa</td>
                <td>
                    <select name="nisn" required>
                        <option value="">Pilih Nama Siswa</option>
                        <?php
                        foreach ($GetSpp as $GetP) : ?>
                            <option value="<?php echo $GetP['nisn']; ?>"><?php echo $GetP['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Tanggal Bayar</td>
                <td><input type="text" name="tgl_bayar" required></td>
            </tr>

            <tr>
                <td>Bulan Bayar</td>
                <td><input type="text" name="bulan_dibayar" required></td>
            </tr>

            <tr>
                <td>Tahun Bayar</td>
                <td><input type="text" name="tahun_bayar" required></td>
            </tr>

            <tr>
                <td>SPP</td>
                <td>
                    <select name="id_spp" required>
                        <option value="">Pilih Nominal </option>
                        <option value="1">30000</option>
                        <option value="2">25000</option>
                        <option value="3">20000</option>
                        <option value="4">15000</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Jumlah Bayar</td>
                <td><input type="text" name="jumlah_bayar" required></td>
            </tr>


            <tr>
                <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
            </tr>
        </table </form>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>