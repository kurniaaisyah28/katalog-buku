<?php
$id_penerbit = $_POST['penerbit'];
$penerbit = $_POST['penerbit'];
$alamat = $_POST['alamat'];

if (empty($id_penerbit)) {
    header("Location:index.php?include=tambah-penerbit&notif=tambahkosong&jenis=penerbit");
} else if (empty($alamat)) {
    header("Location:index.php?include=tambah-penerbit&notif=tambahkosong&jenis=alamat");
} else {
    $sql = "INSERT INTO penerbit (id_penerbit, penerbit, alamat)  VALUES ('$id_penerbit', '$penerbit', '$alamat')";

    mysqli_query($koneksi, $sql);
    $id_penerbit = mysqli_insert_id($koneksi);

    header("Location:index.php?include=penerbit&notif=tambahberhasil");
}
?>