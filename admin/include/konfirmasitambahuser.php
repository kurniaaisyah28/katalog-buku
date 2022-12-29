<?php
$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
$img = $_POST['foto'];

$random = "r4nd0m";
$md5 = md5($random . md5($password));

$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file = $_FILES['foto']['name'];
$direktori = 'foto/' . $nama_file;

if (empty($nama)) {
    header("Location:tambahuser.php?notif=namakosong");
} elseif (empty($email)) {
    header("Location:tambahuser.php?notif=emailkosong");
} elseif (empty($username)) {
    header("Location:tambahuser.php?notif=usernamekosong");
} elseif (empty($password)) {
    header("Location:tambahuser.php?notif=passwordkosong");
} elseif (move_uploaded_file($lokasi_file, $direktori)) {

    $sql = "INSERT INTO user (foto, nama, email, username, password, level) VALUES
            ('$nama_file', '$nama', '$email', '$username', '$md5', '$level')";

    mysqli_query($koneksi, $sql);
    header("Location:index.php?include=user&notif=tambahberhasil");
} else if (empty($foto)) {

    header("Location:index.php?include=tambah-user&notif=fotokosong");
}
