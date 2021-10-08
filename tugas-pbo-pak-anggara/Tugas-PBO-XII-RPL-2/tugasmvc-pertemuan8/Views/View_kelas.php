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

    include '../Controllers/Controller_kelas.php';
    // Membuat Object dari Class kelas
    $kelas = new Controller_kelas();
    $GetKelas = $kelas->GetData_All();

    // untuk mengecek di object $siswa ada berapa banyak Property
    // echo var_dump($kelas);
    ?>


    <h1>OOP - Class, Object, Property, Method With <u>MVC</u></h1>
    <h2>CRUD and CSRF</h2>
    <h3>Table Kelas</h3>
    <h3><a class="btn btn-primary" href="View_post_kelas.php">Add Data</a></h3>


    <table class="table table-bordered" border="1">
        <tr class="table-light">
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Kompetensi Keahlian</th>
            <th>Tools</th>
        </tr>
        <?php
        // Decision validation variabel
        if (isset($GetKelas)) {
            $no = 1;
            foreach ($GetKelas as $Get) {
        ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $Get['nama_kelas']; ?></td>
                    <td><?php echo $Get['kompetensi_keahlian']; ?></td>
                    <td>
                        <a href="../Views/View_put_kelas.php?id_kelas=<?php echo base64_encode($Get['id_kelas']) ?>"><img src="https://sociabuzz.com/assets/files/profile/influencer/arashbuana/arashbuana72__thumb.png" width="17"></a>
                        <button onclick="konfirmasi(<?php echo $Get['id_kelas'] ?>)">Delete</button>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
    <script>
        function konfirmasi(id_kelas) {
            if (window.confirm("Apakah anda ingin menghapus data ini?")) {
                window.location.href = '../Config/Routes.php?function=delete_kelas&id_kelas=<?php echo base64_encode($Get['id_kelas']) ?>';
            };
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>