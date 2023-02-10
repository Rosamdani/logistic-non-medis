<div class="row">
    <div class="col-md-12">

        <div class="panel panel-success">
            <div class="panel-heading">
                <a href="master.php?page=tambah_ruangan"><button class="btn btn-primary fa fa-plus"> TAMBAH </button></a>
                <h3> DAFTAR RUANGAN </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="2%">NO</th>
                                <th>RUANGAN</th>
                                <th width="3%"></th>
                                <th width="3%"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $qry = mysqli_query($konek, "SELECT * FROM tbl_ruangan order by kode desc");
                            while ($data = mysqli_fetch_array($qry)) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['uraian']; ?></td>
                                    <td class="center"><a href="master.php?page=edit_ruangan&id=<?php echo base64_encode($data['kode']); ?>" class="fa fa-refresh btn btn-success"> Edit</a></td>
                                    </td>
                                    <td class="center"><a onClick="return confirm('Data ini akan di hapus.?')" href="master.php?page=ruangan&hapus=<?php echo $data['kode']; ?>" class="fa fa-wrench btn btn-danger"> Hapus</a></td>
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
if (isset($_GET[hapus])) {
    $qry = mysqli_query($konek, "delete from tbl_ruangan where kode='" . $_GET["hapus"] . "'");
    if ($qry) {
        echo "<script>alert('Data Berhasil di Hapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=ruangan'>";
    } else {
        echo "Gagal di Hapus" . mysqli_error();
        echo "<meta http-equiv='refresh' content='0; url=?page=ruangan'>";
    }
}
?>