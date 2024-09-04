<?php
include "../Koneksi_ser.php";

// session_start()


if(isset($_POST['tambah'])) {
    // query disimpan dalam var $sql
    // $id_kamar = $_POST['id_kamar'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO tbl_admin (nama, username, pass) VALUES ('$nama', '$username', '$pass')";

    $hasil = $db->query($sql);  
    // validasi jika query berhasil di eksekusi
    if ($hasil) {
        echo 
        "<script>
        alert('Tambah Data Berhasil !');
        document.location = '../Login.php';
        </script>";
    } else {
        echo 
        "<script>
        alert('Gagal Menambahkan Data');
        document.location = 'Tambah_admin.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #000;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .form-group label {
            width: 40%;
            padding-right: 10px;
            text-align: left;
            line-height: 1.5;
        }
        .form-group input, .form-group select {
            width: 60%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-group input[type="date"], .form-group input[type="number"] {
            width: 62%;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #555;
        }
    </style>

</head>
<body>

<div class="form-container" style="margin-top:50px;">
    


        <div>
            <h1>Buat akun Admin baru</h1>

            <form method="POST">
                <div class="form-group">
                    <label for="nama">Nama: </label>
                    <input type="text" name="nama" placeholder="Nama"></input><br><br>
                </div>

                <div class="form-group">
                    <label for="username">Username: </label>
                    <input type="text" name="username"></input><br><br>
                </div>

                <div class="form-group">
                    <label for="pass">Password: </label>
                    <input type="password" id="password" name="pass"><?php include "../see_pass.php"?></input><br><br>
                </div> 

                <br>
                <button type="submit" class="btn btn-primary" style="width:100%;" name="tambah">Submit</button>
            </form>
        </div>


</div>


<script src="../bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>