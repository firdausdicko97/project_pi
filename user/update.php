<?php 

session_start();
require '../user/function/function_update.php';

//cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];
//ambil username berdasarkan id
  $result = mysqli_query($conn,"SELECT username FROM login WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
//cek cookie dan username
  if ($key === hash('sha256', $row['username']) ){
    $_SESSION['login'] = true;
  }
}

//cek user dah login apa belom
if ( !isset($_SESSION["login"]) ){
  header("location: ../user/login/login.php");
  exit;
}

//ambil data dari session yang dikirim
$id = query("SELECT * FROM peserta WHERE id = '" .$_SESSION["id1"]. "' ")[0];
		if(($id == null)){
			      echo "
      <script>
        alert('Anda harus daftar');
        document.location.href = 'daftar.php';
      </script>
      ";
		}

//cek tombol submit dah ditekan apa belom
if( isset($_POST["submit"]) ){


//cek apakah data berhasil di tambahatau tidak 
  if ( ubah($_POST) > 0 ){
    echo "
    <script>
    alert('Data berhasil diubah');
    document.location.href = 'update.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('Data gagal diubah');
    document.location.href = 'update.php';
    </script>
    ";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>profile</title>

  <?php require 'link/link.php' ?>

  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <link rel="stylesheet" type="text/css" href="/css/footer.css">
  <link rel="stylesheet" type="text/css" href="/css/update.css">
  
</head>
<body>

  <?php require '../user/navbar/navbar.php'; ?>

  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id["id"] ?>">
    <input type="hidden" name="gambarLama" value="<?php echo $id["gambar"] ?>">
    <input type="hidden" name="persyaratanLama" value="<?php echo $id["persyaratan"] ?>">


    <div class="form-profile">
    <div class="panel-heading">
      <div class="panel-title"><h4 style="text-align: center; color: white;">Biodata Asisten</h4></div>
    </div>
      <div class="form">
        <table width="430">
          <tr>
            <th width="216" scope="row">Nama</th>
            <td width="200"><label for="nama"></label>
              <input type="text" name="nama" id="nama" value="<?= $id['nama'] ?>"/></td>
            </tr>
            <tr>
              <th scope="row">NPM</th>
              <td><label for="kelas"></label>
                <input type="text" name="npm" id="npm" value="<?= $id['npm'] ?>"/></td>
              </tr>
              <tr>
                <th scope="row">Kelas</th>
                <td><label for="kelas"></label>
                  <input type="text" name="kelas" id="kelas" value="<?= $id['kelas'] ?>"/></td>
                </tr>
                <tr>
                  <th scope="row">tlp</th>
                  <td><label for="no_tlp"></label>
                    <input type="text" name="no_tlp" id="no_tlp" value="<?= $id['no_tlp'] ?>"/></td>
                  </tr>
                  <tr>
                    <th scope="row">Jurusan</th>
                    <td><label for="jurusan"></label>
                      <input type="text" name="jurusan" id="jurusan" value="<?= $id['jurusan'] ?>"/></td>
                    </tr>
                    <tr>
                      <th scope="row">Persyaratan <br>(max 7MB)</th>
                      <td><label for="persyaratan"></label>
                        <label><?php echo $id["persyaratan"] ?></label>
                        <div class="file">
                          <input type="file" name="persyaratan" id="persyaratan" value="<?php echo $id["persyaratan"] ?>" /></td>
                        </div>
                      </tr>

                      <tr>
                        <th scope="row">Foto <br>(max 3MB)</th>
                        <td><label for="gambar"></label>
                          <img src="../admin/img/<?php echo $id["gambar"] ?>" width="40"><br>
                          <div>
                            <input type="file" name="gambar" id="gambar" value="<?php echo $id["gambar"] ?>" />
                          </td>
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