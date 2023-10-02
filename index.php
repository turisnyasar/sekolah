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

    <div class="item">
        <div class="teks">
Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi iste aperiam at facere sapiente sequi, excepturi cum eos fugit maxime? </div><!-- .teks -->
        <img src="./slide/pic1.jpg">
    </div><!-- .item -->

    <div class="item">
        <div class="teks">
Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi iste aperiam at facere sapiente sequi, excepturi cum eos fugit maxime? </div><!-- .teks -->
        <img src="slide/pic2.jpg">
    </div><!-- .item -->

    <div class="item">
        <div class="teks">
Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi iste aperiam at facere sapiente sequi, excepturi cum eos fugit maxime? </div><!-- .teks -->
        <img src="slide/pic3.jpg">
    </div><!-- .item -->

    <div class="item">
        <div class="teks">
Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi iste aperiam at facere sapiente sequi, excepturi cum eos fugit maxime?  </div><!-- .teks -->
    <img src="slide/pic4.jpg">
    </div><!-- .item -->

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

<?php 

include "admin/config.php";
include "admin/functions";

$sql = " SELECT kegiatan.ID_kegiatan,
                kegiatan.judul_kegiatan,
                foto_kegiatan.foto
         FROM 
         kegiatan LEFT JOIN foto_kegiatan
         ON
         kegiatan.ID_kegiatan = foto_kegiatan.ID_kegiatan 
         GROUP BY
         kegiatan.ID_kegiatan      
        ";