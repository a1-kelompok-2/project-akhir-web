<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
} elseif ($_SESSION["role"] !== 'user') {
  header("Location: ../index.php");
  exit;
}


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
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/bd49e73b8b.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body class="bg-white">
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
            <form class="d-flex">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control bg-white border border-success"
                  placeholder="Aku mau belanja..."
                  aria-label="Recipient's username"
                  aria-describedby="button-addon2"
                />
                <button class="btn btn-outline-success" type="button" id="button-addon2">
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
                  <a class="dropdown-item btn btn-light" href="#"
                    ><i class="fa-solid fa-carrot fa-lg" style="color: #ed9121"></i> Sayur Segar</a
                  >
                </li>
                <li>
                  <a class="dropdown-item btn btn-light" href="#"
                    ><i class="fa-solid fa-apple-whole fa-lg" style="color: #8db600"></i> Buah
                    Segar</a
                  >
                </li>
                <li>
                  <a class="dropdown-item btn btn-light" href="#"
                    ><i class="fa-solid fa-egg fa-lg" style="color: #f4bb29"></i> Sembako</a
                  >
                </li>
              </ul>
            </li>
          </ul>
          <div class="py-2 px-4 ms-auto">
            <a href="" class="link-dark position-relative">
              <i class="fa-sharp fa-solid fa-cart-shopping fa-lg"></i>
              <span
                class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"
              >
                <span class="visually-hidden">New alerts</span>
              </span>
            </a>
          </div>
          <div class="vr"></div>
          <div class="py-2 px-3 d-flex">
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
                  <a class="dropdown-item py-2 btn btn-light" href="logout.php"
                    ><i class="fa-solid fa-clock-rotate-left fa-lg"></i> Histori Transaksi</a
                  >
                </li>
                <li>
                  <a class="dropdown-item py-2 btn btn-light" href="logout.php"
                    ><i class="fa-sharp fa-solid fa-right-from-bracket fa-lg"></i> Logout</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="container mt-3">
        <div class="bg-white p-2 rounded-2 shadow-sm mb-3"> 
          <div class="row justify-content-start">   
            <div class="col-1 ">
              <i class="fa-sharp fa-solid fa-shop fa-2xl ms-4 mt-4" style="color: #666;"></i>
            </div> 
            <div class="col-5">
              <p class="fw-semibold px-1 mb-0" href="">Nama Toko</p>
              <p class="text-body-secondary mb-0"><i class="fa-sharp fa-solid fa-location-dot"></i> nama jalan</p>
              <p class="text-body-secondary"><i class="fa-solid fa-phone fa-sm"></i> 08**********</p>
            </div>
          </div>
        </div>
        <div class="bg-white p-2 rounded-2 shadow-sm"> 
          <form>
            <div class="input-group input-group-sm mb-3 w-75 ps-4">
              <span class="input-group-text rounded-0" id="basic-addon1"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control rounded-0 bg-light" placeholder="Cari di nama toko" aria-label="Username" aria-describedby="basic-addon1">
            </div>
          </form>
          <hr class="border opacity-50">
          <div class="row row-cols-md-5 g-4 mb-3">
            <div class="col">
              <div class="card hover-effect h-100 w-100">
                <img
                  src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/02/raw-potatoes-potato-1296x728-header.jpg?w=1155&h=1528"
                  class="card-img-top object-fit-cover"
                  height="180"
                  alt="..."
                />
                <div class="card-body">
                  <a
                    href=""
                    class="link-dark link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover"
                  >
                    <p class="card-text">
                      <?php echo mb_strimwidth("Some quick example text to build on the card title and make up the bulk of the card's content.", 0, 58, "...") ?>
                    </p>
                  </a>
                  <p class="card-text text-secondary">
                    <?php echo mb_strimwidth("100g, 500g, 1kg", 0, 23, "...") ?>
                  </p>
                </div>
                <div class="card-footer bg-white border border-0">
                  <p class="fw-semibold fs-4">
                    <?php echo "Rp" . number_format("1000000", 0, "", "."); ?>
                  </p>
                </div>
                <div class="card-footer bg-white border text-center border-0">
                  <a href="#" class="btn btn-success fw-semibold w-100 rounded-1"
                    >Tambah ke <i class="fa-sharp fa-solid fa-cart-shopping"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card hover-effect h-100 w-100">
                <img
                  src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/02/raw-potatoes-potato-1296x728-header.jpg?w=1155&h=1528"
                  class="card-img-top object-fit-cover"
                  height="180"
                  alt="..."
                />
                <div class="card-body">
                  <a
                    href=""
                    class="link-dark link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover"
                  >
                    <p class="card-text">
                      <?php echo mb_strimwidth("Some quick example text to build on the card title and make up the bulk of the card's content.", 0, 58, "...") ?>
                    </p>
                  </a>
                  <p class="card-text text-secondary">
                    <?php echo mb_strimwidth("100g, 500g, 1kg", 0, 23, "...") ?>
                  </p>
                </div>
                <div class="card-footer bg-white border border-0">
                  <p class="fw-semibold fs-4">
                    <?php echo "Rp" . number_format("1000000", 0, "", "."); ?>
                  </p>
                </div>
                <div class="card-footer bg-white border text-center border-0">
                  <a href="#" class="btn btn-success fw-semibold w-100 rounded-1"
                    >Tambah ke <i class="fa-sharp fa-solid fa-cart-shopping"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card hover-effect h-100 w-100">
                <img
                  src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/02/raw-potatoes-potato-1296x728-header.jpg?w=1155&h=1528"
                  class="card-img-top object-fit-cover"
                  height="180"
                  alt="..."
                />
                <div class="card-body">
                  <a
                    href=""
                    class="link-dark link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover"
                  >
                    <p class="card-text">
                      <?php echo mb_strimwidth("Some quick example text to build on the card title and make up the bulk of the card's content.", 0, 58, "...") ?>
                    </p>
                  </a>
                  <p class="card-text text-secondary">
                    <?php echo mb_strimwidth("100g, 500g, 1kg", 0, 23, "...") ?>
                  </p>
                </div>
                <div class="card-footer bg-white border border-0">
                  <p class="fw-semibold fs-4">
                    <?php echo "Rp" . number_format("1000000", 0, "", "."); ?>
                  </p>
                </div>
                <div class="card-footer bg-white border text-center border-0">
                  <a href="#" class="btn btn-success fw-semibold w-100 rounded-1"
                    >Tambah ke <i class="fa-sharp fa-solid fa-cart-shopping"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card hover-effect h-100 w-100">
                <img
                  src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/02/raw-potatoes-potato-1296x728-header.jpg?w=1155&h=1528"
                  class="card-img-top object-fit-cover"
                  height="180"
                  alt="..."
                />
                <div class="card-body">
                  <a
                    href=""
                    class="link-dark link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover"
                  >
                    <p class="card-text">
                      <?php echo mb_strimwidth("Some quick example text to build on the card title and make up the bulk of the card's content.", 0, 58, "...") ?>
                    </p>
                  </a>
                  <p class="card-text text-secondary">
                    <?php echo mb_strimwidth("100g, 500g, 1kg", 0, 23, "...") ?>
                  </p>
                </div>
                <div class="card-footer bg-white border border-0">
                  <p class="fw-semibold fs-4">
                    <?php echo "Rp" . number_format("1000000", 0, "", "."); ?>
                  </p>
                </div>
                <div class="card-footer bg-white border text-center border-0">
                  <a href="#" class="btn btn-success fw-semibold w-100 rounded-1"
                    >Tambah ke <i class="fa-sharp fa-solid fa-cart-shopping"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card hover-effect h-100 w-100">
                <img
                  src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/02/raw-potatoes-potato-1296x728-header.jpg?w=1155&h=1528"
                  class="card-img-top object-fit-cover"
                  height="180"
                  alt="..."
                />
                <div class="card-body">
                  <a
                    href=""
                    class="link-dark link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover"
                  >
                    <p class="card-text">
                      <?php echo mb_strimwidth("Some quick example text to build on the card title and make up the bulk of the card's content.", 0, 58, "...") ?>
                    </p>
                  </a>
                  <p class="card-text text-secondary">
                    <?php echo mb_strimwidth("100g, 500g, 1kg", 0, 23, "...") ?>
                  </p>
                </div>
                <div class="card-footer bg-white border border-0">
                  <p class="fw-semibold fs-4">
                    <?php echo "Rp" . number_format("1000000", 0, "", "."); ?>
                  </p>
                </div>
                <div class="card-footer bg-white border text-center border-0">
                  <a href="#" class="btn btn-success fw-semibold w-100 rounded-1"
                    >Tambah ke <i class="fa-sharp fa-solid fa-cart-shopping"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card hover-effect h-100 w-100">
                <img
                  src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/02/raw-potatoes-potato-1296x728-header.jpg?w=1155&h=1528"
                  class="card-img-top object-fit-cover"
                  height="180"
                  alt="..."
                />
                <div class="card-body">
                  <a
                    href=""
                    class="link-dark link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover"
                  >
                    <p class="card-text">
                      <?php echo mb_strimwidth("Some quick example text to build on the card title and make up the bulk of the card's content.", 0, 58, "...") ?>
                    </p>
                  </a>
                  <p class="card-text text-secondary">
                    <?php echo mb_strimwidth("100g, 500g, 1kg", 0, 23, "...") ?>
                  </p>
                </div>
                <div class="card-footer bg-white border border-0">
                  <p class="fw-semibold fs-4">
                    <?php echo "Rp" . number_format("1000000", 0, "", "."); ?>
                  </p>
                </div>
                <div class="card-footer bg-white border text-center border-0">
                  <a href="#" class="btn btn-success fw-semibold w-100 rounded-1"
                    >Tambah ke <i class="fa-sharp fa-solid fa-cart-shopping"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>