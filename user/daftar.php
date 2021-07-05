<?php 

session_start();
//cek user dah login apa belom
if ( !isset($_SESSION["login"]) ){
  header("location: ../user/login/login.php");
  exit;
}

require '../user/function/function_upload.php';

$id = query("SELECT * FROM peserta WHERE id = '" .$_SESSION["id1"]. "' ");

		if(!($id == null)){
			      echo "
      <script>
        alert('Update data diri');
        document.location.href = 'update.php';
      </script>
      ";
		}

//cek tombol submit dah ditekan apa belom
  if( isset($_POST["submit"]) ){


//cek apakah data berhasil di tambahatau tidak 
  if ( tambah($_POST) > 0 ){
    echo "
      <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'update.php';
      </script>
      ";
    } else {
      echo "
      <script>
        alert('Data gagal ditambahkan');
        document.location.href = 'daftar.php';
      </script>
      ";
    }

  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Pendaftaran</title>

    <?php require 'link/link.php' ?>

    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/footer.css">
    <link rel="stylesheet" type="text/css" href="/css/cekdaftar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>

  <?php require '../user/navbar/navbar.php'; ?>

  <form action="" method="post" enctype="multipart/form-data">
  

  <div class="form-profile">
    <div class="panel-heading">
      <div class="panel-title"><h4 style="text-align: center; color: white;">Biodata Asisten</h4></div>
    </div>
    <div class="form">
    <table width="430">
        <input type="hidden" name="id" id="id" value="<?php echo $_SESSION["id1"] ?>"/>
        <tr>
          <th width="216" scope="row">Nama</th>
          <td width="200"><label for="nama"></label>
          <input type="text" name="nama" id="nama" /></td>
        </tr>
        <tr>
          <th scope="row">NPM</th>
          <td><label for="kelas"></label>
          <input type="text" name="npm" id="npm" /></td>
        </tr>
        <tr>
          <th scope="row">Kelas</th>
          <td><label for="kelas"></label>
          <input type="text" name="kelas" id="kelas" /></td>
        </tr>
        <tr>
          <th scope="row">Tlp</th>
          <td><label for="no_tlp"></label>
          <input type="text" name="no_tlp" id="no_tlp" /></td>
        </tr>
        <tr>
          <th scope="row">Jurusan</th>
          <td><label for="jurusan"></label>
          <input type="text" name="jurusan" id="jurusan" /></td>
        </tr>
        <tr>
          <th scope="row">Persyaratan <br>(max 7MB)</th>
          <td><label for="persyaratan"></label>

          <div class="file">
              <input type="file" name="persyaratan" id="persyaratan" /></td>
          </div>

        </tr>
         <tr>
          <th scope="row">Foto <br>(max 3MB)</th>
          <td><label for="gambar"></label>

          <div>
              <input type="file" name="gambar" id="gambar" /></td>
          </div>

        </tr>
      </table>
      <br>
      <button type="submit" name="submit">Submit</button>
    </div>
  </div>
  </form>

</body>
</html>

<?php require'../user/footer/footer.php' ?>
