<?php 

include "admin/config.php";
include "admin/functions.php";

$sql = " SELECT kegiatan.ID_kegiatan,
                kegiatan.judul_kegiatan,
                foto_kegiatan.foto
         FROM 
         
         -- inner join gunanya mengambil hanya yang ada
         -- datanya di dalam kedua tabel
         kegiatan INNER JOIN foto_kegiatan
         ON
         kegiatan.ID_kegiatan = foto_kegiatan.ID_kegiatan 

         -- group by gunanya supaya setiap berita hanya
         -- diwakili oleh satu ID saja, tidak ada duplikat
         GROUP BY
            kegiatan.ID_kegiatan

         -- order by + desc gunanya supaya mengambil
         -- ID berita yang terbaru
         ORDER BY 
            kegiatan.ID_kegiatan DESC

         -- limit 0,4 gunanya membatasi hanya mengambil
         -- 4 berita saja
         LIMIT 0, 4  ";

$hasil = get_data($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Tenka Ichi Budokai</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<header>
    <div><img src="images/logo.png"></div>
    <div>
        <h1>SMK TENKA ICHI BUDOKAI</h1>
        <h3>Jln. Hatihati Banyak Anak-anak No. 2</h3>
        </div>
    <div></div>
</header>

<nav>
 <ul>
    <li><a href="">Beranda</a></li>
    <li><a href="">Kegiatan Sekolah</a></li>
    <li><a href="">Profil</a></li>
 </ul>
</nav>



<div id="frame">
<div class="slide" id="slide">
<?php 
for ($i=0; $i<count($hasil); $i++) {
    echo <<< KUTIP
    <div class="item">
        <div class="teks">
            {$hasil[$i]["judul_kegiatan"]} 
        </div>
        <img src="upload/{$hasil[$i]["foto"]}">
    </div><!-- .item -->
KUTIP;
}
?>
</div><!-- #slide -->
</div><!-- #frame -->




</body>
</html>



<script>
nomor = 1 // mula-mula tampil slide #1
tampil()

function tampil() {
    slide.className = "posisi" + nomor
}

function kiri() {
    nomor += 1
    // kalau sudah lewat 4, maka balik ke 1
    if (nomor > 4) nomor = 1
    tampil()
}

setInterval( kiri, 2000 ) //dalam millisecond
</script>

