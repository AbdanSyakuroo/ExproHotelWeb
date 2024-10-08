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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Jenis Kamar</h1>
                    <p class="mb-4">Merupakan halaman berisikan jenis kamar yang tersedia di EXPRO Hotel</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3" style="background-color: #64a19d;">
                            <h6 class="m-0 font-weight-bold text-light">Data Jenis Kamar</h6>
                        </div>
                        <div class="card-body">
                            <p>Silahkan menambahkan data jenis Kamar jika tersedia jenis yang baru disini dengan menekan tambah data</p>
                            <form action="insertkamar.php">
                                <button class="btn" style="background-color: #64a19d; color: white;"  type="submit">Tambah Data</button>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered mt-3" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Jenis Kamar</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col" >Keterangan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    $sql = "SELECT * FROM tbl_jenis_kamar";
                                    //mengurutkan dari yang terbaru
                                    $hasil = $conn->query($sql);
                                    $no = 1;

                                    foreach ($hasil as $baris) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td> <?php echo $no++; ?> </td>
                                                <td><?php echo $baris['jenis_kamar']; ?></td>
                                                <td><?php echo "Rp." . number_format($baris['harga'], 2, ",", "."); ?></td>
                                                <td><?php echo $baris['keterangan']; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="edit btn btn-success badge p-2" href="proseskamar.php?id=<?php echo $baris['id_kamar']; ?>">Edit</a> |
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger badge p-2" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">
                                                            Hapus
                                                        </button>
                                                    </div>



                                                </td>
                                            </tr>
                                            </tr>
                                            <!-- start modal hapus -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalHapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi hapus data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="hapus.php" method="post">
                                                            <input type="hidden" name="id" value="<?= $baris['id_kamar'] ?>">
                                                            <div class="modal-body">
                                                                <h5 class="text-center">Apakah anda yakin menghapus data ini?</h5>
                                                                Username :
                                                                <span class="text-danger"><?= $baris['jenis_kamar'] ?></span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary badge p-2" data-bs-dismiss="modal">Tidak</button>
                                                                <a class="hapus btn btn-danger badge p-2" href="deletekamar.php?id=<?php echo $baris['id_kamar']; ?>">Hapus</a>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                            <!-- end modal hapus -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>