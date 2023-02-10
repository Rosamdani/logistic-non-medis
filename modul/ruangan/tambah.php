<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-primary">
                        <div class="panel-heading">
                            FORM TAMBAH RUANGAN
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="">
                                        <div class="form-group">
                                            <label>Ruangan *</label>
                                            <input type="text" class="form-control" name="txturaian" placeholder="Ruangan" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
                                        </div>
                                        
                                        <p class="help-block">* (Wajib di isi)</p>

                                        <a href="master.php?page=ruangan" button type="submit" class="btn btn-danger">BATAL </button></a>
                                         <button type="submit" name="btnsimpan" class="btn btn-primary">SIMPAN</button>
                            </form>
                            <?php
                            if (isset($_POST["btnsimpan"])){
                                $txturaian = mysqli_real_escape_string($konek, $_POST['txturaian']);
                                $cek_user = mysqli_num_rows(mysqli_query($konek,"select * from tbl_ruangan where uraian='$txturaian'"));
                                if ($cek_user > 0) {
                                    echo "<script>alert('Data Sudah Ada di database')</script>";
                                    }else {
                                
                                  $simpan = mysqli_query($konek,"INSERT INTO tbl_ruangan (uraian) VALUES ('$txturaian')");
                                if ($simpan){
                                  ?>

                                  <script type="text/javascript">
                                    document.location.href="master.php?page=ruangan";
                                  </script>
                                  <?php
                                }else{
                                 echo "<script>alert('Data Anda Gagal di simpan')</script>";
                                 echo "<meta http-equiv='refresh' content='0; url=?page=ruangan'>";
                                }
                            }
                            }
                          ?>
                        </div>
               </div>
            </div>
</div>


      