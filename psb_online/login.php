<?php 

    // Membuat session start agar sessionnya berjalan
    session_start();

    // Mengkaitkan file koneksi.php untuk menghubungkan database MySQL
    include 'config.php';

    // Ketika tombol input dari name login ditekan
    if (isset($_POST['login'])) {
        // Mengecek akun admin tersedia atau tidak dan mencari username dari tb_admin yang telah di inputkan kedalam text box user dan password
        // Menggunakan htmlspecialchars untuk mencegah user yang jahil
        $cek = mysqli_query($kon, "SELECT * FROM  tb_admin WHERE username = '".htmlspecialchars($_POST['user'])."' AND password = '".MD5(htmlspecialchars($_POST['pass']))."' ");

        // Jika akunnya tersedia maka akan masuk kedalam file halaman beranda.php
        if (mysqli_num_rows($cek) > 0) {

            // Menyimpan data admin yang masuk kedalam object mysqli_fetch_object
            $a = mysqli_fetch_object($cek);

            // Membuat session ketika login berhasil
            $_SESSION['stat_login'] = true;
            $_SESSION['id'] = $a -> id_admin;
            $_SESSION['nama'] = $a -> nm_admin;

            echo '<script>window.location="beranda.php"</script>';

        // Jika akunnya tidak tersedia maka akan mencetak Login Gagal
        } else {
            echo '<script>alert("Login Gagal, Username atau password Anda salah")</script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Telant</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- My Icon -->
    <link rel="shortcut icon"  href="img/kominfo.png" />

    <!-- My Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- My Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">DIGITAL TALENT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form action="" class="d-flex gap-2">
                <a class="btn btn-primary bi bi-window" href="index.php"> Halaman Utama</a>
            </form>
        </div>
    </nav>
    
    <!-- Bagian main login -->
    <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Login Admin</h5>
            <form method="post">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="user" id="floatingInput" placeholder="ex: Salimburdah" required>
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
              </div>
              <div class="d-grid">
                <button class="btn btn-success btn-login text-uppercase fw-bold" name="login" value="Login" type="submit"><i class="bi bi-arrow-right-circle"></i> Masuk</button>
                <a class="btn btn-register" href="create.php"><i class="bi bi-layout-text-sidebar"></i> Daftar Peserta</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="copyright text-center text-white font-weight-bold bg-dark p-2">
        <p>Salim Burdah Copyright &copy; 2021</p>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>