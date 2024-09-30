<?php 
  
  include('../koneksi.php');


  $id = $_GET['id'];
  
  $query = "SELECT * FROM tbl_admin WHERE id_admin= $id LIMIT 1";

  $hasil = $conn->query($query);

  $baris = mysqli_fetch_array($hasil);


  ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
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

    <div class="container">

    <h2 class="mt-4">Ubah data</h2>
    <form action="updateadmin.php" method="POST">
  <div class="mb-3 mt-4">
    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
    <input type="text" name="nama" value="<?php echo $baris['nama'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <input type="hidden" name="id" value="<?php echo $baris['id_admin'] ?>">
</div>
<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Username</label>
  <input type="text" name="user" value="<?php echo $baris['username'] ?>" class="form-control" id="exampleInputPassword2">
</div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pw" value="<?php echo $baris['password'] ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary w-100">Ubah</button>
</form>
    </div>


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
</html>