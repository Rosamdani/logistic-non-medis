<?php
    error_reporting(0);
    if(!($_SESSION['status'] == "Admin" || $_SESSION['status'] == "SupAdmin")){
      die();
    }


    ?>
<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>






<div class="col-md-16">
    <div class="box box-info">
        <div class="modal-content" style="overflow: auto;">
            <div class="modal-header">
                <button class="btn btn-primary large fa fa-print" onclick="printContent('cetak_report')"> Print</button>
            </div>

            <div class="well well-sm noprint">
                <form class="form-inline" role="form" method="post" action="">
                    <div class="form-group">
                        <label class="sr-only" for="tgl1">Mulai</label>
                        <input type="date" class="form-control" id="tgl1" name="tgl1" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="tgl2">Hingga</label>
                        <input type="date" class="form-control" id="tgl2" name="tgl2" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">FILTER</button>
                </form>
            </div>

            <div class="modal-body" id="cetak_report">
                <style type="text/css">
                    #customers {
                        font-family: "Calibri", Arial, Helvetica, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    #customers td,
                    #customers th {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }

                    #customers tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }

                    #customers tr:hover {
                        background-color: #ddd;
                    }

                    #customers th {
                        padding-top: 12px;
                        padding-bottom: 12px;
                        text-align: left;
                        background-color: #4CAF50;
                        color: white;
                    }
                </style>
                <center>
                    <H3> LAPORAN BARANG MASUK <br> NON MEDIS KLINIK PRATAMA UIN SUKA</H3>
                </center>
                <table id="customers" width="100%" border="1">
                    <tr>
                        <th width="5%">NO</th>
                        <th width="10%">TANGGAL</th>
                        <th width="10%">KODE BARANG</th>
                        <th>NAMA BARANG</th>
                        <th>HARGA</th>
                        <th>JUMLAH</th>
                        <th>SATUAN</th>
                        <th>SUPPLIER</th>
                    </tr>
                    <?php
                    $no = 1;
                    if (isset($_REQUEST['submit'])) {
                        $submit = $_REQUEST['submit'];
                        $tgl1 = $_REQUEST['tgl1'];
                        $tgl2 = $_REQUEST['tgl2'];
                        $select = mysqli_query($konek, "SELECT `tbl_masuk`.`kode` AS `kode`,`tbl_masuk`.`kode_supplier` AS `kode_supplier`,`tbl_masuk`.`kode_barang` AS `kode_barang`,`tbl_masuk`.`tanggal` AS `tanggal`,`tbl_masuk`.`jumlah` AS `jumlah`,`tbl_masuk`.`harga` AS `harga`,`tbl_masuk`.`total` AS `total`,`tbl_barang`.`nama_barang` AS `nama_barang`,`tbl_supplier`.`nama` AS `nama`,`tbl_barang`.`kode_barang` AS `kd_barang`,`tbl_satuan`.`uraian` AS `satuan` from (((`tbl_masuk` join `tbl_barang` on((`tbl_masuk`.`kode_barang` = `tbl_barang`.`kode`))) join `tbl_supplier` on((`tbl_masuk`.`kode_supplier` = `tbl_supplier`.`kode`))) join `tbl_satuan` on((`tbl_satuan`.`kode` = `tbl_barang`.`kode_satuan`))) WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'");
                    } else {
                        $select = mysqli_query($konek, "select `tbl_masuk`.`kode` AS `kode`,`tbl_masuk`.`kode_supplier` AS `kode_supplier`,`tbl_masuk`.`kode_barang` AS `kode_barang`,`tbl_masuk`.`tanggal` AS `tanggal`,`tbl_masuk`.`jumlah` AS `jumlah`,`tbl_masuk`.`harga` AS `harga`,`tbl_masuk`.`total` AS `total`,`tbl_barang`.`nama_barang` AS `nama_barang`,`tbl_supplier`.`nama` AS `nama`,`tbl_barang`.`kode_barang` AS `kd_barang`,`tbl_satuan`.`uraian` AS `satuan` from (((`tbl_masuk` join `tbl_barang` on((`tbl_masuk`.`kode_barang` = `tbl_barang`.`kode`))) join `tbl_supplier` on((`tbl_masuk`.`kode_supplier` = `tbl_supplier`.`kode`))) join `tbl_satuan` on((`tbl_satuan`.`kode` = `tbl_barang`.`kode_satuan`))) order by tanggal asc");
                    }


                    if (mysqli_num_rows($select)) {
                        while ($data = mysqli_fetch_array($select)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['tanggal']; ?></td>
                                <td><?php echo $data['kd_barang']; ?></td>
                                <td><?php echo $data['nama_barang']; ?></td>
                                <td><?php echo $data['harga']; ?></td>
                                <td> <?php echo $data['jumlah']; ?> </td>
                                <td> <?php echo $data['satuan']; ?> </td>
                                <td> <?php echo $data['nama']; ?> </td>
                            </tr>



                        <?php }
                    } else {
                        echo "Tidak di temukan";
                    }
                    ?>



                </table>
                <p align="right">
                    <td></td>
                    <td>Diketahui Oleh <br> Pimpinan KLINIK PRATAMA UIN SUKA
                        <br><br><br>

                        ________________________
                    </td>


                </p>
            </div>

        </div>
    </div>

</div>
</div>