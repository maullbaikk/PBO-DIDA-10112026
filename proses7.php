<?php

// ==================
// CLASS
class Employee {
    public $nama, $gaji, $lamaKerja;

    function __construct($nama, $gaji, $lamaKerja){
        $this->nama = $nama;
        $this->gaji = $gaji;
        $this->lamaKerja = $lamaKerja;
    }

    function hitungGaji(){
        return $this->gaji;
    }
}

// ==================
class Programmer extends Employee {
    function hitungGaji(){
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

// ==================
class Direktur extends Employee {
    function hitungGaji(){
        $bonus = 0.5 * $this->lamaKerja * $this->gaji;
        $tunjangan = 0.1 * $this->lamaKerja * $this->gaji;
        return $this->gaji + $bonus + $tunjangan;
    }
}

// ==================
class PegawaiMingguan extends Employee {
    public $harga, $stock, $terjual;

    function __construct($nama, $gaji, $lamaKerja, $harga, $stock, $terjual){
        parent::__construct($nama, $gaji, $lamaKerja);
        $this->harga = $harga;
        $this->stock = $stock;
        $this->terjual = $terjual;
    }

    function hitungGaji(){
        // AMAN dari pembagian nol
        if($this->stock == 0){
            $persen = 0;
        } else {
            $persen = ($this->terjual / $this->stock) * 100;
        }

        if($persen > 70){
            $bonus = 0.1 * $this->harga * $this->terjual;
        } else {
            $bonus = 0.03 * $this->harga * $this->terjual;
        }

        return $this->gaji + $bonus;
    }
}

// ==================
// VALIDASI REQUEST
if($_SERVER["REQUEST_METHOD"] != "POST"){
    die("Akses tidak valid! Silakan isi form terlebih dahulu.");
}

// ==================
// AMBIL DATA (AMAN)
$nama = $_POST['nama'] ?? '';
$gaji = $_POST['gaji'] ?? 0;
$lama = $_POST['lama'] ?? 0;
$jenis = $_POST['jenis'] ?? '';

// ==================
// PROSES
if($jenis == "programmer"){
    $obj = new Programmer($nama, $gaji, $lama);

} elseif($jenis == "direktur"){
    $obj = new Direktur($nama, $gaji, $lama);

} else {
    $harga = $_POST['harga'] ?? 0;
    $stock = $_POST['stock'] ?? 0;
    $terjual = $_POST['terjual'] ?? 0;

    $obj = new PegawaiMingguan($nama, $gaji, $lama, $harga, $stock, $terjual);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Gaji</title>
</head>
<body>

<h2>Hasil Perhitungan</h2>

Nama: <?= $nama ?><br>
Jenis: <?= $jenis ?><br>
Total Gaji: Rp <?= number_format($obj->hitungGaji(),0,",",".") ?>

<br><br>
<a href="form7.php">← Kembali ke Form</a>

</body>
</html>m  