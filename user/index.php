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
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <script src="https://kit.fontawesome.com/bd49e73b8b.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
  <div class="top-nav container-fluid p-5 text-center text-success">
    <h1>PasarSegari</h1>
    <h2>Kami menjual yang terbaik untuk Anda</h2>
  </div>
  <nav class="navbar navbar-expand-lg sticky-top bg-white ">
    <div class="container-fluid">
      <div class="py-2 "><a class="navbar-brand fw-light fs-4" href="index.php"><i class="fa-solid fa-leaf fa-xl"
            style="color: #116530"></i>
          PasarSegari</a></div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="py-2 px-3 w-75">
          <form class="d-flex">
            <div class="input-group">
              <input type="text" class="form-control bg-light border border-success" placeholder="Aku mau belanja..."
                aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn btn-outline-success " type="button" id="button-addon2"><i
                  class="bi bi-search"></i></button>
            </div>
          </form>
        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Kategori
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-carrot" style="color: #Ed9121"></i> Sayur
                  Segar</a></li>
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-apple-whole" style="color: #8DB600"></i> Buah
                  Segar</a></li>
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-egg" style="color: #F4BB29"></i> Sembako</a>
              </li>
            </ul>
          </li>
        </ul>
        <div class="py-2 px-3 ms-auto"><a href="" class="link-dark"><i
              class="fa-sharp fa-solid fa-cart-shopping fa-lg"></i></a>
        </div>
        <div class="py-2 px-3"><a href="" class="link-dark"><i class="fa-solid fa-envelope fa-lg"></i></a></div>
        <div class="vr"></div>
        <div class="py-2 px-3"><a href="" class="link-dark"><i class="fa-solid fa-circle-user fa-xl"></i></a></div>
      </div>

    </div>
  </nav>
  <div class="container-fluid">
    <div class="row p-2 bg-white">
      <div class="col-3 row align-items-center text-center ">
        <h2>Sayur Segar</h2>
      </div>
      <div class="col-9 bg-light">
        <div class="table-responsive">
          <table class="table-borderless">
            <tbody>
              <tr>
                <td>
                  <div class="p-2">
                    <div class="card" style="width: 18rem;">
                      <img src="https://th.bing.com/th/id/OIP._jagsHOh56ZtG57Kn95-4QHaHa?pid=ImgDet&rs=1"
                        class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="p-2">
                    <div class="card" style="width: 18rem; height: 29.6rem;">
                      <img
                        src="https://diplomartbrussels.com/wp-content/uploads/2020/09/food-background-images-94-images-in-co-381169-png-images-pngio-food-background-png-1440_619.png"
                        class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="p-2">
                    <div class="card" style="width: 18rem; height: 29.6rem;">
                      <img
                        src="https://thumbs.dreamstime.com/b/angono-rizal-philippines-july-young-filipino-children-play-ride-bicycle-along-street-young-filipino-children-play-ride-185281829.jpg"
                        class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="p-2">
                    <div class="card" style="width: 18rem; height: 29.6rem;">
                      <img
                        src="https://th.bing.com/th/id/R.5302b534d77170e588c41216c5b31a61?rik=8ddLAITkHCX%2btw&riu=http%3a%2f%2fbehindthethrills.com%2fwp-content%2fuploads%2f2016%2f04%2favatar-header-newnew-800x500_c.jpg&ehk=Rk5aj1e%2fvPAsIqCtwTgvlGeivcLHHbqw5PpIWF9Es%2fA%3d&risl=&pid=ImgRaw&r=0"
                        class="card-img-top" height="" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="p-2">
                    <div class="card" style="width: 18rem; height: 29.6rem;">
                      <img
                        src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/02/raw-potatoes-potato-1296x728-header.jpg?w=1155&h=1528"
                        class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </td>


              </tr>
              <!-- <tr>
                <td>

                </td>
              </tr>
              <tr>
                <td>

                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row p-2 bg-white">
      <div class="col-3 row align-items-center text-center ">
        <h2>Sayur Segar</h2>
      </div>
      <div class="col-9 bg-light">
        <div class="table-responsive">
          <table class="table-borderless">
            <tbody>
              <tr>
                <td>
                  <div class="p-2">
                    <div class="card" style="width: 18rem;">
                      <img src="https://th.bing.com/th/id/OIP._jagsHOh56ZtG57Kn95-4QHaHa?pid=ImgDet&rs=1"
                        class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="p-2">
                    <div class="card" style="width: 18rem; height: 29.6rem;">
                      <img
                        src="https://diplomartbrussels.com/wp-content/uploads/2020/09/food-background-images-94-images-in-co-381169-png-images-pngio-food-background-png-1440_619.png"
                        class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="p-2">
                    <div class="card" style="width: 18rem; height: 29.6rem;">
                      <img
                        src="https://thumbs.dreamstime.com/b/angono-rizal-philippines-july-young-filipino-children-play-ride-bicycle-along-street-young-filipino-children-play-ride-185281829.jpg"
                        class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="p-2">
                    <div class="card" style="width: 18rem; height: 29.6rem;">
                      <img
                        src="https://th.bing.com/th/id/R.5302b534d77170e588c41216c5b31a61?rik=8ddLAITkHCX%2btw&riu=http%3a%2f%2fbehindthethrills.com%2fwp-content%2fuploads%2f2016%2f04%2favatar-header-newnew-800x500_c.jpg&ehk=Rk5aj1e%2fvPAsIqCtwTgvlGeivcLHHbqw5PpIWF9Es%2fA%3d&risl=&pid=ImgRaw&r=0"
                        class="card-img-top" height="" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="p-2">
                    <div class="card" style="width: 18rem; height: 29.6rem;">
                      <img
                        src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/02/raw-potatoes-potato-1296x728-header.jpg?w=1155&h=1528"
                        class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                          the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </td>


              </tr>
              <!-- <tr>
                <td>

                </td>
              </tr>
              <tr>
                <td>

                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <a href="logout.php">logout</a>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>