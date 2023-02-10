<?php
include 'koneksi.php';
error_reporting(0);
?>

<?php
session_start();
if ($_SESSION['status'] == "") {
    header("location:index.php?pesan=login");
}
?>


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LOGISTIK NON MEDIS</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!-- SELECT -->
    <script src="assets/select2/dist/js/select2.full.min.js"></script>
    <link rel="stylesheet" href="assets/select2/dist/css/select2.min.css">
</head>

<body>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-left">
                            <h2>
                                <li><a href="master.php?page=beranda">LOGISTIK-NON MEDIS KLINIK PRATAMA UIN SUKA</a></li>
                            </h2>
                        </ul>
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <?php

                            if ($_SESSION['status'] == "Admin") {
                            ?>

                            <?php
                            } ?>


                            <li><a href="master.php?page=beranda" class="menu-top-active">BERANDA</a></li>
                            <?php

                            if ($_SESSION['status'] == "Admin") {
                            ?>

                                <li>
                                    <a class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">MASTER DATA<i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="master.php?page=barang">MASTER BARANG</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="master.php?page=satuan">MASTER SATUAN</a></li>

                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="master.php?page=supplier">MASTER SUPPLIER</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="master.php?page=ruangan">MASTER RUANGAN</a></li>

                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="master.php?page=user">MASTER PENGGUNA</a></li>
                                    </ul>
                                </li>

                            <?php
                            }

                            ?>



                            <li>
                                <?php

                                if ($_SESSION['status'] == "User") {
                                ?>

                                    <a role="menuitem" tabindex="-1" href="master.php?page=keluar">TRANSAKSI</a>

                                <?php
                                } else if ($_SESSION['status'] == "Admin") {
                                ?>
                                    <a class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">TRANSAKSI<i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="master.php?page=masuk">BARANG MASUK</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="master.php?page=keluar">BARANG KELUAR</a></li>
                                    </ul>
                                <?php
                                }

                                ?>
                            </li>


                            <li>
                                <a class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">Laporan <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="master.php?page=laporan_barang">Laporan Barang</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="master.php?page=laporan_ruangan">Laporan Ruangan</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="master.php?page=laporan_supplier">Laporan Supplier</a></li>

                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="master.php?page=laporan_masuk">Laporan Masuk</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="master.php?page=laporan_keluar">Laporan Keluar</a></li>
                                </ul>
                            </li>
                            <li><a href="login_keluar.php">Keluar : <?php echo $_SESSION['user_name']; ?></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="content-wrapper">
        <div class="container">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch ($page) {

                    case 'beranda':
                        include "modul/beranda/index.php";
                        break;


                    case 'barang':
                        include "modul/barang/index.php";
                        break;
                    case 'tambah_barang':
                        include "modul/barang/tambah.php";
                        break;
                    case 'edit_barang':
                        include "modul/barang/edit.php";
                        break;


                    case 'supplier':
                        include "modul/supplier/index.php";
                        break;
                    case 'tambah_supplier':
                        include "modul/supplier/tambah.php";
                        break;
                    case 'edit_supplier':
                        include "modul/supplier/edit.php";
                        break;


                    case 'satuan':
                        include "modul/satuan/index.php";
                        break;
                    case 'tambah_satuan':
                        include "modul/satuan/tambah.php";
                        break;
                    case 'edit_satuan':
                        include "modul/satuan/edit.php";
                        break;



                    case 'ruangan':
                        include "modul/ruangan/index.php";
                        break;
                    case 'tambah_ruangan':
                        include "modul/ruangan/tambah.php";
                        break;
                    case 'edit_ruangan':
                        include "modul/ruangan/edit.php";
                        break;


                    case 'masuk':
                        include "modul/masuk/index.php";
                        break;
                    case 'tambah_masuk':
                        include "modul/masuk/tambah.php";
                        break;
                    case 'edit_masuk':
                        include "modul/masuk/edit.php";
                        break;





                    case 'keluar':
                        include "modul/keluar/index.php";
                        break;
                    case 'tambah_keluar':
                        include "modul/keluar/tambah.php";
                        break;
                    case 'edit_keluar':
                        include "modul/keluar/edit.php";
                        break;




                    case 'update_user':
                        include "modul/user/update.php";


                    case 'user_tambah':
                        include "modul/user/tambah.php";
                        break;

                    case 'user':
                        include "modul/user/index.php";
                        break;

                        // laporan

                    case 'laporan_barang':
                        include "modul/laporan/laporan_barang.php";
                        break;
                    case 'laporan_ruangan':
                        include "modul/laporan/laporan_ruanga.php";
                        break;
                    case 'laporan_supplier':
                        include "modul/laporan/laporan_supplier.php";
                        break;
                    case 'laporan_masuk':
                        include "modul/laporan/laporan_masuk.php";
                        break;
                    case 'laporan_keluar':
                        include "modul/laporan/laporan_keluar.php";
                        break;
                    default:
                        include "beranda/gagal/index.php";
                        break;
                }
            } else {
                include "modul/beranda/index.php";
            }
            ?>
        </div>
    </div>

    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2019 :Teknik Informatika |<a> Designed by : Al-Mumtahanah Hafid</a>
                </div>
            </div>
        </div>
    </section>


    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- UNUK TABEL -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

    <script src="assets/select2/dist/js/select2.full.min.js"></script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>


</body>

</html>