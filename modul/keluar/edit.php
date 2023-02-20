<?php
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_keluar WHERE kode='$id'");
$data  = mysqli_fetch_array($sqlku);
$ruangan = $data['kode_ruangan'];
$barang = $data['kode_barang'];
?>
<?php
if (!($_SESSION['status'] == "User" || $_SESSION['status'] == "Admin")) {
  die();
}
?>
<div class="col-md-12">
  <h4 class="header-line"> FORM EDIT BARANG KELUAR</h4>
</div>
<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        EDIT BARANG KELUAR
      </div>
      <div class="panel-body">
        <form role="form" method="POST" action="" name="form">

          <div class="form-group">
            <label>Jumlah Keluar *</label>
            <input type="number" class="form-control" onchange="kali()" name="txtjumlah" value="<?php echo $data['jumlah']; ?>" placeholder="Jumlah Barang Masuk" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>
          <div class="form-group">
            <label>Catatan *</label>
            <textarea class="form-control" name="txtcatatan" rows="3" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" placeholder="Catatan" /><?php echo $data['catatan']; ?></textarea>
          </div>


      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6">
    <div class="panel panel-Success">
      <div class="panel-heading">
        FORM EDIT BARANG KELUAR
      </div>
      <div class="panel-body">

        <div class="form-group">
          <label>Ruangan *</label>
          <select name="cbruangan" class="form-control select2" style="width: 100%;">
            <?php
            $qry = mysqli_query($konek, "SELECT * from tbl_ruangan");
            while ($data = mysqli_fetch_array($qry)) {
            ?>
              <option class="form-control" value="<?php echo $data["kode"]; ?>" <?php

                                                                                if ($ruangan == $data['kode']) {
                                                                                  echo "selected";
                                                                                } ?>>
                <?php echo $data['uraian']; ?>
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
        <a href="master.php?page=keluar" button type="submit" class="btn btn-danger">BATAL </button></a>
        <button type="submit" name="btnsimpan" class="btn btn-primary"> UPDATE</button>
        </form>
        <?php
        if (isset($_POST["btnsimpan"])) {
          $cbruangan = mysqli_real_escape_string($konek, $_POST['cbruangan']);
          $cbbarang = mysqli_real_escape_string($konek, $_POST['cbbarang']);
          $txtjumlah = mysqli_real_escape_string($konek, $_POST['txtjumlah']);
          $txtcatatan = mysqli_real_escape_string($konek, $_POST['txtcatatan']);

          $edit = mysqli_query($konek, "UPDATE  tbl_keluar SET kode_ruangan='$cbruangan',kode_barang='$cbbarang',jumlah='$txtjumlah',catatan='$txtcatatan' WHERE kode='$id'");
          if ($edit) {
        ?>
            <script type="text/javascript">
              document.location.href = "master.php?page=keluar";
            </script>
        <?php
          } else {
            echo "<script>alert('Terjadi Kesalahan Proses Edit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=edit_keluar'>";
          }
        }

        ?>
      </div>
    </div>
  </div>
</div>