<?php
include "../Koneksi_ser.php";

//query string : id=1, query string ini akan tersimpan dalam var_GET

if (isset($_POST['btn_hapus'])) {
    //ambil id dari query string
    $id_admin = $_POST['id']; // 1

    // buat query hapus
    $sql = "DELETE FROM tbl_admin WHERE id_admin=$id_admin";
    //eksekusi query hapus
    $hasil = $db->query($sql);
    
        //apakah query hapus berhasil?
    if ($hasil) {
        // header('location: Dashboard.php');
        echo 
        "<script>
        alert('Hapus Data Berhasil !');
        document.location = '../table/Table_admin.php';
        </script>";
    } else {
        echo 
        "<script>
        alert('Gagal Menghapus');
        document.location = '../table/Table_admin.php';
        </script>";
    }
}
?>