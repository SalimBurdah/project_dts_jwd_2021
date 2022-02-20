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
    <title>Form Pendaftaran Anggota</title>
    <!-- Load file CSS Bootstrap offline -->
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
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Calon Peserta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Daftar Baru</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container" style="margin-top:20px">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "config.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['id_anggota'])) {
        $id_anggota=input($_GET["id_anggota"]);

        $sql="select * from anggota where id_anggota=$id_anggota";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_anggota=htmlspecialchars($_POST["id_anggota"]);
        $nama_peserta=input($_POST["nama_peserta"]);
        $alamat=input($_POST["alamat"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
        $agama=input($_POST["agama"]);
        $sekolah_asal=input($_POST["sekolah_asal"]);

        //Query update data pada tabel anggota
        $sql="update anggota set
            nama_peserta='$nama_peserta',
            alamat='$alamat',
            jenis_kelamin='$jenis_kelamin',
            agama='$agama',
            sekolah_asal='$sekolah_asal'
            where id_anggota=$id_anggota";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:home.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Peserta</label>
            <div class="col-sm-10">
            <input type="text" name="nama_peserta" class="form-control" value="<?php echo $data['nama_peserta']; ?>" placeholder="Masukan Nama Peserta" required />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
            <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" placeholder="Masukan Alamat" required/>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" name="jenis_kelamin">Jenis Kelamin</label>
            <div class="col-sm-10">
                <div class="form-check">
                <label><input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki">Laki-Laki</label>
            </div>

            <div class="form-check">
                    <label><input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">Perempuan</label>
                </div>
            </div>

        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-10">
            <select class="form-control" name="agama" value="<?php echo $data['agama']; ?>">
                <option value="">Pilih Salah Satu</option>
                <option>Buddha</option>
                <option>Hindu</option>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Katolik</option>
            </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Sekolah Asal</label>
            <div class="col-sm-10">
            <input type="text" name="sekolah_asal" class="form-control" value="<?php echo $data['sekolah_asal']; ?>" placeholder="Masukan Sekolah Asal" required/>
        </div>

        <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>