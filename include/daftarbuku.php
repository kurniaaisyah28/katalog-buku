<?php
    if(isset($_POST["katakunci"])){
        $katakunci_buku = $_POST["katakunci"];
        $_SESSION['katakunci_buku'] = $katakunci_buku;
    }
    if(isset($_SESSION['katakunci_kunci'])){
        $katakunci_buku = $_SESSION['katakunci_kunci'];
    }
?>
<section id="blog-header">
        <div class="container">
            <h1 class="text-white">DAFTAR BUKU</h1>
        </div>
    </section><br><br>

    <section id="katalog-item">
        <main role="main" class="container">
            <?php 
                if(isset($_GET['include'])){
                    $include = $_GET['include'];
                    if(isset($_GET['data'])){
                        $data = $_GET['data'];
                        if($include=='daftar-buku-kategori'){
                            $sql = "SELECT kategori_buku FROM kategori_buku WHERE id_kategori_buku = $data";
                        }else if($include=='daftar-search-buku'){
                            $katakunci = $kategori_buku;
                        }else{
                            $sql = "SELECT tag FROM tag WHERE id_tag = $data";
                        }
                        $query = mysqli_query($koneksi, $sql);
                        while($data_b = mysqli_fetch_row($query)){
                            $nama = $data_b[0];
                        }
                    }
                }
            ?>
            <h2 class="text-secondary">
            <?php 
                if($include=='daftar-buku-kategori'){ 
                    echo "Categories: ", $nama;
                }elseif ($include=='daftar-search-buku') {
                    if(isset($_POST['katakunci']) && $_POST['katakunci'] == ""){

                    }else{ 
                        echo "Hasil Pencarian : ";
                    }
                }
                else{ 
                    echo "Tag ", $nama;
                } ?>
            </h2>
            <br><br>
            <div class="row">
                <div class="col-md-9 katalog-main">
                    <div class="row">
                        <?php 
                          $include = $_GET['include'];

                          if($include=='daftar-buku-kategori'){
                            include('kategori.php');
                          }elseif ($include=='daftar-search-buku'){
                            include('daftarsearch.php');
                          }else{
                            include('tag.php');
                          }
                        ?>
                    </div><!-- .row-->
                </div><!-- /.katalog-main -->

                <aside class="col-md-3 katalog-sidebar">
                    <div class="pl-4 pb-4">
                        <h4 class="font-italic">Kategori</h4>
                        <ol class="list-unstyled mb-0">
                            <?php 
                        $sql_k = "SELECT `id_kategori_buku`,`kategori_buku` FROM `kategori_buku` ORDER BY `kategori_buku`";
                        $query_k = mysqli_query($koneksi, $sql_k);
                        while($data_k = mysqli_fetch_row($query_k)){
                            $id_kat = $data_k[0];
                            $nama_kat = $data_k[1];                       
                    ?>
                      <li><a href="daftar-buku-kategori-data-<?php echo $id_kat; ?>"><?php echo $nama_kat; ?></a></li>
                      <?php } ?>
                    </div>
                    <div class="p-4">
                        <h4 class="font-italic">Tag</h4>
                        <ol class="list-unstyled">
                          <?php 
                            $sql_t = "SELECT `id_tag`,`tag` FROM `tag` ORDER BY `tag`";
                            $query_t = mysqli_query($koneksi, $sql_t);
                          while($data_t = mysqli_fetch_row($query_t)){
                            $id_tag = $data_t[0];
                            $nama_tag = $data_t[1];  
                        ?>
                        <li><a href="daftar-buku-tag-data-<?php echo $id_tag; ?>"><?php echo $nama_tag; ?></a></li>
                        <?php } ?>
                        </ol>
                    </div>
                </aside> <!-- /.katalog-sidebar -->

            </div><!-- /.row -->
        </main><!-- /.container -->
    </section><br><br>
<?php include("includes/script.php");?>