<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dewia";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$nama1 = $_POST['nama'];
$alamat1 = $_POST['komentar'];
$Agama1 = $_POST['agama'];
$jenis_kelamin1 = $_POST['jenis_kelamin'];
$hobi1 = $_POST['Hobi'];
$tempat1 = $_POST['tempat'];
$tanggal1 = $_POST['tanggal'];
$telp1 = $_POST['telp'];
$pop31 = $_POST['pop3'];
$email1 = $_POST['surat'];
$username1 = $_POST['username'];
$password1 = $_POST['kunci'];
$foto1 = $_POST['foto'];

$sql = "INSERT INTO pendaftaran (id, Nama, Alamat, Agama, JenisKelamin, Hobi, Tempat, Tanggal, Telp, Pop3, Email, UserName, Password, Foto)
VALUES ('', '$nama1', '$alamat1', '$Agama1', '$jenis_kelamin1', '$hobi1', '$tempat1', '$tanggal1', '$telp1', '$pop31', '$email1', '$username1', '$password1', '$foto1' )";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 