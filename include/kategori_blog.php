<?php
    $batas = 1;
    if(!isset($_GET['halaman'])){
        $posisi = 0;
        $halaman = 1;
    }else{
        $halaman = $_GET['halaman'];
        $posisi = ($halaman-1) * $batas;
    }
    $sql_b = "SELECT b.id_blog,b.judul, DATE_FORMAT(b.tanggal, '%M %d, %Y'),u.nama, b.isi FROM blog b INNER JOIN user u ON b.id_user=u.id_user WHERE id_kategori_blog = '$data' ORDER BY b.judul LIMIT $posisi, $batas";                   
    $query_b = mysqli_query($koneksi,$sql_b);
    $row = mysqli_num_rows($query_b);
    if($row == 0 ){
        ?>
        <div class="col-md-4">
            <h3>Blog tidak tersedia</h3>
        </div>
        <?php
    }else{
        while($data_b = mysqli_fetch_row($query_b)){  
            $id_blog = $data_b[0];
            $judul = $data_b[1];
            $tanggal = $data_b[2];
            $penulis = $data_b[3];
            $isi = $data_b[4];
        ?>
        <div class="blog-post">
              <h2 class="blog-post-title"><a href="#"><?php echo $judul;?></a></h2>
              <p class="blog-post-meta"><?php echo $tanggal;?> by <a href="#"><?php echo $penulis;?></a></p>
              <p>
                <?php echo $isi;?>
              </p>
                <a href="detail-blog-data-<?php echo $id_blog;?>"class="btn btn-primary">Continue reading..</a>
              </div><!-- /.blog-post --><br><br>
        <?php } ?>
<div class="col-sm-12">
    <nav aria-label="Page navigation">
        <?php 
            $sql_b = "SELECT b.id_blog,b.judul, DATE_FORMAT(b.tanggal, '%M %d, %Y'),u.nama, b.isi FROM blog b INNER JOIN user u ON b.id_user=u.id_user WHERE id_kategori_blog = '$data' ORDER BY b.judul LIMIT $posisi, $batas";
            $query_jum = mysqli_query($koneksi, $sql_b);
            $jum_data = mysqli_num_rows($query_jum);
            $jum_halaman = ceil($jum_data/$batas);
        ?>
        <ul class="pagination">
            <?php
                if($jum_halaman==0){
                }else if($jum_halaman==1){
                    echo "<li class='page-item'><a class='page-link'>1</a></li>";
                }else{  
                $sebelum = $halaman - 1;
                $setelah = $halaman + 1;
                if($halaman!=1){
                echo "<li class='page-item'><a class='page-link'href='daftar-blog-kategori-data-$data&halaman=1'>First</a></li>";
                echo "<li class='page-item'><a class='page-link'href='daftar-blog-kategori-data-$data&halaman=$sebelum'>«</a></li>";
                }
                for($i=1; $i<=$jum_halaman; $i++){
                    if($i > $halaman - 5 and $i < $halaman + 5){
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='=daftar-blog-kategori-data-$data&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                    }
                }
                if($halaman!=$jum_halaman){
                    echo "<li class='page-item'><a class='page-link' href='daftar-blog-kategori-data-$data&halaman=$setelah'>»</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='daftar-blog-kategori-data-$data&halaman=$jum_halaman'>Last</a></li>";
                    }
                }                    
           ?>
        </ul>
    </nav>
</div>
<?php } ?>