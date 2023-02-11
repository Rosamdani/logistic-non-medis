<?php
if (!($_SESSION['status'] == "User" || $_SESSION['status'] == "Admin")) {
    die();
}
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
                                <th width="10%">TANGGAL</th>
                                <th width="10%">KODE BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>JUMLAH</th>
                                <th>RUANGAN</th>
                                <th>CATATAN</th>
                                <th width="3%"></th>
                                <?php

                                if ($_SESSION['status'] == "Admin") {
                                ?>

                                    <th width="3%"></th>

                                <?php
                                }

                                ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $qry = mysqli_query($konek, "select `tbl_keluar`.`kode` AS `kode`,`tbl_keluar`.`kode_ruangan` AS `kode_ruangan`,`tbl_keluar`.`kode_barang` AS `kode_barang`,`tbl_keluar`.`tanggal` AS `tanggal`,`tbl_keluar`.`jumlah` AS `jumlah`,`tbl_ruangan`.`uraian` AS `uraian`,`tbl_ruangan`.`telepon` AS `telepon`,`tbl_ruangan`.`lantai` AS `lantai`,`tbl_barang`.`nama_barang` AS `nama_barang`,`tbl_barang`.`kode_barang` AS `kd_barang`,`tbl_keluar`.`catatan` AS `catatan` from ((`tbl_keluar` join `tbl_ruangan` on((`tbl_keluar`.`kode_ruangan` = `tbl_ruangan`.`kode`))) join `tbl_barang` on((`tbl_keluar`.`kode_barang` = `tbl_barang`.`kode`))) order by tanggal asc");
                            while ($data = mysqli_fetch_array($qry)) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['tanggal']; ?></td>
                                    <td><?php echo $data['kd_barang']; ?></td>
                                    <td><?php echo $data['nama_barang']; ?></td>
                                    <td> <?php echo $data['jumlah']; ?> </td>
                                    <td> <?php echo $data['uraian']; ?> </td>
                                    <td> <?php echo $data['catatan']; ?> </td>

                                    <td class="center"><a href="master.php?page=edit_keluar&id=<?php echo base64_encode($data['kode']); ?>" class="fa fa-refresh btn btn-success"> Edit</a></td>
                                    </td>
                                    <?php

                                    if ($_SESSION['status'] == "Admin") {
                                    ?>

                                        <td class="center"><a onClick="return confirm('Data ini akan di hapus.?')" href="master.php?page=keluar&hapus=<?php echo $data['kode']; ?>" class="fa fa-wrench btn btn-danger"> Hapus</a></td>

                                    <?php
                                    }

                                    ?>

                                </tr>
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
    $qry = mysqli_query($konek, "delete from tbl_keluar where kode='" . $_GET["hapus"] . "'");
    if ($qry) {
        echo "<script>alert('Data Berhasil di Hapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=keluar'>";
    } else {
        echo "Gagal di Hapus" . mysqli_error($konek);
        echo "<meta http-equiv='refresh' content='0; url=?page=keluar'>";
    }
}
?>