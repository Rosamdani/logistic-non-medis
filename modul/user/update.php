<?php
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_user WHERE kode='$id'");
$data  = mysqli_fetch_array($sqlku);
?>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-primary">
                        <div class="panel-heading">
                            FORM EDIT - PENGGUNA
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="">
                                        <div class="form-group">
                                            <label>User Name *</label>
                                            <input type="text" value="<?php echo $data['user_name'];?>" class="form-control" name="txtnama" placeholder="Nama Supplier" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
                                        </div>

                                        <div class="form-group">
                                            <label>Password * </label>
                                            <input type="password" value="<?php echo $data['password'];?>" class="form-control" name="txtpassword" placeholder="Telp" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong, Harap di isi dengan benar.!')" oninput="setCustomValidity('')" />
                                        </div>
                                        <p class="help-block">* (Wajib di isi)</p>

                                        <a href="master.php?page=user" button type="submit" class="btn btn-danger">BATAL </button></a>
                                         <button type="submit" name="btn_edit" class="btn btn-primary">UPDATE</button>
                            </form>

                            <?php
                            if (isset($_POST["btn_edit"])){
                                $txtnama = mysqli_real_escape_string($konek, $_POST['txtnama']);
                                $txtpassword = md5(mysqli_real_escape_string($konek, $_POST['txtpassword']));
                                $edit = mysqli_query($konek,"UPDATE  tbl_user SET user_name='$txtnama',password='$txtpassword' WHERE kode='$id'");
                                  if ($edit)
                                  {
                                    ?>
                                    <script type="text/javascript">
                                      document.location.href="master.php?page=user";
                                    </script>
                                    <?php
                                  }else{
                                   echo "<script>alert('Terjadi Kesalahan Proses Edit')</script>";
                              echo "<meta http-equiv='refresh' content='0; url=?page=user_edit'>";
                                  }
                                }
                              
                              ?>
                        </div>
               </div>
            </div>
</div>

  