<?php
if (!($_SESSION['status'] == "User" || $_SESSION['status'] == "Admin")) {
  die();
}
?>
<div class="col-md-12">
  <h4 class="header-line">FORM BARANG KELUAR</h4>
</div>
<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        BARANG KELUAR KE RUANGAN
      </div>
      <div class="panel-body">
        <form role="form" method="POST" action="" name="form">
          <div class="form-group">
            <label>Ruangan *</label>
            <select name="cbruangan" class="form-control select2" style="width: 100%;">
              <?php
              $qry = mysqli_query($konek, "select * from tbl_ruangan");
              while ($d = mysqli_fetch_array($qry)) { ?>
                <option class="form-control" value="<?php echo $d["kode"]; ?>"><?php echo $d['uraian']; ?>
                </option>
              <?php } ?>
            </select>
          </div>




          <?php
          $result = mysqli_query($konek, "select * from tbl_barang");
          $jsArray = "var prdName = new Array();\n";
          echo 'Nama Barang : <select class = "form-control select2" style="width: 100%;" name="cbbarang" onchange="changeValue(this.value)">';
          echo '<option>-Pilih- </option>';
          while ($row = mysqli_fetch_array($result)) {
            echo '<option value="' . $row['kode'] . '">' . $row['nama_barang'] . '</option>';
            $jsArray .= "prdName['" . $row['kode'] . "'] = {name:'" . addslashes($row['stok']) . "',desc:'" . addslashes($row['harga']) . "'};\n";
          }
          echo '</select>';
          ?>


          <script type="text/javascript">
            <?php echo $jsArray; ?>

            function
            changeValue(id) {
              document.getElementById('stok_awal').value =
                prdName[id].name;
              document.getElementById('harga_awal').value =
                prdName[id].desc;
            };
          </script>

          <script LANGUAGE="JavaScript">
            function kali() {
              harga = eval(form.txtharga.value);
              jumlah_masuk = eval(form.txtjumlah.value);

              total = harga * jumlah_masuk
              form.txttotal.value = total;
            }
          </script>
          <br>
          <p class="help-block">* (Wajib di isi)</p>
          <a href="master.php?page=keluar" button type="submit" class="btn btn-danger">BATAL </button></a>


      </div>
    </div>
  </div>


  <div class="col-md-6 col-sm-6 col-xs-6">
    <div class="panel panel-Success">
      <div class="panel-heading">
        BARANG KELUAR
      </div>
      <div class="panel-body">


        <div class="form-group">
          <label>Jumlah Keluar *</label>
          <input type="number" class="form-control" onchange="kali()" name="txtjumlah" placeholder="Barang Keluar" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
        </div>

        <div class="form-group">
          <label>Catatan *</label>
          <textarea class="form-control" name="txtcatatan" rows="3" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" placeholder="Catatan" /></textarea>
        </div>

        <button type="submit" name="btnsimpan" class="btn btn-primary">SIMPAN</button>
        </form>
        <?php
        if (isset($_POST["btnsimpan"])) {
          $cbruangan = mysqli_real_escape_string($konek, $_POST['cbruangan']);
          $cbbarang = mysqli_real_escape_string($konek, $_POST['cbbarang']);
          $txtjumlah = mysqli_real_escape_string($konek, $_POST['txtjumlah']);
          $tanggal = date("Y-m-d H:i:s");
          $txtcatatan = mysqli_real_escape_string($konek, $_POST['txtcatatan']);

          $ambilJumlah = mysqli_query($konek, "SELECT * FROM tbl_barang WHERE kode = '$cbbarang'");
          $data3 = mysqli_fetch_array($ambilJumlah);
          $csatuan = $data3['kode_satuan'];
          $jum = $data3['jumlah'];
          $hasilJumlah = $jum - $_POST['txtjumlah'];
          if ($hasilJumlah > 0) { 
            $simpan = mysqli_query($konek, "INSERT INTO tbl_keluar (kode_ruangan,kode_barang,tanggal,jumlah,catatan) VALUES ('$cbruangan','$cbbarang','$tanggal','$txtjumlah','$txtcatatan')");
            if ($simpan) {
              $simpanHasil = mysqli_query($konek, "UPDATE tbl_barang SET jumlah = '$hasilJumlah' WHERE kode = '$cbbarang'");
              $OpName = mysqli_query($konek, "INSERT INTO tbl_opname (`kode_barang`,`satuan`,`stok_awal`,`pengambilan`,`stok_akhir`) VALUES ('$cbbarang','$csatuan','$jum','$txtjumlah','$hasilJumlah')");
              if(!$OpName){
                echo "<script>alert('Gagal masuk opname')</script>";
                echo mysqli_error($konek);
              }
        ?>
              <script type="text/javascript">
                document.location.href = "master.php?page=keluar";
              </script>
        <?php
            } else {
              echo "<script>alert('Data Anda Gagal di simpan')</script>";
              echo "<meta http-equiv='refresh' content='0; url=?page=keluar'>";
            }
          }else{
              echo "<script>alert('Stok yang tersedia tidak mencukupi')</script>";
              echo "<meta http-equiv='refresh' content='0; url=?page=keluar'>";
          }
        }


        ?>

      </div>
    </div>
  </div>


</div>