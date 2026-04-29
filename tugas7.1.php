<?php

// CLASS PARENT
class Employee {
    public $nama;
    public $gaji;
    public $lamaKerja;

    public function __construct($nama, $gaji, $lamaKerja){
        $this->nama = $nama;
        $this->gaji = $gaji;
        $this->lamaKerja = $lamaKerja;
    }

    public function hitungGaji(){
        return $this->gaji;
    }
}

// =========================
// CLASS PROGRAMMER
class Programmer extends Employee {

    public function hitungGaji(){
        $bonus = 0;

        if($this->lamaKerja < 1){
            $bonus = 0;
        } elseif($this->lamaKerja <= 10){
            $bonus = 0.01 * $this->lamaKerja * $this->gaji;
        } else {
            $bonus = 0.02 * $this->lamaKerja * $this->gaji;
        }

        return $this->gaji + $bonus;
    }
}

// =========================
// CLASS DIREKTUR
class Direktur extends Employee {

    public function hitungGaji(){
        $bonus = 0.5 * $this->lamaKerja * $this->gaji;
        $tunjangan = 0.1 * $this->lamaKerja * $this->gaji;

        return $this->gaji + $bonus + $tunjangan;
    }
}

// =========================
// CLASS PEGAWAI MINGGUAN
class PegawaiMingguan extends Employee {

    public $hargaBarang;
    public $stock;
    public $terjual;

    public function __construct($nama, $gaji, $lamaKerja, $hargaBarang, $stock, $terjual){
        parent::__construct($nama, $gaji, $lamaKerja);
        $this->hargaBarang = $hargaBarang;
        $this->stock = $stock;
        $this->terjual = $terjual;
    }

    public function hitungGaji(){
        $persen = ($this->terjual / $this->stock) * 100;

        if($persen > 70){
            $bonus = 0.1 * $this->hargaBarang * $this->terjual;
        } else {
            $bonus = 0.03 * $this->hargaBarang * $this->terjual;
        }

        return $this->gaji + $bonus;
    }
}


$p = new Programmer("Wahid", 5000000, 2);
$d = new Direktur("Resyan", 10000000, 7);
$m = new PegawaiMingguan("Radyan ", 2000000, 2, 50000, 100, 80);

echo "Programmer: Rp " . number_format($p->hitungGaji(),0,",",".") . "<br>";
echo "Direktur: Rp " . number_format($d->hitungGaji(),0,",",".") . "<br>";
echo "Pegawai Mingguan: Rp " . number_format($m->hitungGaji(),0,",",".") . "<br>";

?>