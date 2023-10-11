<?php
include "config.php";
include "functions.php";
include "lib_kegiatan.php";
cek_login();

// cek dulu kalau tidak ada "id=" di dalam
// GET maka lemparkan ke halaman daftar
if (! isset($_GET["id"])) {
 header("location: kegiatan-daftar.php");
 exit;
}

$id = $_GET["id"];
// ambil data selengkapnya
$sql = " SELECT * FROM kegiatan
         WHERE ID_kegiatan=$id ";

$hasil = get_data($sql);
$data = $hasil[0];

include "header.php";
?>
<main>
<h1>Edit Berita Kegiatan Sekolah</h1>
<?php 
tampil_pesan();
// get_kegiatan();
?>

<fieldset>
<legend>Form Tambah Kegiatan</legend>
<table class="tabel_login">
  <tr>
    <td><label>Judul Kegiatan</label><br>
        <input type="text" size="100" name="judul" required 
      value="<?= $data['judul_kegiatan'] ?>">
    </td></tr>
  <tr>
    <td><label>Artikel Kegiatan</label><br>
        <textarea name="artikel" rows="5" cols="40">
        <?= $data['artikel_kegiatan'] ?>
        </textarea>
    </td></tr>
  <tr>
    <td><button type="submit">Simpan</button>
    </td></tr>
</table>
</fieldset>


</main>

</div> <!-- tutup .wadah_main -->
</body>
</html>
