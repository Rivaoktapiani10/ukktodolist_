<?php 
  session_start();
  if (isset($_SESSION["login"])) {
    header('Location: index.php');
    exit;
  }

  require 'functions.php';

  if(isset($_POST["login"])){
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    //cek username
  if(mysqli_num_rows($result) === 1){
    //cek password
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"])){
      $_SESSION["login"] = true;
      header("Location: index.php");
      exit;
    }
  }
  $error=true; 
}

 ?>


<!doctype html>
<html lang="">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>Login</title>
  </head>
  <body> 

<section class="vh-100" style="background-color: salmon;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <form action="" method="post">
                  <h5 class="fw-normal mb-8 pb-6" align="center" style="letter-spacing: 1px;">Masuk Ke Akun Anda</h5>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="username">Username</label>
                    <input type="username" id="username" name="username" class="form-control form-control-lg" />
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="password" >Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                  </div>

                  <div class="pt-1 mb-4">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit" name="login">Login</button>
                  </div>
                  
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Belum Punya Akun<a href="registrasi.php"
                  style="color: #393f81;">Daftar Disini</a></p>
                  <a href="#!" class="small text-muted">Ketentuan penggunaan</a>
                  <a href="#!" class="small text-muted">Kebijakan privasi</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/bootstrap.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin.js"></script>
   
  </body>
</html>