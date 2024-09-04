<?php
include "../Koneksi_ser.php";
session_start();


    $id_admin = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "UPDATE tbl_admin SET nama='$nama', username='$username', pass='$pass' WHERE id_admin=$id_admin";

    $hasil = $db->query($sql);

    if ($hasil) {
        // header('location: Dashboard.php');
        echo 
        "<script>
        alert('Update Data Berhasil !');
        document.location = '../table/table_admin.php';
        </script>";
    } else {
        echo 
        "<script>
        alert('Gagal Update Data');
        document.location = '../table/table_admin.php';
        </script>";
    }
?>