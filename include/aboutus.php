  <body>
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">ABOUT US</h1>
      </div>
    </section><br><br>
    <section id="blog-list">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9 blog-main">
            <?php
            $sql_bl = "SELECT `id_konten`,`judul`, `isi`, `tanggal` FROM `konten` WHERE `id_konten`='1'";
            $query_bl = mysqli_query($koneksi, $sql_bl);
            while ($data_bl = mysqli_fetch_row($query_bl)) {
              $id_konten = $data_bl[0];
              $judul = $data_bl[1];
              $isi = $data_bl[2];
              $tanggal = $data_bl[3];
            ?>
              <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $judul; ?></h2>
                <p class="blog-post-meta"><?php echo $tanggal; ?> by <a href="#">User</a></p>

                <p><?php echo $isi; ?></p>
              </div><br><br><!-- /.blog-post -->
            <?php } ?>
          </div><!-- /.blog-main -->

          <aside class="col-md-3 blog-sidebar">

            <div class="p-4">
              <h4 class="font-italic">Social Media</h4>
              <ol class="list-unstyled">
                <li><a href="https://github.com/" target="_blank">GitHub</a></li>
                <li><a href="https://twitter.com/" target="_blank">Twitter</a></li>
                <li><a href="https://www.facebook.com/" target="_blank">Facebook</a></li>
                <li><a href="https://www.instagram.com/" target="_blank">Instagram</a></li>
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