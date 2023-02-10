<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        FORM INPUT PENGGUNA
      </div>
      <div class="panel-body">
        <form role="form" method="POST" action="">
          <div class="form-group">
            <label>User Name</label>
            <input type="text" class="form-control" name="txtnama" placeholder="User Name" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>
          <div class="form-group">
            <label>Password *</label>
            <input type="text" class="form-control" name="txtpassword" placeholder="User Name" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>
          <p class="help-block"> * (Wajib di isi)</p>

          <a href="master.php?page=user" button type="submit" class="btn btn-danger">BATAL </button></a>
          <button type="submit" name="btnsimpan" class="btn btn-primary"> SIMPAN</button>
        </form>
        <?php
        if (isset($_POST["btnsimpan"])) {
          $txtnama = mysqli_real_escape_string($konek, $_POST['txtnama']);
          $txtpassword = md5(mysqli_real_escape_string($konek, $_POST['txtpassword']));

          $cek_user = mysqli_num_rows(mysqli_query($konek, "select * from tbl_user where user_name='$txtnama'"));
          if ($cek_user > 0) {
            echo "<script>alert('User Sudah ada di database')</script>";
          } else {

            $simpan = mysqli_query($konek, "INSERT INTO tbl_user (user_name,password,status) VALUES ('$txtnama','$txtpassword','Admin')");
            if ($simpan) {
              ?>

              <script type="text/javascript">
                document.location.href = "master.php?page=user";
              </script>
            <?php
            } else {
              echo "<script>alert('Data Anda Gagal di simpan')</script>";
              echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
            }
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>