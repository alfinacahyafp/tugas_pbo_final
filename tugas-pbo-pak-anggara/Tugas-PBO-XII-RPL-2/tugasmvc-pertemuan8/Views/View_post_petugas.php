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

    ?>
    <form action="../Config/Routes.php?function=create_petugas" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
        <table border="1">
            <input type="hidden" name="id_petugas">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="text" name="password" required></td>
            </tr>

            <tr>
                <td>Nama Petugas</td>
                <td><input type="text" name="nama_petugas" required></td>
            </tr>

            <tr>
                <td>Pilih Level</td>
                <td>
                    <select name="level" required>
                        <option value="Administrator">Administrator</option>
                        <option value="Petugas">Petugas</option>
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