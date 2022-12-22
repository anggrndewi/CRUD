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

$hobi1 =$_POST['hobi'];
//var_dump($hobi1);
$hobi2 = implode(', ', $hobi1);

$tempat1 = $_POST['tempat'];
$tanggal1 = $_POST['tanggal'];
$telp1 = $_POST['telp'];
$pop31 = $_POST['pop3'];
$email1 = $_POST['surat'];
$username1 = $_POST['username'];
$password1 = $_POST['kunci'];

$target_dir = "Gambar/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// // Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "mp4" && $imageFileType !="3gp" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
$foto1=$_FILES["fileToUpload"]["name"];



$sql = "INSERT INTO pendaftaran (id, Nama_Alumni, Alamat, Agama, Jenis_Kelamin, Hobi, Tempat, Tanggal, Telp, Pop3, Email, UserName, Password, Foto)
VALUES ('', '$nama1', '$alamat1', '$Agama1', '$jenis_kelamin1', '$hobi2', '$tempat1', '$tanggal1', '$telp1', '$pop31', '$email1', '$username1', '$password1', '$foto1' )";

  if (mysqli_query($conn, $sql)) {
    echo " <script>
    alert('Data Tersimpan');
    location.href='PR_2a.php';
    </script>
    ";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
?> 