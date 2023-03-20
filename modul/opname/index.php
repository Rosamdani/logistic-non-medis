<?php
if (!($_SESSION['status'] == "User" || $_SESSION['status'] == "Admin")) {
    die();
}

date_default_timezone_set('Asia/Jakarta');
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'logistik_non_medis';
$konek = mysqli_connect ($server, $user, $password, $database);

?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <a href="master.php?page=tambah_keluar"><button class="btn btn-primary fa fa-plus"> TAMBAH </button></a>
                <h3> BARANG KELUAR</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="5%">NO</th>
                                <th width="10%">KODE BARANG</th>
                                <th width="10%">NAMA BARANG</th>
                                <th width="10%">KODE SATUAN</th>
                                <th>STOK AWAL</th>
                                <th>PENGAMBILAN</th>
                                <th>STOK AKHIR</th>
                                <th>KETERANGAN</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            $select = mysqli_query($konek, "SELECT * FROM tbl_opname");
                            while ($data = mysqli_fetch_array($select)) {
                                $idBarang = $data['kode_barang'];
                                $select2 = mysqli_query($konek, "SELECT kode_barang, nama_barang FROM tbl_barang WHERE kode = $idBarang");
                                $data3 = mysqli_fetch_array($select2);
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data3['kode_barang']; ?></td>
                                    <td><?php echo $data3['nama_barang']; ?></td>
                                    <td><?php echo $data['satuan']; ?></td>
                                    <td><?php echo $data['stok_awal']; ?></td>
                                    <td> <?php echo $data['pengambilan']; ?> </td>
                                    <td> <?php echo $data['stok_akhir']; ?> </td>
                                    <td> <?php echo $data['ket']; ?> </td>
                                    <td class="center"><a href="master.php?page=edit_opname&id=<?php echo base64_encode($data['kode']); ?>" class="fa fa-refresh btn btn-success"> Edit</a></td>
                                    <td class="center"><a onClick="return confirm('Data ini akan di hapus.?')" href="master.php?page=opname&hapus=<?php echo $data['kode']; ?>" class="fa fa-wrench btn btn-danger"> Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
<?php
if (isset($_GET['hapus'])) {
    $qry = mysqli_query($konek, "delete from tbl_opname where kode='" . $_GET["hapus"] . "'");
    if ($qry) {
        echo "<script>alert('Data Berhasil di Hapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=opname'>";
    } else {
        echo "Gagal di Hapus" . mysqli_error($konek);
        echo "<meta http-equiv='refresh' content='0; url=?page=opname'>";
    }
}
?>