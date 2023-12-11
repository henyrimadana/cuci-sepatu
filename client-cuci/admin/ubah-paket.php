<?php
include "client-paket.php";
include "client-detail-paket.php";
include "client-kategori.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ubah Paket</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light" id="navigasi">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">HISHOES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="paket.php" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">paket</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="paket.php">Data paket</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="form-paket.php">Tambah paket</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="kategori.php" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="kategori.php">Data Kategori</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="form-kategori.php">Tambah Kategori</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-dark" href="transaksi.php">
                        <i class="bi-cart-fill me-1"></i>
                        Transaksi
                        <!-- <span class="badge bg-dark text-white ms-1 rounded-pill">0</span> -->
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-2">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Edit Paket</h1>
                <p class="lead fw-normal text-white-50 mb-0">HISHOES</p>
            </div>
        </div>
    </header>

    <!-- Section-->
    <section class="py-5">
        <div class="main-1">
            <?php
            $dataPaket = $clientPaket->tampil_paket($_GET['id_paket']);
            ?>
            <form name="form" class="container" method="POST" action="proses-paket.php" enctype="multipart/form-data">
                <input type="hidden" name="aksi" value="ubah" />
                <input type="hidden" name="id_paket" value="<?= $dataPaket->id_paket ?>" />
                <div class="mb-3">
                    <label class="form-label">ID Paket</label>
                    <input type="text" class="form-control" name="id_paket" id="formGroupExampleInput"
                        value="<?= $dataPaket->id_paket ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Nama Paket</label>
                    <input type="text" class="form-control" name="nama_paket" id="formGroupExampleInput2"
                        value="<?= $dataPaket->nama_paket ?>">
                </div>
                
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Harga</label>
                    <input type="text" class="form-control" name="harga" id="formGroupExampleInput2"
                        value="<?= $dataPaket->harga ?>">
                </div>

                
                
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Kategori</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="id_kategori">
                        <?php
                        // Memastikan id_paket ada pada parameter GET
                        if (isset($_GET['id_paket'])) {
                            $id_paket = $_GET['id_paket'];

                            // Mengambil data paket
                            $dataPaket = $clientPaket->tampil_paket($id_paket);
                            // Memastikan dataPaket tidak kosong
                            if (!empty($dataPaket)) {
                                ?>
                                <option selected value="<?= $dataPaket->id_kategori ?>">
                                    <?= $dataPaket->id_kategori ?>.
                                    <?= $dataPaket->nama_kategori ?>
                                </option>
                                <?php
                            }
                            // Mengambil data kategori
                            $dataKategori = $clientKategori->tampil_semua_kategori();

                            // Menampilkan opsi dropdown untuk setiap kategori
                            foreach ($dataKategori as $kategori) {
                                ?>
                                <option value="<?= $kategori->id_kategori ?>">
                                    <?= $kategori->id_kategori ?>.
                                    <?= $kategori->nama_kategori ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" name="ubah" class="btn btn-primary">Edit paket</button>
                </div>
            </form>
        </div>

    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Heny Rimadana 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>