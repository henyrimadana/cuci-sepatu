<?php
error_reporting(1);
class clientKategori
{
    private $urlKategori;

    public function __construct($urlKategori)
    {
        $this->url = $urlKategori;
        unset($urlKategori);
    }
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        // unset($data);
    }
    public function tampil_semua_kategori()
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

    public function tampil_kategori($id_kategori)
    {
        $id_kategori = $this->filter($id_kategori);
        $client = curl_init($this->url . "?aksi=tampil&id_kategori=" . $id_kategori);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;
        // unset($id_produk, $client, $response, $data);
    }
    public function tambah_kategori($data)
    {
        $data = '{
            "id_kategori":"' . $data['id_kategori'] . '",
            "nama_kategori":"' . $data['nama_kategori'] . '",
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

    public function ubah_kategori($data)
    {
        $data = '{
            "id_kategori":"' . $data['id_kategori'] . '",
            "nama_kategori":"' . $data['nama_kategori'] . '",
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



    public function hapus_kategori($data)
    {
        $id_kategori = $this->filter($data['id_kategori']);
        $data = '{"id_kategori":"' . $id_kategori . '",
                "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_kategori, $data, $c, $response);
    }
    public function __destruct()
    {
        unset($this->options, $this->api);
    }

}

$urlKategori = 'http://192.168.56.5/cucisepatu/server-cuci/server_kategori.php';
$clientKategori = new clientKategori($urlKategori);
