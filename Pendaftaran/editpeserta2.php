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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> EDIT PENDAFTARAN PESERTA</title>
    <style>
        body{
            color:blue;
        }
    </style>
</head>
<body>
    <h2><b><p style='text-align: center'>EDIT PENDAFTARAN PESERTA</b></h2>
    <center>
    <form method='POST' action="updatepeserta.php" enctype="multipart/form-data">
    <table border='0' width='70%' height=50 bordercolor='black'>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dewia";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

        $ambilid= $_GET['idn'];
        $sql = "SELECT * FROM pendaftaran WHERE id=$ambilid"; 
        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { //percabangan, jika kondisi terpenuhi maka perintah akan dijalankan sampai kondisi tidak terpenuhi atau bernilai false
            $No = 1;
            
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) { //looping akan trus terjadi sampai terjadi false
                 ?>
                <tr>
                    <td align='left' colspan='2'><font color='red'>1.Biodata</td>
                </tr>
                
                <tr>
                    <td>Nama Alumni</td>
                    <td>: <input required value='<?php echo $row['Nama_Alumni']?>' type='text' name='nama' size='50' maxlength='30'>
                          <input required value='<?php echo $row['id']?>' type='hidden' name='id' size='50' maxlenght='30'>
                </td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>: <input required value='<?php echo $row['Alamat'] ?>' type='textarea' name='komentar' rows='3' cols='50' maxlength='200'></td>
                </tr>

                <tr>
                    <?php
                    // membuat data Agama menjadi dinamis dalam bentuk array
                    $Agama    = array('[Pilih]','Islam','Kristen','Budha', 'Hindhu');
                    ?>
                    <td>Agama</td>
                    <td>: <select name="agama" required>
                    <?php
                        foreach ($Agama as $j){
                        echo "<option value='$j' ";
                        echo $row['Agama']==$j?'selected="selected"':'';
                        echo ">$j</option>";
                    }
                    ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <?php
                    // membuat function untuk set aktif radio button
                    function gender($value,$input){
                    // apabila value dari radio sama dengan yang di input
                    $result =  $value==$input?'checked':'';
                    return $result;
                    }
                    ?>
                    <td>Jenis Kelamin</td>
                    <td> <input required type='radio' name='jenis_kelamin' value='pria'<?php echo gender('pria', $row['Jenis_Kelamin'])?>>pria
                         <input required type='radio' name='jenis_kelamin' value='wanita'<?php echo gender('wanita', $row['Jenis_Kelamin'])?>>wanita</td>
                    </td>
                </tr>

                <tr>
                    <td>Hobi</td>
                    <?php 
                    function rumushobi($value,$input){
                        $ambilhobi = explode(', ',$input);
                        if(isset($ambilhobi[0])){if($ambilhobi[0]==$value){echo "checked";}} //isset logika pengecekan ada atau tidak sebuah variabel
                        if(isset($ambilhobi[1])){if($ambilhobi[1]==$value){echo "checked";}} //Nilai Index(0,1,2,3,4) bukan variabel yang pasti
                        if(isset($ambilhobi[2])){if($ambilhobi[2]==$value){echo "checked";}}
                        if(isset($ambilhobi[3])){if($ambilhobi[3]==$value){echo "checked";}}
                        if(isset($ambilhobi[4])){if($ambilhobi[4]==$value){echo "checked";}}
                    }
                    ?>
                    <td><p>:
                            <input type='checkbox' name='hobi[]' value='MainMusik'<?php echo rumushobi('MainMusik', $row['Hobi'])?>>Main Musik
                            <input type='checkbox' name='hobi[]' value='Membaca'<?php echo rumushobi('Membaca', $row['Hobi'])?>>Membaca
                            <input type='checkbox' name='hobi[]' value='Berenang'<?php echo rumushobi('Berenang', $row['Hobi'])?>>Berenang
                            <input type='checkbox' name='hobi[]' value='Memancing'<?php echo rumushobi('Memancing', $row['Hobi'])?>>Memancing
                            <input type='checkbox' name='hobi[]' value='Menggambar'<?php echo rumushobi('Menggambar', $row['Hobi'])?>>Menggambar

                    </td>
                </tr>

                <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td>: <input required value='<?php echo $row['Tempat']?>' type='text' name='tempat' size='30' maxlength='20'></td> 
                </tr>

                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: <input required value='<?php echo $row['Tanggal']?>' type='date' name='tanggal'></td>
                </tr>

                <tr>
                    <td>Telp</td>
                    <td>: <input required value='<?php echo $row['Telp']?>' type='text' name='telp' id='telp' size='50' maxlength='30'> </td>
                </tr>
                
                <tr>
                    <td align='left' colspan='2'><font color='red'>2.Online Status</td>
                </tr>

                <tr>
                    <?php
                    // membuat data Agama menjadi dinamis dalam bentuk array 
                    $Pop3    = array('[Pilih]', 'g.mail','yahoo','microsoft');
                    ?>
                    <td>POP 3</td>
                    <td>: <select name="pop3" required>
                    <?php
                        foreach ($Pop3 as $j){
                        echo "<option value='$j' ";
                        echo $row['Pop3']==$j?'selected="selected"':'';
                        echo ">$j</option>";
                    }
                    ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>E-mail</td>
                    <td>: <input required value='<?php echo $row['Email']?> ' type='email' name='surat' size='50' maxlength='30'> </td>
                </tr>

                <tr>
                    <td align='left' colspan='2'><font color='red'>3. User Account</td>
                </tr>

                <tr>
                    <td>User Name</td>
                    <td>: <input required value='<?php echo $row['UserName']?>' type='text' name='username' size='50' maxlength='30'> </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>: <input required value='<?php echo $row['Password']?>' type='password' name='kunci' size='30' maxlength='30'> </td>
                </tr>

                <tr>
                    <td align='left' colspan='2'> <p class="br4"><font color='red'>4.Foto</td></p>
                </tr>

                <tr>
            
                <td>FOTO</td>
                <td>: <input type='file' id='fileToUpload' name='fileToUpload' > 
                      <input value='<?php echo $row['Foto']?>' type='hidden' name='Foto1'>
                      <img src= "Gambar/<?php echo $row['Foto']; ?>" id='ambilimage' width='100' height='100'/>
                </td>
                </tr>

                <tr>
                    <td align='center' colspan='2'> <a href='updatepeserta.php?idn=<?php echo $row['id1']?>'><button> Update </button> </a>
                    <input type='RESET' name='Batal' value='Batal'>
                    </td>
                </tr>
<?php
        }
    }
    ?>
</table>
</form>
        <script src="jquery.min.js"> </script>
            <script>
                function readURL(input){
                    if (input.files && input.files[0]){
                        var reader = new FileReader();

                        reader.onload = function(e) {
                        $('#ambilimage').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                    $('#fileToUpload').change(function(){
                        readURL(this);
                    });
            </script>
<a href='PR3.php'> <button>Tampil</button></a>
</center>
</body>
</html>