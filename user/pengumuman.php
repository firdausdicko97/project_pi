 <?php 

 session_start();
//cek user dah login apa belom
 if ( !isset($_SESSION["login"]) ){
  header("location: ../user/login/login.php");
  exit;

}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php require 'link/link.php' ?>
  <style type="text/css">
   .container{
    padding-top: 60px;
  }
</style>
</head>
<body>

  <?php require 'navbar/navbar.php' ?>
  <!-- Start Content Area -->
  <section class="sample-text-area">
   <div class="container">
    <div class="text-center">	
     <h3>PENGUMUMAN PENERIMAAN ASISTEN BARU</h3>
   </div>
   <div class="caption-kompres mt-3"> 
     <p>Halo, Calas Labti!</p>
     <p>Berdasarkan serangkaian tes yang telah dilakukan, berikut adalah peserta Calas yang lolos seleksi :</p>
   </div>

   <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">No. Peserta</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Aditya Arlan</td>
        <td>3KA24</td>
        <td>CXM0001</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Akbar</td>
        <td>3KA99</td>
        <td>CXM0005</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Pras</td>
        <td>3KA20</td>
        <td>CXM0008</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Muhammad Indra</td>
        <td>3KA21</td>
        <td>CXM0011</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Rifki Apis</td>
        <td>3KA21</td>
        <td>CXM0021</td>
      </tr>
    </tbody>
  </table>

  <div class="caption mt-3"> 
    
    <p>
     Selamat kepada calon asisten yang lolos dan bergabung di Laboratorium Teknik Informatika. 
     Dan untuk kaka kaka yang belum beruntung jangan berkecil hati, masih bisa mengikuti oprec semester selanjutnya
     Terima kasih kepada kaka kaka yang sudah berpartisipasi dalam Tes Asisten di Lab TI untuk 3 hari ini
   </p>

   <p>Asisten Baru wajib untuk Briefing dan tanda tangan kontrak pada</p>
   <table class="table-kompres">
     <tbody class="table-kompres-body">
      <tr>
       <td>Hari</td>
       <td>:</td>
       <td>Jumat, 28 Februari 2020</td>
     </tr>
     <tr>
       <td>Pukul</td>
       <td>:</td>
       <td>08:30 - Selesai</td>
     </tr>
     <tr>
       <td>Ruang</td>
       <td>:</td>
       <td>Kampus J2125</td>
     </tr>

   </tbody>
 </table>

 <p class="mt-3">Kegiatan ini bersifat <b>wajib</b> untuk kakak-kakak asisten dan diharapkan datang dengan tepat waktu, terimakasih</p>
 <p class="mt-3"><strong>note: </strong>Menggunakan Pakaian lab seperti biasa</p>
 <p>Terimakasih</p>

</div>
</body>
</html>