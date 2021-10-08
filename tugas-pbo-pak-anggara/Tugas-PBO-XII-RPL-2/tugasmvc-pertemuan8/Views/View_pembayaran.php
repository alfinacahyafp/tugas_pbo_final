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

    include '../Controllers/Controller_pembayaran.php';
    // Membuat Object dari Class pembayaran
    $pembayaran = new Controller_pembayaran();
    $GetPembayaran = $pembayaran->GetData_All();

    // untuk mengecek di object $siswa ada berapa banyak Property
    // echo var_dump($kelas);
    ?>


    <h1>OOP - Class, Object, Property, Method With <u>MVC</u></h1>
    <h2>CRUD and CSRF</h2>

    <h3>Table Pembayaran</h3>
    <h3><a class="btn btn-primary" href="View_post_pembayaran.php">Add Data</a></h3>


    <table class="table table-bordered" border="1">
        <tr class="table-light">
            <th>No</th>
            <th>Nama Petugas</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Tanggal Bayar</th>
            <th>Bulan Bayar</th>
            <th>Tahun Bayar</th>
            <th>Nominal</th>
            <th>Jumlah Bayar</th>
            <th>Tools</th>
        </tr>
        <?php
        // Decision validation variabel
        if (isset($GetPembayaran)) {
            $no = 1;
            foreach ($GetPembayaran as $Get) {
        ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $Get['nama_petugas']; ?></td>
                    <td><?php echo $Get['nisn']; ?></td>
                    <td><?php echo $Get['nama']; ?></td>
                    <td><?php echo $Get['tgl_bayar']; ?></td>
                    <td><?php echo $Get['bulan_dibayar']; ?></td>
                    <td><?php echo $Get['tahun_bayar']; ?></td>
                    <td><?php echo $Get['nominal']; ?></td>
                    <td><?php echo $Get['jumlah_bayar']; ?></td>
                    <td>
                        <a href="../Views/View_put_pembayaran.php?id_pembayaran=<?php echo base64_encode($Get['id_pembayaran']) ?>"><img src="https://sociabuzz.com/assets/files/profile/influencer/arashbuana/arashbuana72__thumb.png" width="17"></a>
                        <button onclick="konfirmasi(<?php echo $Get['id_pembayaran'] ?>)">Delete</button>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
    <script>
        function konfirmasi(id_pembayaran) {
            if (window.confirm('apakah anda ingin menghapus data ini ?')) {
                window.location.href = '../Config/Routes.php?function=delete_pembayaran&id_pembayaran=<?php echo base64_encode($Get['id_pembayaran']) ?>';
            };
        }
    </script>
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>