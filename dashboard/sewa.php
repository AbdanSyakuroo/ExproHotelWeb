<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


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

                <!-- Begin Page Content -->
                <div class="container" style="width: 100%;">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Penyewaan</h1>
                    <p class="mb-4">Merupakan halaman daftar data para pelanggan yang memesan penginapan.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #64a19d;">
                            <h6 class="m-0 font-weight-bold text-light">Data Pelanggan</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="get">
                            <div class="d-flex justify-content-between">
                            <div class="semua">
                                <a class="btn mt-3 " style="background-color: #64a19d; color: white;" href="sewa.php">Semua data</a>
                            </div>
                            
                                <div class="opsi mt-3 w-75">
                                
                            <input type="date" name="check_in" style="width: 750px; margin-top: 5px;">
                            
                                </div>
                                <div class="tombol">
                                     <button class="btn btn-dark mt-3 me-2" type="submit">Search</button>
                                </div>
                            </div>
                            </form>
                           
                            
                           
                                <div class="table-responsive">
                                    <table class="table table-bordered mt-3" width="100%" cellspacing="0">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>No Identitas</th>
                                                <th>No HP</th>
                                                <th>Jenis Kamar</th>
                                                <th>Check-in</th>
                                                <th>Check-out</th>
                                                <th>Durasi</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $sql = "SELECT nama, no_identitas, no_hp , jenis_kamar, harga, check_in, check_out, durasi, jumlah, total
                                        FROM tbl_penyewa
                                        INNER JOIN tbl_jenis_kamar
                                        on tbl_penyewa.id_kamar=tbl_jenis_kamar.id_kamar
                                        ORDER BY check_in ASC;
                                        ";

                                        if(isset($_GET['check_in'])){
                                        $waktu = $_GET['check_in'];
                                        $sql = "SELECT nama, no_identitas, no_hp , jenis_kamar, harga, check_in, check_out, durasi, jumlah, total
                                        FROM tbl_penyewa
                                        INNER JOIN tbl_jenis_kamar
                                        on tbl_penyewa.id_kamar=tbl_jenis_kamar.id_kamar WHERE check_in = '$waktu'";
                                        }

                                        $eksekusi = $conn->query($sql);
                                        $no = 1;
                                        foreach ($eksekusi as $row) {
                                        ?>

                                            <tbody>
                                                <tr>
                                                    <td> <?php echo $no++; ?> </td>
                                                    <td><?= $row['nama'] ?></td>
                                                    <td><?= $row['no_identitas']  ?></td>
                                                    <td><?= $row['no_hp']  ?></td>
                                                    <td><?= $row['jenis_kamar'] . "<br>" . "Rp." . number_format($row['harga'], 2, ",", "."); ?></td>
                                                    <td class="text-center"><?= $row['check_in']  ?></td>
                                                    <td class="text-center"><?= $row['check_out']  ?></td>
                                                    <td class="text-center"><?= $row['durasi'] . "  hari"  ?></td>
                                                    <td class="text-center"><?= $row['jumlah'] . " kamar"  ?></td>
                                                    <td><?= "Rp. " . number_format($row['total'], 2, ",", ".") . ",-" ?></td>

                                                </tr>
                                                </tr>

                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>