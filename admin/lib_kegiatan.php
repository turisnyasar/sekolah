<?php 

function get_kegiatan() {

 $sql = "SELECT
             kegiatan.ID_kegiatan ,
             kegiatan.judul_kegiatan ,
             kegiatan.tgl_upload ,
             admin.display_name 
            FROM 
             kegiatan LEFT JOIN admin 
            ON
             kegiatan.ID_admin = admin.ID_admin";
 
 $hasil = get_data ($sql);

 $array_judul = array( "Judul", "Tanggal",
                      "Admin", "Tindakan" );

 $array = array();
 
 // untuk data tabel
 if (count($hasil) > 0) {
  for ($i=0; $i<count($hasil); $i++) {

    // persiapkan tombol edit
    $id_edit = $hasil[$i]['ID_kegiatan'];
    $tombol_edit = "<a class='tombol'
       href='kegiatan-edit.php?id=$id_edit'>
       Edit</a>";

    $tombol_delete = "<a class='tombol'
       href='javascript:hapus($id_edit)'>
       Hapus</a>";

   // susun item dalam setiap baris tabel
   $item = array( 
     $hasil[$i]["judul_kegiatan"] ,
     $hasil[$i]["tgl_upload"] ,
     $hasil[$i]["display_name"] ,
     "$tombol_edit - $tombol_delete"
    );
    // lalu masukkan item baris tersebut ke array
    $array[] = $item;

  } // tutup for

  buat_tabel("tabel_login",
             $array_judul,
             $array );

 } // tutup if

}  // tutup function



/**
 * fungsi menyimpan foto diupload
 * @param (int ID_dari_kegiatan_terkait)
 */
function simpan_upload_foto($ID) {

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

    // persiapkan status $ada_foto;
    $ada_foto = false;

    // setiap foto adalah item array di dalam
    // array besar $_FILES
    foreach ($_FILES as $key => $data) {
      //di dalam setiap item array ada property
      // yang seragam, yaitu name, tmp_name,
      // dan lain-lain
      
      //mencari yang name nya tidak kosong
      if ($data["name"] != "") {

        //ubah status $ada_foto
        $ada_foto = true;

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
      crop_foto( "foto{$angka}", 
                      640, 426, $nama_upload, "../upload");

        //maka captionnya adalah
        $cap = $_POST["caption".$angka];

        //tambahkan data foto ini ke $data_foto
        $data_foto[] =
             "( $ID, '$nama_upload', '$cap')";

      }

    }

    if ($ada_foto) {
      $sql2 .= join(",", $data_foto);
      $hasil2 = run_query ($sql2);
    }

}