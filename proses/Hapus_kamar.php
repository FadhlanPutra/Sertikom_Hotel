<?php
include "../Koneksi_ser.php";

//query string : id=1, query string ini akan tersimpan dalam var_GET

if (isset($_POST['btn_hapus'])) {
    //ambil id dari query string
    $id_kamar = $_POST['id']; // 1

    // buat query hapus
    $sql = "DELETE FROM tbl_jenis_kamar WHERE id_kamar=$id_kamar";
    //eksekusi query hapus
    $hasil = $db->query($sql);
    
        //apakah query hapus berhasil?
    if ($hasil) {
        // header('location: Dashboard.php');
        echo 
        "<script>
        alert('Hapus Data Berhasil !');
        document.location = '../table/Table_jenis_kamar.php';
        </script>";
    } else {
        echo 
        "<script>
        alert('Gagal Menghapus');
        document.location = '../table/Table_jenis_kamar.php';
        </script>";
    }
}
?>