<?php

class KalkulatorSuhu {

    public $suhu; // dalam Celsius

    // Constructor
    public function __construct($suhu) {
        $this->suhu = $suhu;
    }

    // Celsius ke Fahrenheit
    public function cToF() {
        return ($this->suhu * 9/5) + 32;
    }

    // Celsius ke Kelvin
    public function cToK() {
        return $this->suhu + 273.15;
    }
}


// =======================
// Contoh Pemakaian
// =======================

$kalkulator = new KalkulatorSuhu(30);

echo "<pre>";
echo "================= KALKULATOR SUHU =================\n";
echo "Satuan   : Celsius (°C)\n";
echo "---------------------------------------------------\n";
echo "SUHU (C) : " . $kalkulator->suhu . "\n";
echo "FAHRENHEIT : " . $kalkulator->cToF() . "\n";
echo "KELVIN     : " . $kalkulator->cToK() . "\n";
echo "===================================================\n";
echo "</pre>";

?>
