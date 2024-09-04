<?php


include "../Koneksi_ser.php";

if(isset($_POST['search'])) {

    $nama = $_POST['nama'];
    // $username = $_POST['username'];
    // $pass = $_POST['pass'];
    $id_admin = $_POST['id'];


    $sql = "SELECT * FROM tbl_admin WHERE nama='$nama'";
    $hasil = $db->query($sql);
    $data = mysqli_fetch_array($hasil);
}

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
        <title>Dashboard - Admin</title>
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

            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="POST" action="../proses/Search_admin.php">
                <div class="input-group">
                    <input class="form-control" type="text" name="nama" placeholder="Cari Nama" aria-label="Cari Nama" aria-describedby="btnNavbarSearch" />
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
                                <span>Dashboard</span>
                            </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="Table_jenis_kamar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Table Jenis Kamar
                            </a>
                            <a class="nav-link" href="Table_penyewa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Table Penyewa
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
                        <h1 class="mt-4">Data Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Admin</li>
                            <a href="../tambah/Tambah_admin.php"><button type="submit" class="btn btn-primary" style="width:161px; margin-left:10px; font-size:15px;">Tambah Data Admin</button></a>
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
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th scope="col" style="padding-left:50px;">Aksi</th>
                                        </tr>

                                <?php
                                    $sql = "SELECT * FROM tbl_admin";
                                    // mengurutkan dari yang terbaru

                                    // eksekusi
                                    $hasil = $db->query($sql);
                                    $no = 1;

                                    foreach ($hasil as $row) {
                                ?>  
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $row['nama'];?></td>
                                        <td><?php echo $row['username'];?></td>
                                        <td><?php echo $row['pass'];?></td>

                                        <td><a class="btn btn-info" href="../edit/Edit_admin.php?id=<?php echo $row ['id_admin']?>">Edit</a>
                                    
                                        <!-- start modal hapus -->
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_hapus<?= $no ?>">
                                            Hapus</a></td>
                                    
                                    
                                        <div class="modal fade" id="modal_hapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                    
                                              <form action="../proses/Hapus_admin.php" method="POST">
                                                <input type="hidden" name="id" value="<?= $row['id_admin']?>">

                                                <div class="modal-body">
                                                  Yakin ingin menghapus data ini?<br>
                                                  Nama Pelanggan: <span class="text-danger"><?php echo $row ['nama'] ?></span>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary">Tidak</button>
                                    
                                                <button type="submit" name="btn_hapus" class="btn btn-danger">Hapus</button>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- end modal hapus -->

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
