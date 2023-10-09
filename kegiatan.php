<?php 
include "admin/config.php";
include "admin/functions.php";

// $p adalah nomor halaman saat ini. Didapat
// dari URL yang diminta
$p = isset($_GET['p'])? $_GET['p'] : 1;

//$limit dan $start adalah untuk menentukan
// dimulai dari mana dan sampai mana 
// data dari database yang mau diambil
$limit = 2;
$start = ($p-1) * $limit;

$sql2 = " SELECT ID_kegiatan,
                 judul_kegiatan
          FROM kegiatan
          ORDER BY ID_kegiatan DESC
          LIMIT $start, $limit ";
$hasil2 = get_data($sql2);

// cari total data dalam database
$sql_total = " SELECT COUNT(*) AS totaldata
               FROM kegiatan ";
$hasil_total = get_data($sql_total);
//print_r ($hasil_total); exit;
$total = $hasil_total[0]["totaldata"];
// mencari total halaman
$total_halaman = ceil($total / $limit);


/////////////////////
include "header.php";
?>
<main>
<section>
<?php 
// ketika tidak ada id diminta
// otomatis membuka berita pertama dalam halaman tersebut
if (!isset($_GET["id"])) {
  $start_limit = ($p-1) * $limit;
  $sql3 = " SELECT * FROM kegiatan
            ORDER BY ID_kegiatan DESC
            LIMIT $start_limit, 1";
 $hasil3 = get_data($sql3);
 $berita = $hasil3[0]; 
 $id = $berita["ID_kegiatan"];           
} else

// ketika ada id diminta
if (isset($_GET["id"])) {
 $id = $_GET["id"];
 $sql3 = " SELECT * FROM kegiatan WHERE ID_kegiatan = $id";
 $hasil3 = get_data($sql3);
 $berita = $hasil3[0];           
}


 $sql4 = " SELECT * FROM foto_kegiatan
           WHERE ID_kegiatan = $id";
 $listfoto = get_data($sql4);

 echo "<h1>$berita[judul_kegiatan] <br>ID=$id</h1>";

//kalau ada foto ke-1, maka cetak langsung di bawah judul
 if (isset($listfoto[0])){ 
  $gambar = $listfoto[0]['foto'];
  cetak_foto( $gambar );
 }

 echo "<div>$berita[artikel_kegiatan]</div> ";

 // kalau ada foto ke-2, ke-3, dst...
 if (count($listfoto)>1) {

  // foto ke-2 dimulai dari index=1
  for ($i=1; $i<count($listfoto); $i++) {
    $gambar = $listfoto[$i]['foto'];
    cetak_foto( $gambar );
  }
 }


?>

<hr>

<a class="tombol" href="kegiatan.php?p=1">&#x23ee;</a>

<?php

// membuat mulai jump
if ($p <= 2) { 
  $mulai_jump = 1;    $akhir_jump = 3; 
  $mulai_titik = "";    $akhir_titik = "..."; }

else  // untuk di tengah jump
if ($p>1 && $p+1 < $total_halaman) {
  $mulai_jump = $p-1;    $akhir_jump = $p+1; 
  $mulai_titik = "...";    $akhir_titik = "..."; }

else   // untuk di ujung jump
if ($p >= $total_halaman - 1) {
  $mulai_jump = $p-1;   $akhir_jump = $total_halaman; 
  $mulai_titik = "...";   $akhir_titik = ""; }
 
//////////
echo $mulai_titik;  
for( $i=$mulai_jump; $i<=$akhir_jump; $i++) {
   echo "<a class='tombol' 
            href='kegiatan.php?p=$i'>$i</a> ";
}
echo $akhir_titik;
?>

<a class="tombol" 
 href="kegiatan.php?p=<?= $total_halaman ?>">&#x23ed;</a> 

</section>

<aside>
  
 <div class='widget'>
   <h2>Berita Kegiatan</h2>
   <ul class='daftar_link'>
<?php
for($i=0; $i<count($hasil2); $i++) {
    $id_kegiatan = $hasil2[$i]["ID_kegiatan"];
    $judul = $hasil2[$i]["judul_kegiatan"];
    echo "<li>
    <a href='kegiatan.php?id=$id_kegiatan'>
    ($id_kegiatan) $judul</a></li> ";
}
?>
   </ul>

<?php 
////////// untuk tombol previous /////////////
if ($p > 1) {
  $prev_p = $p - 1;
  $href = "kegiatan.php?p=$prev_p";
}
else { 
  $href = "";
}
echo "<a href='$href' class='tombol'>
      &laquo; </a>";

echo " || "; // pemisah tombol (separator)

////////// untuk tombol next /////////////////
$next_p = $p + 1;

// kalau $next_p sudah melewati halaman terakhir
if ($next_p > $total_halaman) 
   // matikan href
   $href = "";
else 
   // hidupkan href
   $href = "kegiatan.php?p=$next_p";

echo "<a href='$href' class='tombol'>
      &raquo; </a>";
?>

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