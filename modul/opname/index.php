<?php
error_reporting(0);
if (!($_SESSION['status'] == "User" || $_SESSION['status'] == "Admin")) {
    die();
}

$server = 'localhost';
$user = 'root';
$password = '';
$database = 'logistik_non_medis';
$konek = mysqli_connect ($server, $user, $password, $database);
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
                    <H3> RIWAYAT PENGGUNAAN BARANG <br> NON MEDIS KLINIK PRATAMA UIN SUKA</H3>
                </center>
                <table id="customers" width="100%" border="1">
                    <tr>
                        <th width="5%">NO</th>
                        <th width="10%">KODE BARANG</th>
                        <th width="10%">NAMA BARANG</th>
                        <th width="10%">KODE SATUAN</th>
                        <th>STOK AWAL</th>
                        <th>PENGAMBILAN</th>
                        <th>STOK AKHIR</th>
                    </tr>
                    <?php
                    $no = 1;

                    $select = mysqli_query($konek, "SELECT * FROM tbl_opname");
                    if (mysqli_num_rows($select)) {
                        while ($data = mysqli_fetch_array($select)) {
                            $idBarang = $data['kode_barang'];
                            $select2 = mysqli_query($konek, "SELECT kode_barang as kode, nama_barang as nama FROM tbl_barang WHERE kode = $idBarang");
                            $data3 = mysqli_fetch_array($select2);                    
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data3['kode']; ?></td>
                                <td><?php echo $data3['nama']; ?></td>
                                <td><?php echo $data['satuan']; ?></td>
                                <td><?php echo $data['stok_awal']; ?></td>
                                <td> <?php echo $data['pengambilan']; ?> </td>
                                <td> <?php echo $data['stok_akhir']; ?> </td>
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