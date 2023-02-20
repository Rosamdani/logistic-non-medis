<?php
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_masuk WHERE kode='$id'");
$data  = mysqli_fetch_array($sqlku);
$supplier = $data['kode_supplier'];
$barang = $data['kode_barang'];
?>
<div class="col-md-12">
  <h4 class="header-line"> FORM EDIT BARANG MASUK</h4>
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
            <label>Harga *</label>
            <input type="number" class="form-control" onchange="kali()" name="txtharga" value="<?php echo $data['harga']; ?>" id="harga_awal" placeholder="Harga" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>

          <div class="form-group">
            <label>Jumlah Masuk *</label>
            <input type="number" class="form-control" onchange="kali()" name="txtjumlah" value="<?php echo $data['jumlah']; ?>" placeholder="Jumlah Barang Masuk" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>
          <div class="form-group">
            <label>Total *</label>
            <input type="number" class="form-control" readonly="true" onclick="kali()" name="txttotal" value="<?php echo $data['total']; ?>" placeholder="Total" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>

      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6">
    <div class="panel panel-Success">
      <div class="panel-heading">
        FORM EDIT BARANG MASUK
      </div>
      <div class="panel-body">

        <div class="form-group">
          <label>Supplier</label>
          <select name="cbsupplier" class="form-control select2" style="width: 100%;">
            <?php
            $qry = mysqli_query($konek, "SELECT * from tbl_supplier");
            while ($data = mysqli_fetch_array($qry)) {
            ?>
              <option class="form-control" value="<?php echo $data["kode"]; ?>" <?php

                                                                                if ($supplier == $data['kode']) {
                                                                                  echo "selected";
                                                                                } ?>>
                <?php echo $data['nama']; ?>
              </option>
            <?php
            }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label>Barang</label>
          <select name="cbbarang" class="form-control select2" style="width: 100%;">
            <?php
            $qry = mysqli_query($konek, "SELECT * from tbl_barang");
            while ($data = mysqli_fetch_array($qry)) {
            ?>
              <option class="form-control" value="<?php echo $data["kode"]; ?>" <?php

                                                                                if ($barang == $data['kode']) {
                                                                                  echo "selected";
                                                                                } ?>>
                <?php echo $data['nama_barang']; ?>
              </option>
            <?php
            }
            ?>
          </select>
        </div>

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
        <a href="master.php?page=masuk" button type="submit" class="btn btn-danger">BATAL </button></a>
        <button type="submit" name="btnsimpan" class="btn btn-primary"> UPDATE</button>
        </form>
        <?php
        if (isset($_POST["btnsimpan"])) {
          $cbsupplier = mysqli_real_escape_string($konek, $_POST['cbsupplier']);
          $cbbarang = mysqli_real_escape_string($konek, $_POST['cbbarang']);
          $txtjumlah = mysqli_real_escape_string($konek, $_POST['txtjumlah']);
          $txtharga = mysqli_real_escape_string($konek, $_POST['txtharga']);
          $txttotal = mysqli_real_escape_string($konek, $_POST['txttotal']);
          $edit = mysqli_query($konek, "UPDATE  tbl_masuk SET kode_supplier='$cbsupplier',kode_barang='$cbbarang',jumlah='$txtjumlah',harga='$txtharga',total='$txttotal' WHERE kode='$id'");
          if ($edit) {
            $ambilJumlah = mysqli_query($konek, "SELECT jumlah FROM tbl_barang WHERE kode = '$cbbarang'");
            $data2 = mysqli_fetch_array($ambilJumlah);
            $data2['jumlah'] = $data2['jumlah'] - $data['jumlah'];
            $hasilJumlah = $data2['jumlah'] + $_POST['txtjumlah'];
            $simpanHasil = mysqli_query($konek, "UPDATE tbl_barang SET jumlah = '$hasilJumlah' WHERE kode = '$cbbarang'");
        ?>
            <script type="text/javascript">
              document.location.href = "master.php?page=masuk";
            </script>
        <?php
          } else {
            echo "<script>alert('Terjadi Kesalahan Proses Edit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=edit_masuk'>";
          }
        }

        ?>
      </div>
    </div>
  </div>
</div>