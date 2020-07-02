<?php 
//konek ke dbms
	//$conn = mysqli_connect("localhost", "root", "", "pi_admin");
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

	function tambah($data){
//ambil datda dari tiap elemen
		global $conn;
		$npm 		= htmlspecialchars($data["npm"]);
		$nama 		= htmlspecialchars($data["nama"]);
		$no_tlp 	= htmlspecialchars($data["no_tlp"]);
		$jurusan 	= htmlspecialchars($data["jurusan"]);

//upload gambar
		$gambar = upload();
		if( !$gambar ){
			return false;
		}

//query insert data
		$query = "INSERT INTO mahasiswa VALUES 	('', '$nama', '$npm', '$no_tlp', '$jurusan', '$gambar')";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}



	function registrasi($data){
		global $conn;

		$username = strtolower (stripslashes($data["username"]) );
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);

//cek username udah ada apa belom
		$result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");

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
		mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");
		return mysqli_affected_rows($conn);

	}



 ?>
