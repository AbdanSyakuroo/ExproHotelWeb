<?php
include "../koneksi.php";
if (isset($_POST['booking'])) {
  $nama_lengkap = $_POST['Nama'];
  $no_identitas = $_POST['noiden'];
  $no_handphone = $_POST['nohp'];
  $id_kamar = $_POST['id_kamar'];
  $check_in = $_POST['check_in'];
  $check_out = $_POST['check_out'];
  $jumlah_kamar = $_POST['jumlah'];
  $cekselisih1 = date_create($check_in);
  $cekselisih2 = date_create($check_out);
  $different = date_diff($cekselisih1, $cekselisih2);

  $selisihhari = $different->days;
  $hargaquery = "SELECT harga FROM tbl_jenis_kamar WHERE id_kamar=$id_kamar";
  $eksekusi_harga = $conn->query($hargaquery);
  $harga_assoc = mysqli_fetch_assoc($eksekusi_harga);
  $harga = $harga_assoc['harga'];

  if($cekselisih1 > $cekselisih2){
    echo "
    <script>
      alert('Data Gagal Ditambahkan!');
      window.location.href = 'booking2.php';
    </script>
    ";
    $conn->close();
  }

  $total_harga = $harga * $selisihhari * $jumlah_kamar;

  $querymasuk = "INSERT INTO tbl_penyewa ( nama, id_kamar, check_in, check_out, durasi, no_identitas, no_hp, jumlah, total) VALUES ('$nama_lengkap' , '$id_kamar', '$check_in' , '$check_out', '$selisihhari' , '$no_identitas' , '$no_handphone' , '$jumlah_kamar' , '$total_harga')";


  if ($conn->query($querymasuk)) {
    echo "
    <script>
      alert('Data Berhasil Ditambahkan!');
      window.location.href = 'sewa.php';
    </script>
    ";
  } else {
    echo "
    <script>
      alert('Data Gagal Ditambahkan!');
      window.location.href = 'sewa.php';
    </script>
    ";
  }
}




?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Booking Room</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "sidebar.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php
        include "topbar.php";

        ?>
        <!-- End of Topbar -->
        <!-- End of Topbar -->




        <div class="container ms-5">

          <h2 class="mt-4 text-gray-800">Booking Hotel</h2> <br>
          <?php
          if (isset($_POST['konfirmasi'])) {
            $ada = 1;
            $nama_lengkap = $_POST['Nama'];
            $no_identitas = $_POST['noiden'];
            $no_handphone = $_POST['nohp'];
            $id_kamar = $_POST['id_kamar'];
            $check_in = $_POST['check_in'];
            $check_out = $_POST['check_out'];
            $jumlah_kamar = $_POST['jumlah'];
          } else {
            $ada = 0;
          } ?>
          <form action="" method="POST">
            <div class="row mb-3">
              <div class="col-6">
                <div class="form-floating">

                  <input type="text" name="Nama" placeholder="isi disini" class="form-control w-75" id="floatingInput2" <?php if ($ada) {
                                                                                                                          echo "value='{$nama_lengkap}'";
                                                                                                                        } ?> required>
                  <label for="floatingInput2" class="form-label">Nama</label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-floating">

                  <input type="text" name="noiden" placeholder="isi disini" class="form-control w-75" id="floatingInput2" <?php if ($ada) {
                                                                                                                            echo "value='{$no_identitas}'";
                                                                                                                          } ?> required>
                  <label for="floatingInput2" class="form-label">No Identitas</label>
                </div>
              </div>
            </div>


            <div class="row mb-3">
              <div class="col-6">
                <div class="form-floating">

                  <input type="text" style="margin-top: 18px;" name="nohp" placeholder="isi disini" class="form-control w-75" id="floatingInput2" <?php if ($ada) {
                                                                                                                                                    echo "value='{$no_handphone}'";
                                                                                                                                                  } ?> required>
                  <label for="floatingInput2" class="form-label">HP</label>
                </div>
              </div>
              <div class="col-6">
                <div class="tgl">


                  <select name="id_kamar" class="form-select mt-3 w-75" id="filter-kelas" style="padding: 7px 6px; height:60px;" required>
                    <option value="" <?php if ($ada <= 0) {
                                        echo 'selected';
                                      } ?>>--Pilih Kamar--</option>
                    <?php
                    $ambil_kamar = "SELECT * FROM tbl_jenis_kamar";
                    $eksekusi = $conn->query($ambil_kamar);
                    foreach ($eksekusi as $row) { ?>
                      <option value="<?= $row['id_kamar'] ?>" <?php if ($ada && $row['id_kamar'] == $id_kamar) {
                                                                echo 'selected';
                                                              }; ?>><?= $row['jenis_kamar'] ?></option>
                    <?php }; ?>

                  </select>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <div class="ck">
                  <label>Check-in :</label> <br>
                  <input type="date" style="width: 75%" name="check_in" <?php if ($ada) {
                                                                          echo "value='{$check_in}'";
                                                                        } ?>>
                </div>
              </div>
              <div class="col-6">
                <div class="ck">
                  <label>Check-out :</label> <br>
                  <input type="date" style="width: 75%;" name="check_out" <?php if ($ada) {
                                                                            echo "value='{$check_out}'";
                                                                          } ?>>
                </div>
              </div>
            </div>


            <div class="form-floating mb-3">

              <input type="text" name="jumlah" placeholder="isi disini" class="form-control" style="width: 88%;" id="floatingInput2" <?php if ($ada) {
                                                                                                                                        echo "value='{$jumlah_kamar}'";
                                                                                                                                      } ?> required >
              <label for="floatingInput2" class="form-label">Jumlah</label>
            </div>
            <?php if (isset($_POST['konfirmasi'])) {
              $check_in = $_POST['check_in'];
              $check_out = $_POST['check_out'];
              $jumlah_kamar = $_POST['jumlah'];
              $cekselisih1 = date_create($check_in);
              $cekselisih2 = date_create($check_out);
              $different = date_diff($cekselisih1, $cekselisih2);

              $selisihhari = $different->days;
              $hargaquery = "SELECT harga FROM tbl_jenis_kamar WHERE id_kamar=$id_kamar";
              $eksekusi_harga = $conn->query($hargaquery);
              $harga_assoc = mysqli_fetch_assoc($eksekusi_harga);
              $harga = $harga_assoc['harga'];

             
              $total_harga = $harga * $selisihhari * $jumlah_kamar;
              if($cekselisih1 > $cekselisih2){
                $selisihhari = "";
                $total_harga = "";
              }else if ($cekselisih1 < $cekselisih2){
                  $total_harga = number_format($total_harga,2,",",".");
              }
              // if($totalharga > 20000000){
              //   $diskon = 30/100 * $totalharga;
              //   $totalharga = $totalharga - $diskon;
              // }

              echo "Lama menginap : " . $selisihhari . " hari" . "<br>";
              echo "Harga penginapan : Rp. " .$total_harga. "<br>";
              echo "Apakah Anda Yakin? Klik tombol pesan untuk proses lebih lanjut";
            } ?>

            <input type="submit" name="konfirmasi" class="btn btn-success mt-3 mb-3 text-white" style="width: 88%;" value="Konfirmasi">
            <input type="submit" name="booking" class="btn btn-primary  mb-4  text-white" style="width: 88%;" value="Pesan">

          </form>
        </div>