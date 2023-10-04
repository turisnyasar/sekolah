<?php 
include "admin/config.php";
include "admin/functions.php";

/////////////////////////////////
// mengambil 20 berita kegiatan terakhir
////////////////////////////////

$sql2 = " SELECT ID_kegiatan,
                 judul_kegiatan
          FROM kegiatan
          ORDER BY ID_kegiatan DESC
          LIMIT 0,20 ";
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
 echo "<h1>$berita[judul_kegiatan]</h1>
 <div>$berita[artikel_kegiatan]</div> ";
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