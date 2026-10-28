<?php
class Buku {
    private $judul;
    private $penulis;
    private $stok;

    public function __construct($judul, $penulis, $stok) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->stok = $stok;
    }

    public function getJudul() {
        return $this->judul;
    }

    public function getStok() {
        return $this->stok;
    }

    public function kurangiStok() {
        if ($this->stok > 0) {
            $this->stok--;
            return true;
        }
        return false;
    }

    public function infoBuku() {
        return "Judul: {$this->judul}, Penulis: {$this->penulis}, Stok: {$this->stok}";
    }
}

class Anggota {
    private $idAnggota;
    private $nama;

    public function __construct($idAnggota, $nama) {
        $this->idAnggota = $idAnggota;
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }

    public function infoAnggota() {
        return "ID: {$this->idAnggota}, Nama: {$this->nama}";
    }
}

class Peminjaman {
    private $anggota;
    private $buku;
    private $tanggalPinjam;

    public function __construct(Anggota $anggota, Buku $buku, $tanggalPinjam) {
        $this->anggota = $anggota;
        $this->buku = $buku;
        $this->tanggalPinjam = $tanggalPinjam;
    }

    public function prosesPeminjaman() {
        echo "=== DETAIL TRANSAKSI PEMINJAMAN ===<br>";
        echo "Nama Anggota : " . $this->anggota->getNama() . "<br>";
        echo "Buku Dipinjam: " . $this->buku->getJudul() . "<br>";
        echo "Tanggal Pinjam: " . $this->tanggalPinjam . "<br>";

        if ($this->buku->kurangiStok()) {
            echo "Status: Peminjaman Berhasil! Sisa stok buku: " . $this->buku->getStok() . "<br>";
        } else {
            echo "Status: Peminjaman Gagal, stok buku habis!<br>";
        }
        echo "<br>";
    }
}

// --- PENGUJIAN OBJEK ---

// Membuat objek Buku
$buku1 = new Buku("Pemrograman Berorientasi Objek PHP", "Gede Herdian Setiawan", 2);

// Membuat objek Anggota
$anggota1 = new Anggota("STK001", "Budi");

// Melakukan Peminjaman
$transaksi1 = new Peminjaman($anggota1, $buku1, "2026-10-28");
$transaksi1->prosesPeminjaman();

// Simulasi peminjaman kedua dengan buku yang sama
$anggota2 = new Anggota("STK002", "Ani");
$transaksi2 = new Peminjaman($anggota2, $buku1, "2026-10-28");
$transaksi2->prosesPeminjaman();

?>