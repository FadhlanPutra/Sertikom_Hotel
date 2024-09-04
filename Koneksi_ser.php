<?php
    $hostname = "localhost";
    // alamat server database MySQL

    $username = "root";
    // nama pengguna untuk mengakses database. isinya default

    $password = "";
    // kata sandi untuk mengakses database. isinya default

    $database_name = "db_hotel_fadhlan";
    // nama database yang akan dikoneksikan

    $db = mysqli_connect($hostname, $username, $password, $database_name);

    //jika db koneksinya error
    // if($db->connect_error) {
    //     echo "koneksi gagal!";
    // } else {
    //      echo "koneksi berhasil";
    // }
?>