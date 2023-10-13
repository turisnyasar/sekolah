<?php
include "config.php";
include "functions.php";
cek_login();

$id = $_GET["id"];

// ambil daftar fotonya dan hapus dari folder
$sql = " SELECT foto FROM foto_kegiatan
         WHERE ID_kegiatan = $id";
$hasil = get_data($sql);
// looping pada semua foto dalam array
for ($i=0; $i<count($hasil); $i++) {
$alamat_foto = "../upload/".$hasil[$i]['foto'];
unlink ($alamat_foto);
}


$sql1 = "START TRANSACTION";
$hasil1 = run_query($sql1);

$sql2 = " DELETE FROM foto_kegiatan
          WHERE ID_kegiatan = $id ";
$hasil2 = run_query ($sql2);

$sql3 = " DELETE FROM kegiatan
          WHERE ID_kegiatan = $id ";
$hasil3 = run_query ($sql3);

$sql4 = "COMMIT";
$hasil4 = run_query($sql4);

$_SESSION["pesan"] = "Data kegiatan berhasil dihapus";
header("location: kegiatan-daftar.php");