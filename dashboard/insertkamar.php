<?php

include '../koneksi.php';
ini_set('display_errors', 0);

if(isset($_POST['tambahdata'])){

        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];


          //query disimpan dalam var sql
          $sql = " INSERT INTO tbl_jenis_kamar (jenis_kamar , harga , keterangan) VALUES ('$jenis', '$harga', '$keterangan')";

          if($conn->query($sql)){
           
            echo"
            <script>
              alert('Data Berhasil Ditambahkan!');
              window.location.href = 'kamar.php';
            </script>
            "; 
          }else{
              echo "Data Gagal Disimpan Kak!";
          }
  

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    
    

    <!-- Page Wrapper -->
    <div id="wrapper">

       <?php
    include"sidebar.php";

?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
    include"topbar.php";

?>
                <!-- End of Topbar -->


<div class="container ms-5">

<h2 class="mt-4">Tambah Data Kamar</h2> <br>

<form action="" method="POST">
  <div class=" form-floating mb-3">
    
    <input type="text" style="width: 90%;" name="jenis" placeholder="isi disini" class="form-control" id="floatingInput1">
    <label for="floatingInput1" class="form-label">Jenis Kamar</label>
  </div>
  <div class=" form-floating mb-3">
    
    <input type="text" style="width: 90%;" name="harga" placeholder="isi disini" class="form-control" id="floatingInput2">
    <label for="floatingInput2" class="form-label">Harga</label>
  </div>
  <div class="form-floating mb-3">
    
    <input type="text" style="width: 90%;" name="keterangan" placeholder="isi disini" class="form-control" id="floatingInput3">
    <label for="floatingInput3" class="form-label">Keterangan</label>
  </div>
  <input type="submit" style="width: 90%;" name="tambahdata" class="btn btn-primary mt-3" style="width:100%;">
</form>



</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</body>
</html>