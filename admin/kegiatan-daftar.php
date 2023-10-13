<?php
include "config.php";
include "functions.php";
include "lib_kegiatan.php";
cek_login();
include "header.php";
?>
<main>
<h1>Pengaturan Berita Kegiatan Sekolah</h1>
<?php 
tampil_pesan();
get_kegiatan();
?>

</main>

</div> <!-- tutup .wadah_main -->
</body>
</html>

<script>
function hapus(id_dihapus) {
 konfirm = confirm("Hapus kegiatan ini?")
 if (konfirm) {
  document.location="kegiatan-hapus.php?id=" + id_dihapus
 }
}
 </script>