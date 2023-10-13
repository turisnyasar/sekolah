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

//// mengumpulkan foto
$daftar_foto = array();

$sql_foto = " SELECT * FROM foto_kegiatan
              WHERE ID_kegiatan = $id ";

$hasil = get_data ($sql_foto);

/////////////////////////
include "header.php";
?>

<script>
buang_foto = []
function clear_foto(idfoto) {
  target_div = document.getElementById('foto_' + idfoto)
  target_div.style.display = "none"
  buang_foto.push(idfoto)
  foto_hapus.value = buang_foto.toString()
}
</script>

<main>
<h1>Edit Berita Kegiatan Sekolah</h1>
<?php 
tampil_pesan();
// get_kegiatan();
?>

<form 
action="kegiatan-edit-simpan.php?x=<?=$id?>"
      method="post"
      enctype="multipart/form-data">

<!-- setiap form edit harus menyertakan ID di dalamnya -->      
<input type="hidden" name="ID" 
       value="<?= $id ?>">

<fieldset>
<legend>Form Edit Kegiatan</legend>
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

<?php 
// looping pada daftar foto dari database
// dan tampilkan dengan tombol hapus
for ($i=0; $i<count($hasil); $i++){
  
  $id_foto = $hasil[$i]["ID"];
  $foto = $hasil[$i]["foto"];

  echo "<DIV class='list_foto' 
             id='foto_{$id_foto}'>
  <img src='../upload/$foto' width='128'>
  <a href='javascript:clear_foto($id_foto)'
     class='tombol'>X</a>
  </DIV>";
}
?>

<input type="hidden" name="foto_hapus"
       id="foto_hapus">

<?php include "form_foto.php"; ?>

</form>
</main>
</div> <!-- tutup .wadah_main -->
</body>
</html>

