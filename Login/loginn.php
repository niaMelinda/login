<?php
 session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    // koneksi database
    $koneksi = new PDO("mysql:host=localhost;dbname=rumah_sakit","root","");
    //cari didatabase, berdasarkan username dan password
    $query = $koneksi->query("select * from tbuser where username= '$username' AND password= '$password'");

    //cek jika ada data, maka bikin session ke halaman beranda
    if($query->rowCount() > 0 ){
        $_SESSION["username"] = $_POST['username'];
        $_SESSION["password"] = $_POST["password"];
 header("Location:beranda.php");
}else{
    //jika tidak ada ke halaman login
    header("Location:from_login.php");
}
