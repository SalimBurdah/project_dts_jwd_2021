<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />
    <title>DIGITAL TALENT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <!--<li class="nav-item active">
                        <a class="nav-link" href="home.php">Calon Peserta</a>
                    </li>
                    <li class="nav-item">-->
                        <a class="nav-link" href="create.php">Daftar Baru</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container" style="margin-top:20px">
    <?php
    //untuk koneksikan ke database
    include "config.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama_peserta=input($_POST["nama_peserta"]);
        $alamat=input($_POST["alamat"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
        $agama=input($_POST["agama"]);
        $sekolah_asal=input($_POST["sekolah_asal"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into anggota (nama_peserta,alamat,jenis_kelamin,agama,sekolah_asal) values
		('$nama_peserta','$alamat','$jenis_kelamin','$agama','$sekolah_asal')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:home.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
            <input type="text" name="nama_peserta" class="form-control" size="4"placeholder="Masukan Nama Peserta" required />
        </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required/>
        </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label pt-0" name="jenis_kelamin">Jenis Kelamin</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <label><input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki" checked>Laki-Laki</label>
                </div>

                <div class="form-check">
                    <label><input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">Perempuan</label>
                </div>
         </div>
         </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-10">
            <select class="form-control" name="agama">
                <option value="">Pilih Salah Satu</option>
                <option >Buddha</option>
                <option >Hindu</option>
                <option >Islam</option>
                <option >Kristen</option>
                <option >Katolik</option>
                 </select>
             </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Sekolah Asal</label>
            <div class="col-sm-10">
            <input type="text" name="sekolah_asal" class="form-control" placeholder="Masukan Sekolah Asal" required/>
            </div>
        </div>

        <div class="form-group row">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </div>
            </div>
    </form>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#0099ff"
          fill-opacity="1"
          d="M0,96L24,90.7C48,85,96,75,144,90.7C192,107,240,149,288,165.3C336,181,384,171,432,181.3C480,
          192,528,224,576,218.7C624,213,672,171,720,176C768,181,816,235,864,234.7C912,235,960,181,1008,
          138.7C1056,96,1104,64,1152,80C1200,96,1248,160,1296,176C1344,192,1392,160,1416,144L1440,128L1440,
          320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,
          320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,
          320,192,320,144,320C96,320,48,320,24,320L0,320Z"
        ></path>
      </svg>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<div class="copyright text-center text-white font-weight-bold bg-dark p-2">
        <p>Salim Burdah Copyright &copy; 2021</p>
    </div>
</body>
</html>