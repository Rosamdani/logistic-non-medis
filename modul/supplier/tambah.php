<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-primary">
                        <div class="panel-heading">
                            FORM TAMBAH SUPPLIER
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="">
                                        <div class="form-group">
                                            <label>Nama Supplier *</label>
                                            <input type="text" class="form-control" name="txtnama" placeholder="Nama Supplier" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
                                        </div>

                                        <div class="form-group">
                                            <label>Telepon *</label>
                                            <input type="text" class="form-control" name="txthp" placeholder="Telp" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat *</label>
                                             <textarea class="form-control" name="txtalamat" rows="4" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" placeholder="Alamat" /></textarea>
                                        </div>
                                        <p class="help-block">* (Wajib di isi)</p>

                                        <a href="master.php?page=supplier" button type="submit" class="btn btn-danger">BATAL </button></a>
                                         <button type="submit" name="btnsimpan" class="btn btn-primary">SIMPAN</button>
                            </form>
                            <?php
                            if (isset($_POST["btnsimpan"])){
                                $txtnama = mysqli_real_escape_string($konek, $_POST['txtnama']);
                                $txtalamat = mysqli_real_escape_string($konek, $_POST['txtalamat']);
                                $txthp = mysqli_real_escape_string($konek, $_POST['txthp']);
                                $cek_user = mysqli_num_rows(mysqli_query($konek,"select * from tbl_supplier where nama='$txtnama'"));
                                if ($cek_user > 0) {
                                    echo "<script>alert('Data Sudah Ada di database')</script>";
                                    }else {
                                
                                  $simpan = mysqli_query($konek,"INSERT INTO tbl_supplier (nama,telepon,alamat) VALUES ('$txtnama','$txthp','$txtalamat')");
                                if ($simpan){
                                  ?>

                                  <script type="text/javascript">
                                    document.location.href="master.php?page=supplier";
                                  </script>
                                  <?php
                                }else{
                                 echo "<script>alert('Data Anda Gagal di simpan')</script>";
                                 echo "<meta http-equiv='refresh' content='0; url=?page=supplier'>";
                                }
                            }
                            }
                          ?>
                        </div>
               </div>
            </div>
</div>


      