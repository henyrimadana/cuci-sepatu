<?php
include "client-transaksi.php";

$dataTransaksi = $clientTransaksi->tampil_semua_transaksi();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Transaksi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="./dist/img/hishoes.png" alt="AdminLTELogo" height="200" width="200">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="./index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="wa.me/6285156663729" class="nav-link">Contact</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="./index.php" class="brand-link">
                <img src="./dist/img/hishoes.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">HISHOES-JASA</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="./dist/img/hishoes-160x160.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <p class="text-white">ADMIN</p>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="./index.php" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <!-- Paket -->
                        <li class="nav-header">Paket</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="fas fa-shoe-prints"></i>
                                <p>
                                    Paket
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./paket.php" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Data Paket Cuci</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./form-paket.php" class="nav-link">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Tambah Paket</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="fas fa-poll-h"></i>
                                <p>
                                    Kategori
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./kategori.php" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Data Kategori Paket</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./form-kategori.php" class="nav-link">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Tambah Kategori Paket</p>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <!-- TRANSAKSI -->
                        <li class="nav-header">Transaksi</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-cart-arrow-down"></i>
                                <p>
                                    Transaksi
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-success right">
                                        <?php echo count($dataTransaksi) ?>
                                    </span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./transaksi.php" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Data Transaksi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./form-transaksi.php" class="nav-link">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Tambah Transaksi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tambah Transaksi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Transaksi</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form name="form" class="container" method="POST" action="proses-transaksi.php">
                                    <input type="hidden" name="aksi" value="tambah" />
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">ID Transaksi</label>
                                            <input type="text" class="form-control" name="id_transaksi"
                                                id="formGroupExampleInput" placeholder="Otomatis" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Paket</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="id_paket">
                                                <option selected disabled>Pilih paket</option>
                                                <?php
                                                include "client-paket.php";
                                                $dataPaket = $clientPaket->tampil_semua_paket();
                                                foreach ($dataPaket as $paket) {
                                                    ?>
                                                    <option value="<?= $paket->id_paket ?>">
                                                        <?= $paket->nama_paket ?>
                                                    </option>
                                                    <?php
                                                }
                                                unset($dataPaket, $paket);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Nama Pelanggan</label>
                                            <input type="text" class="form-control" name="nama_pelanggan"
                                                id="formGroupExampleInput" placeholder="Silahkan isi nama kamu">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2" class="form-label">Tanggal Masuk</label>
                                            <input type="date" class="form-control" name="tgl_masuk"
                                                id="formGroupExampleInput2">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2" class="form-label">Tanggal
                                                Keluar</label>
                                            <input type="date" class="form-control" name="tgl_keluar"
                                                id="formGroupExampleInput2">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="simpan">Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="https://instagram.com/henyrmdn_" target="_blank">Heny Rimadana</a> &
            </strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Sistem Terdistribusi & Keamanan</b> 2023
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>




    <!-- Page specific script -->
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>