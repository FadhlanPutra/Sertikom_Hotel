<?php
include "../Koneksi_ser.php";

// session_start()


if(isset($_POST['checkin'])) {
    // query disimpan dalam var $sql
    $id_kamar = $_POST['jenis_kamar'];
    $nama = $_POST['nama'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $no_identitas = $_POST['no_identitas'];
    $no_hp = $_POST['no_hp'];
    $jumlah = $_POST['jumlah'];

    $cekin = date_create($check_in);
    $cekout = date_create($check_out);

    $diff = date_diff($cekin, $cekout);
    $selisih = $diff->days;

    $harga_query = "SELECT harga FROM tbl_jenis_kamar WHERE id_kamar='$id_kamar'";
    $eksekusi_harga = $db->query($harga_query);
    $keluar_harga = mysqli_fetch_assoc($eksekusi_harga);

    $harga = $keluar_harga["harga"];
    $total_harga = $harga * $jumlah * $selisih;


    $sql = "INSERT INTO tbl_penyewa (nama, jenis_kamar, check_in, check_out, durasi , no_identitas, no_hp, jumlah, total) VALUE ('$nama', '$id_kamar', '$check_in', '$check_out', '$selisih', '$no_identitas', '$no_hp', '$jumlah', '$total_harga')";

    $hasil = $db->query($sql);  
    // validasi jika query berhasil di eksekusi
    if ($hasil) {
        echo 
        "<script>
        alert('Tambah Data Berhasil !');
        document.location = '../table/Table_penyewa.php';
        </script>";
    } else {
        echo 
        "<script>
        alert('Gagal Menambahkan Data');
        document.location = '../table/Tambah_table.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

</head>
<body>

<div class="container" style="margin-top:50px;">
    

    <div class="d-flex justify-content-center shadow-lg p-3 pb-5 pt-5 mb-5 bg-body-tertiary rounded" style="margin-left:320px; margin-right:320px;">

        <div>
            <h1>Check in Hotel</h1>
            <p>Check in di sini</p>

            <form method="POST">

            
                    <label for="nama">Nama: </label><br>
                    <input type="text" name="nama" placeholder="Nama" style="width:222px; height:30px;"></input><br><br>
            

                
                    <label for="Check_in">Check in: </label><br>
                    <input type="date" name="check_in" style="width:222px; height:30px;"></input><br><br>
               

                
                    <label for="Check_out">Check Out: </label><br>
                    <input type="date" name="check_out" style="width:222px; height:30px;"></input><br><br>
                

                
                    <label for="No_identitas">No Identitas:</label><br>
                    <input type="text" name="no_identitas" placeholder="No Identitas" style="width:222px; height:30px;"></input><br><br>
                

                
                    <label for="no_hp">No Hp: </label><br>
                    <input type="text" name="no_hp" placeholder="No Hp" style="width:222px; height:30px;"></input><br><br>
                

                
                    <label for="jumlah">Jumlah kamar: </label><br>
                    <input type="text" name="jumlah" placeholder="Jumlah Kamar" style="width:222px; height:30px;"></input><br><br>
               
                

                <select class="form-select" aria-label="Default select example" name="jenis_kamar" style="margin-bottom:20px;">
                   <option selected>-- Pilih Kamar --</option>
                   <?php
                   $query = "SELECT DISTINCT * FROM tbl_jenis_kamar";
                   $ambil_kamar = mysqli_query($db, $query);

                   foreach ($ambil_kamar as $id_kamar1)
                   {
                    echo '<option value= "' . $id_kamar1['jenis_kamar'] . '">
                    ' . $id_kamar1['jenis_kamar'] . ' </option>
                    ';}
                
                   ?>
                </select>

                <br>
                <button type="submit" class="btn btn-primary" style="width:400px;" name="checkin">Submit</button>
            </form>
        </div>
    </div>

</div>


<script src="../bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>