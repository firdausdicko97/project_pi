<?php 
session_start();
//cek user dah login apa belom
if ( !isset($_SESSION["login_admin"]) ){
  header("location: login_admin/login.php");
  exit;
}

  require 'function/function_edit.php';
//pagination
//konfigurasi
  $jumlahDataPerHalaman = 3;
  $jumlahData = count(query("SELECT * FROM peserta"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  $halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

  $mahasiswa = query("SELECT * FROM peserta LIMIT $awalData, $jumlahDataPerHalaman ");
  
//tombol cari di klik akan menampilkan yang dicari
  if( isset($_POST["cari"]) ){
    $mahasiswa = cari($_POST["keyword"]);
  }
 ?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Admin</title>
  <?php require 'link/link.php' ?>

</head>
<body class="sidebar-mini layout-fixed sidebar-closed sidebar-collapse">

<div class="wrapper">

  <?php require 'nav/navbar.php' ?>

<center>
<!-- Navigation -->
   <?php if( $halamanAktif > 1) : ?>
      <a href="?halaman=<?= $halamanAktif -1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
      <?php if( $i == $halamanAktif) : ?>
        <a href="?halaman=<?php echo $i; ?>" style="font-weight: bold;"><?php echo $i; ?></a>
      <?php else : ?>
        <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
      <?php endif; ?>
    <?php endfor; ?>

    <?php if( $halamanAktif < $jumlahHalaman) : ?>
      <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
    <?php endif; ?> 
</center>
  <?php require 'tabel/tabel.php' ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
  <?php require 'js/js.php' ?>

</body>
</html>
