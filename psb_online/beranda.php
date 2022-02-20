<?php 
    // Membuat session start agar sessionnya berjalan
    session_start();

    // Mengkaitkan file koneksi.php untuk menghubungkan database MySQL
    include 'config.php';

    // Jika session status login tidak sama dengan true / tidak benar
    if ($_SESSION['stat_login'] != true) {

        // Maka akan dialihkan ke halaman login kembali
        echo '<script>window.location="login.php"</script>';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />
<title>DIGITAL TALENT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    
    <!-- My Icon -->
    <link rel="shortcut icon"  href="img/kominfo.png" />

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">DIGITAL TALENT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Calon Peserta</a>
                    </li>
                    <a class="nav-link text-black" href="login.php"><i class="bi bi-arrow-90deg-right"></i> Logout</a>
                </ul>
            </div>
        </div>
    </nav>


<!-- Bagian content -->
        <h2 class="text-center pt-5">Beranda</h2>
        <div class="card-body d-flex align-items-center">
            <div class="col-md-3">
                <img src="img/img3.svg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="container">
                <h5 class="card-title">Halo <?php echo $_SESSION['nama'] ?>, Selamat Datang di beranda Admin</h5>
                <p class="card-text">Selamat beraktifitas, sekarang kamu dapat melihat halaman data calon peserta yang telah terdaftar.</p>
            </div>
        </div>

        <div class="card-body d-flex align-items-center">
            <div class="container">
                <h5 class="text-end">Hai <?php echo $_SESSION['nama'] ?>, Jangan lupa pakai masker</h5>
                <p class="text-end">Untuk keselamatan dan kenyamanan dalam bekerja jangan lupa tetap pakai masker dan taati peraturan Prokes yang ada.</p>
            </div>
            <div class="col-md-3">
                <img src="img/img2.svg" class="img-fluid rounded-start" alt="...">
            </div>
        </div>
    </div>
    <div class="copyright text-center text-white font-weight-bold bg-dark p-2">
        <p>Salim Burdah Copyright &copy; 2021</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>