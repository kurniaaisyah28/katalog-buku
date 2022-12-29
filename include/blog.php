<?php
if (isset($_POST["katakunci"])) {
  $katakunci_kategori = $_POST["katakunci"];
  $_SESSION['katakunci_kategori'] = $katakunci_kategori;
}
if (isset($_SESSION['katakunci_kategori'])) {
  $katakunci_kategori = $_SESSION['katakunci_kategori'];
}
?>

<body>
  <section id="blog-header">
    <div class="container">
      <h1 class="text-white">BLOG</h1>
    </div>
  </section><br><br>
  <section id="blog-list">
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-9 blog-main">
          <?php
          $batas = 4;
          if (!isset($_GET['halaman'])) {
            $posisi = 0;
            $halaman = 1;
          } else {
            $halaman = $_GET['halaman'];
            $posisi = ($halaman - 1) * $batas;
          }
          $sql_bl = "SELECT `b`.`id_blog`,`b`.`judul`, DATE_FORMAT(`b`.`tanggal`, '%M %d, %Y'),`u`.`nama`, `b`.`isi` FROM `blog` `b` INNER JOIN `user` `u` ON `b`.`id_user`=`u`.`id_user`";
          if (!empty($katakunci_kategori)) {
            $sql_bl .= " where `judul` LIKE '%$katakunci_kategori%' ";
          }
          $sql_bl .= "ORDER BY `b`.`judul` LIMIT $posisi, $batas";
          $query_bl = mysqli_query($koneksi, $sql_bl);
          while ($data_bl = mysqli_fetch_row($query_bl)) {
            $id_blog = $data_bl[0];
            $judul = $data_bl[1];
            $tanggal = $data_bl[2];
            $penulis = $data_bl[3];
            $isi = $data_bl[4];
          ?>
            <div class="blog-post">
              <h2 class="blog-post-title"><a href="detail-blog-data-<?php echo $id_blog; ?>"><?php echo $judul; ?></a></h2>
              <p class="blog-post-meta"><?php echo $tanggal; ?> by <a href="#"><?php echo $penulis; ?></a></p>

              <p>
                <?php echo $isi; ?>
              </p>
              <a href="index.php?include=detail-blog&data=<?php echo $id_blog; ?>">Continue reading..</a>
            </div><!-- /.blog-post --><br><br>
          <?php } ?>
          <nav class="blog-pagination">
            <?php
            //hitung jumlah semua data
            $sql_jum = "select `id_kategori_buku`, `kategori_buku` from `kategori_buku` ";
            if (!empty($katakunci_kategori)) {
              $sql_jum .= " where `kategori_buku` LIKE '%$katakunci_kategori%'";
            }
            $sql_jum .= " order by `kategori_buku`";
            $query_jum = mysqli_query($koneksi, $sql_jum);
            $jum_data = mysqli_num_rows($query_jum);
            $jum_halaman = ceil($jum_data / $batas);
            ?>
            <div>
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
                    echo "<li class='page-item'><a class='page-link'href='blog-halaman-1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link'href='blog-halaman-$sebelum'>«</a></li>";
                  }
                  for ($i = 1; $i <= $jum_halaman; $i++) {
                    if ($i > $halaman - 5 and $i < $halaman + 5) {
                      if ($i != $halaman) {
                        echo "<li class='page-item'><a class='page-link'href='blog-halaman-$i'>$i</a></li>";
                      } else {
                        echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                      }
                    }
                  }
                  if ($halaman != $jum_halaman) {
                    echo "<li class='page-item'><a class='page-link'href='blog-halaman-$setelah'>»</a></li>";
                    echo "<li class='page-item'><a class='page-link'href='blog-halaman-$jum_halaman'>Last</a></li>";
                  }
                } ?>
              </ul>
            </div>
          </nav>
        </div><!-- /.blog-main -->

        <aside class="col-md-3 blog-sidebar">

          <div class="pl-4 pb-4">
            <h4 class="font-italic">Kategori</h4>
            <ol class="list-unstyled mb-0">
              <?php
              $sql_k = "SELECT `id_kategori_blog`,`kategori_blog` FROM `kategori_blog` ORDER BY `kategori_blog`";
              $query_k = mysqli_query($koneksi, $sql_k);
              while ($data_k = mysqli_fetch_row($query_k)) {
                $id_kat = $data_k[0];
                $nama_kat = $data_k[1];
              ?>
                <li><a href="daftar-blog-kategori-data-<?php echo $id_kat; ?>"><?php echo $nama_kat; ?></a></li>
              <?php } ?>
          </div>

          <div class="p-4">
            <h4 class="font-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
              <?php
              include('include/fungsi.php');
              $sql = "SELECT DATE_FORMAT(`tanggal`,'%c-%Y') as `tgl` FROM `blog` GROUP BY `tgl`";
              $query = mysqli_query($koneksi, $sql);
              while ($data =  mysqli_fetch_row($query)) {
                $tanggal = $data[0];
              ?>
                <li><a href="index.php?include=daftar-blog-archive&data=<?php echo $tanggal; ?>"><?php echo $tanggal; ?></a></li>
              <?php } ?>
            </ol>
          </div>


        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->
    </main><!-- /.container -->
  </section><br><br>
  <!-- Optional JavaScript; choose one of the two! -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="dist/js/bootstrap.bundle.min.js"></script>
</body>