<?php
session_start();
require 'functions.php';

$role = '';

if (isset($_COOKIE['idusr']) && isset($_COOKIE['emailusr'])) {
  $role = $_COOKIE['roleusr'];
  $id_cookie = $_COOKIE['idusr'];
  $email_cookie = $_COOKIE['emailusr'];

  $result = mysqli_query($conn, "SELECT {$role}_email FROM {$role} WHERE {$role}_id = {$id_cookie}");
  $row = mysqli_fetch_assoc($result);

  $salt = "1ni92r7%4$" . $row["{$role}_email"];
  if ($email_cookie == hash('sha256', $salt)) {
    $_SESSION['login'] = true;
    $_SESSION["role"] = $role;
    $_SESSION["id"] = $id_cookie;

  }

}


if (isset($_SESSION['login'])) {
  header("Location: $role/index.php");
  exit;
}

$role = $_GET['role'];

if ($role === "admin") {
  $ikon = "ikon fa-solid fa-user-gear fa-5x";
} elseif ($role === "toko") {
  $ikon = "ikon fa-solid fa-shop fa-5x";
} elseif ($role === "user") {
  $ikon = "ikon fa-solid fa-user-large fa-5x";
} else{
  header("Location: index.php");
}

function phpalert($role)
{
  echo "        
  <script>    
  Swal.fire({
    title: 'Berhasil Login!',          
    icon: 'success',
    timer: 2000 ,
    showConfirmButton: false
  }).then((result) => {
    window.location.href = '$role/index.php';
        })                              
    </script>
    ";
  }
  
  function err($msg){
    echo "        
    <script>    
        Swal.fire({
          title: '$msg Login!',          
          icon: 'error',
          text: 'Email atau Password salah',
          timer: 1500 ,
          showConfirmButton: false
        }).then((result) => {
          window.location.href = 'login.php';          
        })                              
    </script>
    ";

  }
  ?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login |
      <?php echo $role; ?>
    </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/bd49e73b8b.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    
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
        <script>
          document.write(
            '<a href="' +
            document.referrer +
            '" class="link-dark link-offset-2 link-offset-3-hover link-underline-opacity-0 link-underline-opacity-75-hover"><i class="fa-solid fa-angles-left"></i>Kembali</a>'
            );
            </script>
      </div>
    </div>
  </nav>
  <div class="main container">
    <div class="login-wrapper container">
      <div class="text-center">
        <i class="<?php echo $ikon ?>"></i>
        <p class="fs-3 fw-semibold text-capitalize">
          Login
          <?php echo $role ?>
        </p>
      </div>
      <div class="col-7 mx-auto">
        <div class="card shadow">
          <div class="card-body">
            <form action="" method="post">             
                <div class="row mb-3">
                  <label for="emailLogin" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="emailLogin" name="emailLogin" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="passwordLogin" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="passwordLogin" name="passwordLogin" />
                  </div>
                </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <input type="checkbox" class="form-check-input" name="rememberme" id="rememberme" />
                  <label class="form-check-label" for="rememberme">Ingat saya</label>
                </div>
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <button type="submit" class="btn btn-success" name="login" value="Login">login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
  crossorigin="anonymous"></script>
  <?php
  if (isset($_POST["login"])) {
    $email = $_POST["emailLogin"];
    $password = $_POST["passwordLogin"];
    $res = mysqli_query($conn, "SELECT * FROM $role WHERE {$role}_email = '$email'");
    
    //cek email
    if (mysqli_num_rows($res) === 1) {
      //cek password
      $row = mysqli_fetch_assoc($res);
      if (password_verify($password, $row["{$role}_password"])) {
        //session
        $_SESSION["login"] = true;
        $_SESSION["role"] = $role;
        $_SESSION["id"] = $row["{$role}_id"];
        //cek ingat aku
        if (isset($_POST["rememberme"])) {
          //buat cookie
          $salt = "1ni92r7%4$" . $email;
          setcookie('roleusr', $role, time() + 3600, '/');
          setcookie('idusr', $row["{$role}_id"], time() + 3600, '/');
          setcookie('emailusr', hash('sha256', $salt), time() + 3600, '/');
        }
        phpalert($role);
        exit;      
      }
    }elseif(mysqli_num_rows($res) < 1 ){
      err('Gagal');
          
    }
    err('Gagal');
  
  }
  ?>
</body>

</html>