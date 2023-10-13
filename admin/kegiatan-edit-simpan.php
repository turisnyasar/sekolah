<?php
// print_r ($_REQUEST);
// exit;

include "config.php";
include "functions.php";
include "../libs/lib_image/lib_image_operations.php";
include "lib_kegiatan.php";

cek_login();

$id = $_REQUEST["ID"];
$judul = $_REQUEST["judul"];
$artikel = $_REQUEST["artikel"];

// susun SQL untuk menyimpan hasil edit
$sql = " UPDATE kegiatan 
         SET judul_kegiatan = '$judul',
             artikel_kegiatan = '$artikel'
         WHERE ID_kegiatan = $id ";

$hasil = run_query ($sql);
$_SESSION["pesan"] = "Data berhasil diubah";

// ketika ada id foto hapus yang dikirimkan
if ($_REQUEST['foto_hapus'] != "" ) {

    // contoh isi foto_hapus :
    // foto_hapus = 2,4,7
    $fotos = $_REQUEST["foto_hapus"];
    $sql_hapus = " 
        DELETE FROM foto_kegiatan
        WHERE ID IN ($fotos) ";
    $hasil_hapus = run_query($sql_hapus);
    $_SESSION["pesan"] .= "<br>
        Foto terpilih sudah dihapus";
}

simpan_upload_foto($id);

$_SESSION["pesan"] .= "<br>
    Foto baru berhasil ditambah";

// kembali ke daftar
//header("location:kegiatan-daftar.php");

// kembali ke form edit
header("location:kegiatan-edit.php?id=$id");
