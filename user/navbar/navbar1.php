<!DOCTYPE html>
<html>
<head>
	<title>nav</title>

  <style type="text/css">
    .login{ position: right; color: rgb(128,128,128);  }

  </style>

</head>
<body>

        <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="logo mx-5 ">
          <a href="http://ti.lab.gunadarma.ac.id/">
            <img src="css/img/logoti1.png" width="30px">
          </a>
        </div>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/index.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register/register.php">Daftar</a>
            </li>
          </ul>
          <div class="nav-item">
            <a class="login" href="/login/login.php">Login</a>
          </div>
        </div>
      </nav>

</body>
</html>
