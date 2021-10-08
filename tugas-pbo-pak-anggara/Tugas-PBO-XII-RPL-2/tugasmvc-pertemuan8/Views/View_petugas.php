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

    include '../Controllers/Controller_petugas.php';
    // Membuat Object dari Class petugas
    $petugas = new Controller_petugas();
    $GetPetugas = $petugas->GetData_All();

    // untuk mengecek di object $siswa ada berapa banyak Property
    // echo var_dump($kelas);
    ?>


    <h1>OOP - Class, Object, Property, Method With <u>MVC</u></h1>
    <h2>CRUD and CSRF</h2>

    <h3>Table Petugas</h3>
    <h3><a class="btn btn-primary" href="View_post_petugas.php">Add Data</a></h3>


    <table class="table table-bordered" border="1">
        <tr class="table-light">
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Nama Petugas</th>
            <th>Level</th>
            <th>Tools</th>
        </tr>
        <?php
        // Decision validation variabel
        if (isset($GetPetugas)) {
            $no = 1;
            foreach ($GetPetugas as $Get) {
        ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $Get['username']; ?></td>
                    <td><?php echo $Get['password']; ?></td>
                    <td><?php echo $Get['nama_petugas']; ?></td>
                    <td><?php echo $Get['level']; ?></td>
                    <td>
                        <a href="../Views/View_put_petugas.php?id_petugas=<?php echo base64_encode($Get['id_petugas']) ?>"><img src="https://sociabuzz.com/assets/files/profile/influencer/arashbuana/arashbuana72__thumb.png" width="17"></a>
                        <button onclick="konfirmasi(<?php echo $Get['id_petugas'] ?>)">Delete</button>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
    <script>
        function konfirmasi(id_petugas) {
            if (window.confirm("Apakah anda ingin menghapus data ini?")) {
                window.location.href = '../Config/Routes.php?function=delete_petugas&id_petugas=<?php echo base64_encode($Get['id_petugas']) ?>';
            };
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>