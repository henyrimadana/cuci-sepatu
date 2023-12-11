<?php
error_reporting(1); //error ditampilkan

class Database
{
   private $host = "localhost";
   private $dbname = "cucisepatu";
   private $user = "root";
   private $password = "";
   private $port = "3306";
   private $conn;

   //function yang pertama kali di-load saat class dipanggil
   public function __construct()
   {
      // koneksi database
      try {
         $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
         echo "Koneksi Gagal";
         exit(); // keluar dari skrip jika koneksi gagal
      }
   }

   public function tampil_semua_paket()
   {
      $query = $this->conn->prepare("SELECT p.*, k.* FROM paket p JOIN kategori k ON p.id_kategori = k.id_kategori ORDER BY p.id_paket");
      $query->execute();
      $data = $query->fetchAll(PDO::FETCH_ASSOC);
      return $data;
   }


   public function tampil_semua_kategori()
   {
      $query = $this->conn->prepare("SELECT id_kategori, nama_kategori FROM kategori order by id_kategori");
      $query->execute();
      $data = $query->fetchAll(PDO::FETCH_ASSOC);
      return $data;
   }



   public function tampil_semua_transaksi()
   {
      $query = $this->conn->prepare("SELECT t.id_transaksi, p.nama_paket, t.nama_pelanggan, t.tgl_masuk, t.tgl_keluar FROM transaksi t JOIN paket p ON t.id_paket=p.id_paket ORDER BY id_transaksi");
      $query->execute();
      $data = $query->fetchAll(PDO::FETCH_ASSOC);
      return $data;
      // $query->closeCursor();
      // unset($data);
   }

   //  FUNGSI UNTUK TAMPIL
   public function tampil_paket($id_paket)
   {
      $query = $this->conn->prepare("SELECT p.*, k.* FROM paket p JOIN kategori k ON p.id_kategori = k.id_kategori WHERE p.id_paket=?");
      $query->execute(array($id_paket));
      $data = $query->fetch(PDO::FETCH_ASSOC);
      return $data;
   }


   public function tampil_kategori($id_kategori)
   {
      $query = $this->conn->prepare("SELECT id_kategori, nama_kategori FROM kategori WHERE id_kategori=?");
      $query->execute(array($id_kategori));
      $data = $query->fetch(PDO::FETCH_ASSOC);
      return $data;
      // $query->closeCursor();
      // unset($id_produk, $data);
   }

   public function tampil_transaksi($id_transaksi)
   {
      $query = $this->conn->prepare("SELECT id_transaksi, id_paket, nama_pelanggan, tgl_masuk, tgl_keluar FROM transaksi WHERE id_transaksi=?");
      $query->execute(array($id_transaksi));
      $data = $query->fetch(PDO::FETCH_ASSOC);
      return $data;
      // $query->closeCursor();
      // unset($id_transaksi, $data);
   }




   // FUNGSI UNTUK TAMBAH DATA PADA TABEL 
   public function tambah_paket($data)
   {

      $query = $this->conn->prepare("INSERT IGNORE INTO paket (id_paket, nama_paket, harga, id_kategori) VALUES (?,?,?,?)");
      $query->execute(array($data['id_paket'], $data['nama_paket'], $data['harga'], $data['id_kategori']));
      // $query->closeCursor();
      // unset($data);
   }

   public function tambah_kategori($data)
   {
      $query = $this->conn->prepare("INSERT IGNORE INTO kategori (id_kategori, nama_kategori) VALUES (?,?)");
      $query->execute(array($data['id_kategori'], $data['nama_kategori']));
      // $query->closeCursor();
      // unset($data);
   }


   public function tambah_transaksi($data)
   {
      $query = $this->conn->prepare("INSERT IGNORE INTO transaksi (id_transaksi, id_paket, nama_pelanggan, tgl_masuk, tgl_keluar) VALUES (?,?,?,?,?)");
      $query->execute(array($data['id_transaksi'], $data['id_paket'], $data['nama_pelanggan'], $data['tgl_masuk'], $data['tgl_keluar']));
      $query->closeCursor();
      unset($data);
   }


   // FUNGSI UNTUK UBAH DATA PADA TABEL



   public function ubah_paket($data)
   {
      $query = $this->conn->prepare("UPDATE paket SET nama_paket=?, harga=?, id_kategori=? WHERE id_paket=?");
      $query->execute(array($data['nama_paket'], $data['harga'], $data['id_kategori'], $data['id_paket']));
      $query->closeCursor();
      unset($data);
   }

   public function ubah_kategori($data)
   {
      $query = $this->conn->prepare("UPDATE kategori set nama_kategori=? WHERE id_kategori=?");
      $query->execute(array($data['nama_kategori'], $data['id_kategori']));
      $query->closeCursor();
      unset($data);
   }



   public function ubah_transaksi($data)
   {
      $query = $this->conn->prepare("UPDATE transaksi set id_paket=?, nama_pelanggan=?, tgl_masuk=?, tgl_keluar=? WHERE id_transaksi=?");
      $query->execute(array($data['id_paket'], $data['nama_pelanggan'], $data['tgl_masuk'], $data['tgl_keluar'], $data['id_transaksi']));

      $query->closeCursor();
      unset($data);
   }

   //   FUNGSI UNTUK HAPUS DATA PADA TABEL
   public function hapus_paket($id_paket)
   {
      $query = $this->conn->prepare("DELETE FROM produk WHERE id_paket=?;
      
      SET @max_id_paket = (SELECT MAX(id_paket) FROM produk);
      
      SET @sql = CONCAT('ALTER TABLE paket AUTO_INCREMENT = ', @max_id_paket + 1);
      
      PREPARE stmt FROM @sql;
      EXECUTE stmt;
      DEALLOCATE PREPARE stmt;
      ");
      $query->execute(array($id_paket));
      $query->closeCursor();
      unset($id_paket);
   }

   public function hapus_kategori($id_kategori)
   {
      $query = $this->conn->prepare("DELETE FROM kategori WHERE id_kategori=?;
      
      SET @max_id = (SELECT MAX(id_kategori) FROM kategori);
      
      SET @sql = CONCAT('ALTER TABLE kategori AUTO_INCREMENT = ', @max_id + 1);
      
      PREPARE stmt FROM @sql;
      EXECUTE stmt;
      DEALLOCATE PREPARE stmt;
      ");
      $query->execute(array($id_kategori));
      $query->closeCursor();
      unset($id_kategori);
   }



   public function hapus_transaksi($id_transaksi)
   {
      $query = $this->conn->prepare("DELETE FROM transaksi WHERE id_transaksi=?;
      
      SET @max_id = (SELECT MAX(id_transaksi) FROM transaksi);
      
      SET @sql = CONCAT('ALTER TABLE transaksi AUTO_INCREMENT = ', @max_id + 1);
      
      PREPARE stmt FROM @sql;
      EXECUTE stmt;
      DEALLOCATE PREPARE stmt;
      ");
      $query->execute(array($id_transaksi));
      $query->closeCursor();
      unset($id_transaksi);
   }


}

