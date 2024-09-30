<?php
    include '../koneksi.php';


    $id = $_GET["id"];

    $query = "DELETE FROM tbl_admin WHERE id_admin=$id";
    $ambil = "SELECT nama FROM tbl_admin WHERE id_admin=$id";

    $hasil = $conn->query($ambil);
    
    foreach($hasil as $baris){
         if($conn->query($query)){
        echo'
            <script>
              alert(`'.$baris['nama'].' berhasil dihilangkan`);
              window.location.href =  "admin.php";
            </script>
            '; 
    }else{
        die(mysqli_error($conn));
    }
    }
   

?>