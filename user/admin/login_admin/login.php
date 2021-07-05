<?php 
session_start();
require '../function/function.php';

//cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];
//ambil username berdasarkan id
	$result = mysqli_query($conn,"SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
//cek cookie dan username
	if ($key === hash('sha256', $row['username']) ){
		$_SESSION['login_admin'] = true;
	}
}

if ( isset($_SESSION["login_admin"]) ) {
	header("location: ../index.php");
	exit;
}


//cek udah submit apa belom
		if( isset($_POST["login_admin"]) ){

			$username = $_POST["username"];
			$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
//cek username
		if( mysqli_num_rows($result) === 1){
			//cek pass
			$row = mysqli_fetch_assoc($result);

			if (password_verify($password, $row["password"]) ){
				$_SESSION["login_admin"] = true;
			$_SESSION["username"] = $_POST["username"];
			//cek remember me
			if( isset($_POST['remember']) ){
			//buat cookie

				setcookie('id',$row['id'],time()+60);
				setcookie('key',hash('sha256', $row['username']),time()+60);
			}

				header("location: ../index.php");
				exit;
			}
		}
		$error = true;
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>

	<br><br>
	<center>
		<h1>Login</h1>
	</center>
	
	<div class="login">
	<?php if ( isset($error)) : ?>
		<p style="color: red; font-style: italic;">Username atau password salah</p>
	<?php endif;  ?>
	<form action="" method="post">
		
			<div>
				<label for="username">Username: </label>
				<input type="text" name="username" id="username">
			</div>

			<div>
				<label for="password">password: </label>
				<input type="password" name="password" id="password">
			</div>

			<div>
				<button type="submit" name="login_admin" class="tombol">LOGIN</button>
			</div>
	</form>
	</div>

</body>
</html>
