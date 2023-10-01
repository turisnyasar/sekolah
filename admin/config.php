<?php
session_name( "sekolah" );
session_start();

$host = "localhost";
$user_db = "root";
$user_db_pass = "";
$db_name = "sekolah";

$koneksi = mysqli_connect ( $host ,  $user_db ,
             $user_db_pass ,  $db_name  );

