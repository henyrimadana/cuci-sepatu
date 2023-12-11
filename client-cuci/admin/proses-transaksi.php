<?php
error_reporting(1);
include "client-transaksi.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_transaksi" => $_POST['id_transaksi'],
        "id_paket" => $_POST['id_paket'],
        "nama_pelanggan" => $_POST['nama_pelanggan'],
        "tgl_masuk" => $_POST['tgl_masuk'],
        "tgl_keluar" => $_POST['tgl_keluar'],
        "aksi" => $_POST['aksi']
    );
    $clientTransaksi->tambah_transaksi($data);
    header('location:transaksi.php');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_transaksi" => $_POST['id_transaksi'],
        "id_paket" => $_POST['id_paket'],
        "nama_pelanggan" => $_POST['nama_pelanggan'],
        "tgl_masuk" => $_POST['tgl_masuk'],
        "tgl_keluar" => $_POST['tgl_keluar'],
        "aksi" => $_POST['aksi']
    );
    $clientTransaksi->ubah_transaksi($data);
    header('location:transaksi.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_transaksi" => $_GET['id_transaksi'],
        "aksi" => $_GET['aksi']
    );
    $clientTransaksi->hapus_transaksi($data);
    header('location:transaksi.php');
}
unset($clientTransaksi, $data);
?>