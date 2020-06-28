<?php 

	require '../function/function_login.php';

	if( isset($_POST["register"]) ){

		if( registrasi($_POST) > 0){
			echo "<script>
					alert('user baru ditambahkan');
					document.location.href = '../login/login.php';
					</script>";
		} else {
			echo mysqli_error($conn);
		}

	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>

	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/undraw_cloud_files_wmo8.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<h3 class="title"><b>Registrasi</b></h3><br>

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
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" class="input" name="password2" id="password2" placeholder="re-password" required>
            	   </div>
            	</div>
            	<a href="../login/login.php">Kembali</a>
            	<button type="submit" class="btn" name="register">Register</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>

</body>
</html>