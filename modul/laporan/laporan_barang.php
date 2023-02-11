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
    <!-- <div class="box-header with-border"> -->
    <div class="modal-content">
      <div class="modal-header">
        <button class="btn btn-primary large fa fa-print" onclick="printContent('cetak_report')"> Cetak</button>

        <!-- <h4 class="modal-title">Hasil Radiologi</h4> -->
      </div>



      <div class="modal-body" id="cetak_report">
        <style type="text/css">
          #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
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
        </style>
        <center>
          <H3> LAPORAN BARANG <br> LOGISTIK-NON MEDIS KLINIK PRATAMA UIN SUKA</H3>
        </center>


        <table id="customers" width="100%" border="1">
          <tr>
            <th width="4%" align="center">NO</th>
            <th>KODE BARANG</th>
            <th>NAMA BARANG</th>
            <th>SATUAN</th>
            <th>KETERANGAN</th>
          </tr>


          <?php
          $no = 1;
          if (isset($_REQUEST['submit'])) {
            $select = mysqli_query($konek, "select `tbl_barang`.`kode` AS `kode`,`tbl_barang`.`kode_barang` AS `kode_barang`,`tbl_barang`.`kode_satuan` AS `kode_satuan`,`tbl_barang`.`nama_barang` AS `nama_barang`,`tbl_barang`.`harga` AS `harga`,`tbl_barang`.`keterangan` AS `keterangan`,`tbl_satuan`.`uraian` AS `satuan` from (`tbl_barang` join `tbl_satuan` on((`tbl_satuan`.`kode` = `tbl_barang`.`kode_satuan`)))");
          } else {
            $select = mysqli_query($konek, "select `tbl_barang`.`kode` AS `kode`,`tbl_barang`.`kode_barang` AS `kode_barang`,`tbl_barang`.`kode_satuan` AS `kode_satuan`,`tbl_barang`.`nama_barang` AS `nama_barang`,`tbl_barang`.`harga` AS `harga`,`tbl_barang`.`keterangan` AS `keterangan`,`tbl_satuan`.`uraian` AS `satuan` from (`tbl_barang` join `tbl_satuan` on((`tbl_satuan`.`kode` = `tbl_barang`.`kode_satuan`)))");
          }

          if (mysqli_num_rows($select)) {
            while ($data = mysqli_fetch_array($select)) {
              ?>





              <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><?php echo $data['kode_barang']; ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td><?php echo $data['satuan']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
      
              </tr>



            <?php }
        } else {
          echo "Tidak di temukan";
        }
        ?>
        </table>

        <!-- <small><?php echo $tgl1; ?> & <?php echo $tgl2; ?> </small></h2><hr> -->


        <BR>
        <bR>
        <p align="right">
          <td></td>
          <td>Diketahui Oleh <br> Pimpinan KLINIK PRATAMA UIN SUKA
            <br><br><br><br>

            ________________________
          </td>


        </p>
      </div>

    </div>

  </div>
  <!-- </div> -->
</div>
</div>