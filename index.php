<?php include 'koneksi.php'; ?>



<title>HALAMAN LOGIN</title>
<style>
  body {
    font-family: sans-serif;
    background: #d5f0f3;
  }

  h1 {
    text-align: center;
    /*ketebalan font*/
    font-weight: 300;
  }

  .tulisan_login {
    text-align: center;
    /*membuat semua huruf menjadi kapital*/
    text-transform: uppercase;
  }

  .kotak_login {
    width: 350px;
    background: white;
    /*meletakkan form ke tengah*/
    margin: 80px auto;
    padding: 30px 20px;
  }

  label {
    font-size: 11pt;
  }

  .form_login {
    /*membuat lebar form penuh*/
    box-sizing: border-box;
    width: 100%;
    padding: 10px;
    font-size: 11pt;
    margin-bottom: 20px;
  }

  .tombol_login {
    background: #46de4b;
    color: white;
    font-size: 11pt;
    width: 100%;
    border: none;
    border-radius: 3px;
    padding: 10px 20px;
  }

  .link {
    color: #232323;
    text-decoration: none;
    font-size: 10pt;
  }
</style>
<div class="content">
  <div class="kotak_login">


    <p class="tulisan_login">HALAMAN LOGIN</p>
    <form action="login_aksi.php" method="post">
      <div class="form-input">
        <input type="text" name="username" class="form_login" placeholder="Enter Username" required="">
      </div>
      <div class="form-input">
        <input type="password" name="password" class="form_login" placeholder="Enter Password" required="">
      </div>
      <input type="submit" class="tombol_login" value="LOGIN SEKARANG"><br>

      <br>
      <?php
      if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
          echo "<div class='alert alert-danger'>Password Gagal</div>";
        } else if ($_GET['pesan'] == "login") {
          echo "<div class='alert alert-warning'>Harap Login dulu</div>";
        } else if ($_GET['pesan'] == "keluar") {
          echo "<div class='alert alert-danger'>Anda Berhasil Keluar</div>";
        }
      }
      ?>
    </form>
  </div>
</div>