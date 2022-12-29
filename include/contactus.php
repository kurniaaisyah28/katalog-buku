  <body>
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">CONTACT US</h1>
      </div>
    </section><br><br>
    <section id="blog-list">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="col-sm-12">
              <?php if (!empty($_GET['notif'])) { ?>
                <?php if ($_GET['notif'] == "tambahberhasil") { ?>
                  <div class="alert alert-success" role="alert">Data Berhasil Dikirim</div>
              <?php }
              } ?>
            </div>
            <form class="form-horizontal" method="post" action="index.php?include=konfirmasicpbox">
              <fieldset>
                <legend>Form Contact Us</legend><br>
                <div class="form-group row">
                  <label for="nama_cp" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_cp" id="nama_cp" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email_cp" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email_cp" id="email_cp" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pesan_cp" class="col-sm-2 col-form-label">Pesan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="7" name="pesan_cp" id="pesan_cp" value=""></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-info float-left"><i class="fas fa-plus"></i> Kirim</button>
                  </div>
                </div>
              </fieldset>
            </form>
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
          </aside> <!-- /.blog-sidebar -->
        </div><!-- /.row -->

      </main><!-- /.container -->
    </section><br><br>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="dist/js/bootstrap.bundle.min.js"></script>
  </body>