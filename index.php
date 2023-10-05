<?php 

include "admin/config.php";
include "admin/functions.php";

/////////////////////////////////
// mengambil data gambar untuk slideshow
////////////////////////////////

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

/////////////////////////////////
// mengambil 5 berita kegiatan terakhir
////////////////////////////////

$sql2 = " SELECT ID_kegiatan,
                 judul_kegiatan
          FROM kegiatan
          ORDER BY ID_kegiatan DESC
          LIMIT 0,5 ";
$hasil2 = get_data($sql2);


include "header.php";
?>

<main>

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


<aside>
  
 <div class='widget'>
   <h2>5 Kegiatan Terakhir</h2>
   <ul class='daftar_link'>
<?php
for($i=0; $i<count($hasil2); $i++) {
    $id_kegiatan = $hasil2[$i]["ID_kegiatan"];
    $judul = $hasil2[$i]["judul_kegiatan"];
    echo "<li>
    <a href='kegiatan.php?id=$id_kegiatan'>   
    $judul</a></li> ";
}
?>
   </ul>
 </div>

 <div class='widget'>
  <h2>Pengumuman</h2>
 </div>

 <div class='widget'>
  <h2>Link Terkait</h2>
 </div>

</aside>

</main>

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

