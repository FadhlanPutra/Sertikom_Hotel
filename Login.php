<?php
ini_set('display_errors', 0); 

include "Koneksi_ser.php";
session_start();


$login_message = "";

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM tbl_admin where username='$username' and pass='$pass' ";
    $hasil = $db->query($sql); // eksekusi query

    // untuk mengambil hasil query 
    $data = $hasil->fetch_assoc();
    $_SESSION["username"] = $data["username"];

    // untuk mengambil satu baris dari hasil query database MySql
    if($hasil->num_rows > 0) {
        header("location: table/Table_admin.php");
    } else {
        $login_message = "Pastikan Username dan Password benar <br>";
    }


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.min.css"
      rel="stylesheet"
    />

    </head>
    <body>


    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden" style="height: 737px;">
      <style>
       w{
        color:red;
      }
        .background-radial-gradient {
          background-color: hsl(218, 41%, 15%);
          background-image: radial-gradient(650px circle at 0% 0%,
              hsl(218, 41%, 35%) 15%,
              hsl(218, 41%, 30%) 35%,
              hsl(218, 41%, 20%) 75%,
              hsl(218, 41%, 19%) 80%,
              transparent 100%),
            radial-gradient(1250px circle at 100% 100%,
              hsl(218, 41%, 45%) 15%,
              hsl(218, 41%, 30%) 35%,
              hsl(218, 41%, 20%) 75%,
              hsl(218, 41%, 19%) 80%,
              transparent 100%);
        }

        #radius-shape-1 {
          height: 220px;
          width: 220px;
          top: -60px;
          left: -130px;
          background: radial-gradient(#44006b, #ad1fff);
          overflow: hidden;
        }

        #radius-shape-2 {
          border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
          bottom: -60px;
          right: -110px;
          width: 300px;
          height: 300px;
          background: radial-gradient(#44006b, #ad1fff);
          overflow: hidden;
        }

        .bg-glass {
          background-color: hsla(0, 0%, 100%, 0.9) !important;
          backdrop-filter: saturate(200%) blur(25px);
        }
      </style>

      <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
          <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
            <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
              Login Untuk Mengakses<br/>
              <span style="color: hsl(218, 81%, 75%)">Halaman Admin</span>
            </h1>
            <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            Selamat datang di halaman login Admin kami. Masukkan Username dan Password Anda di bawah ini untuk mengakses panel administrasi dan mengelola berbagai fitur serta data situs. Pastikan informasi yang Anda masukkan akurat untuk menjaga keamanan dan integritas sistem.
            </p>
          </div>

          <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
            <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
            <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

            <div class="card bg-glass">
              <div class="card-body px-4 py-5 px-md-5">

                <form action="Login.php" method="POST">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                    <div class="col mb-4">                   
                      <div data-mdb-input-init class="form-outline">
                        <input type="text" id="form3Example1" name="username" class="form-control"></input>
                        <label class="form-label" for="form3Example1" required>Username</label>
                      </div>
                    </div>
                  </div>

                  <!-- Password input -->
                  <div data-mdb-input-init class="form-outline mb-4" style="position:relative;">
                    <input type="password" id="password" name="pass" class="form-control"></input>
                    <label class="form-label" for="password" required>Password</label>
                    <span style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"><?php include "see_pass.php" ?></span>
                  </div><w><?php echo $login_message; ?></w>
                  
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4" name="login">
                    Log In
                  </button> 
                  <!-- data-mdb-button-init data-mdb-ripple-init -->
                  
                  <!-- Register buttons -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Design Block -->

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.umd.min.js"
></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
