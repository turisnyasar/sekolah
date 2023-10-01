<?php 
include "config.php";
include "functions.php";
cek_sudah_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Administrator</title>
    <link rel="stylesheet" href="style-admin.css">
</head>
<body>

<div class='halaman'>

<h1>Login Administrator</h1>

<?php     
tampil_pesan(); 
 ?>

<form action="proses-login.php" method="post">

<table class="tabel_login" width="400">
  <tr> <th>Username</th>
       <td><input type="text" name="username" required></td>
       </tr>

  <tr> <th>Password</th>
       <td><input type="password" name="password" required></td>
       </tr>

  <tr> <th colspan="2"><input type="submit" name="submit" 
            value="Login"></th>
       </tr>

</table>

</form>

</div> <!-- .halaman -->

</body>
</html>