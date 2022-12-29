<?php
include('include/fungsi.php');
?>
<section id="blog-header">
    <div class="container">
        <h1 class="text-white">BLOG</h1>
    </div>
</section><br><br>
<section id="blog-list">
    <main role="main" class="container">
        <?php
        if (isset($_GET['include'])) {
            $include = $_GET['include'];
            if (isset($_GET['data'])) {
                $data = $_GET['data'];
                if ($include == 'daftar-blog-kategori') {
                    $sql = "SELECT kategori_blog FROM kategori_blog WHERE id_kategori_blog = $data";
                } else {
                    $ex = explode("-", $data);
                    $bulan = $ex[0];
                    $tahun = $ex[1];
                    $sql = "SELECT DATE_FORMAT(`tanggal`,'%c-%Y') as `tgl` FROM `blog` WHERE MONTH(`tanggal`) = $bulan AND YEAR(`tanggal`) = $tahun";
                }
                $query = mysqli_query($koneksi, $sql);
                while ($data_c = mysqli_fetch_row($query)) {
                    $nama = $data_c[0];
                }
            }
        }
        ?>

        <h2 class="text-primary">
            <?php if ($include == 'daftar-blog-archive') {
                echo "Archives : ", $nama;
            } else {
                echo "Categories ";
            } ?>
        </h2><br><br>
        <div class="row">
            <div class="col-md-9 archive-main">
                <?php
                $include = $_GET['include'];
                $data = $_GET['data'];
                if ($include == 'daftar-blog-kategori') {
                    include('kategori_blog.php');
                }
                ?>
                <?php
                $sql_bl = "SELECT `b`.`id_blog`,`b`.`judul`, DATE_FORMAT(`b`.`tanggal`, '%M %d, %Y'),`u`.`nama`, `b`.`isi` FROM `blog` `b` INNER JOIN `user` `u` ON `b`.`id_user`=`u`.`id_user` WHERE MONTH(`b`.`tanggal`) = $bulan AND YEAR(`b`.`tanggal`) = $tahun ORDER BY `b`.`judul`";
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
                        <a href="detail-blog-data-<?php echo $id_blog; ?>" class="btn btn-primary">Continue reading..</a>
                    </div><!-- /.blog-post --><br><br>
                <?php } ?>
                <!-- .row-->
            </div><!-- /.katalog-main -->
            <aside class="col-md-3 blog-sidebar">

                <div class="p-4">
                    <h4 class="font-italic">Categories</h4>
                    <ol class="list-unstyled mb-0">
                        <?php
                        $sql_k = "SELECT `id_kategori_blog`,`kategori_blog` FROM `kategori_blog` ORDER BY `kategori_blog`";
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
                        $sql = "SELECT DATE_FORMAT(`tanggal`,'%c-%Y') as `tgl` FROM `blog` GROUP BY `tgl` ";
                        $query = mysqli_query($koneksi, $sql);
                        while ($data =  mysqli_fetch_row($query)) {
                            $tanggal = $data[0];
                        ?>
                            <li><a href="index.php?include=daftar-blog&archive-data=<?php echo $tanggal; ?>"><?php echo $tanggal; ?></a></li>
                        <?php } ?>
                    </ol>
                </div>


            </aside><!-- /.blog-sidebar -->
    </main><!-- /.container -->
</section><br><br>