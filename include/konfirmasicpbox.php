<?php
$nama_cp = $_POST['nama_cp'];
$email_cp = $_POST['email_cp'];
$pesan_cp = $_POST['pesan_cp'];

if (empty($nama_cp)) {
    header("Location:contact-us-notif-tambahkosong-jenis-nama_cp");
} elseif (empty($email_cp)) {
    header("Location:contact-us-notif-tambahkosong-jenis-email_cp");
} elseif (empty($pesan_cp)) {
    header("Location:contact-us-notif-tambahkosong-jenis-pesan_cp");
} else {
    $sql = "INSERT INTO contactus (nama_cp, email_cp, pesan_cp) VALUES ('$nama_cp', '$email_cp', '$pesan_cp')";

    mysqli_query($koneksi, $sql);
    header("Location:contact-us-notif-tambahberhasil");
}
