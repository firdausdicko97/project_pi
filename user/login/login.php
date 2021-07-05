<?php 
session_start();
require 'function_login.php';

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

if ( isset($_SESSION["login"]) ) {
  header("location: ../index.php");
  exit;
}


//cek udah submit apa belom
if( isset($_POST["login"]) ){

  $username = $_POST["username"];
  $password = $_POST['password'];
  $query = "SELECT * FROM login WHERE username = '$username' ";
  $result = mysqli_query($conn, $query);
//cek username
  if( mysqli_num_rows($result) == 1){
      //cek pass
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"]) ){
      $_SESSION["login"] = true;

// //untuk mengirim id ke session
       while ($row) {
         $_SESSION["id1"] = $row['id'];
    echo "
      <script>
        alert('Selamat Datang');
        document.location.href = '../index.php';
      </script>
      ";
       }

//cek remember me
      // if( isset($_POST['remember']) ){
      // //buat cookie

      //   setcookie('id',$row['id'],time()+60);
      //   setcookie('key',hash('sha256', $row['username']),time()+60);
      // }

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
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>

	<img class="wave" src="img/waave.png">

	<div class="container">
		<div class="img">
			<img src="img/undraw_cloud_files_wmo8.svg">
		</div>

		<div class="login-content">

			<form action="" method="POST">
				<h2 class="title"><b>Laboratorium Teknik Informatika</b></h2>
        <div>
          <h3 class="title">Kalimalang</h3>            
        </div>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <input type="text" class="input" name="username" id="username" placeholder="Username" required>
          </div>
        </div>
        <div class="input-div pass">
          <div class="i"> 
            <i class="fas fa-lock"></i>
          </div>
          <div class="div">
            <input type="password" class="input" name="password" id="password" placeholder="password" required>
          </div>
        </div>
          <a href="../index.php">Kembali</a>
        <div class="error">
          <?php if ( isset($error)) : ?>
            <p style="color: red; font-style: italic;">Username atau password salah</p>
          <?php endif;  ?>
        </div>
        <button type="submit" class="btn" name="login">Login</button>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="js/main.js"></script>

</body>
</html>
