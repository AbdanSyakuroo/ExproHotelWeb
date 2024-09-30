<?php
    include '../koneksi.php';


    $id = $_GET["id"];

    $query = "DELETE FROM tbl_jenis_kamar WHERE id_kamar=$id";
    $ambil = "SELECT jenis_kamar FROM tbl_jenis_kamar WHERE id_kamar=$id";

    $hasil = $conn->query($ambil);
    
    foreach($hasil as $baris){
         if($conn->query($query)){
        echo'
            <script>
              alert(`'.$baris['username'].' berhasil dihilangkan`);
              window.location.href =  "kamar.php";
            </script>
            '; 
    }else{
        die(mysqli_error($conn));
    }
    }
   

?>