<?php
include "config.php";

// hapus session login
unset ( $_SESSION["user"] );

header("location: index.php");