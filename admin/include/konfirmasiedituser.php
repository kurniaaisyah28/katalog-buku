<?php
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $random = "r4nd0m";
    $md = md5($random . md5($password));

    //get foto
    $sql_f = "SELECT `foto` FROM `user` WHERE `id_user`='$id_user'";
    $query_f = mysqli_query($koneksi, $sql_f);
    while ($data_f = mysqli_fetch_row($query_f)) {
        $foto = $data_f[0];
    }

    if (empty($nama)) {
        header("Location:index.php?include=edit-user&notif=namakosong");
    } else if (empty($email)) {
        header("Location:index.php?include=edit-user&notif=emailkosong");
    } else if (empty($username)) {
        header("Location:index.php?include=edit-user&notif=usernamekosong");
    } else {
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $nama_file = $_FILES['foto']['name'];
        $direktori = 'foto/' . $nama_file;

        if (move_uploaded_file($lokasi_file, $direktori)) {
            if (!empty($foto)) {
                unlink("foto/$foto");
            }
            $sql = "update `user` set `nama`='$nama',`email`='$email',`username`='$username',`level`='$level', `foto`='$nama_file' where `id_user`='$id_user'";
            mysqli_query($koneksi, $sql);
            if (!empty($password)) {
                $sql = "update `user` set `nama`='$nama',`email`='$email',`username`='$username',`level`='$level', `foto`='$nama_file' where `id_user`='$id_user'";
                mysqli_query($koneksi, $sql);
            } else {
                $sql = "update `user` set `nama`,='$nama',`email`='$email',`username`='$username',`level`='$level',`foto`='$nama_file',`password`='$md' where `id_user`='$id_user'";
                mysqli_query($koneksi, $sql);
            }
            header("Location:index.php?include=user&notif=editberhasil");
        } else {
            if (!empty($password)) {
                $sql = "update `user` set `nama`='$nama',`email`='$email',`username`='$username',`level`='$level' where `id_user`='$id_user'";
                mysqli_query($koneksi, $sql);
            } else {
                $sql = "update `user` set `nama`='$nama',`email`='$email',`username`='$username',`level`='$level',`password`='$md' where `id_user`='$id_user'";
                mysqli_query($koneksi, $sql);
            }
            header("Location:index.php?include=user&notif=editberhasil");
        }
    }
}
