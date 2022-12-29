<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_konten = $_GET['data'];
    //hapus data konten
    $sql_dm = "delete from `konten` where `id_konten` = '$id_konten'";
    mysqli_query($koneksi, $sql_dm);
  }
}
if (isset($_POST["katakunci"])) {
  $katakunci_kategori = $_POST["katakunci"];
  $_SESSION['katakunci_kategori'] = $katakunci_kategori;
}
if (isset($_SESSION['katakunci_kategori'])) {
  $katakunci_kategori = $_SESSION['katakunci_kategori'];
} else {
  unset($_SESSION['katakunci_kategori']);
}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-file-alt"></i> Konten</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"> Konten</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Konten</h3>
      <div class="card-tools">
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="col-md-12">
        <form action="index.php?include=konten&aksi=cari" method="post">
          <div class="row">
            <div class="col-md-4 bottom-10">
              <input type="text" class="form-control" id="kata_kunci" name="katakunci">
            </div>
            <div class="col-md-5 bottom-10">
              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
            </div>
          </div><!-- .row -->
        </form>
      </div><br>

      <!--notiffff-->
      <div class="col-sm-12">
        <?php if (!empty($_GET['notif'])) { ?>
          <?php if ($_GET['notif'] == "tambahberhasil") { ?>
            <div class="alert alert-success" role="alert">
              Data Berhasil Ditambahkan</div>
          <?php } else if ($_GET['notif'] == "editberhasil") { ?>
            <div class="alert alert-success" role="alert">
              Data Berhasil Diubah</div>
          <?php } else if ($_GET['notif'] == "hapusberhasil") { ?>
            <div class="alert alert-success" role="alert">
              Data Berhasil Dihapus</div>
          <?php } ?>
        <?php } ?>
      </div>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="50%">Judul</th>
            <th width="30%">Tanggal</th>
            <th width="15%">
              <center>Aksi</center>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $batas = 2;
          if (!isset($_GET['halaman'])) {
            $posisi = 0;
            $halaman = 1;
          } else {
            $halaman = $_GET['halaman'];
            $posisi = ($halaman - 1) * $batas;
          }

          $sql_k = "SELECT `id_konten`, `judul`, `tanggal` FROM `konten` ";
          if (!empty($katakunci_kategori)) {
            $sql_k .= " where `judul` LIKE '%$katakunci_kategori%'";
          }
          $sql_k .= " ORDER BY `judul` limit $posisi, $batas ";
          $query_k = mysqli_query($koneksi, $sql_k);
          $no = $posisi + 1;
          while ($data_k = mysqli_fetch_row($query_k)) {
            $id_konten = $data_k[0];
            $judul = $data_k[1];
            $tanggal = $data_k[2];
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $judul; ?></td>
              <td><?php echo $tanggal; ?></td>
              <td align="center">
                <a href="index.php?include=edit-konten&data=<?php echo $id_konten; ?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a>
                <a href="index.php?include=detail-konten&data=<?php echo $id_konten; ?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
              </td>
            </tr>
          <?php $no++;
          } ?>
        </tbody>
      </table>
    </div>
    <?php
    //hitung jumlah semua data
    $sql_jum = "select `id_konten`, `judul`, `tanggal` from `konten` ";
    if (!empty($katakunci_kategori)) {
      $sql_jum .= " where `judul` LIKE '%$katakunci_kategori%'";
    }
    $sql_jum .= " order by `judul`";
    $query_jum = mysqli_query($koneksi, $sql_jum);
    $jum_data = mysqli_num_rows($query_jum);
    $jum_halaman = ceil($jum_data / $batas);
    ?>
    <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
        <?php
        if ($jum_halaman == 0) {
          //tidak ada halaman
        } else if ($jum_halaman == 1) {
          echo "<li class='page-item'><a class='page-link'>1</a></li>";
        } else {
          $sebelum = $halaman - 1;
          $setelah = $halaman + 1;
          if ($halaman != 1) {
            echo "<li class='page-item'><a class='page-link' href='index.php?include=konten&halaman=1'>First</a></li>";
            echo "<li class='page-item'><a class='page-link' href='index.php?include=konten&halaman=$sebelum'>«</a></li>";
          }
          for ($i = 1; $i <= $jum_halaman; $i++) {
            if ($i > $halaman - 5 and $i < $halaman + 5) {
              if ($i != $halaman) {
                echo "<li class='page-item'><a class='page-link' href='index.php?include=konten&halaman=$i'>$i</a></li>";
              } else {
                echo "<li class='page-item'><a class='page-link'>$i</a></li>";
              }
            }
          }
          if ($halaman != $jum_halaman) {
            echo "<li class='page-item'><a class='page-link' href='index.php?include=konten&halaman=$setelah'>»</a></li>";
            echo "<li class='page-item'><a class='page-link' href='index.php?include=konten&halaman=$jum_halaman'>Last</a></li>";
          }
        } ?>
      </ul>
    </div>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->