<?php 

	global $conn;
	$result = mysqli_query($conn,"SELECT * FROM peserta WHERE id = $id");

	if( isset($result) === 0 ){
		header("location: ../daftar.php");
	}  else {
		header("location: ../update.php");
	}


 ?>