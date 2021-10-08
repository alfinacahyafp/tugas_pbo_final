<?php

// Memanggil fungsi dari CSRF
include('../Config/Csrf.php');

include '../Controllers/Controller_petugas.php';
// Membuat Object dari Class petugas
$petugas = new Controller_petugas();
$id_petugas = base64_decode($_GET['id_petugas']);
$GetPetugas = $petugas->GetData_Where($id_petugas);
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
    foreach ($GetPetugas as $Get) {
    ?>

        <form action="../Config/Routes.php?function=put_petugas" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
            <table border="1">
                <input type="hidden" name="id_petugas" value="<?php echo $Get['id_petugas']; ?>">
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $Get['username']; ?>"></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" value="<?php echo $Get['password']; ?>"></td>
                </tr>

                <tr>
                    <td>Nama Petugas</td>
                    <td><input type="text" name="nama_petugas" value="<?php echo $Get['nama_petugas']; ?>"></td>
                </tr>

                <tr>
                    <td>Level</td>
                    <td>
                        <select name="level">

                            <!-- Logic combo Get database -->
                            <option value="<?php echo $Get['level']; ?>">
                                <?php
                                if ($Get['level'] == "Administrator") {
                                    echo "Administrator";
                                } else {
                                    echo "Petugas";
                                }
                                ?>
                            </option>
                            <!-- Logic combo Get database -->



                            <option value="Administrator">Administrator</option>
                            <option value="Petugas">Petugas</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
                </tr>
            </table>
        </form>

    <?php
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>