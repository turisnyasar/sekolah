<?php

// function mengambil data admin
function get_admin() {
    $sql = " SELECT * FROM admin 
             ORDER BY display_name ";
    $hasil = get_data($sql);
    
    $array = array();
    // looping isi $hasil supaya disusun ke 
    // dalam $array
    for ($i=0; $i<count($hasil); $i++) {
        
        //buat variabel bantu untuk setiap baris
        $data = $hasil[$i];

        // buat item yang mewakili setiap baris
        $item = array( 
          "$data[display_name]<br>$data[username]",

          $data["admin_level"],

          "<button>Edit</button> 
           <button>Hapus</button>" );
        
        // setiap item masukkan ke array besar
        $array[] = $item;
        
    }

    //susun judul kolom
    $judul = array("Admin", "Level", "Tindakan");

    //cetak dengan buat_tabel()
    buat_tabel("tabel_login", // nama class css
                $judul,       // daftar judul kolom
                $array);      // semua isi tabel
}

/*
Array
(
    [0] => Array
        (
            [ID_admin] => 1
            [username] => admin1
            [password] => 202cb962ac59075b964b07152d234b70
            [display_name] => Boss Admin
            [admin_level] => 1
        )

    [1] => Array
        (
            [ID_admin] => 2
            [username] => operator
            [password] => 250cf8b51c773f3f8dc8b4be867a9a02
            [display_name] => Staff Admin
            [admin_level] => 2
        )

)
*/