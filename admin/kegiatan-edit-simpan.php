<?php
include "config.php";
include "functions.php";
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

// kembali ke daftar
//header("location:kegiatan-daftar.php");

// kembali ke form edit
header("location:kegiatan-edit.php?id=$id");
