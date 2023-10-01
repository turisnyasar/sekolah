<?
include "config.php";
include "functions.php";

cek_login();
include "lib_user.php";

include "header.php";
?>

<main>
<?php 
get_admin();
?>
</main>

</div> <!-- tutup .wadah_main -->
</body>
</html>