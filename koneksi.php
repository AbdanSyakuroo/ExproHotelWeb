<?php
//deklarasi variabel

$db_host = "localhost"; //alamat server database MySQL
$db_user="root"; // nama pengguna untuk mengakses database. isinya default 
$db_pass = ""; //kata sandi untuk mengakses database, kosongkan karena default
$db_name = "db_hotel2"; //nama database yang akan dikoneksikan

// $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// if ($conn->connect_error){
//     die("connection failed: " . $conn->connect_error);
// }

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}


?>
