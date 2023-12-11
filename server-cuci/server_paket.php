<?php
error_reporting(1);
include "Database.php";
$abc = new Database();

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true'); // Perbaiki penulisan 'Access'
    header('Access-Control-Max-Age: 86400');
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}
$postdata = file_get_contents("php://input");

function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
    return $data;
    // unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);

    $id_paket = $data->id_paket;
    $nama_paket = $data->nama_paket;
    $harga = $data->harga;
    $id_kategori = $data->id_kategori;

    $aksi = $data->aksi;
    if ($aksi == 'tambah') {
        $data2 = array(
            'id_paket' => $id_paket,
            'nama_paket' => $nama_paket,
            'harga' => $harga,
            'id_kategori' => $id_kategori
        );
        $abc->tambah_paket($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_paket' => $id_paket,
            'nama_paket' => $nama_paket,
            'harga' => $harga,
            'id_kategori' => $id_kategori
        );
        $abc->ubah_paket($data2);
    } elseif ($aksi == 'hapus') {
        $abc->hapus_paket($id_paket);
    }

    unset($postdata, $data, $data2, $id_paket, $nama_paket, $harga, $id_kategori, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_paket']))) {
        $id_paket = filter($_GET['id_paket']);
        $data = $abc->tampil_paket($id_paket);
        echo json_encode($data);
    } else {
        $data = $abc->tampil_semua_paket();
        echo json_encode($data);
    }
    unset($postdata, $data, $id_paket, $abc);
}
?>