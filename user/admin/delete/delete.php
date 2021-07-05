<?php 

session_start();
//cek user dah login apa belom
if ( !isset($_SESSION["login_admin"]) ){
	header("location: ../admin/login/login.php");
	exit;
}

require '../function/function_edit.php';

	$id = $_GET["id"];

	if( hapus($id) > 0 ){
		echo "
			<script>
				alert('Data berhasil dihapus');
				document.location.href = '../edit.php';
			</script>
			";
		} else {
			echo "
			<script>
				alert('Data gagal di hapus');
				document.location.href = '../edit.php';
			</script>
			";
		}

 ?>