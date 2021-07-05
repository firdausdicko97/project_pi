<?php 
//konek ke dbms
//	$conn = mysqli_connect("localhost", "root", "", "pi_admin");
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
		$id 		= htmlspecialchars($data["id"]);
		$npm 		= htmlspecialchars($data["npm"]);
		$nama 		= htmlspecialchars($data["nama"]);

		$no_tlp 		= htmlspecialchars($data["no_tlp"]);
//cek email udah ada apa belom
		// $email1 = mysqli_query($conn,"SELECT email FROM peserta WHERE email = '$email'");
		// if( mysqli_fetch_assoc($email1) ){
		// 	echo "<script>
		// 			alert('email sudah terdaftar');
		// 			</script>";
		// 	return false;
		// }

		$jurusan 	= htmlspecialchars($data["jurusan"]);
		$kelas		= htmlspecialchars($data["kelas"]);


//upload gambar
		$gambar = upload();
		if( !$gambar ){
			return false;
		}

//upload persyaratan
		$persyaratan = persyaratan();
		if ( !$persyaratan ){
			return false;
		}

//query insert data
		$query = "INSERT INTO peserta VALUES('$id', '$nama', '$npm', '$kelas', '$no_tlp', '$jurusan','$persyaratan','$gambar') ";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function upload(){
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

//cek gamabr di upload apa ga
		if( $error === 4){
			echo "<script>
					alert('pilih gambar dulu!');
				</script>";
			return false;
		}

//cek apakah yang di upload itu gambar
		$ekstensiGambarValid = ['jpg','jpeg','png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

		if(!in_array($ekstensiGambar, $ekstensiGambarValid) ){
			echo "<script>
					alert('yang di upload bukan gambar');
				</script>";
			return false;
		}

//cek ukruan gambar lebih gede dr 3mb ga
		if( $ukuranFile > 3000000){
			echo "<script>
					alert('Gambar terlalu besar');
				</script>";
			return false;
		}
//generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

//lolos pengecekan
		move_uploaded_file($tmpName, 'admin/img/' . $namaFileBaru);
		return $namaFileBaru;
	}

	function ubah($data){
		global $conn;

		$id 		= htmlspecialchars($data["id"]);
		$npm 		= htmlspecialchars($data["npm"]);
		$nama 		= htmlspecialchars($data["nama"]);
		$no_tlp 	= htmlspecialchars($data["no_tlp"]);
		$jurusan	= htmlspecialchars($data["jurusan"]);
		$kelas		= htmlspecialchars($data["kelas"]);
		$persyaratanLama= htmlspecialchars($data["persyaratanLama"]);

		$gambarLama = htmlspecialchars($data["gambarLama"]);

//cek apakah user pilih gambar baru apa tidak
		if( $_FILES['gambar']['error'] === 4){
			$gambar = $gambarLama;
		} else {
			$gambar = upload();
		}

		if( $_FILES['persyaratan']['error'] === 4){
			$persyaratan = $persyaratanLama;
		} else {
			$persyaratan = persyaratan();
		}

//query ubah data
		$query = "UPDATE peserta SET 

					npm  	= '$npm',
					nama 	= '$nama',
					no_tlp  = '$no_tlp',
					jurusan	= '$jurusan',
					gambar	= '$gambar',
					kelas	= '$kelas',
					persyaratan = '$persyaratan'

				  WHERE id = $id
				";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}


	function persyaratan(){
		$namaFile = $_FILES['persyaratan']['name'];
		$ukuranFile = $_FILES['persyaratan']['size'];
		$error = $_FILES['persyaratan']['error'];
		$tmpName = $_FILES['persyaratan']['tmp_name'];

//cek gamabr di upload apa ga
		if( $error === 4){
			echo "<script>
					alert('pilih file persyaratan dulu!');
				</script>";
			return false;
		}

//cek apakah yang di upload itu gambar
		$ekstensiPersyaratanValid = ['zip','rar'];
		$ekstensiPersyaratan = explode('.', $namaFile);
		$ekstensiPersyaratan = strtolower(end($ekstensiPersyaratan));

		if(!in_array($ekstensiPersyaratan, $ekstensiPersyaratanValid) ){
			echo "<script>
					alert('yang di upload bukan file');
				</script>";
			return false;
		}

//cek ukruan gambar lebih gede dr 3mb ga
		if( $ukuranFile > 7000000){
			echo "<script>
					alert('Gambar terlalu besar');
				</script>";
			return false;
		}
//generate nama gambar baru
		// $namaFileBaru = uniqid();
		// $namaFileBaru .= '.';
		$namaFileKecil = strtolower($namaFile);

//lolos pengecekan
		move_uploaded_file($tmpName, 'admin/file/' . $namaFileKecil);
		return $namaFileKecil;
	}

	function email($data){
		global $conn;
		$email = strtolower (stripslashes($data["email"]) );

		$result = mysqli_query($conn,"SELECT email FROM peserta WHERE email = '$email'");

		if( mysqli_fetch_assoc($result) ){
			echo "<script>
					alert('email sudah terdaftar');
					</script>";
			return false;
		}
	}

 ?>
