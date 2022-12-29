<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_cp = $_GET['data'];
        //hapus contact box
        $sql_dh = "delete from `contactus` where `id_cp` = '$id_cp'";
        mysqli_query($koneksi, $sql_dh);
    }
}
if (isset($_POST["katakunci"])) {
    $katakunci_kategori = $_POST["katakunci"];
    $_SESSION['katakunci_kategori'] = $katakunci_kategori;
}
if (isset($_SESSION['katakunci_kategori'])) {
    $katakunci_kategori = $_SESSION['katakunci_kategori'];
}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fab fa-blogger"></i> Contact Box</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"> Contact Box</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Contact Box</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-12">
                <form method="post" action="index.php?include=contact-us&aksi=cari">
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
            <div class="col-sm-12">
                <?php if (!empty($_GET['notif'])) { ?>
                    <?php if ($_GET['notif'] == "tambahberhasil") { ?>
                        <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                    <?php } else if ($_GET['notif'] == "editberhasil") { ?>
                        <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                    <?php } else if ($_GET['aksi'] == "hapusberhasil") { ?>
                        <div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>
                    <?php } ?>
                <?php } ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">Nama Pengirim</th>
                            <th width="20%">Email Pengirim</th>
                            <th width="35%">Isi</th>
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
                        //menampilkan data buku
                        $sql_g = "SELECT `id_cp`, `nama_cp`, `email_cp`, `pesan_cp` FROM `contactus`";
                        if (!empty($katakunci_kategori)) {
                            $sql_g .= " where `nama_cp` LIKE '%$katakunci_kategori%' ";
                        }
                        $sql_g .= "ORDER BY `id_cp` LIMIT $posisi, $batas";
                        $query_g = mysqli_query($koneksi, $sql_g);
                        $no = $posisi + 1;
                        while ($data_g = mysqli_fetch_row($query_g)) {
                            $id_cp = $data_g[0];
                            $nama_cp = $data_g[1];
                            $email_cp = $data_g[2];
                            $pesan_cp = $data_g[3];
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $nama_cp; ?></td>
                                <td><?php echo $email_cp; ?></td>
                                <td><?php echo $pesan_cp; ?></td>
                                <td align="center">
                                    <a href="javascript:if(confirm('Anda yakin ingin menghapus pesan dari <?php echo $nama_cp; ?>?')) window.location.href ='index.php?include=contact-us&aksi=hapus&data=<?php echo $id_cp; ?>¬if=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></a>
                                </td>
                            </tr>

                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <!--pagination-->
            <?php
            //hitung jumlah semua data
            $sql_jum = "select `id_cp` from `contactus` ";
            if (!empty($katakunci_kategori)) {
                $sql_jum .= " where `nama_cp` LIKE '%$katakunci_kategori%'";
            }
            $sql_jum .= " order by `nama_cp`";
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
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=contact-us&halaman=1'>First</a></li>";
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=contact-us&halaman=$sebelum'>«</a></li>";
                        }
                        for ($i = 1; $i <= $jum_halaman; $i++) {
                            if ($i > $halaman - 5 and $i < $halaman + 5) {
                                if ($i != $halaman) {
                                    echo "<li class='page-item'><a class='page-link' href='index.php?include=contact-us&halaman=$i'>$i</a></li>";
                                } else {
                                    echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                                }
                            }
                        }
                        if ($halaman != $jum_halaman) {
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=contact-us&halaman=$setelah'>»</a></li>";
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=contact-us&halaman=$jum_halaman'>Last</a></li>";
                        }
                    } ?>
                </ul>
            </div>
        </div>
        <!-- /.card -->

</section>
<!-- /.content -->