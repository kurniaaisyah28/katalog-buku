<?php
session_start();
include("../koneksi/koneksi.php");
if (isset($_GET["include"])) {
  $include = $_GET["include"];

  //login-signout
  if ($include == "konfirmasi-login") {
    include("include/konfirmasilogin.php");
  } else if ($include == "signout") {
    include("include/signout.php");

    //kategori buku
  } else if ($include == "konfirmasi-tambah-kategori-buku") {
    include("include/konfirmasitambahkategoribuku.php");
  } else if ($include == "konfirmasi-edit-kategori-buku") {
    include("include/konfirmasieditkategoribuku.php");

    //kategori blog
  } else if ($include == "konfirmasi-tambah-kategori-blog") {
    include("include/konfirmasitambahkategoriblog.php");
  } else if ($include == "konfirmasi-edit-kategori-blog") {
    include("include/konfirmasieditkategoriblog.php");

    //profil
  } else if ($include == "konfirmasi-edit-profil") {
    include("include/konfirmasieditprofil.php");

    //tag
  } else if ($include == "konfirmasi-tambah-tag") {
    include("include/konfirmasitambahtag.php");
  } else if ($include == "konfirmasi-edit-tag") {
    include("include/konfirmasiedittag.php");

    //penerbit
  } else if ($include == "konfirmasi-tambah-penerbit") {
    include("include/konfirmasitambahpenerbit.php");
  } else if ($include == "konfirmasi-edit-penerbit") {
    include("include/konfirmasieditpenerbit.php");

    //konten
  } else if ($include == "konfirmasi-edit-konten") {
    include("include/konfirmasieditkonten.php");

    //buku
  } else if ($include == "konfirmasi-tambah-buku") {
    include("include/konfirmasitambahbuku.php");
  } else if ($include == "konfirmasi-edit-buku") {
    include("include/konfirmasieditbuku.php");

    //blog
  } else if ($include == "konfirmasi-tambah-blog") {
    include("include/konfirmasitambahblog.php");
  } else if ($include == "konfirmasi-edit-blog") {
    include("include/konfirmasieditblog.php");

    //user
  } else if ($include == "konfirmasi-tambah-user") {
    include("include/konfirmasitambahuser.php");
  } else if ($include == "konfirmasi-edit-user") {
    include("include/konfirmasiedituser.php");
  }
}
?>


<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head.php") ?>
</head>
<?php
//cek ada get include
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  //cek apakah ada session id admin
  if (isset($_SESSION['id_user'])) {
?>

    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php
          //kategori buku
          if ($include == "kategori-buku") {
            include("include/kategoribuku.php");
          } else if ($include == "tambah-kategori-buku") {
            include("include/tambahkategoribuku.php");
          } else if ($include == "edit-kategori-buku") {
            include("include/editkategoribuku.php");
          } else if ($include == "konfirmasi-edit-kategori-buku") {
            include("include/konfirmasieditkategoribuku.php");

            //tag
          } else if ($include == "tag") {
            include("include/tag2.php");
          } else if ($include == "tambah-tag") {
            include("include/tambahtag.php");
          } else if ($include == "edit-tag") {
            include("include/edittag.php");
          } else if ($include == "konfirmasi-edit-tag") {
            include("include/konfirmasiedittag.php");

            //penerbit
          } else if ($include == "penerbit") {
            include("include/penerbit.php");
          } else if ($include == "tambah-penerbit") {
            include("include/tambahpenerbit.php");
          } else if ($include == "edit-penerbit") {
            include("include/editpenerbit.php");
          } else if ($include == "konfirmasi-edit-penerbit") {
            include("include/konfirmasieditpenerbit.php");

            //buku
          } else if ($include == "buku") {
            include("include/buku.php");
          } else if ($include == "tambah-buku") {
            include("include/tambahbuku.php");
          } else if ($include == "edit-buku") {
            include("include/editbuku.php");
          } else if ($include == "detail-buku") {
            include("include/detailbuku.php");
          } else if ($include == "konfirmasi-edit-buku") {
            include("include/konfirmasieditbuku.php");

            //kategori blog
          } else if ($include == "kategori-blog") {
            include("include/kategoriblog.php");
          } else if ($include == "tambah-kategori-blog") {
            include("include/tambahkategoriblog.php");
          } else if ($include == "edit-kategori-blog") {
            include("include/editkategoriblog.php");
          } else if ($include == "konfirmasi-edit-kategori-blog") {
            include("include/konfirmasieditkategoriblog.php");

            //blog
          } else if ($include == "blog") {
            include("include/blog.php");
          } else if ($include == "tambah-blog") {
            include("include/tambahblog.php");
          } else if ($include == "edit-blog") {
            include("include/editblog.php");
          } else if ($include == "detail-blog") {
            include("include/detailblog.php");

            //profil
          } else if ($include == "profil") {
            include("include/profil.php");
          } else if ($include == "edit-profil") {
            include("include/editprofil.php");
          } else if ($include == "konfimasi-edit-profil") {
            include("include/konfirmasieditprofil.php");

            //konten
          } else if ($include == "konten") {
            include("include/konten.php");
          } else if ($include == "edit-konten") {
            include("include/editkonten.php");
          } else if ($include == "detail-konten") {
            include("include/detailkonten.php");
          } else if ($include == "konfirmasi-edit-konten") {
            include("include/konfirmasieditkonten.php");

            //ubah password
          } else if ($include == "ubah-password") {
            include("include/ubahpassword.php");

            //user
          } else if ($include == "user") {
            include("include/user.php");
          } else if ($include == "tambah-user") {
            include("include/tambahuser.php");
          } else if ($include == "detail-user") {
            include("include/detailuser.php");
          } else if ($include == "edit-user") {
            include("include/edituser.php");
          } else if ($include == "contact-us") {
            include("include/contactus.php");
          }

          ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
  <?php
  } else {
    //pemanggilan halaman form login
    include("include/login.php");
  }
} else {
  if (isset($_SESSION['id_user'])) {
    //pemanggilan ke halaman-halaman profil jika ada session
  ?>

    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php
          //pemanggilan profil
          include("include/profil.php");
          ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
<?php
  } else {
    //pemanggilan halaman form login
    include("include/login.php");
  }
}
?>


</html>