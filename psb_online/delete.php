<?php

include("config.php");

if( isset($_GET['id_anggota']) ){

    // ambil id dari query string
    $id = $_GET['id_anggota'];

    // buat query hapus
    $sql = "DELETE FROM anggota WHERE id_anggota=$id_anggota";
    $query = mysqli_query($kon, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: index.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>