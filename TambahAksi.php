<?php 
// koneksi database
include 'Koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$alamat = $_POST['alamat'];

// menginput data ke database
mysqli_query($koneksi,"insert into mahasiswa values('','$nama','$nim','$alamat')");

// mengalihkan halaman kembali ke index.php
header("location:Index.php");

?>