<?php

//include koneksi database
include('../koneksi.php');

//get data dari form
$id_kamar = $_POST['id'];
$jenis     = $_POST['jenis'];
$harga       = $_POST['harga'];
$keterangan = $_POST['ket'];


//query update data ke dalam database berdasarkan ID
$query = "UPDATE tbl_jenis_kamar SET jenis_kamar = '$jenis', harga = '$harga', keterangan = '$keterangan' WHERE id_kamar = $id_kamar ";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($conn->query($query)) {
    //redirect ke halaman index.php 
    echo"
            <script>
              alert('Data Berhasil Diupdate!');
              window.location.href = 'kamar.php';
            </script>
            "; 
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>