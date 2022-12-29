<section id="blog-header">
    <div class="container">
        <h1 class="text-white">BLOG</h1>
    </div>
</section><br><br>

<section id="katalog-item">
    <main role="main" class="container">
        <?php
        include('include/fungsi.php');
        if (isset($_GET['include'])) {
            $include = $_GET['include'];
            if (isset($_GET['data'])) {
                $data = $_GET['data'];
                if ($include == 'daftar-blog-kategori') {
                    $sql = "SELECT kategori_blog FROM kategori_blog WHERE id_kategori_blog = $data";
                }
                $query = mysqli_query($koneksi, $sql);
                while ($data_b = mysqli_fetch_row($query)) {
                    $nama = $data_b[0];
                }
            }
        }
        ?>
        <h2 class="text-secondary">
            <?php if ($include == 'daftar-blog-arsip') {
                echo "Archives : ", $nama;
            } else {
                echo "Categories ";
            }
            ?>:<?php echo $nama; ?></h2><br><br>
        <div class="row">
            <div class="col-md-9 blog-main">
                <?php
                if (isset($_GET['include'])) {
                    $include = $_GET['include'];
                    if (isset($_GET['data'])) {
                        $data = $_GET['data'];
                        if ($include == 'daftar-blog-archive') {
                            $ex = explode("-", $data);
                            $bulan = $ex[0];
                            $tahun = $ex[1];
                            $sql = "SELECT DATE_FORMAT(`tanggal`,'%c-%Y') as `tgl` FROM `blog` WHERE MONTH(`tanggal`) = $bulan AND YEAR(`tanggal`) = $tahun";
                        }
                        $query = mysqli_query($koneksi, $sql);
                        while ($data_b = mysqli_fetch_row($query)) {
                            $nama = $data_b[0];
                        }
                    }
                ?>
                <?php } ?>
                <div class="row">
                    <?php
                    $include = $_GET['include'];
                    $data = $_GET['data'];
                    if ($include == 'daftar-blog-kategori') {
                        include('kategori_blog.php');
                    } else {
                        include('archive.php');
                    }
                    ?>
                </div><!-- .row-->
            </div><!-- /.katalog-main -->

            <aside class="col-md-3 katalog-sidebar">
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
                        $sql = "SELECT DATE_FORMAT(`tanggal`,'%c-%Y') as `tgl` FROM `blog` GROUP BY `tgl` ";
                        $query = mysqli_query($koneksi, $sql);
                        while ($data =  mysqli_fetch_row($query)) {
                            $tanggal = $data[0];
                        ?>
                            <li><a href="index.php?include=daftar-blog-archive&data=<?php echo $tanggal; ?>"><?php echo $tanggal; ?></a></li>
                        <?php } ?>
                    </ol>
                </div>
            </aside> <!-- /.katalog-sidebar -->

        </div><!-- /.row -->
    </main><!-- /.container -->
</section><br><br>