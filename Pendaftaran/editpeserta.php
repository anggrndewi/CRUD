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
    <form method='POST' action="updatepeserta.php">
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
                    <td>: <input value='<?php echo $row['Nama_Alumni']?>' type='text' name='nama' size='50' maxlength='30'>
                          <input value='<?php echo $row['id']?>' type='hidden' name='id' size='50' maxlenght='30'>
                </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <input value='<?php echo $row['Alamat'] ?>' type='textarea' name='komentar' rows='3' cols='50' maxlength='200'></td>
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
                    <td> <input type='radio' name='jenis_kelamin' value='pria'<?php echo gender('pria', $row['Jenis_Kelamin'])?>>pria
                         <input type='radio' name='jenis_kelamin' value='wanita'<?php echo gender('wanita', $row['Jenis_Kelamin'])?>>wanita</td>
                    </td>
                </tr>
                <tr>
                    <td>Hobi</td>
                    <?php
                        $ambilhobi = explode(', ',$row['Hobi'] );
                    ?>
                    <td><p>: <input type='checkbox' name='hobi[]' value='MainMusik' 
                    <?php 
                        if(isset($ambilhobi[0])){if($ambilhobi[0]=='MainMusik'){echo "checked";}}
                        if(isset($ambilhobi[1])){if($ambilhobi[1]=='MainMusik'){echo "checked";}}
                        if(isset($ambilhobi[2])){if($ambilhobi[2]=='MainMusik'){echo "checked";}}
                        if(isset($ambilhobi[3])){if($ambilhobi[3]=='MainMusik'){echo "checked";}}
                        if(isset($ambilhobi[4])){if($ambilhobi[4]=='MainMusik'){echo "checked";}}
                    ?> 
                    >Main Musik
                    <input type='checkbox' name='hobi[]' value='Membaca'
                    <?php 
                        if(isset($ambilhobi[0])){if($ambilhobi[0]=='Membaca'){echo "checked";}}
                        if(isset($ambilhobi[1])){if($ambilhobi[1]=='Membaca'){echo "checked";}}
                        if(isset($ambilhobi[2])){if($ambilhobi[2]=='Membaca'){echo "checked";}}
                        if(isset($ambilhobi[3])){if($ambilhobi[3]=='Membaca'){echo "checked";}}
                        if(isset($ambilhobi[4])){if($ambilhobi[4]=='Membaca'){echo "checked";}}
                    ?> 
                    >Membaca
                    <input type='checkbox' name='hobi[]' value='Berenang'
                    <?php 
                        if(isset($ambilhobi[0])){if($ambilhobi[0]=='Berenang'){echo "checked";}}
                        if(isset($ambilhobi[1])){if($ambilhobi[1]=='Berenang'){echo "checked";}}
                        if(isset($ambilhobi[2])){if($ambilhobi[2]=='Berenang'){echo "checked";}}
                        if(isset($ambilhobi[3])){if($ambilhobi[3]=='Berenang'){echo "checked";}}
                        if(isset($ambilhobi[4])){if($ambilhobi[4]=='Berenang'){echo "checked";}}
                    ?> 
                    >Berenang
                    <input type='checkbox' name='hobi[]' value='Memancing'
                    <?php 
                        if(isset($ambilhobi[0])){if($ambilhobi[0]=='Memancing'){echo "checked";}}
                        if(isset($ambilhobi[1])){if($ambilhobi[1]=='Memancing'){echo "checked";}}
                        if(isset($ambilhobi[2])){if($ambilhobi[2]=='Memancing'){echo "checked";}}
                        if(isset($ambilhobi[3])){if($ambilhobi[3]=='Memancing'){echo "checked";}}
                        if(isset($ambilhobi[4])){if($ambilhobi[4]=='Memancing'){echo "checked";}}
                    ?> 
                    >Memancing
                    <input type='checkbox' name='hobi[]' value='Menggambar'
                    <?php 
                        if(isset($ambilhobi[0])){if($ambilhobi[0]=='Menggambar'){echo "checked";}}
                        if(isset($ambilhobi[1])){if($ambilhobi[1]=='Menggambar'){echo "checked";}}
                        if(isset($ambilhobi[2])){if($ambilhobi[2]=='Menggambar'){echo "checked";}}
                        if(isset($ambilhobi[3])){if($ambilhobi[3]=='Menggambar'){echo "checked";}}
                        if(isset($ambilhobi[4])){if($ambilhobi[4]=='Menggambar'){echo "checked";}}
                    ?> 
                    >Menggambar

                    </td>
                </tr>
                <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td>: <input value='<?php echo $row['Tempat']?>' type='text' name='tempat' size='30' maxlength='20'></td> 
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: <input value='<?php echo $row['Tanggal']?>' type='date' name='tanggal'></td>
                </tr>
                <tr>
                    <td>Telp</td>
                    <td>: <input value='<?php echo $row['Telp']?>' type='text' name='telp' id='telp' size='50' maxlength='30'> </td>
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
                    <td>: <input value='<?php echo $row['Email']?> ' type='email' name='surat' size='50' maxlength='30'> </td>
                </tr>
                <tr>
                    <td align='left' colspan='2'><font color='red'>3. User Account</td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td>: <input value='<?php echo $row['UserName']?>' type='text' name='username' size='50' maxlength='30'> </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>: <input value='<?php echo $row['Password']?>' type='password' name='kunci' size='30' maxlength='30'> </td>
                </tr>
                <tr>
                    <td align='left' colspan='2'> <p class="br4"><font color='red'>4.Foto</td></p>
                </tr>
                <tr>
                    <td>FOTO</td> 
                    <td>: <input value='<?php echo $row['Foto']?>'  type='file' name='foto' accept='image/*'> </td>
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
<a href='PR3.php'> <button>Tampil</button></a>
</center>
</body>
</html>