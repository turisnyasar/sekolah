<?php

/**
 * function khusus menjalankan query, dan cek sukses gagalnya
 * tanpa perlu mengambil data (fetch)
 * @param { String } SQL string query
 */
function run_query( $sql) {
    global $koneksi;
    $hasil = mysqli_query($koneksi, $sql);
    if (! $hasil) {
        $_SESSION["pesan"] = mysqli_error($koneksi);
        header("location: halaman_error.php");
        exit;
    }
    return $hasil;
}

function get_data( $sql ) {
    // ambil variabel $koneksi dari luar function
    global $koneksi;

    // mula-mula sediakan array kosong 
    $hasil = array();

    // jalankan query
    $query = mysqli_query($koneksi, $sql);

    // kalau gagal query
    if ( ! $query ) {
        // simpan kode error mysql ke session
        $_SESSION["pesan"] = mysqli_error($koneksi);

        // lemparkan ke halaman error
        header("location: halaman_error.php");
        exit;
    }

    // kalau tidak dapat datanya
    if (mysqli_num_rows($query) == 0) {
        return $hasil;
    }

    else 
    // kalau dapat datanya
    { 
        // lakukan looping untuk setiap baris data
        while( $row = mysqli_fetch_assoc($query)){

            // masukkan baris tersebut ke $hasil
            $hasil[] = $row;

        } // tutup while()

        // setelah selesai looping,kembalikan
        // $hasil kepada si pemanggil function
        return $hasil;

    } // tutup else {}

} // tutup function get_data()


function tampil_pesan(){
    //kalau ada pesan
    if ( isset ($_SESSION["pesan"]) ) {
        echo "<div class='kotak_pesan'>";
        echo $_SESSION["pesan"];
        echo "</div>";
        unset($_SESSION["pesan"]);
    } 
}

// function untuk memeriksa dulu, kalau belum ada login
// maka lempar ke halaman form login (index.php)
function cek_login() {
    if ( ! isset($_SESSION["user"]) ) {
        header("location: index.php");
        exit;
    }
}

// function ini dipasang di index, supaya kalau sudah login
// jangan lagi muncul form login
function cek_sudah_login() {
    if ( isset($_SESSION["user"]) ){
        header("location: beranda.php");
        exit;
    }
}

// function khusus membuat tabel, berdasarkan array
function buat_tabel( $class, $judul, $array ) {
    $nomor_urut = 1;
    $hasil = "<table class='$class'>";

    // untuk judul kolom
    $hasil .= "<tr><th>No</th>";
    for($i=0; $i<count($judul); $i++) {
        $hasil .= "<th>$judul[$i]</th>";
    }
    $hasil .= "</tr>";

    // looping $i untuk membuat <TR>
    for ($i=0; $i<count($array); $i++) {

        $hasil .= "<tr>";

        //untuk nomor urut
        $hasil .= "<td>$nomor_urut</td>";
        $nomor_urut ++;

        // tampung dulu setiap baris ke dalam variabel bantu
        $baris = $array[$i];
        //looping $j untuk membuat <TD>
        for ($j=0; $j<count($baris); $j++) {
            $hasil .= "<TD>$baris[$j]</TD>";
        }
        $hasil .= "</tr>";
    }
    $hasil .= "</table>";
    echo $hasil;
}

/**
 * fungsi untuk mencetak foto ke html
 * @param (string $namaimage)
 */
function cetak_foto($gambar) {
    echo "<blockquote>
    <a href=\"javascript:buka_popup('upload/$gambar')\">
    <img src='upload/$gambar' width='50%'>
    </a>
    </blockquote>";
}