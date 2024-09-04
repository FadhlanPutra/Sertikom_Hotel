<?php
include "../Koneksi_ser.php";

$id_admin = $_GET['id'];

//buat query untuk ambil data dari

//ambil id dari query string database
$sql = "SELECT * FROM tbl_admin WHERE id_admin=$id_admin LIMIT 1";

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
    <title>Edit Data Admin</title>
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>  

<div class="container"> 

    <h3>Edit Data Admin</h3>

    <form action="../proses/Update_admin.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $data['id_admin']?>">

                <label for="Nama">Nama*</label><br>
                <input style="width:100%;" type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama'] ?>"></input><br>

                <label for="username">Username*</label><br>
                <input style="width:100%;" type="text" name="username" placeholder="Username" class="form-control" id="floatingInput" value="<?php echo $data['username'] ?>"></input><br>

                <label for="password">Password*</label><br>
                <input style="width:95%;" id="password" type="password" name="pass" class="form-pass" placeholder="Min 8 Character" value="<?php echo $data['pass']?>"> <?php include "../see_pass.php"?>
                </input><br>

                

            <br>
        <button type="submit" style="width:100%;" class="btn btn-primary" name="update">Update</button>
    </form>

    <table class="table mt-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">

</div> 


    <script src="../bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
