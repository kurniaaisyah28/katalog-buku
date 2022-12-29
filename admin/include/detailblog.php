<?php
if (isset($_GET['data'])) {
  $id_blog = $_GET['data'];
  //gat data buku
  $sql = "SELECT `g`.`tanggal`, `o`.`kategori_blog`,`g`.`judul`,`k`.`nama`, `g`.`isi` FROM `blog` `g`
        INNER JOIN `kategori_blog` `o` ON `o`.`id_kategori_blog`=`o`.`id_kategori_blog`  
        INNER JOIN `user` `k` ON `k`.`id_user`= `k`.`id_user`
        WHERE `g`.`id_blog`='$id_blog'";
  $query = mysqli_query($koneksi, $sql);
  while ($data = mysqli_fetch_row($query)) {
    $tanggal = $data[0];
    $kategori_blog = $data[1];
    $judul = $data[2];
    $nama = $data[3];
    $isi = $data[4];
  }
}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-user-tie"></i> Detail Data Blog</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="index.php?include=blog">Data Blog</a></li>
          <li class="breadcrumb-item active">Detail Data Blog</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="card-tools">
        <a href="index.php?include=blog" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="20%"><strong>Tanggal<strong></td>
            <td width="80%"><?php echo $tanggal; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Kategori Blog<strong></td>
            <td width="80%"><?php echo $kategori_blog; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Judul<strong></td>
            <td width="80%"><?php echo $judul; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Penulis<strong></td>
            <td width="80%"><?php echo $nama; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Isi<strong></td>
            <td width="80%"><?php echo $isi; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix"></div>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->