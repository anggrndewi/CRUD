<?php
 session_start();

 if(!isset($_SESSION["buatsesi"])){
    echo "<script>
    alert('Anda Tidak Boleh Akses Harap Login Dahulu');
    location.href='login_admin.php';
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
    <title>PENDAFTARAN PESERTA</title>
    <style>
        body{
            color:blue;
        }
    </style>
</head>

<body>
    <h2><b><p style='text-align: center'>PENDAFTARAN PESERTA</b></h2>
    <form method='POST' action='simpan2-a.php' enctype="multipart/form-data">
    <table border='0' width='70%' height=50 bordercolor='black'>
        <tr>
            <td align='left' colspan='2'><font color='red'>1.Biodata</td>
        </tr>

        <tr>
            <td>Nama Alumni</td>
            <td>: <input required type='text' name='nama' size='50' maxlength='30'></td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>: <input required type='textarea' name='komentar' rows='3' cols='50' maxlength='200'></td>
        </tr>

        <tr>
            <td>Agama</td>
            <td>: <select name='agama' required>
                <option value="">[ pilih ]</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindhu">Hindhu</option>
                <option value="Budha">Budha</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>: <input required type='radio' name='jenis_kelamin' value='pria'>Pria
                  <input required type='radio' name='jenis_kelamin' value='Wanita'>Wanita
            </td>
        </tr>

        <tr>
            <td>Hobi</td>
            <td><p>: <input type='checkbox' name='hobi[]' value='MainMusik'>Main Musik
                     <input type='checkbox' name='hobi[]' value='Membaca'>Membaca
                     <input type='checkbox' name='hobi[]' value='Berenang'>Berenang
                     <input type='checkbox' name='hobi[]' value='Memancing'>Memancing
                     <input type='checkbox' name='hobi[]' value='Menggambar'>Menggambar

            </td>
        </tr>
        
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td>: <input required type='text' name='tempat' size='30' maxlength='20'></td> 
        </tr>

        <tr>
            <td>Tanggal Lahir</td>
            <td>: <input required type='date' name='tanggal'></td>
        </tr>

        <tr>
            <td>Telp</td>
            <td>: <input required type='text' name='telp' id='telp' size='50' maxlength='30'> </td>
        </tr>

        <tr>
            <td align='left' colspan='2'><font color='red'>2.Online Status</td>
        </tr>

        <tr>
            <td>POP 3</td>
            <td>: <select name='pop3' required>
                <option value="">[ pilih ]</option>
                <option value="g.mail">g.mail</option>
                <option value="yahoo">yahoo</option>
                <option value="microsoft">microsoft</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>E-mail</td>
            <td>: <input required type='email' name='surat' size='50' maxlength='30'> </td>
        </tr>

        <tr>
            <td align='left' colspan='2'><font color='red'>3. User Account</td>
        </tr>

        <tr>
            <td>User Name</td>
            <td>: <input required type='text' name='username' size='50' maxlength='30'> </td>
        </tr>

        <tr>
            <td>Password</td>
            <td>: <input required type='password' name='kunci' size='30' maxlength='30'> </td>
        </tr>

        <tr>
            <td align='left' colspan='2'> <p class="br4"><font color='red'>4.Foto</td></p>
        </tr>

        <tr>
            <td>FOTO</td>
            <td>: <input required type='file' id='fileToUpload' name='fileToUpload' > 
                    <img id='ambilimage' width='100' height='100'/>
            </td>
        </tr>

        <tr>
            <td  align ='center' colspan='2' ><input type='submit' name='daftar' value='Daftar'> 
            <input type='reset' name='batal' value='Batal'>
            </td>
        </tr>

    </table>
    </form>
    <!-- <script src="jquery.min.js"> </script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <a href='PR3_admin.php'><button>Tampil Data</button></a>
    <a href='logout.php'><button>Logout</buttom></a>
</body>
</html>