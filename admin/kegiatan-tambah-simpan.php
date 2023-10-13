<?php 

include "config.php";
include "functions.php";
include "../libs/lib_image/lib_image_operations.php";
include "lib_kegiatan.php";

cek_login();

// cek kiriman post dan tangkap isinya
if ( isset($_POST["judul"]) ) {
    $judul = filter_var( $_POST["judul"], FILTER_SANITIZE_STRING);
    $artikel = filter_var( $_POST["artikel"], FILTER_SANITIZE_STRING);

    $tgl_waktu = date("Y-m-d H:i:s"); // format sesuai database
    $id_admin = $_SESSION["user"]["ID_admin"]; // id yang sedang login

    $sql = " INSERT INTO kegiatan 
             (judul_kegiatan, artikel_kegiatan, tgl_upload, ID_admin)
             VALUES
             ('$judul', '$artikel', '$tgl_waktu', $id_admin) ";


    $hasil = run_query($sql);
    
    //ID dari kegiatan yang baru saja disimpan
    $ID = mysqli_insert_id($koneksi);
    // echo "ID data ini adalah $ID<hr>";

    simpan_upload_foto($ID);
    
    $_SESSION["pesan"] = "Data tersimpan";
    header("location: kegiatan-tambah.php");
}

