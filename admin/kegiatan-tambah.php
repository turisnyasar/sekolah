<?php
include "config.php";
include "functions.php";

cek_login();
include "header.php";
?>

<main>
<h1>Pengaturan Berita Kegiatan Sekolah</h1>

<?php 
tampil_pesan();
?>

<form action="kegiatan-tambah-simpan.php"
      method="post"
      enctype="multipart/form-data">
<fieldset>
<legend>Form Tambah Kegiatan</legend>
<table class="tabel_login">
  <tr>
    <td><label>Judul Kegiatan</label><br>
        <input type="text" size="100" name="judul" required>
    </td></tr>
  <tr>
    <td><label>Artikel Kegiatan</label><br>
        <textarea name="artikel" rows="5" cols="40"></textarea>
    </td></tr>
  <tr>
    <td><button type="submit">Simpan</button>
    </td></tr>
</table>
</fieldset>

<h3>Foto Kegiatan</h3>

<?php include "form_foto.php"; ?>

</form>


</main>

</div> <!-- tutup .wadah_main -->
</body>
</html>
