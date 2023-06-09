<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
} elseif ($_SESSION["role"] !== 'user') {
  header("Location: ../index.php");
  exit;
}
$prdd = query("SELECT * FROM produk WHERE produk_status = 'aktif' LIMIT 9");

$sayur = query("SELECT * FROM produk WHERE produk_status = 'aktif' AND katP_id = 1 LIMIT 4");
$buah = query("SELECT * FROM produk WHERE produk_status = 'aktif'  AND katP_id = 2 LIMIT 4");
$sembako = query("SELECT * FROM produk WHERE produk_status = 'aktif'  AND katP_id = 3 LIMIT 4");

if (isset($_POST["search"])) { 
  $key = $_POST["keyword"];
  header("Location: setID.php?key=$key&goto=products");
}

$usr = query("SELECT user_email FROM user WHERE user_id = {$_SESSION['id']}");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/bd49e73b8b.js"
      crossorigin="anonymous"
    ></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body class="bg-white">
    <div class="top-nav container-fluid p-5 text-center text-success">
      <h1>PasarSegari</h1>
      <h2>Kami menjual yang terbaik untuk Anda</h2>
    </div>
    <nav class="navbar navbar-expand-lg sticky-top bg-white shadow-sm">
      <div class="container">
        <div class="py-2">
          <a class="navbar-brand fw-light fs-4" href="index.php"
            ><i class="fa-solid fa-leaf fa-xl" style="color: #116530"></i> PasarSegari</a
          >
        </div>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="py-2 px-3 w-75">
            <form method="post">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control bg-white border border-success"
                  placeholder="Aku mau belanja..."                 
                  name="keyword"          
                  autocomplete="off"

                />
                <button class="btn btn-outline-success" type="submit" name="search">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </form>
          </div>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown me-1">
              <a
                class="nav-link dropdown-toggle text-dark"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Kategori
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item btn btn-light " href="setID.php?key=sayur&goto=products"
                    ><i class="fa-solid fa-carrot fa-lg" style="color: #ed9121"></i> Sayur
                    Segar</a
                  >
                </li>
                <li>
                  <a class="dropdown-item btn btn-light " href="setID.php?key=buah&goto=products"
                    ><i class="fa-solid fa-apple-whole fa-lg" style="color: #8db600"></i> Buah
                    Segar</a
                  >
                </li>
                <li>
                  <a class="dropdown-item btn btn-light " href="setID.php?key=sembako&goto=products"
                    ><i class="fa-solid fa-egg fa-lg" style="color: #f4bb29"></i> Sembako</a
                  >
                </li>
              </ul>
            </li>
          </ul>          
          <div class="vr"></div>
          <div class="py-2 px-3 d-flex ">
            <div class="dropdown">
              <a
                href=""
                class="link-dark dropdown-toggle btn btn-outline-light rounded-1 border-0"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                
              >
                <i class="fa-solid fa-circle-user fa-xl"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <?php foreach ($usr as $rows): ?>
                    <a class="dropdown-item py-2 btn btn-light">
                      <?= $rows['user_email'] ?>
                    </a>                
                  <?php endforeach; ?>   
                </li>
                <li>
                  <a class="dropdown-item py-2 btn btn-light" href="history.php"
                    ><i class="fa-solid fa-clock-rotate-left fa-lg"></i> Histori Transaksi</a
                  >
                </li>
                <li>
                  <a class="dropdown-item py-2 btn btn-light" onclick="logout()"
                    ><i class="fa-sharp fa-solid fa-right-from-bracket fa-lg"></i> Logout</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="scrollspy-wrap">
      <div class="d-flex justify-content-center py-5" id="scrollspy">
        <div class="px-2 mt-5">
          <a
            class="scrollspyBTN btn btn-success btn-lg fw-semibold rounded-1"
            href="#scrollspySayur"
            >Sayur Segar</a
          >
        </div>
        <div class="px-2 mt-5">
          <a
            class="scrollspyBTN btn btn-danger btn-lg fw-semibold rounded-1"
            href="#scrollspyBuah"
            >Buah Segar</a
          >
        </div>
        <div class="px-2 mt-5">
          <a
            class="scrollspyBTN btn btn-warning btn-lg text-white fw-semibold rounded-1"
            href="#scrollspySembako"
            >Sembako</a
          >
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#ffffff"
          fill-opacity="1"
          d="M0,64L40,80C80,96,160,128,240,149.3C320,171,400,181,480,192C560,203,640,213,720
        ,197.3C800,181,880,139,960,122.7C1040,107,1120,117,1200,128C1280,139,1360,149,1400,154.7L1440,160L1440,320L1400,320C1360
        ,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160
        ,320,80,320,40,320L0,320Z"
        ></path>
      </svg>
    </div>
    <div class="container-fluid" data-bs-spy="scroll" data-bs-target="#scrollspy">
      <div id="scrollspySayur" class="text-white">Sayur</div>
      <div class="bg-body-tertiary">
        <div class="container">
          <div class="row p-2 bg-body-tertiary my-5 gx-3">
            <div class="sayur-row col-3 row align-items-center text-center text-light">
              <h2>Sayur Segar</h2>
            </div>
            <div class="col-9 bg-body-tertiary">
              <div class="table-responsive">
                <table class="table-borderless">
                  <tbody>
                    <tr>
                      <?php if($sayur != 'kosong'){foreach ($sayur as $rowd): ?>
                      <td>
                        <div class="p-2">
                          <div
                          
                            class="card hover-effect"
                            style="width: 13rem; height: 29.6rem"
                          >
                            <img
                              src="view.php?id_gambar=<?php echo $rowd['gambar_id']; ?>"
                              class="card-img-top object-fit-cover"
                              height="180"
                              alt="..."
                            />
                            <div class="card-body">
                              <a
                                href="setID.php?key=<?= $rowd['produk_id']; ?>&goto=product"
                                class="link-dark link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover"
                              >
                                <p class="card-text">
                                  <?php echo mb_strimwidth($rowd['produk_name'], 0, 58, "...") ?>
                                </p>
                              </a>
                              <p class="card-text text-secondary">
                                <?php echo mb_strimwidth("{$rowd['produk_var1']},{$rowd['produk_var2']}", 0, 23, "...") ?>
                              </p>
                            </div>
                            <div class="card-footer bg-white border border-0">
                              <p class="fw-semibold fs-4">
                                <?php echo "Rp" . number_format($rowd['produk_var1pc'], 0, "", "."); ?>
                              </p>
                            </div>
                            <div class="card-footer bg-white border text-center border-0">
                              <a
                                href="setID.php?key=<?= $rowd['produk_id']; ?>&goto=product"
                                class="btn btn-success fw-semibold w-100 rounded-1"
                                >Beli Sekarang</a>
                            </div>
                          </div>
                        </div>
                      </td>
                      <?php endforeach; } else{?>
                        <td>                                                                
                        <div class="p-2">
                          <div
                            class="card  text-center"
                            style="width: 13rem; height: 29.6rem"
                          >
                            <div class="card-body d-flex align-content-center flex-wrap">
                              <a href="" class="btn border border-0 stretched-link">
                                  <h3>Produk Kosong</h3>
                                <i class="fa-solid fa-angles-right"></i>
                              </a>                               
                            </div>
                          </div>
                        </div>
                      </td>
                      <?php }?>
                      <td>                                                                
                        <div class="p-2">
                          <div
                            class="card hover-effect text-center"
                            style="width: 13rem; height: 29.6rem"
                          >
                            <div class="card-body d-flex align-content-center flex-wrap">
                              <a href="setID.php?key=sayur&goto=products" class="btn border border-0 stretched-link">
                                <h3>Lihat semua</h3>
                                <i class="fa-solid fa-angles-right"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <hr />
      <div id="scrollspyBuah" class="text-white">Buah</div>
      <div class="bg-body-tertiary">
        <div class="container">
          <div class="row p-2 bg-body-tertiary my-5 gx-3">
            <div class="buah-row col-3 row align-items-center text-center text-light">
              <h2>Buah Segar</h2>
            </div>
            <div class="col-9 bg-body-tertiary">
              <div class="table-responsive">
                <table class="table-borderless">
                  <tbody>
                    <tr>
                    <?php if($buah != 'kosong'){foreach ($buah as $rowd): ?>
                      <td>
                        <div class="p-2">
                          <div
                          
                            class="card hover-effect"
                            style="width: 13rem; height: 29.6rem"
                          >
                            <img
                              src="view.php?id_gambar=<?php echo $rowd['gambar_id']; ?>"
                              class="card-img-top object-fit-cover"
                              height="180"
                              alt="..."
                            />
                            <div class="card-body">
                              <a
                                href="setID.php?key=<?= $rowd['produk_id']; ?>&goto=product"
                                class="link-dark link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover"
                              >
                                <p class="card-text">
                                  <?php echo mb_strimwidth($rowd['produk_name'], 0, 58, "...") ?>
                                </p>
                              </a>
                              <p class="card-text text-secondary">
                                <?php echo mb_strimwidth("{$rowd['produk_var1']},{$rowd['produk_var2']}", 0, 23, "...") ?>
                              </p>
                            </div>
                            <div class="card-footer bg-white border border-0">
                              <p class="fw-semibold fs-4">
                                <?php echo "Rp" . number_format($rowd['produk_var1pc'], 0, "", "."); ?>
                              </p>
                            </div>
                            <div class="card-footer bg-white border text-center border-0">
                              <a
                                href="setID.php?key=<?= $rowd['produk_id']; ?>&goto=product"
                                class="btn btn-success fw-semibold w-100 rounded-1"
                                >Beli Sekarang</a>
                            </div>
                          </div>
                        </div>
                      </td>
                      <?php endforeach; } else{?>
                        <td>                                                                
                        <div class="p-2">
                          <div
                            class="card  text-center"
                            style="width: 13rem; height: 29.6rem"
                          >
                            <div class="card-body d-flex align-content-center flex-wrap">
                              <a href="" class="btn border border-0 stretched-link">
                                  <h3>Produk Kosong</h3>
                                <i class="fa-solid fa-angles-right"></i>
                              </a>                               
                            </div>
                          </div>
                        </div>
                      </td>
                      <?php }?>                                                                                        
                      <td>
                        <div class="p-2">
                          <div
                            class="card hover-effect text-center"
                            style="width: 13rem; height: 29.6rem"
                          >
                            <div class="card-body d-flex align-content-center flex-wrap">
                              <a href="setID.php?key=buah&goto=products" class="btn border border-0 stretched-link">
                                <h3>Lihat semua</h3>
                                <i class="fa-solid fa-angles-right"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <hr />
      <div id="scrollspySembako" class="text-white">Sembako</div>
      <div class="bg-body-tertiary">
        <div class="container">
          <div class="row p-2 bg-body-tertiary my-5 gx-3">
            <div class="sembako-row col-3 row align-items-center text-center text-light">
              <h2>Sembako</h2>
            </div>
            <div class="col-9 bg-body-tertiary">
              <div class="table-responsive">
                <table class="table-borderless">
                  <tbody>
                    <tr>
                    <?php if($sembako != 'kosong'){foreach ($sembako as $rowd): ?>
                      <td>
                        <div class="p-2">
                          <div
                          
                            class="card hover-effect"
                            style="width: 13rem; height: 29.6rem"
                          >
                            <img
                              src="view.php?id_gambar=<?php echo $rowd['gambar_id']; ?>"
                              class="card-img-top object-fit-cover"
                              height="180"
                              alt="..."
                            />
                            <div class="card-body">
                              <a
                                href="setID.php?key=<?= $rowd['produk_id']; ?>&goto=product"
                                class="link-dark link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover"
                              >
                                <p class="card-text">
                                  <?php echo mb_strimwidth($rowd['produk_name'], 0, 58, "...") ?>
                                </p>
                              </a>
                              <p class="card-text text-secondary">
                                <?php echo mb_strimwidth("{$rowd['produk_var1']},{$rowd['produk_var2']}", 0, 23, "...") ?>
                              </p>
                            </div>
                            <div class="card-footer bg-white border border-0">
                              <p class="fw-semibold fs-4">
                                <?php echo "Rp" . number_format($rowd['produk_var1pc'], 0, "", "."); ?>
                              </p>
                            </div>
                            <div class="card-footer bg-white border text-center border-0">
                              <a
                                href="setID.php?key=<?= $rowd['produk_id']; ?>&goto=product"
                                class="btn btn-success fw-semibold w-100 rounded-1"
                                >Beli Sekarang</a>
                            </div>
                          </div>
                        </div>
                      </td>
                      <?php endforeach; } else{?>
                        <td>                                                                
                        <div class="p-2">
                          <div
                            class="card  text-center"
                            style="width: 13rem; height: 29.6rem"
                          >
                            <div class="card-body d-flex align-content-center flex-wrap">
                              <a href="" class="btn border border-0 stretched-link">
                                  <h3>Produk Kosong</h3>
                                <i class="fa-solid fa-angles-right"></i>
                              </a>                               
                            </div>
                          </div>
                        </div>
                      </td>
                      <?php }?>                                                                                        
                      <td>
                        <div class="p-2">
                          <div
                            class="card hover-effect text-center"
                            style="width: 13rem; height: 29.6rem"
                          >
                            <div class="card-body d-flex align-content-center flex-wrap">
                              <a href="setID.php?key=sembako&goto=products" class="btn border border-0 stretched-link">
                                <h3>Lihat semua</h3>
                                <i class="fa-solid fa-angles-right"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <div class="mt-4 text-dark rounded container">
        <h1>Rekomendasi Hari Ini</h1>
        <div class="row row-cols-md-5 g-4 mb-3">
        <?php if($prdd != 'kosong'){foreach ($prdd as $rowd): ?> 
          <div class="col">
            <div class="card hover-effect h-100 w-100">
              <img
                src="view.php?id_gambar=<?php echo $rowd['gambar_id']; ?>"
                class="card-img-top object-fit-cover"
                height="180"
                alt="..."
              />
              <div class="card-body">
                <a
                  href="setID.php?key=<?= $rowd['produk_id']; ?>&goto=product"
                  class="link-dark link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover"
                >
                  <p class="card-text">
                    <?php echo mb_strimwidth($rowd['produk_name'], 0, 58, "...") ?>
                  </p>
                </a>
                <p class="card-text text-secondary">
                  <?php echo mb_strimwidth("{$rowd['produk_var1']},{$rowd['produk_var2']}", 0, 23, "...") ?>
                </p>
              </div>
              <div class="card-footer bg-white border border-0">
                <p class="fw-semibold fs-4">
                  <?php echo "Rp" . number_format($rowd['produk_var1pc'], 0, "", "."); ?>
                </p>
              </div>
              <div class="card-footer bg-white border text-center border-0">
                <a href="setID.php?key=<?= $rowd['produk_id']; ?>&goto=product" class="btn btn-success fw-semibold w-100 rounded-1"
                  >Beli Sekarang</a>
              </div>
            </div>
          </div>                   
          <?php endforeach; } else{?>
            <div class="col">
              <div class="card hover-effect h-100  w-100">                
                <div class="card-body ">                 
                  <p class="card-text fs-1 text-center fwsemibold">
                    Sedang Kosong
                  </p>                  
                  
                </div>                                
              </div>
            </div>
          <?php }?>                                                      
          <div class="col">
            <div class="card hover-effect h-100 w-100">              
              <div class="card-body d-flex align-content-center flex-wrap">
                <a
                  href="products.php"
                  class="btn border border-0 stretched-link"
                >
                  <h3>Lihat semua</h3>
                  <i class="fa-solid fa-angles-right"></i>
                </a>                
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      
      function logout(){
        Swal.fire({
          title: 'Yakin Ingin Logout?',          
          icon: 'warning',
          showDenyButton: true,
          confirmButtonColor: '#198754',          
          confirmButtonText: 'Ya',
          denyButtonText: `Tidak`,                                   
        }).then((result) => {
          if (result.isConfirmed) {            
            window.location.href = 'logout.php';
          } else if (result.isDenied) {
            Swal.fire({
              title:'Batal',
              icon: 'info',
              timer: 1000,
              showConfirmButton: false
            })
          }
        })
      };
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
