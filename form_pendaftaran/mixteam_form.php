<?php
    include '../db.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Judul Website  -->
    <title>Tourney Titans</title>

    <!-- Mengubah Icon Website -->
    <link rel="shortcut icon" href="../logo.png">


     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

          <link rel="stylesheet" type="text/css" href="https://kit.fontawesome.com/398b3a9007.js" crossorigin="anonymous">
          <link rel="stylesheet" type="text/css" href="mixteam_form.css">

          <!-- Link untuk animasi fade -->
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background: rgb(255, 174, 77);">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../payment.html" style="color: rgb(227, 227, 227);">Payment</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../tournament.html" style="color: rgb(227, 227, 227);">Tournament</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../contact.html" style="color: rgb(227, 227, 227);">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="header" data-aos="fade">
      <center>
        <img src="../poster_turnamen/postermix.png">
      </center>
      <br>
    </div>

    <?php
      if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $steam_link = $_POST['steam_link'];
        $nickname = $_POST['nickname'];
        $id_discord = $_POST['id_discord'];
        $role = implode(", ", $_POST['role']);
        $medal = $_POST['medal'];
        $nomor_wa = $_POST['nomor_wa'];

        // untuk receipt pembayaran
        $receipt_pembayaran = $_FILES['receipt_pembayaran']['name'];
        $source_receipt = $_FILES['receipt_pembayaran']['tmp_name'];
        $folder_receipt = '../receipt_pembayaran/mixteam/';
        move_uploaded_file($source_receipt, $folder_receipt . $receipt_pembayaran);

        // untuk gambar
        $bukti_transfer = $_FILES['bukti_transfer']['name'];
        $source_gambar = $_FILES['bukti_transfer']['tmp_name'];
        $folder_gambar = '../gambar_upload/mixteam/';
        move_uploaded_file($source_gambar, $folder_gambar.$bukti_transfer);

        $insert = mysqli_query($conn, "INSERT INTO mixteam (email, steam_link, nickname, id_discord, roles, medal, nomor_wa, receipt_pembayaran, bukti_transfer) VALUES ('$email', '$steam_link', '$nickname', '$id_discord', '$role', '$medal', '$nomor_wa', '$receipt_pembayaran', '$bukti_transfer')");

        if($insert){
         echo "<div class='alert alert-success d-flex align-items-center' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:''><use xlink:href='#check-circle-fill'/></svg>
                <div>
                  PENDAFTARAN TELAH BERHASIL!
                </div>
              </div>";
        }else {
         echo "ERROR";
        }
      }
    ?>

    <div class="konten" data-aos="fade-right" data-aos-delay="450" data-aos-offset="10">
      <form action="" method="post" enctype="multipart/form-data">
        <table align="center" style="margin-left:auto; margin-right:auto" >
          <tr>
            <td>Email</td>
            <td colspan="2"> <input type="email" name="email" required> </td>
          </tr>
          <tr>
            <td> <label>Steam Link ID</label> </td>
            <td> <input type="text" name="steam_link" required=""> </td>
          </tr>
          <tr>
            <td> <label>Nickname</label> </td>
            <td> <input type="text" name="nickname" required=""> </td>
          </tr>
          <tr>
            <td> <label>ID Discord</label> </td>
            <td> <input type="text" name="id_discord" required=""> </td>
          </tr>
          <tr>
            <td> <label>Role</label> </td>
            <td> 
              <input type="checkbox" name="role[]" id="role" value="Safe Lane"/>Safe Lane<br />
              <input type="checkbox" name="role[]" id="role" value="Mid Lane"/>Mid Lane<br />
              <input type="checkbox" name="role[]" id="role" value="Off Lane"/>Off lane<br />
              <input type="checkbox" name="role[]" id="role" value="Soft Support"/>Soft Support<br />
              <input type="checkbox" name="role[]" id="role" value="Hard Support"/>Hard Support<br /> 
            </td>
          </tr>
          <tr>
            <td> <label>Medal</label> </td>
            <td> 
              <select name="medal" required="">
                <option value="" selected>--Pilih Medal--</option>
                <option value="Herald">Herald</option>
                <option value="Guardian">Guardian</option>
                <option value="Crusader">Crusader</option>
                <option value="Archon">Archon</option>
                <option value="Legend">Legend</option>
              </select>
            </td>
          </tr>
          <tr>
            <td> <label>Nomor Whatsapp</label> </td>
            <td> <input type="text" name="nomor_wa" required=""> </td>
          </tr>
          <tr>  
            <td style="padding-bottom: 0px;"> <label>Upload Receipt Pembayaran</label> </td>
            <td> <input type="file" name="receipt_pembayaran" accept=".pdf,*" required=""> </td>
          </tr>
          <tr>  
            <td style="padding-top: 0px; color: red; font-size: 17px;"> <small>*Dapatkan receipt di halaman payment</small> </td>
          </tr>
          <tr>  
            <td> <label>Upload Bukti Transfer</label> </td>
            <td> <input type="file" name="bukti_transfer" accept="image/*" required=""> </td>
          </tr> 
          <tr>
            <td colspan="2" align="center"><input class="submit" type="submit" name="submit" value="Submit" style="background: rgb(255, 176, 18);  border-color: rgb(255, 176, 18); padding: 4px;"></style></td>
          </tr>
        </table>
      </form>
    </div>


    <!-- Script untuk apply ke semua animasi -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init({
      duration: 600
    });
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>