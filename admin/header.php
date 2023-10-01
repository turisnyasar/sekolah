<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Administrator</title>
    <link rel="stylesheet" href="style-admin.css">
    <script src="../libs/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init(
            { selector:'textarea',
              });
    </script>
</head>
<body>

<header>
    <h1>Beranda Administrator</h1>
    <h2>Selamat datang 
        <?= $_SESSION["user"]["display_name"] ?>
        </h2>
</header>

<div class="wadah_main">

<nav>
    <ul class='menu'>
        <li>
            <a href="beranda.php">Beranda</a>
        </li>

<?php 
//menu "pengaturan user" hanya untuk admin
// berlevel 1
if ($_SESSION["user"]["admin_level"] == 1) :
?>
        <li>
            <a href="user.php">Pengaturan User</a>
        </li>
<?php 
endif;
?>

  <li>
    <a href="#">Kegiatan</a>
      <ul>
        <li><a href="kegiatan-tambah.php">Tambah Kegiatan</a></li>
        <li><a href="kegiatan-daftar.php">Daftar Kegiatan</a></li>
      </ul>
  </li>

  <li>
    <a href="logout.php">Logout</a>
  </li>
    </ul>
</nav>
