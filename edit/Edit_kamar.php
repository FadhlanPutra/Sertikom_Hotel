<?php
include "../Koneksi_ser.php";

$id_kamar = $_GET['id'];

//buat query untuk ambil data dari

//ambil id dari query string database
$sql = "SELECT * FROM tbl_jenis_kamar WHERE id_kamar=$id_kamar LIMIT 1";

//eksekusi query
$hasil = $db->query($sql);

// untuk mengambil baris data hasil query, yang nantinya akan ditampilkan di form
$data = mysqli_fetch_array($hasil);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kamar</title>
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>  

<div class="container"> 

    <h3>Edit Data Kamar</h3>

    <form action="../proses/Update_kamar.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $data['id_kamar']?>">

                <label for="Nama">Jenis Kamar*</label><br>
                <input style="width:100%;" type="text" name="jenis_kamar" class="form-control" placeholder="Nama" value="<?php echo $data['jenis_kamar'] ?>"></input><br>

                <label for="harga">Harga*</label><br>
                <input style="width:100%;" type="text" name="harga" placeholder="Harga" class="form-control" id="floatingInput" value="<?php echo $data['harga'] ?>"></input><br>

                <label for="Keterangan">Keterangan*</label><br>
                <input style="width:100%;" type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo $data['keterangan'] ?>"></input><br>

            <br>
        <button type="submit" style="width:100%;" class="btn btn-primary" name="update">Update</button>
    </form>

    <table class="table mt-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">

</div>  

    <script src="../bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
