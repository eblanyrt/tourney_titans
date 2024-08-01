<?php
    include '../db.php';
?>
<!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="ubahdata.css">

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
      <h2>ALL RANK</h2>
    </div>
      
    <?php
      // Mengambil ID dari URL
      $id = $_GET['id'];
      $nama_tabel = $_GET['nama_tabel'];
      $nama_halaman = $_GET['nama_halaman'];

      // Mengambil data dari database berdasarkan ID
      $result = mysqli_query($conn, "SELECT * FROM $nama_tabel WHERE id='$id'");
      $row = mysqli_fetch_array($result);
    ?>

    <?php
        if(isset($_POST['submit'])){
        $nama_tim = $_POST['nama_tim'];
        $email = $_POST['email'];
        $nomor_wa = $_POST['nomor_wa'];
        $steam_link1 = $_POST['steam_link1'];
        $steam_link2 = $_POST['steam_link2'];
        $steam_link3 = $_POST['steam_link3'];
        $steam_link4 = $_POST['steam_link4'];
        $steam_link5 = $_POST['steam_link5'];
        $steam_link6 = $_POST['steam_link6'];
        $slot = $_POST['slot'];
        $medal_anggota = implode(", ", $_POST['medal_anggota']);

        $queri = "UPDATE $nama_tabel SET nama_tim = '$nama_tim', email = '$email', nomor_wa = '$nomor_wa', steam_link1 = '$steam_link1', steam_link2 = '$steam_link2', steam_link3 = '$steam_link3', steam_link4 = '$steam_link4', steam_link5 = '$steam_link5', steam_link6 = '$steam_link6', slot = '$slot', medal_anggota = '$medal_anggota' WHERE $nama_tabel.id = $id;";

        $insert = mysqli_query($conn, $queri);

        if($insert){
          header("Location: $nama_halaman.php");
        }else {
          echo "ERROR";
        }

      }


    ?>

    <div class="konten">

      <form action="" method="post" enctype="multipart/form-data">
          <table align="center" style="margin-left:auto; margin-right:auto" >
            <tr>
              <td> <label>ID</label> </td>
              <td> <input type="text" name="id" value="<?php echo $row['id']?>" disabled required=""> </td>
            </tr>
            <tr>
              <td> <label>Nama Tim</label> </td>
              <td> <input type="text" name="nama_tim" value="<?php echo $row['nama_tim']?>"  required=""> </td>
            </tr>
            <tr>
              <td> <label>Email</label> </td>
              <td> <input type="text" name="email" value="<?php echo $row['email']?>"  required=""> </td>
            </tr>
            <tr>
              <td> <label>Nomor WA</label> </td>
              <td> <input type="text" name="nomor_wa" value="<?php echo $row['nomor_wa']?>" required> </td>
            </tr>
            <tr>
              <td> <label>Steam Link 1</label> </td>
              <td> <input type="text" name="steam_link1" value="<?php echo $row['steam_link1']?>" required=""> </td>
            </tr>
            <tr>
              <td> <label>Steam Link 2</label> </td>
              <td> <input type="text" name="steam_link2" value="<?php echo $row['steam_link2']?>" required=""> </td>
            </tr>
            <tr>
              <td> <label>Steam Link 3</label> </td>
              <td> <input type="text" name="steam_link3" value="<?php echo $row['steam_link3']?>" required=""> </td>
            </tr>
            <tr>
              <td> <label>Steam Link 4</label> </td>
              <td> <input type="text" name="steam_link4" value="<?php echo $row['steam_link4']?>" required=""> </td>
            </tr>
            <tr>
              <td> <label>Steam Link 5</label> </td>
              <td> <input type="text" name="steam_link5" value="<?php echo $row['steam_link5']?>" required=""> </td>
            </tr>
            <tr>
              <td> <label>Steam Link Pemain Pengganti</label> </td>
              <td> <input type="text" name="steam_link6" value="<?php echo $row['steam_link6']?>" required=""> </td>
            </tr>
            <tr>
                <td> <label>Slot</label> </td>
                <td> 
                    <select name="slot" required="">
                        <option value="" <?php echo $row['slot'] == '' ? 'selected' : ''; ?>>--Pilih Slot--</option>
                        <option value="1" <?php echo $row['slot'] == '1' ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?php echo $row['slot'] == '2' ? 'selected' : ''; ?>>2</option>
                    </select>
                </td>
            </tr>

                <!-- untuk mengecek Medal apa saja yang dipilih -->
                <?php
                $data_from_sql = $row['medal_anggota'];
                if ($nama_tabel == "archon") {
                  $available_medals = ["Herald", "Guardian", "Crusader", "Archon"];
                } else if ($nama_tabel == "legend") {
                  $available_medals = ["Herald", "Guardian", "Crusader", "Archon", "Legend"];
                } else if ($nama_tabel == "allrank") {
                  $available_medals = ["Herald", "Guardian", "Crusader", "Archon", "Legend", "Ancient", "Divine", "Immortal"];
                } else {
                  echo "error";
                }
                $roles_array = explode(", ", $data_from_sql);
                

                echo "<tr>";
                echo "<td> <label>Medal Anggota</label> </td>";
                echo "<td>";

                for ($i = 0; $i < count($available_medals); $i++) {
                  $checked = in_array($available_medals[$i], $roles_array) ? "checked" : "";
                  echo "<input type='checkbox' name='medal_anggota[]' value='$available_medals[$i]' $checked />$available_medals[$i]<br />";
                }

                echo "</td>";
                echo "</tr>";
                ?>

            <tr>
              <td colspan="2" align="center"><input class="submit" type="submit" name="submit" value="Submit" style="background: rgb(255, 176, 18);  border-color: rgb(255, 176, 18); padding: 4px;"></style></td>
            </tr>
          </table>
        </form>

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