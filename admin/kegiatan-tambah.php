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

<fieldset>
  <legend>Upload Foto</legend>
  <div id='wadah_foto'></div>
  <div><input type="button" 
              onclick="tambah_upload()" 
              value="Tambah Foto"></div>
</fieldset>

</form>


</main>

</div> <!-- tutup .wadah_main -->
</body>
</html>

<script>
var no_urut = 1;
/*
function tambah_upload() {
  // mula-mula sediakan inputannya
  let form_foto = "<div><input type='file' name='foto" + no_urut + "'></div>"  
  // lalu inputan tersebut dimasukkan ke form
  wadah_foto.innerHTML += form_foto
  // naikkan no_urut untuk yang berikutnya
  no_urut ++;
}
*/

function tambah_upload() {
  // mula-mula buat element div
  let uploadan = document.createElement("div")
  uploadan.className = "div_foto";
  
  //1. label dulu
  a = document.createElement("label")
  a.innerHTML = "Upload foto " + no_urut
  uploadan.appendChild(a)
  //2. input file
  b = document.createElement("input")
  b.type = "file"
  b.name = "foto" + no_urut
  uploadan.appendChild(b)
  //3. input text
  c = document.createElement("input")
  c.type = "text"
  c.name = "caption" + no_urut
  
  uploadan.appendChild(c)
  // nomor urut
  no_urut ++
  //lalu uploadan tersebut dimasukkan
  // ke dalam wadah_foto
  wadah_foto.appendChild(uploadan)
}
  </script>
