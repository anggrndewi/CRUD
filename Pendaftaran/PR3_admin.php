<?php
 session_start();

 if(!isset($_SESSION["buatsesi"])){
     echo "<script>
     alert('Anda Tidak Boleh Akses Harap Login Dahulu');
     location.href='login_admin.php';
     </script>
     ";
    }
  echo $_SESSION["buatsesi"];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data</title>
</head>
<body>
    <h1><b><p style='text-align:center'>DATA MAHASISWA </b></h1>
    <center>
    <table border='1' width='50%' height='50'>
        <tr>
            <td align='center'>No</td>
            <td align='center'>id</td>
            <td align='center'>Nama</td>
            <td align='center'>Alamat</td>
            <td align='center'>Agama</td>
            <td align='center'>Jenis Kelamin</td>
            <td align='center'>Hobi</td>
            <td align='center'>Tempat Lahir</td>
            <td align='center'>Tanggal Lahir</td>
            <td align='center'>Telp</td>
            <td align='center'>POP3</td>
            <td align='center'>Email</td>
            <td align='center'>UserName</td>
            <td align='center'>Password</td>
            <td align='center'>Foto</td>
            <td align='center'>Action</td>
        </tr>
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

$sql = "SELECT * FROM pendaftaran "; 
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { //perulangan
    $No = 1;
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) { //looping
      ?>
    <tr>
        <td> <?php echo $No++ ?></td>
        <td> <?php echo $row['id']?></td>
        <td> <?php echo $row['Nama_Alumni']?></td>
        <td> <?php echo $row['Alamat']?></td>
        <td> <?php echo $row['Agama']?></td>
        <td> <?php echo $row['Jenis_Kelamin']?></td>
        <td> <?php echo $row['Hobi']?></td>
        <td> <?php echo $row['Tempat']?></td>
        <td> <?php echo $row['Tanggal']?></td>
        <td> <?php echo $row['Telp']?></td>
        <td> <?php echo $row['Pop3']?></td>
        <td> <?php echo $row['Email']?></td>
        <td> <?php echo $row['UserName']?></td>
        <td> <?php echo $row['Password']?></td>
        <td> <img src='Gambar/<?php echo $row['Foto']?>' width='50' height='50'> </td>
        <td> <a href='editpeserta2.php? idn=<?php echo $row['id']?>'> <button>Edit</button> </a>
    <?php
    if($_SESSION["sesirole"]==2){
    ?>    
          <a href='hapuspeserta.php? idn=<?php echo $row['id']?>'> <button onclick='return confirm("Yakin ingin dihapus ?")'>Hapus</button></a>
    <?php
      }
    ?>
      </td>                                                            
    </tr>
<?php
  }
} 
?>
</table>
<a href='PR_2a.php'><button>Form</button></a>
<a href='logout_admin.php'><button>Logout</buttom></a>
</center>
</body>
</html>