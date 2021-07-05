<?php 

session_start();
//cek user dah login apa belom
if ( !isset($_SESSION["login_admin"]) ){
	header("location: login_admin/login.php");
	exit;
}

require '../function/function_edit.php';

//ambil data
	$id = $_GET["id"];

//query data mahasiswa berdasarkan id
	$mhs = query("SELECT * FROM peserta WHERE id = $id")[0];

//cek tombol submit dah ditekan apa belom
	if( isset($_POST["submit"]) ){


//cek apakah data berhasil di tambahatau tidak 
	if ( ubah($_POST) > 0 ){
		echo "
			<script>
				alert('Data berhasil diubah');
				document.location.href = '../edit.php';
			</script>
			";
		} else {
			echo "
			<script>
				alert('Data gagal diubah');
				document.location.href = '../edit.php';
			</script>
			";
		}
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>ubah data</title>
	<link rel="stylesheet" type="text/css" href="../css/update.css">
</head>
<body>

	<form action="" method="post" enctype="multipart/form-data">	
	<input type="hidden" name="id" value="<?php echo $mhs["id"] ?>">
	<input type="hidden" name="gambarLama" value="<?php echo $mhs["gambar"] ?>">
	<input type="hidden" name="persyaratanLama" value="<?php echo $mhs["persyaratan"] ?>">

		 <div class="form-profile">

		    <div class="form">
		    <h2 style="text-align: center;">Ubah data</h2>
		    <table width="430">
		        <tr>
		          <th width="216" scope="row">Nama</th>
		          <td width="200"><label for="nama"></label>
		          <input type="text" name="nama" id="nama" value="<?php echo $mhs["nama"] ?>" />
		      	  </td>
		        </tr>
		        <tr>
		          <th scope="row">NPM</th>
		          <td><label for="kelas"></label>
		          <input type="text" name="npm" id="npm" value="<?php echo $mhs["npm"] ?>" /></td>
		        </tr>
		        <tr>
		          <th scope="row">Kelas</th>
		          <td><label for="kelas"></label>
		          <input type="text" name="kelas" id="kelas" value="<?php echo $mhs["kelas"] ?>" /></td>
		        </tr>
		        <tr>
		          <th scope="row">Tlp</th>
		          <td><label for="no_tlp"></label>
		          <input type="text" name="no_tlp" id="no_tlp"  value="<?php echo $mhs["no_tlp"] ?>" /></td>
		        </tr>
		        <tr>
		          <th scope="row">Jurusan</th>
		          <td><label for="jurusan"></label>
		          <input type="text" name="jurusan" id="jurusan" value="<?php echo $mhs["jurusan"] ?>" /></td>
		        </tr>
		        <tr>
		          <th scope="row">persyaratan</th>
		          <td><label for="persyaratan"></label>
		          <a href="../file/<?php echo $mhs["persyaratan"] ?>" hidden=""></a>
		          <label><?php echo $mhs["persyaratan"] ?></label>
		          <input type="file" name="persyaratan" id="persyaratan" /></td>
		        </tr>
		      <tr>
		          <th scope="row">Gambar</th>
		          <td><label for="gambar"></label>
		          	<img src="../img/<?php echo $mhs["gambar"] ?>" width="60"><br>
		          <input type="file" name="gambar" id="gambar" /></td>
		        </tr>
		      </table>
		      <br>
		      <button type="submit" name="submit" style="margin-left: 175px;">Update</button>
		    </div>
		  </div>

	</form>

</body>
</html>
