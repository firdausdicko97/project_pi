<?php 

session_start();
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


?>

<!DOCTYPE html>
<html>
<head>
  <title>home</title>

  <?php require 'link/link.php' ?>

  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <link rel="stylesheet" type="text/css" href="/css/footer.css">

</head>

<body>


  <?php 


  if( isset($_SESSION["login"]) ){
    require '../user/navbar/navbar.php';
  }else{
    require '../user/navbar/navbar1.php';
  }


  ?>


  <div class="text-center">
    <div class="col-lg-8 mx-auto">
      <h3><b>Timeline Pendaftaran</b></h3>
      <p class="lead mb-0">Calon Asisten Laboratorium Teknik Informatika </p>
    </div>
  </div><!-- End -->


  <div class="timeline">
    <div class="container left">
      <div class="content">
        <h2>Pendaftaran</h2>
        <p>
          <span class="small text-gray">
            <i class="fa fa-clock-o" aria-hidden="true"> tanggal</i>
          </span>
          <br>Calon asisten dapat melakukan pendaftaran dari menu "Profile". Persyaratan yang diperlukan disatukan menjadi zip/rar dengan format <b>CALAS_NAMA_NPM</b>. Persyaratan yang harus di upload adalah
          <br>
          <ul>
            <li>Surat Lamaran</li>
            <li>CV</li>
            <li>Rangkuman DNS</li>
            <li>Scan KTP</li>
            <li>Scan KRS</li>
            <li>Essay diri dan Labti Min. 600 kata</li>
          </ul>
        </p>
      </div>
    </div>

    <div class="container right">
      <div class="content">
        <h2>Briefing</h2>
        <p>
          <span class="small text-gray">
            <i class="fa fa-clock-o" aria-hidden="true"> tanggal</i>
          </span>
          <br>Pada tahap briefing, calon asisten akan diberikan arahan arahan seputar pelaksanaan ujian yang akan dilaksanakan di masing masing region
        </p>
      </div>
    </div>

    <div class="container left">
      <div class="content">
        <h2>ujian teori</h2>
        <p>
          <span class="small text-gray">
            <i class="fa fa-clock-o" aria-hidden="true"> tanggal</i>
          </span>
          <br>Merupakan ujian pilihan ganda, materi yang di ujikan adalah:
          <br>
          <ul>
            <li>IPTEK</li>
            <li>Java</li>
            <li>C</li>
            <li>Cobol</li>  
            <li>Python</li>
            <li>VB</li>
          </ul>
        </p>
      </div>
    </div>

    <div class="container right">
      <div class="content">
        <h2>ujian praktek</h2>
        <p>
          <span class="small text-gray">
            <i class="fa fa-clock-o" aria-hidden="true"> tanggal</i>
          </span>
          <br>Pada tahap ini calon asisten akan melakukan live coding sesuai dengan waktu yang di tentukan. Bahasa yang di ujikan adalah:
          <br>
          <ul>
            <li>Java</li>
            <li>C</li>
            <li>Cobol</li>
            <li>Pyhton</li>
            <li>VB</li>
          </ul>
        </p>
      </div>
    </div>

    <div class="container left">
      <div class="content">
        <h2>Simulasi dan wawancara</h2>
        <p>
          <span class="small text-gray">
            <i class="fa fa-clock-o" aria-hidden="true"> tanggal</i>
          </span>
          <br>Calon asisten akan melakukan simulasi mengajar dalam lab, materi yang akan diajarkan saat simulasi adalah salah satu bahasa dari materi ujian yang paling dikuasai calon asisten. setelah itu, calon asisten akan melakukan wawancara oleh Staff dan Asisten tetap Laboratorium Teknik Informatika.
        </p>
      </div>
    </div>

    <div class="container right">
      <div class="content">
        <h2>pengumuman</h2>
        <p>
          <span class="small text-gray">
            <i class="fa fa-clock-o" aria-hidden="true"> tanggal</i>
          </span>
          <br>Calon Asisten yang lulus seleksi, dapat dilihat pada menu "Pengumuman".
        </p>
      </div>
    </div>
  </div>

</body>
</html>
<?php require'../user/footer/footer.php' ?>
