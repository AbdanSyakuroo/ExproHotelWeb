<?php

//include koneksi database
include('../koneksi.php');

//get data dari form
$id_admin = $_POST['id'];
$username     = $_POST['user'];
$password         = $_POST['pw'];
$nama_lengkap = $_POST['nama'];


//query update data ke dalam database berdasarkan ID
$query = "UPDATE tbl_admin SET username = '$username', password = '$password', nama = '$nama_lengkap' WHERE id_admin = $id_admin ";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($conn->query($query)) {
    //redirect ke halaman index.php 
    echo"
            <script>
              alert('Data Berhasil Diupdate!');
              window.location.href = 'admin.php';
            </script>
            "; 
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>