<?php

// 3.a & 3.b: Class Induk
class uang_tabungan {
    // 3.d: Hak akses protected agar bisa diakses oleh class anak saja
    protected $saldo;
    private $nama; // Private: hanya bisa diakses di dalam class ini sendiri

    // 3.f: Constructor untuk inisialisasi saldo awal dan nama
    public function __construct($nama, $saldo_awal) {
        $this->nama = $nama;
        $this->saldo = $saldo_awal;
    }

    // 3.g: Method untuk menampilkan saldo
    public function cek_saldo() {
        return $this->saldo;
    }

    public function get_nama() {
        return $this->nama;
    }
}

// 3.a & 3.c: Class Anak (Siswa 1, 2, 3)
// 3.e: Enkapsulasi memastikan siswa_1 tidak bisa menyentuh saldo siswa_2 karena berbeda instance
class siswa_1 extends uang_tabungan {
    public function setor($jumlah) {
        $this->saldo += $jumlah;
    }
    public function tarik($jumlah) {
        if ($jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            return true;
        }
        return false;
    }
}

class siswa_2 extends uang_tabungan {
    public function setor($jumlah) {
        $this->saldo += $jumlah;
    }
    public function tarik($jumlah) {
        if ($jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            return true;
        }
        return false;
    }
}

class siswa_3 extends uang_tabungan {
    public function setor($jumlah) {
        $this->saldo += $jumlah;
    }
    public function tarik($jumlah) {
        if ($jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            return true;
        }
        return false;
    }
}

// 3.i: Menggunakan fopen untuk membaca input dari Command Prompt
$input = fopen("php://stdin", "r");

// 3.f: Penggunaan Array untuk menampung objek siswa
$daftar_siswa = [
    1 => new siswa_1("Budi (Siswa 1)", 50000),
    2 => new siswa_2("Ani (Siswa 2)", 75000),
    3 => new siswa_3("Caca (Siswa 3)", 100000)
];

// 3.f: Perulangan Utama Program
while (true) {
    echo "\n=== PROGRAM TABUNGAN SEKOLAH ===\n";
    foreach ($daftar_siswa as $key => $s) {
        echo "$key. " . $s->get_nama() . " (Saldo: Rp " . $s->cek_saldo() . ")\n";
    }
    echo "0. Keluar\n";
    echo "Pilih Siswa (1-3): ";
    
    // 3.i: Menggunakan fgets untuk mengambil input
    $pilihan = trim(fgets($input));

    if ($pilihan == '0') break;

    // 3.f: Percabangan untuk validasi pilihan
    if (isset($daftar_siswa[$pilihan])) {
        $siswa_aktif = $daftar_siswa[$pilihan];
        
        echo "\nMenu untuk " . $siswa_aktif->get_nama() . ":\n";
        echo "1. Setor Tunai\n";
        echo "2. Tarik Tunai\n";
        echo "Pilih Aksi: ";
        $aksi = trim(fgets($input));

        // 3.h: Logika Setor dan Tarik Tunai
        if ($aksi == '1') {
            echo "Masukkan jumlah setor: ";
            $jumlah = (int)trim(fgets($input));
            $siswa_aktif->setor($jumlah);
            echo "Berhasil! Saldo sekarang: Rp " . $siswa_aktif->cek_saldo() . "\n";
        } elseif ($aksi == '2') {
            echo "Masukkan jumlah tarik: ";
            $jumlah = (int)trim(fgets($input));
            if ($siswa_aktif->tarik($jumlah)) {
                echo "Penarikan berhasil! Sisa saldo: Rp " . $siswa_aktif->cek_saldo() . "\n";
            } else {
                echo "Gagal! Saldo tidak mencukupi.\n";
            }
        }
    } else {
        echo "Pilihan tidak valid!\n";
    }
}

echo "Terima kasih telah menggunakan program tabungan.\n";
fclose($input);
?>