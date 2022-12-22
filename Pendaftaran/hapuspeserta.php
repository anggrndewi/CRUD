<?php
 session_start();

 if(!isset($_SESSION["buatsesi"])){
    echo "<script>
    alert('Anda Tidak Boleh Akses Harap Login Dahulu');
    location.href='login.php';
    </script>
    ";
   }
//  echo $_SESSION["buatsesi"];
?>
<!-- Delete form php in my sql -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus</title>
</head>
<body>
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
  $ambilid= $_GET['idn'];
  // sql to delete a record
  $sql = "DELETE FROM pendaftaran WHERE id=$ambilid";

  if (mysqli_query($conn, $sql)) {
    echo "
    <script>
    alert('data berhasil dihapus');
    location.href= 'PR3.php';
    </script>
    ";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }

  mysqli_close($conn);
  ?>
 
 </body>
</html>