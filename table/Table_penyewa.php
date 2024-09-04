<?php
include "../Koneksi_ser.php";

// ini_Set('display_errors', '0');

session_start();

if (isset($_POST['Logout'])) {
    session_destroy(); // menghapus sesi
    header('location: ../Login.php');
}

if ($_SESSION['username'] == null) {
  header('location: ../Login.php');
  exit();
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Table - Penyewa</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../admin_template/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <style>
            span{
                color:white;
            }
        </style>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="Table_admin.php">Admin Expro Hotel</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->

            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="POST" action="../proses/Search_penyewa.php">
                <div class="input-group">
                    <input class="form-control" type="text" name="nama" placeholder="Cari nama penyewa" aria-label="Cari nama penyewa" aria-describedby="btnNavbarSearch" />
                    <input type="hidden" name="id" value="<?= $row['nama']?>">
                    <button class="btn btn-primary" id="btnNavbarSearch" name="search" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end ps-2" aria-labelledby="navbarDropdown">
                        <form action="" method="POST">
                        <p class="welcome">Selamat Datang <?php echo $_SESSION["username"]?></p>
                        <hr class="me-2">
                            
           
                            <button class="btn btn-outline-primary mb-2" type="submit" name="Setting">Setting</button>
                            <button class="btn btn-outline-success mb-2" type="submit" name="Log">Log Activity</button>
                            <button class="btn btn-outline-danger mb-2" type="submit" name="Logout">Logout</button>
                        </form>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="Table_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="Table_jenis_kamar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Table Jenis Kamar
                            </a>
                            <a class="nav-link" href="Table_penyewa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                <span>Table Penyewa</span>
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION["username"]?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Penyewa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Penyewa</li>
                            <a href="../tambah/Tambah_penyewa.php"><button type="submit" class="btn btn-primary" style="width:190px; margin-left:10px; font-size:15px;">Tambah Data Penyewa</button></a>

                            <form style="margin-bottom:20px; margin-left:508px;" action="../proses/Search_penyewa_2.php" method="POST">
                                <select class="form-select" name="jenis_kamar" style="width:200px;" aria-describedby="filter">
                                    <option selected>-- Filter Kamar --</option>
                                    <?php
                                        $query = "SELECT DISTINCT * FROM tbl_jenis_kamar";
                                        $ambil_kamar = mysqli_query($db, $query);
                                        foreach ($ambil_kamar as $id_kamar)
                                        {
                                        echo '<option value= "' . $id_kamar['jenis_kamar'] . '">
                                        ' . $id_kamar['jenis_kamar'] . ' </option>
                                        ';}
                                    ?>
                                    <input type="hidden" name="id" value="<?= $row['jenis_kamar']?>"> 
                                </select>

                                <button type="submit" id="filter" style="margin-top:10px;" class="btn btn-primary" name="filter">Cari filter</button>
                            </form>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Expro Hotel
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>jenis kamar</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Durasi</th>
                                            <th>No Identitas</th>
                                            <th>No HP</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                        </tr>

                                <?php
                                    $sql = "SELECT * FROM tbl_penyewa";
                                    // mengurutkan dari yang terbaru

                                    // eksekusi
                                    $hasil = $db->query($sql);
                                    $no = 1;

                                    foreach ($hasil as $row) {
                                ?>  
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $row['nama'];?></td>
                                        <td><?php echo $row['jenis_kamar'];?></td>
                                        <td><?php echo $row['check_in'];?></td>
                                        <td><?php echo $row['check_out'];?></td>
                                        <td><?php echo $row['durasi']." Hari";?></td>
                                        <td><?php echo $row['no_identitas'];?></td>
                                        <td><?php echo $row['no_hp'];?></td>
                                        <td><?php echo $row['jumlah']. " Kamar";?></td>
                                        <td><?php echo "Rp. ". $row['total'];?></td>
                                        
                                    </tr>
                                    
                                    <?php 
                                        }
                                    ?>

                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../admin_template/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../admin_template/assets/demo/chart-area-demo.js"></script>
        <script src="../admin_template/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <!-- <script src="admin_template/js/datatables-simple-demo.js"></script> -->
    </body>
</html>