<?php 
//konek ke dbms
	$conn = mysqli_connect("localhost", "u1025002_dicko", "dicko8240", "u1025002_dick");
	
	function query($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

		function registrasi($data){
		global $conn;

		$username = strtolower (stripslashes($data["username"]) );
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);

//cek username udah ada apa belom
		$result = mysqli_query($conn,"SELECT username FROM login WHERE username = '$username'");

		if( mysqli_fetch_assoc($result) ){
			echo "<script>
					alert('username sudah terdaftar');
					</script>";
			return false;
		}

//cek konfirmasi password
		if( $password !== $password2 ){
			echo "<script>
					alert('Konfirmasi tidak sesuai');
					</script>";
			return false;
		}
//enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

//masukan ke database
		mysqli_query($conn,"INSERT INTO login VALUES('','$username','$password')");
		return mysqli_affected_rows($conn);

	}


?>
