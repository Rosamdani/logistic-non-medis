<div class="col-md-12">
  <h4 class="header-line">FORM BARANG MASUK</h4>
</div>
<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        BARANG MASUK
      </div>
      <div class="panel-body">
        <form role="form" method="POST" action="" name="form">
          <div class="form-group">
            <label>Supplier *</label>
            <select name="cbsupplier" class="form-control select2" style="width: 100%;">
              <?php
              $qry = mysqli_query($konek, "select * from tbl_supplier");
              while ($d = mysqli_fetch_array($qry)) { ?>
                <option class="form-control" value="<?php echo $d["kode"]; ?>"><?php echo $d['nama']; ?>
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
            $jsArray .= "prdName['" . $row['kode'] . "'] = {name:'" . addslashes($row['jumlah']) . "',desc:'" . addslashes($row['harga']) . "'};\n";
          }
          echo '</select>';
          ?>


          <script type="text/javascript">
            <?php echo $jsArray; ?>

            function
            changeValue(id) {
              document.getElementById('stok_awal').value = prdName[id].name;
              document.getElementById('harga_awal').value = prdName[id].desc;
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


          <p class="help-block">* (Wajib di isi)</p>

          <a href="master.php?page=masuk" button type="submit" class="btn btn-danger">BATAL </button></a>




      </div>
    </div>
  </div>



  <div class="col-md-6 col-sm-6 col-xs-6">
    <div class="panel panel-Success">
      <div class="panel-heading">
        BARANG MASUK
      </div>
      <div class="panel-body">
        <form method="post">
          <div class="form-group">
            <label>Harga *</label>
            <input type="number" class="form-control" onchange="kali()" name="txtharga" id="harga_awal" placeholder="Harga" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>

          <div class="form-group">
            <label>Jumlah Masuk *</label>
            <input type="number" class="form-control" onchange="kali()" name="txtjumlah" placeholder="Jumlah Barang Masuk" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>
          <div class="form-group">
            <label>Total *</label>
            <input type="number" class="form-control" readonly="true" onclick="kali()" name="txttotal" placeholder="Total" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>
          <button type="submit" name="btnsimpan" class="btn btn-primary">SIMPAN</button>
        </form>
        <?php
        if (isset($_POST["btnsimpan"])) {
          $cbsupplier = mysqli_real_escape_string($konek, $_POST['cbsupplier']);
          $cbbarang = mysqli_real_escape_string($konek, $_POST['cbbarang']);
          $txtjumlah = mysqli_real_escape_string($konek, $_POST['txtjumlah']);
          $txtharga = mysqli_real_escape_string($konek, $_POST['txtharga']);
          $txttotal = mysqli_real_escape_string($konek, $_POST['txttotal']);
          $tanggal = date("Y-m-d H:i:s");


          $simpan = mysqli_query($konek, "INSERT INTO tbl_masuk (kode_supplier,kode_barang,tanggal,jumlah,harga,total) VALUES ('$cbsupplier','$cbbarang','$tanggal','$txtjumlah','$txtharga','$txttotal')");
          if ($simpan) {
            $ambilJumlah = mysqli_query($konek, "SELECT * FROM tbl_barang WHERE kode = '$cbbarang'");
            $data3 = mysqli_fetch_array($ambilJumlah);
            $csatuan = $data3['kode_satuan'];
            $jum = $data3['jumlah']; //Jumlah awal
            $hasilJumlah = $jum + $_POST['txtjumlah']; //Jumlah akhir
            if ($hasilJumlah > 0) {
              $simpan = mysqli_query($konek, "INSERT INTO tbl_masuk (kode_ruangan,kode_barang,tanggal,jumlah,catatan) VALUES ('$cbruangan','$cbbarang','$tanggal','$txtjumlah','$txtcatatan')");
              if ($simpan) {
                $simpanHasil = mysqli_query($konek, "UPDATE tbl_barang SET jumlah = '$hasilJumlah' WHERE kode = '$cbbarang'");
                $OpName = mysqli_query($konek, "INSERT INTO tbl_opname (`kode_barang`,`satuan`,`stok_awal`,`pengambilan`,`stok_akhir`,`ket`) VALUES ('$cbbarang','$csatuan','$jum','$txtjumlah','$hasilJumlah','Masuk')");
                if (!$OpName) {
                  echo "<script>alert('Gagal masuk opname')</script>";
                  echo mysqli_error($konek);
                }
        ?>
                <script type="text/javascript">
                  document.location.href = "master.php?page=masuk";
                </script>
            <?php
              } else {
                echo "<script>alert('Data Anda Gagal di simpan')</script>";
                echo "<meta http-equiv='refresh' content='0; url=?page=keluar'>";
              }
            } else {
              echo "<script>alert('Stok yang tersedia tidak mencukupi')</script>";
              echo "<meta http-equiv='refresh' content='0; url=?page=keluar'>";
            }
            ?>
        <?php
          } else {
            echo "<script>alert('Data Anda Gagal di simpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=masuk'>";
          }
        }
        ?>

      </div>
    </div>
  </div>


</div>