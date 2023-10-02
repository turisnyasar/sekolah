<?php 

include "config.php";
include "functions.php";
include "../libs/lib_image/lib_image_operations.php";

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

    //mula-mula sediakan bagian awal SQL simpan
    //fotonya sebelum nanti ditambahkan
    // foto dari looping
    $sql2 = " INSERT INTO foto_kegiatan
             (ID_kegiatan, foto, caption)
             VALUES ";

    //sediakan array kosong sebagai tempat 
    //dikumpulkan setiap data foto
    $data_foto = array();

    // setiap foto dalam sekali upload akan memakai
    // nomor urut A,B,C dan seterusnya
    // kode ASCII untuk A adalah 65
    $huruf = 65;

    // setiap foto adalah item array di dalam
    // array besar $_FILES
    foreach ($_FILES as $key => $data) {
      //di dalam setiap item array ada property
      // yang seragam, yaitu name, tmp_name,
      // dan lain-lain
      
      //mencari yang name nya tidak kosong
      if ($data["name"] != "") {

        // ambil angka dari $key 
        $angka = substr($key, 4);

      // susun nama untuk upload
      $type = substr($data["type"], 6);
      if ($type== "png") {
        $nama_upload = chr($huruf) . "_" . time() . ".png";
      }
      else 
      if ($type== "jpeg") {
        $nama_upload = chr($huruf) . "_" . time() . ".jpg";
      }
      $huruf++;

      // panggil fungsi crop dari library
      crop_foto( "foto$angka", 
                      640, 426, $nama_upload, "../upload");

        //maka captionnya adalah
        $cap = $_POST["caption".$angka];

        //tambahkan data foto ini ke $data_foto
        $data_foto[] =
             "( $ID, '$nama_upload', '$cap')";

      }

    }

    $sql2 .= join(",", $data_foto);
    $hasil2 = run_query ($sql2);
    $_SESSION["pesan"] = "Data tersimpan";
    header("location: kegiatan-tambah.php");
}

