<fieldset>
  <legend>Upload Foto</legend>
  <div id='wadah_foto'></div>
  <div><input type="button" 
              onclick="tambah_upload()" 
              value="Tambah Foto"></div>
</fieldset>


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
