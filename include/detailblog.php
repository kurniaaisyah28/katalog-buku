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
            if (isset($_GET['data'])) {
              $id_blog = $_GET['data'];
              $sql_b = "SELECT `b`.`id_blog`,`k`.`kategori_blog`,`u`.`nama`,`b`.`tanggal`, `b`.`judul`,`b`.`isi` FROM `blog` `b` INNER JOIN `kategori_blog` `k` ON `b`.`id_kategori_blog` = `k`.`id_kategori_blog` INNER JOIN `user` `u` ON `b`.`id_user` = `u`.`id_user`  WHERE `b`.`id_blog`='$id_blog'";
              //echo $sql_b;
              $query_b = mysqli_query($koneksi, $sql_b);
              while ($data_k = mysqli_fetch_row($query_b)) {
                $id_blog = $data_k[0];
                $kategori = $data_k[1];
                $judul = $data_k[4];
                $nama = $data_k[2];
                $isi = $data_k[5];
                $tanggal = $data_k[3];
              }
            }
            ?>
            <div class="blog-post">
              <h2 class="blog-post-title"><?php echo $judul; ?></h2>
              <p class="blog-post-meta"><?php echo $tanggal; ?>&nbsp;<a href="#"><?php echo $nama; ?></a></p>
              <hr>
              <p>
                <?php echo $isi; ?>
              </p>
            </div><br><br><!-- /.blog-post -->



          </div><!-- /.blog-main -->

          <aside class="col-md-3 blog-sidebar">

            <div class="pl-4 pb-4">
              <h4 class="font-italic">Kategori</h4>
              <ol class="list-unstyled mb-0">
                <?php
                $sql_k = "SELECT `id_kategori_blog`, `kategori_blog` FROM `kategori_blog` ORDER BY `kategori_blog`";
                $query_k = mysqli_query($koneksi, $sql_k);
                while ($data_k = mysqli_fetch_row($query_k)) {
                  $id_kat = $data_k[0];
                  $nama_kat = $data_k[1];
                ?>
                  <li><a href="daftar-blog-kategori-data-<?php echo $id_kat; ?>">
                      <?php echo $nama_kat; ?></a></li>
                <?php } ?>
              </ol>
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
                    <li><a href="daftar-blog-archive-data-<?php echo $tanggal; ?>"><?php echo $tanggal; ?></a></li>
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