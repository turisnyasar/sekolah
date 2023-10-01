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
