<?php
error_reporting(1);
include "client-kategori.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_kategori" => $_POST['id_kategori'],
        "nama_kategori" => $_POST['nama_kategori'],

        "aksi" => $_POST['aksi']
    );
    $clientKategori->tambah_kategori($data);
    header('location:kategori.php');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_kategori" => $_POST['id_kategori'],
        "nama_kategori" => $_POST['nama_kategori'],

        "aksi" => $_POST['aksi']
    );
    $clientKategori->ubah_kategori($data);
    header('location:kategori.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_kategori" => $_GET['id_kategori'],
        "aksi" => $_GET['aksi']
    );
    $clientKategori->hapus_kategori($data);
    header('location:kategori.php');
}
unset($clientKategori, $data);
?>