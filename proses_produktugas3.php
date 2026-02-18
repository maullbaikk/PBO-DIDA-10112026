<?php

class PegadaianSyariah {

    public $pinjaman;
    public $bunga;
    public $lama;
    public $hari;

    public function __construct($pinjaman, $bunga, $lama, $hari){
        $this->pinjaman = $pinjaman;
        $this->bunga = $bunga;
        $this->lama = $lama;
        $this->hari = $hari;
    }

    public function totalPinjaman(){
        return $this->pinjaman + ($this->pinjaman * $this->bunga / 100);
    }

    public function angsuran(){
        return $this->totalPinjaman() / $this->lama;
    }

    public function denda(){
        $dendaPerHari = 0.0015 * $this->angsuran();
        return $dendaPerHari * $this->hari;
    }

    public function totalBayar(){
        return $this->angsuran() + $this->denda();
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan</title>
</head>
<body>

<h2>HASIL PERHITUNGAN</h2>

<?php

if(isset($_POST['pinjaman'])){

    $pg = new PegadaianSyariah(
        $_POST['pinjaman'],
        10, // bunga tetap 10%
        $_POST['lama'],
        $_POST['hari']
    );

    echo "Total Pinjaman : Rp " . number_format($pg->totalPinjaman(), 0, ',', '.') . "<br>";

    echo "Bunga Pinjaman : 10% <br>";

    echo "Angsuran : Rp " . number_format($pg->angsuran(), 0, ',', '.') . "<br>";

    echo "Denda : Rp " . number_format($pg->denda(), 2, ',', '.') . "<br>";

    echo "Total Bayar : Rp " . number_format($pg->totalBayar(), 2, ',', '.') . "<br>";

} else {
    echo "Silakan isi form terlebih dahulu.";
}

?>

</body>
</html>
