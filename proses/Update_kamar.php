<?php
include "../Koneksi_ser.php";
session_start();


    $id_kamar = $_POST['id'];
    $jenis_kamar = $_POST['jenis_kamar'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];


    $sql = "UPDATE tbl_jenis_kamar SET jenis_kamar='$jenis_kamar', harga='$harga', keterangan='$keterangan' WHERE id_kamar=$id_kamar";

    $hasil = $db->query($sql);

    if ($hasil) {
        echo 
        "<script>
        alert('Update Data Berhasil !');
        document.location = '../table/Table_jenis_kamar.php';
        </script>";
    } else {
        echo 
        "<script>
        alert('Gagal Update Data');
        document.location = '../table/Table_jenis_kamar.php';
        </script>";
    }
?>