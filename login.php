<?php
    include "koneksi.php";
    session_start();
    $login_message = "";

    if(isset($_POST['logiz'])){
        $username = $_POST['nama'];
        $password = $_POST['pw'];


    $sql = " SELECT * FROM tbl_admin where username='$username' and password='$password' ";
    
    $hasil = $conn->query($sql);

    //untuk mengambil satu baris dari hasil kueri database
    $data = $hasil ->fetch_assoc();
    $_SESSION["username"] = $data["username"];

    if($hasil->num_rows > 0){
        header("location:  dashboard/index.php");
    } else{
        $login_message = "akun tidak ditemukan.";
    }


    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-4/assets/css/login-4.css">

  </head>
  <body>
  <!-- Login 4 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5" style="margin-top: 70px;">
  <div class="container" style="box-shadow: 10px 9px 14px 3px rgba(0,0,0,0.75); border-radius: 10px;">
    <div class="card border-light-subtle shadow-sm">
      <div class="row g-0">
        <div class="col-12 col-md-6">
          <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="assets/img/3.jpg" alt="BootstrapBrain Logo">
        </div>
        <div class="col-12 col-md-6">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h3>Log-in</h3>
                </div>
              </div>
            </div>
            <form action="" method="post">
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                  <label for="nama" class="form-label">Username <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="name@example.com" required>
                </div>
                <div class="col-12">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="pw" id="password" value="" required>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-xl text-light" style="background-color: #64a19d;" name="logiz" type="submit">Log-in Sekarang</button>
                  </div>
                </div>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>   
    <?php 
    echo $login_message;
    ?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>