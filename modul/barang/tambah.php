<?php
date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d");
$query = mysqli_query($konek, "SELECT max(kode_barang) as maxKode FROM tbl_barang");
$data = mysqli_fetch_array($query);
$noOrder = $data['maxKode'];
$noUrut = (int) substr($noOrder, 9, 3);
$noUrut++;
$char = "BR";
$tahun = substr($date, 0, 4);
$bulan = substr($date, 5, 2);
$id_Order = $char . $tahun . $bulan . sprintf("%03s", $noUrut);
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
        FORM TAMBAH BARANG
      </div>
      <div class="panel-body">
        <form role="form" method="POST" action="">
          <div class="form-group">
            <label>Kode Barang *</label>
            <input type="text" readonly="true" class="form-control" value="<?php echo $id_Order ?>" name="txtkodebarang" placeholder="Kode Barang" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>

          <div class="form-group">
            <label>Nama Barang *</label>
            <input type="text" class="form-control" name="txtnamabarang" placeholder="Nama Barang" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>


          <div class="form-group">
            <label>Harga *</label>
            <input type="number" class="form-control" name="txtharga" placeholder="Harga" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>



          <div class="form-group">
            <label>Satuan</label>
            <select name="cbsatuan" class="form-control select2" style="width: 100%;">
              <?php
              $qry = mysqli_query($konek, "select * from tbl_satuan");
              while ($d = mysqli_fetch_array($qry)) { ?>
                <option class="form-control" value="<?php echo $d["kode"]; ?>"><?php echo $d['uraian']; ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Keterangan *</label>
            <textarea class="form-control" name="txtketarangan" rows="2" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" placeholder="Keterangan" /></textarea>
          </div>

          <p class="help-block">* (Wajib di isi)</p>

          <a href="master.php?page=supplier" button type="submit" class="btn btn-danger">BATAL </button></a>
          <button type="submit" name="btnsimpan" class="btn btn-primary">SIMPAN</button>
        </form>
        <?php
        if (isset($_POST["btnsimpan"])) {
          $txtkodebarang = mysqli_real_escape_string($konek, $_POST['txtkodebarang']);
          $cbsatuan = mysqli_real_escape_string($konek, $_POST['cbsatuan']);
          $txtnamabarang = mysqli_real_escape_string($konek, $_POST['txtnamabarang']);
          $txtharga = mysqli_real_escape_string($konek, $_POST['txtharga']);
          $txtketarangan = mysqli_real_escape_string($konek, $_POST['txtketarangan']);



          $cek_user = mysqli_num_rows(mysqli_query($konek, "select * from tbl_barang where kode_barang='$txtkodebarang'"));
          if ($cek_user > 0) {
            echo "<script>alert('Data Sudah Ada di database')</script>";
          } else {

            $simpan = mysqli_query($konek, "INSERT INTO tbl_barang (kode_barang,kode_satuan,nama_barang,harga,keterangan) VALUES ('$txtkodebarang','$cbsatuan','$txtnamabarang','$txtharga','$txtketarangan')");
            if ($simpan) {
              ?>

              <script type="text/javascript">
                document.location.href = "master.php?page=barang";
              </script>
            <?php
            } else {
              echo "<script>alert('Data Anda Gagal di simpan')</script>";
              echo "<meta http-equiv='refresh' content='0; url=?page=barang'>";
            }
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>