<?php
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek,"SELECT * FROM tbl_ruangan WHERE kode='$id'");
$data  = mysqli_fetch_array($sqlku);
?>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-primary">
                        <div class="panel-heading">
                            FORM EDIT RUANGAN
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="">
                                        <div class="form-group">
                                            <label>Ruangan *</label>
                                            <input type="text" value="<?php echo $data['uraian'];?>" class="form-control" name="txturaian" placeholder="Ruangan" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
                                        </div>
                                    
                                        <p class="help-block">* (Wajib di isi)</p>

                                        <a href="master.php?page=ruangan" button type="submit" class="btn btn-danger">BATAL </button></a>
                                         <button type="submit" name="btnsimpan" class="btn btn-primary">EDIT PERUBAHAN</button>
                            </form>

                            <?php
                            if (isset($_POST["btnsimpan"])){
                                $txturaian = mysqli_real_escape_string($konek, $_POST['txturaian']);
                                $edit = mysqli_query($konek,"UPDATE  tbl_ruangan SET uraian='$txturaian' WHERE kode='$id'");
                                  if ($edit)
                                  {
                                    ?>
                                    <script type="text/javascript">
                                      document.location.href="master.php?page=ruangan";
                                    </script>
                                    <?php
                                  }else{
                                   echo "<script>alert('Terjadi Kesalahan Proses Edit')</script>";
                              echo "<meta http-equiv='refresh' content='0; url=?page=edit_ruangan'>";
                                  }
                                }
                              
                              ?>
                        </div>
               </div>
            </div>
</div>

  
      