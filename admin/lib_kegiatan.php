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

   // susun item dalam setiap baris tabel
   $item = array( 
     $hasil[$i]["judul_kegiatan"] ,
     $hasil[$i]["tgl_upload"] ,
     $hasil[$i]["display_name"] ,
     "$tombol_edit - Delete"
    );
    // lalu masukkan item baris tersebut ke array
    $array[] = $item;

  } // tutup for

  buat_tabel("tabel_login",
             $array_judul,
             $array );

 } // tutup if

}  // tutup function