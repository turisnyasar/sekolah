<?php 
include "admin/config.php";
include "admin/functions.php";

// $p adalah nomor halaman saat ini. Didapat
// dari URL yang diminta
$p = isset($_GET['p'])? $_GET['p'] : 1;

//$limit dan $start adalah untuk menentukan
// dimulai dari mana dan sampai mana 
// data dari database yang mau diambil
$limit = 3;
$start = ($p-1) * $limit;

$sql2 = " SELECT ID_kegiatan,
                 judul_kegiatan
          FROM kegiatan
          ORDER BY ID_kegiatan DESC
          LIMIT $start, $limit ";
$hasil2 = get_data($sql2);


include "header.php";
?>
<main>
<section>
<?php 
// ketika ada id diminta
if (isset($_GET["id"])) {

 $id = $_GET["id"];
 $sql3 = " SELECT * FROM kegiatan
           WHERE ID_kegiatan = $id";
 $hasil3 = get_data($sql3);
 $berita = $hasil3[0];

 $sql4 = " SELECT * FROM foto_kegiatan
           WHERE ID_kegiatan = $id";
 $listfoto = get_data($sql4);

 echo "<h1>$berita[judul_kegiatan]</h1>";

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

}
?>

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
    $judul</a></li> ";
}
?>
   </ul>

<?php 
$next_p = $p + 1;
echo "<a href='kegiatan.php?p=$next_p'>
      Berikutnya </a>";
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