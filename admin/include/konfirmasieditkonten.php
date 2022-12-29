<?php
if (isset($_SESSION['id_konten'])) {
    $id_konten = $_SESSION['id_konten'];
    $judul = $_POST['judul'];
    $isi = addslashes($_POST['isi']);

    if (empty($id_konten)) {
        header("Location:index.php?include=edit-buku&data=$id_buku&notif=editkosong&jenis=judul");
    } else if (empty($isi)) {
        header("Location:index.php?include=edit-buku&data=$id_buku&notif =editkosong&jenis=isi");

    } else {
        $sql = "update `konten` set `judul`='$judul' ,`isi`='$isi' where `id_konten`='$id_konten'";
        mysqli_query($koneksi, $sql);
        unset($_SESSION['id_konten']);
        header("Location:index.php?include=konten&notif=editberhasil");
    }
}
?>