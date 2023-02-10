<?php
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek,"SELECT * FROM tbl_supplier WHERE kode='$id'");
$data  = mysqli_fetch_array($sqlku);
?>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-primary">
                        <div class="panel-heading">
                            FORM EDIT SUPPLIER
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="">
                                        <div class="form-group">
                                            <label>Nama Supplier *</label>
                                            <input type="text" value="<?php echo $data['nama'];?>" class="form-control" name="txtnama" placeholder="Nama Supplier" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
                                        </div>

                                        <div class="form-group">
                                            <label>Telepon *</label>
                                            <input type="text" value="<?php echo $data['telepon'];?>" class="form-control" name="txthp" placeholder="Telp" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat *</label>
                                             <textarea class="form-control" name="txtalamat" rows="4" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" placeholder="Alamat" /><?php echo $data['alamat'];?></textarea>
                                        </div>
                                        <p class="help-block">* (Wajib di isi)</p>

                                        <a href="master.php?page=supplier" button type="submit" class="btn btn-danger">BATAL </button></a>
                                         <button type="submit" name="btnsimpan" class="btn btn-primary">EDIT PERUBAHAN</button>
                            </form>

                            <?php
                            if (isset($_POST["btnsimpan"])){
                                $txtnama = mysqli_real_escape_string($konek, $_POST['txtnama']);
                                $txtalamat = mysqli_real_escape_string($konek, $_POST['txtalamat']);
                                $txthp = mysqli_real_escape_string($konek, $_POST['txthp']);
                                $edit = mysqli_query($konek,"UPDATE  tbl_supplier SET nama='$txtnama',telepon='$txthp',alamat='$txtalamat' WHERE kode='$id'");
                                  if ($edit)
                                  {
                                    ?>
                                    <script type="text/javascript">
                                      document.location.href="master.php?page=supplier";
                                    </script>
                                    <?php
                                  }else{
                                   echo "<script>alert('Terjadi Kesalahan Proses Edit')</script>";
                              echo "<meta http-equiv='refresh' content='0; url=?page=edit_hari'>";
                                  }
                                }
                              
                              ?>
                        </div>
               </div>
            </div>
</div>

  
      