<?php

class Belanja {

    public $namaPembeli = "Maul"; //ada 6 properti dengan set value
    public $namaBarang = "Sampo";
    public $hargaBarang = 9000;
    public $jumlahBarang = 2;
    public $totalBayar;
    public $diskon = 0.1;
    public static $pajak = 0.02;

    public function totalHarga() : float|int {
        $subtotal = $this->hargaBarang * $this->jumlahBarang;

        return $subtotal;
    }

}

$belanja1 = new Belanja();
//var_dump($belanja1);

echo "Subtotal: Rp " . $belanja1->totalHarga() . "\n";

?>
