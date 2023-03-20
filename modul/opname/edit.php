<?php
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_opname WHERE kode='$id'");
$data  = mysqli_fetch_array($sqlku);
$jumlah = $data['pengambilan'];
$stok_awal = $data['stok_awal'];
$stok_akhir = $data['stok_akhir'];
$ket = $data['ket'];
$kd = $data['kode_barang'];
$sql2 = mysqli_query($konek, "SELECT nama_barang FROM tbl_barang WHERE kode = $kd");
$data2 = mysqli_fetch_array($sql2);


if (isset($_POST['btnsimpan'])) {
  $jum = $_POST['txtjumlah'];
  $kode = $_POST['kod'];
  $awal = $_POST['awal'];
  $akhir = $_POST['txtakhir'];
  if ($_POST['ket'] == "Masuk") {
    $total = $jum + ($akhir - $awal);
  } else {
    $total =($akhir + $awal) - $jum;
  }
  $sqlUpdate = mysqli_query($konek, "UPDATE tbl_opname SET pengambilan='$jum', stok_akhir='$total' WHERE kode='$kode'");
  if ($sqlUpdate) {
?>

    <script type="text/javascript">
      document.location.href = "master.php?page=opname";
    </script>

<?php
  } else {
    echo "<script>alert('Terjadi Kesalahan Edit')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=opname'>";
  }
}
?>
<div class="col-md-12">
  <h4 class="header-line"> FORM EDIT OPNAME</h4>
</div>
<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        BARANG
      </div>
      <div class="panel-body">
        <form role="form" method="POST">
          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" readonly name="txtnama" value="<?php echo $data2['nama_barang']; ?>" id="jumlah" placeholder="Nama Barang" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>
          <div class="form-group">
            <label>Jumlah *</label>
            <input type="number" class="form-control" name="txtjumlah" value="<?php echo $jumlah; ?>" id="jumlah" placeholder="Jumlah" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
            <input type="hidden" class="form-control" name="awal" value="<?php echo $jumlah; ?>" id="jum" />
            <input type="hidden" class="form-control" name="ket" value="<?php echo $data['ket']; ?>" id="ket" />
            <input type="hidden" class="form-control" name="kod" value="<?php echo $data['kode']; ?>" id="kode" />
          </div>

          <div class="form-group">
            <label>Stok Awal</label>
            <input type="number" class="form-control" readonly name="txtawal" value="<?php echo $stok_awal; ?>" placeholder="Stok Awal" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>
          <div class="form-group">
            <label>Stok Akhir</label>
            <input type="number" class="form-control" readonly="true" name="txtakhir" value="<?php echo $stok_akhir; ?>" placeholder="Stok Akhir" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
          </div>
          <div class="form-group">
            <a href="master.php?page=masuk" button type="submit" class="btn btn-danger">BATAL </button></a>
            <button type="submit" name="btnsimpan" class="btn btn-primary"> UPDATE</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>