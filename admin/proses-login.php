<?php
include "config.php";
include "functions.php";

// apabila tidak ada submit, kembalikan ke form
if ( ! isset($_POST["submit"]) ) {
    header("location: index.php");
    exit;
}

//tampung kiriman dari form
$u = filter_var( $_POST["username"],
                        FILTER_SANITIZE_STRING );
$p = md5( $_POST["password"] );

// susun sql mencocokkan ke database
$sql = " SELECT * FROM admin
         WHERE  username = '$u' 
            AND password = '$p' ";

//testing, apakah form berhasil ditangkap
//echo $sql; exit;

// proses sql ke database dan tampung datanya
$data = get_data( $sql );

//testing 2, berapa data didapat?
// print_r ($data);

// kalau dapat 1 data, artinya usernya ada
if ( count($data) == 1) {
    // simpan si user ke session
    $_SESSION["user"] = $data[0];
    //lempar ke beranda
    header("location: beranda.php");
}
// kalau dapat array kosong, user tidak ada
if ( count($data) == 0) {
    // buat pesan error
    $_SESSION["pesan"] = "User atau password salah";
    // kembalikan ke form login
    header("location: index.php");
}


