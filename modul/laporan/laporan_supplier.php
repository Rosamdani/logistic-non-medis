<?php
error_reporting(0);
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
    <div class="modal-content">
      <div class="modal-header">
        <button class="btn btn-primary large fa fa-print" onclick="printContent('cetak_report')"> Cetak</button>
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
          <H3> LAPORAN SUPPLIER  <br> DI KLINIK PRATAMA UIN SUKA</H3>
        </center>


        <table id="customers" width="100%" border="1">
          <tr>
            <th width="4%" align="center">NO</th>
            <th>NAMA SUPPLIER</th>
            <th>TELP</th>
            <th>ALAMAT</th>
            
          </tr>
          <?php
          $no = 1;
          if (isset($_REQUEST['submit'])) {
            $select = mysqli_query($konek, "SELECT * FROM tbl_supplier order by kode asc");
          } else {
            $select = mysqli_query($konek, "SELECT * FROM tbl_supplier order by kode asc");
          }

          if (mysqli_num_rows($select)) {
            while ($data = mysqli_fetch_array($select)) {
              ?>
              <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['telepon']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
              </tr>
            <?php }
        } else {
          echo "Tidak di temukan";
        }
        ?>
        </table>
        <BR>
        <bR>
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