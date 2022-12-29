<?php include("koneksi/koneksi.php");
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  if ($include == "konfirmasicpbox") {
    include("include/konfirmasicpbox.php");
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <?php include("includes/head.php"); ?>
</head>

<body>
  <?php include("includes/navigasi.php"); ?>

  <?php
  //pemanggilan konten halaman index
  if (isset($_GET["include"])) {
    $include = $_GET["include"];
    //buku
    if ($include == "detail-buku") {
      include("include/detailbuku.php");
    } else if ($include == "daftar-buku-kategori") {
      include("include/daftarbuku.php");
    } else if ($include == "daftar-buku-tag") {
      include("include/daftarbuku.php");
    } else if ($include == "daftar-search-buku") {
      include("include/daftarbuku.php");

      //blog
    } else if ($include == "detail-blog") {
      include("include/detailblog.php");
      // } else if ($include == "daftar-blog-kategori") {
      //   include("include/detailblog.php");

      //blog
    } else if ($include == "detail-blog") {
      include("include/detailblog.php");
    } else if ($include == "daftar-blog-kategori") {
      include("include/daftarblog.php");
    } else if ($include == "daftar-blog-archive") {
      include("include/archive.php");

      //kategori
    } else if ($include == "kategori") {
      include("include/kategori.php");

      // us
    } else if ($include == "contact-us") {
      include("include/contactus.php");
    } else if ($include == "contact-us") {
      include("include/contactus.php");
    } else if ($include == "about-us") {
      include("include/aboutus.php");

      //blog
    } else if ($include == "blog") {
      include("include/blog.php");
    } else {
      include("include/index.php");
    }
  } else {
    include("include/index.php");
  }
  ?>

  <?php include("includes/footer.php"); ?>

  <!-- Optional JavaScript; choose one of the two! -->
  <?php include("includes/script.php"); ?>
</body>

</html>