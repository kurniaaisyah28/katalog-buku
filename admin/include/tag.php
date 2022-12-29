<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_tag = $_GET['data'];
    //hapus tag
    $sql_dh = "delete from `tag` 
		where `id_tag` = '$id_tag'";
    mysqli_query($koneksi, $sql_dh);
  }
}
if (isset($_GET['aksi']) && (isset($_POST['katakunci']))) {
  if ($_GET['aksi'] = 'cari' && !empty($_POST['katakunci'])) {
    $_SESSION['katakunci'] = $_POST['katakunci'];
    $kata_kunci = $_SESSION['katakunci'];
  }
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-tag"></i> Tag</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"> Tag</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Tag</h3>
      <div class="card-tools">
        <a href="index.php?include=tambahtag.php" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah Tag</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="col-md-12">
        <form action="index.php?include=tag" method="POST">
          <div class="row">
            <div class="col-md-4 bottom-10">
              <input type="text" class="form-control" id="kata_kunci" name="katakunci">
            </div>
            <div class="col-md-5 bottom-10">
              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Search</button>
            </div>
          </div><!-- .row -->
        </form>
      </div><br>
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
            <th width="80%">Tag</th>
            <th width="15%">
              <center>Aksi</center>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1.</td>
            <td>PHP</td>
            <td align="center">
              <a href="edittag.php" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
              <a href="#" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Hapus</a>
            </td>
          </tr>
          <tr>
            <td>2.</td>
            <td>MySQL</td>
            <td align="center">
              <a href="edittag.php" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
              <a href="#" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Hapus</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item"><a class="page-link" href="#"></a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#"></a></li>
      </ul>
    </div>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->