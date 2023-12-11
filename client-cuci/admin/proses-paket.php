<?php
error_reporting(1);
include "client-paket.php";

if ($_POST['aksi'] == 'tambah') {
    // Validasi apakah semua data telah diisi
    if (empty($_POST['nama_paket']) || empty($_POST['harga']) || empty($_POST['id_kategori'])) {
        echo '<script>alert("Semua data harus diisi!"); window.location.href = "form-paket.php";</script>';
        exit();
    } else {
        //simpan data
        $data = array(
            "id_paket" => $_POST['id_paket'],
            "nama_paket" => $_POST['nama_paket'],
            "harga" => $_POST['harga'],
            "id_kategori" => $_POST['id_kategori'],
            "aksi" => $_POST['aksi']
        );
        $clientPaket->tambah_paket($data);
        header('location:paket.php');
    }
} elseif ($_POST['aksi'] == 'ubah') {
    $dataPaket = $clientPaket->tampil_paket($_POST['id_paket']);

    // ketika gambar tidak diubah
    $data = array(
        "id_paket" => $_POST['id_paket'],
        "nama_paket" => $_POST['nama_paket'],
        "harga" => $_POST['harga'],
        "id_kategori" => $_POST['id_kategori'],
        "aksi" => $_POST['aksi']
    );


    $clientPaket->ubah_paket($data);
    header('location:paket.php');
} elseif ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_paket" => $_GET['id_paket'],
        "aksi" => $_GET['aksi']
    );
    $clientPaket->hapus_paket($data);
    header('location:paket.php');
}
unset($clientPaket, $data);
