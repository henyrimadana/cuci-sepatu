<?php
error_reporting(1);
class clientPaket
{
    private $urlPaket;

    public function __construct($urlPaket)
    {
        $this->url = $urlPaket;
        unset($urlPaket);
    }
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        // unset($data);
    }
    public function tampil_semua_paket()
    {
        $client = curl_init($this->url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        // mengembalikan data
        return $data;
        // menghapus variabel dari memory
        // unset($data, $client, $response);
    }

    public function tampil_paket($id_paket)
    {
        $id_paket = $this->filter($id_paket);
        $client = curl_init($this->url . "?aksi=tampil&id_paket=" . $id_paket);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        // unset($id_detail, $client, $response, $data);
    }

    public function tambah_paket($data)
    {
        $data = '{
            "id_paket":"' . $data['id_paket'] . '",
            "nama_paket":"' . $data['nama_paket'] . '",
            "harga":"' . $data['harga'] . '",
            "id_kategori":"' . $data['id_kategori'] . '",
            "aksi":"' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        // unset($data, $c, $response);
    }

    public function ubah_paket($data)
    {
        $data = '{
            "id_paket":"' . $data['id_paket'] . '",
            "nama_paket":"' . $data['nama_paket'] . '",
            "harga":"' . $data['harga'] . '",
            "id_kategori":"' . $data['id_kategori'] . '",
            "aksi":"' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        // unset($data, $c, $response);
    }



    public function hapus_paket($data)
    {
        $id_paket = $this->filter($data['id_paket']);
        $data = '{"id_paket":"' . $id_paket . '",
                "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_paket, $data, $c, $response);
    }
    public function __destruct()
    {
        unset($this->options, $this->api);
    }
}

//url menyesuaikan, nanti buat server_spesifikasi_laptop
$urlPaket = 'http://192.168.56.5/cucisepatu/server-cuci/server_paket.php';
$clientPaket = new clientPaket($urlPaket);
