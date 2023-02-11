<?php
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_barang WHERE kode='$id'");
$data  = mysqli_fetch_array($sqlku);
$satuan = $data['kode_satuan'];
?>
<?php
if($_SESSION['status'] != "Admin"){
    die();
}
?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        FORM EDIT BARANG
      </div>
      <div class="panel-body">
        <form role="form" method="POST" action="">

          <div class="form-group">
            <label>Kode Barang *</label>
            <input type="text" readonly="true" class="form-control" value="<?php echo $data['kode_barang']; ?>" name="txtkodebarang" placeholder="Kode Barang" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>

          <div class="form-group">
            <label>Nama Barang *</label>
            <input type="text" class="form-control" name="txtnamabarang" value="<?php echo $data['nama_barang']; ?>" placeholder="Nama Barang" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>


          <div class="form-group">
            <label>Harga *</label>
            <input type="number" class="form-control" name="txtharga" value="<?php echo $data['harga']; ?>" placeholder="Harga" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>

          <div class="form-group">
            <label>Keterangan *</label>
            <textarea class="form-control" name="txtketarangan" rows="2" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" placeholder="Keterangan" /><?php echo $data['keterangan']; ?></textarea>
          </div>




          <div class="form-group">
            <label>Satuan</label>
            <select name="cbsatuan" class="form-control select2" style="width: 100%;">
              <?php
              $qry = mysqli_query($konek, "SELECT * from tbl_satuan");
              while ($data = mysqli_fetch_array($qry)) {
                ?>
                <option class="form-control" value="<?php echo $data["kode"]; ?>" <?php
                                                                                  if ($satuan == $data['kode']) {
                                                                                    echo "selected";
                                                                                  } ?>> <?php echo $data['uraian']; ?></option><?php
                                                                                                                                }
                                                                                                                                ?>
            </select>
          </div>




          <p class="help-block">* (Wajib di isi)</p>

          <a href="master.php?page=barang" button type="submit" class="btn btn-danger">BATAL </button></a>
          <button type="submit" name="btnsimpan" class="btn btn-primary">EDIT PERUBAHAN</button>
        </form>

        <?php
        if (isset($_POST["btnsimpan"])) {
          $txtkodebarang = mysqli_real_escape_string($konek, $_POST['txtkodebarang']);
          $cbsatuan = mysqli_real_escape_string($konek, $_POST['cbsatuan']);
          $txtnamabarang = mysqli_real_escape_string($konek, $_POST['txtnamabarang']);
          $txtharga = mysqli_real_escape_string($konek, $_POST['txtharga']);
          $txtketarangan = mysqli_real_escape_string($konek, $_POST['txtketarangan']);


          $edit = mysqli_query($konek, "UPDATE  tbl_barang SET kode_barang='$txtkodebarang',kode_satuan='$cbsatuan',nama_barang='$txtnamabarang',harga='$txtharga',keterangan='$txtketarangan' WHERE kode='$id'");
          if ($edit) {
            ?>
            <script type="text/javascript">
              document.location.href = "master.php?page=barang";
            </script>
          <?php
          } else {
            echo "<script>alert('Terjadi Kesalahan Proses Edit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=edit_barang'>";
          }
        }

        ?>
      </div>
    </div>
  </div>
</div>