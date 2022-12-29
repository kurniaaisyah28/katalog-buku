<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Katalog Buku</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if (isset($_GET['include'])) {
                                        if ($_GET['include'] == 'index') {
                                            echo 'active';
                                        }
                                    } else {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="index">Home
                        <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php if ($_GET['include'] == 'about-us') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="about-us">About Us</a>
                </li>
                <li class="nav-item dropdown <?php if ($_GET['include'] == 'daftar-buku' || $_GET['include'] == 'detail-buku') {
                                                    echo 'active';
                                                } ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown07">
                        <?php
                        $sql_kb = "SELECT id_kategori_buku,kategori_buku FROM kategori_buku ORDER BY kategori_buku";
                        $query_kb = mysqli_query($koneksi, $sql_kb);
                        while ($data_kb = mysqli_fetch_row($query_kb)) {
                            $id_kb = $data_kb[0];
                            $kb = $data_kb[1];
                        ?>
                            <a class="dropdown-item" href="daftar-buku-kategori-data-<?php echo $id_kb; ?>"><?php echo $kb; ?></a>
                        <?php } ?>
                    </div>
                </li>
                <li class="nav-item <?php if ($_GET['include'] == 'blog' || $_GET['include'] == 'detail-blog') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="blog">Blog</a>
                </li>
                <li class="nav-item <?php if ($_GET['include'] == 'contact-us') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="contact-us">Contact Us</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0" method="post" action="daftar-search-buku">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" id="kata_kunci" name="katakunci">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<?php include("includes/script.php"); ?>