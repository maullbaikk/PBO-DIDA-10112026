<?php

class Belanja {

    public $namaPembeli;
    public $namaBarang;
    public $hargaBarang;
    public $jumlahBarang;
    public $diskon;        // dalam persen (misal 0.1 = 10%)
    public $uangDibayar;   // property baru

    public static $pajak = 0.02; // 2%

    // Constructor
    public function __construct($namaPembeli, $namaBarang, $hargaBarang, $jumlahBarang, $diskon, $uangDibayar) {
        $this->namaPembeli = $namaPembeli;
        $this->namaBarang = $namaBarang;
        $this->hargaBarang = $hargaBarang;
        $this->jumlahBarang = $jumlahBarang;
        $this->diskon = $diskon;
        $this->uangDibayar = $uangDibayar;
    }

    // Hitung subtotal
    public function subtotal() {
        return $this->hargaBarang * $this->jumlahBarang;
    }

    // Hitung diskon (rupiah)
    public function hitungDiskon() {
        return $this->subtotal() * $this->diskon;
    }

    // Hitung pajak (rupiah)
    public function hitungPajak() {
        return ($this->subtotal() - $this->hitungDiskon()) * self::$pajak;
    }

    // Total akhir = (subtotal - diskon) + pajak
    public function totalAkhir() {
        return ($this->subtotal() - $this->hitungDiskon()) + $this->hitungPajak();
    }

    // Method baru hitung kembalian
    public function hitungKembalian() {
        return $this->uangDibayar - $this->totalAkhir();
    }
}


// =====================
// Contoh Pemakaian
// =====================

$belanja1 = new Belanja(
    "Budi",
    "Gula 1 Kg",
    65000,
    2,
    0.1,       // diskon 10%
    130000     // uang dibayar
);

echo "<pre>";
echo "================= WARUNG A =================\n";
echo "Kasir   : SISTEM\n";
echo "Pembeli : " . $belanja1->namaPembeli . "\n";
echo "--------------------------------------------\n";
echo $belanja1->namaBarang . " x " . $belanja1->jumlahBarang . 
     " @ Rp " . number_format($belanja1->hargaBarang,0,",",".") . "\n";
echo "--------------------------------------------\n";
echo "SUBTOTAL   : Rp " . number_format($belanja1->subtotal(),0,",",".") . "\n";
echo "DISKON     : Rp " . number_format($belanja1->hitungDiskon(),0,",",".") . "\n";
echo "PAJAK 2%   : Rp " . number_format($belanja1->hitungPajak(),0,",",".") . "\n";
echo "--------------------------------------------\n";
echo "TOTAL BAYAR: Rp " . number_format($belanja1->totalAkhir(),0,",",".") . "\n";
echo "UANG BAYAR : Rp " . number_format($belanja1->uangDibayar,0,",",".") . "\n";
echo "KEMBALIAN  : Rp " . number_format($belanja1->hitungKembalian(),0,",",".") . "\n";
echo "============================================\n";
echo "</pre>";

?>
