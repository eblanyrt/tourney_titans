<?php
    include '../db.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit();
    }
?>
<!doctype html>
<html lang="en">
  <head>

    <!-- Judul Website  -->
    <title>HALAMAN ADMIN</title>

    <!-- Mengubah Icon Website -->
    <link rel="shortcut icon" href="../logo.png">


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

          <link rel="stylesheet" type="text/css" href="https://kit.fontawesome.com/398b3a9007.js" crossorigin="anonymous">
          <link rel="stylesheet" type="text/css" href="tampilan_data.css">

          <!-- Link untuk animasi -->
          <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

          <!-- Link untuk fonts -->
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Bebas+Neue&family=Josefin+Sans&display=swap" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">


    <!-- Link untuk alert -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>

  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container">
        <a class="navbar-brand text-light" href="../home.html"><img src="../logo.png" height="54px"></a>
        <a href="destroy.php">Logout</a><br><br>
        <h1>HALAMAN ADMIN</h1>
      </div>
    </nav>

    <div id="judul">
      <a href="halaman_admin.php"><- Back</a><br><br>
      <h2>LEGEND TOURNAMENT</h2>
    </div>
      
    <table class="table table-success table-striped">
      <tr style="font-weight: bolder;">
        <td>Nama Tim</td>
        <td>Email</td>
        <td>Nomor WA</td>
        <td>Steam Link 1</td>
        <td>Slot</td>
        <td>Medal Anggota</td>
        <td>Receipt Pembayaran</td>
        <td>Bukti Transfer</td>
        <td>Ubah/Hapus Data</td>
      </tr>
      <?php
        $query = mysqli_query($conn, "SELECT * FROM legend");
        while($row = mysqli_fetch_array($query)){
      ?>
      <tr>
        <td><?php echo $row['nama_tim'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['nomor_wa'] ?></td>
        <td><?php echo $row['steam_link1'] ?></td>
        <td><?php echo $row['slot'] ?></td>
        <td><?php echo $row['medal_anggota'] ?></td>
        <td>
          <a href="../receipt_pembayaran/legend/<?php echo $row['receipt_pembayaran'] ?>">
            <?php echo $row['receipt_pembayaran'] ?></td>
          </a>
        <td> 
          <a href="../gambar_upload/legend/<?php echo $row['bukti_transfer'] ?>">
            <img src="../gambar_upload/legend/<?php echo $row['bukti_transfer'] ?>" height="100px" width="100px">
          </a>
        </td>
        <td>
          <a href="hapus.php?id=<?php echo $row['id']; ?>&nama_tabel=legend&nama_halaman=legend_tampilan">Hapus</a> |
          <a href="ubahdata_tournament.php?id=<?php echo $row['id']; ?>&nama_tabel=legend&nama_halaman=legend_tampilan">Ubah</a>
        </td>
      </tr>
      <?php } ?>

    </table>







    <!-- Script untuk apply ke semua animasi -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init({
      duration: 800
    });
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>