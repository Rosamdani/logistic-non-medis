<?php
if($_SESSION['status'] != "Admin"){
    die();
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <a href="master.php?page=tambah_barang"><button class="btn btn-primary fa fa-plus"> TAMBAH </button></a>
                <h3> DAFTAR BARANG LOGISTIK NON MEDIS </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="5%">NO</th>
                                <th width="10%">KODE BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>HARGA</th>
                                <th>STOK (DALAM GUDANG)</th>
                                <th>SATUAN</th>
                                <th width="3%"></th>
                                <th width="3%"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $qry = mysqli_query($konek, "select `tbl_barang`.`kode` AS `kode`,`tbl_barang`.`kode_barang` AS `kode_barang`,`tbl_barang`.`jumlah` AS `stok` ,`tbl_barang`.`kode_satuan` AS `kode_satuan`,`tbl_barang`.`nama_barang` AS `nama_barang`,`tbl_barang`.`harga` AS `harga`,`tbl_barang`.`keterangan` AS `keterangan`,`tbl_satuan`.`uraian` AS `satuan` from (`tbl_barang` join `tbl_satuan` on((`tbl_satuan`.`kode` = `tbl_barang`.`kode_satuan`)))");
                            while ($data = mysqli_fetch_array($qry)) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['kode_barang']; ?></td>
                                    <td><?php echo $data['nama_barang']; ?></td>
                                    <td><?php echo $data['harga']; ?></td>
                                    <td><?php echo $data['stok']; ?></td>
                                    <td><?php echo $data['satuan']; ?></td>
                                    <td class="center"><a href="master.php?page=edit_barang&id=<?php echo base64_encode($data['kode']); ?>" class="fa fa-refresh btn btn-success"> Edit</a></td>
                                    </td>
                                    <td class="center"><a onClick="return confirm('Data ini akan di hapus.?')" href="master.php?page=barang&hapus=<?php echo $data['kode']; ?>" class="fa fa-wrench btn btn-danger"> Hapus</a></td>
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
    $qry = mysqli_query($konek, "delete from tbl_barang where kode='" . $_GET["hapus"] . "'");
    if ($qry) {
        echo "<script>alert('Data Berhasil di Hapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=barang'>";
    } else {
        echo "Gagal di Hapus" . mysqli_error($konek);
        echo "<meta http-equiv='refresh' content='0; url=?page=barang'>";
    }
}
?>