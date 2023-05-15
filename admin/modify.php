<?php
session_start();
require 'function.php';

// https://www.youtube.com/watch?v=-TtwaG60VPk&t=545s


$cat = query("SELECT * FROM kat_artikel");

function phpalert($msg)
{
  echo "        
  <script>    
  Swal.fire({
    title: 'Berhasil Tambah!',          
    icon: 'success',
    test: '$msg',
    timer: 1800 ,
    showConfirmButton: false
  }).then((result) => {
    window.location.href = 'index.php';
        })                              
    </script>
    ";
  }
function err($msg){
  echo "        
  <script>    
      Swal.fire({
        title: 'Gagal!',          
        icon: 'error',
        text: '$msg',
        timer: 1800 ,
        showConfirmButton: false
      }).then((result) => {
        window.location.href = 'index.php';          
      })                              
  </script>
  ";

}

?>
<!doctype html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,700,0,0" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>input data toko</title>
  </head>
  
  <body>
    <nav class="navbar navbar-expand-lg sticky-top shadow-sm" style="background-color: #b0e6aa;">
      <a style="margin: 1% 2% 1% 4%;" class="kembali-add" href="index.php">Kembali</a>
    </nav>
    
    <form method="post" class="p-5" enctype="multipart/form-data">
      
      <!-- bagian judul artikel -->
      <p id="deskripsi-tambah">Judul Artikel</p>
      <input type="text" required name="judul"><br>
      
      <!-- bagian kategori -->
      <p id="deskripsi-tambah">Nama Kategori</p>
      <select name="art_kat" id="art_kat">
      <?php foreach ($cat as $row) : ?>
        <option value="<?= $row["katA_id"]; ?>"><?= $row["katA_name"]; ?></option>
        <?php endforeach; ?>
      </select><br>
      
      <!-- ini buat bagian tanggal -->
      <p id="deskripsi-tambah">Tanggal Dibuat</p>
      <input type="date" required name="art_tanggal"><br>
      
      <!-- ini buat bagian deskripsi -->
      <p id="deskripsi-tambah">Isi Konten</p>
      <textarea name="art_desc" required id="art_desc" cols="30" rows="10"></textarea><br>
      
      <!-- ini buat masukkan gambar -->
      <p id="deskripsi-tambah">Foto Produk</p>
      <input type="file" name="art_image" accept=".jpg,.gif,.png,.jpeg" required>
      
      <br><input type="submit" name="submit">
    </form>
    <script src="https://cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>
    <script>
      CKEDITOR.replace('art_desc');
    </script>
    <?php
      if (isset($_POST['submit'])) {
        if(ubah($_FILES['art_image'], $_POST)== 1){
          phpalert("Berhasil mengubah artikel");
        }elseif(ubah($_FILES['art_image'], $_POST)== 'gambar'){
          err("Ukuran gambar terlalu besar max = 64kb");
        }
      }
    ?>
</body>

</html>