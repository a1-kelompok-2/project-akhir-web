<?php
session_start();
require 'functions.php';

$role = '';

if (isset($_COOKIE['idusr']) && isset($_COOKIE['roleusr']) && isset($_COOKIE['emailusr'])) {
  $role = $_COOKIE['roleusr'];
  $id_cookie = $_COOKIE['idusr'];
  $email_cookie = $_COOKIE['emailusr'];

  $result = mysqli_query($conn, "SELECT {$role}_email FROM {$role} WHERE {$role}_id = {$id_cookie}");
  $row = mysqli_fetch_assoc($result);

  $salt = "1ni92r7%4$" . $row["{$role}_email"];
  if ($email_cookie === hash('sha256', $salt)) {
    $_SESSION['login'] = true;
    $_SESSION["role"] = $role;
    $_SESSION["id"] = $id_cookie;

  }

}

if (isset($_SESSION['login'])) {
  header("Location: $role/index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register | PasarSegari</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/bd49e73b8b.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <nav class="navbar fixed-top border-bottom border-warning-subtle border-3">
    <div class="container">
      <div>
        <a class="navbar-brand fw-light fs-4" href="index.php"><i class="fa-solid fa-leaf fa-xl"
            style="color: #116530"></i> PasarSegari</a>
      </div>
      <div class="ml-auto">
        <a href="index.php"
          class="link-dark link-offset-2 link-offset-3-hover link-underline-opacity-0 link-underline-opacity-75-hover"><i
            class="fa-solid fa-angles-left"></i>Kembali</a>
      </div>
    </div>
  </nav>
  <div class="main container">
    <div class="first-wrapper container">
      <p class="fs-1 fw-semibold text-center">Daftar Akun</p>
      <form action="register-form.php" method="get">
        <div class="d-flex justify-content-center">          
          <div class="p-2">
            <div class="card h-100 hover-effect" style="width: 20rem;">
              <div class="card-body text-center">
                <i class="ikon fa-solid fa-shop fa-5x"></i>

                <h5 class="card-title mt-3 fs-3">Toko</h5>
                <p class="card-text">
                  Ideal untuk pemilik toko yang ingin menjual produknya dari petani langsung ke konsumen.
                  Keuntungannya adalah mereka menerima produk yang segar dan berkualitas tinggi, sekaligus memberikan
                  dampak positif bagi masyarakat lokal dan perekonomian daerah.
                </p>
              </div>
              <div class="card-footer bg-white text-center mt-4">
                <button href="#" class="btn btn-costom fw-medium w-50" name="role" value="toko">Daftar</button>
              </div>
            </div>
          </div>
          <div class="p-2">
            <div class="card h-100 hover-effect" style="width: 20rem;">
              <div class="card-body text-center">
                <i class="ikon fa-solid fa-user-large fa-5x"></i>

                <h5 class="card-title mt-3 fs-3">User</h5>
                <p class="card-text fw-normal">
                  Bagi pembelanja yang ingin membeli sayuran segar dan berkualitas langsung dari toko terpercaya yang
                  menyediakan produk langsung dari petani untuk kebutuhan sehari-hari
                </p>
              </div>
              <div class="card-footer bg-white text-center mt-4">
                <button href="#" class="btn btn-costom fw-medium w-50" name="role" value="user">Daftar</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="text-center" id="scrollspy">
        <!-- <a class="btn scrollspyBTN my-4" href="#scrollspyLogin">Sudah punya akun</a> -->
      </div>
    </div>
    <div data-bs-spy="scroll" data-bs-target="#scrollspy" class="second-wrapper container text-center">
      <p class="fs-3 fw-semibold mb-4" id="scrollspyLogin">Sudah punya akun? </p>
      <a class="btn btn-lg btn-costom rounded-1" href="login.php">Login akun</a>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>