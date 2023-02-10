<!-- <div class="row pad-botm">
    <div class="col-md-12">
        <h4 class="header-line">Sistem Pengelolaan Barang Logistik Non Medis di RSU Imelda Medan Berbasis Web</h4>
    </div>

</div> -->


        <?php
          $barang = mysqli_query($konek,"SELECT * FROM tbl_barang");
          $total_barang = mysqli_num_rows($barang);
        ?>
         <?php
          $barang = mysqli_query($konek,"SELECT * FROM tbl_ruangan");
          $total_ruangan = mysqli_num_rows($barang);
        ?>
         <?php
          $barang = mysqli_query($konek,"SELECT * FROM tbl_masuk");
          $total_masuk = mysqli_num_rows($barang);
        ?>
         <?php
          $barang = mysqli_query($konek,"SELECT * FROM tbl_keluar");
          $total_keluar = mysqli_num_rows($barang);
        ?>



<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <div class="alert alert-info back-widget-set text-center">
            <i class="fa fa-tags fa-5x"></i>
            <h3><?php echo $total_barang;?></h3>
            Jumlah Item Barang
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <div class="alert alert-success back-widget-set text-center">
            <i class="fa fa-home fa-5x"></i>
            <h3><?php echo $total_ruangan;?></h3>
            Jumlah Ruangan
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <div class="alert alert-warning back-widget-set text-center">
        <i class="fa fa-shopping-cart fa-5x"></i>
            <h3><?php echo $total_masuk;?></h3>
           Barang Masuk
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6">
        <div class="alert alert-danger back-widget-set text-center">
            <i class="fa fa-share-square fa-5x"></i>
            <h3><?php echo $total_keluar;?></h3>
            Barang Keluar
        </div>
    </div>





              <div class="col-md-12 col-sm-12 col-xs-12">
                    <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel" >
                   
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="assets/img/gambar2.jpg" alt="" />
                        
                        </div>
                    </div>
                
                     <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>
              
                     <a class="left carousel-control" href="#carousel-example" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
                </div>
              </div>
             
            
            </div>
            </div>
