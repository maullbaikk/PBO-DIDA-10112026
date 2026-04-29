<?php

class BangunRuang {
    public $jenis, $sisi, $jari, $tinggi;

    function __construct($jenis, $sisi, $jari, $tinggi){
        $this->jenis = $jenis;
        $this->sisi = $sisi;
        $this->jari = $jari;
        $this->tinggi = $tinggi;
    }

    function hitungVolume(){

        if($this->jenis == "bola"){
            return (4/3) * pi() * pow($this->jari, 3);
        }
        else if($this->jenis == "kerucut"){
            return (1/3) * pi() * pow($this->jari, 2) * $this->tinggi;
        }
        else if($this->jenis == "limas"){
            return (1/3) * pow($this->sisi, 2) * $this->tinggi;
        }
        else if($this->jenis == "kubus"){
            return pow($this->sisi, 3);
        }
        else if($this->jenis == "tabung"){
            return pi() * pow($this->jari, 2) * $this->tinggi;
        }
        else{
            return 0;
        }
    }
}

// Ambil data dari form
$jenis   = $_POST['jenis'];
$sisi    = $_POST['sisi'];
$jari    = $_POST['jari'];
$tinggi  = $_POST['tinggi'];

// Simpan ke array
$dataBangun = [];
$dataBangun[] = new BangunRuang($jenis, $sisi, $jari, $tinggi);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan</title>
</head>
<body>

<h2>Hasil Volume Bangun Ruang</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Jenis</th>
        <th>Sisi</th>
        <th>Jari-jari</th>
        <th>Tinggi</th>
        <th>Volume</th>
    </tr>

    <?php
    foreach($dataBangun as $bangun){
        echo "<tr>";
        echo "<td>".$bangun->jenis."</td>";
        echo "<td>".$bangun->sisi."</td>";
        echo "<td>".$bangun->jari."</td>";
        echo "<td>".$bangun->tinggi."</td>";
        echo "<td>".$bangun->hitungVolume()."</td>";
        echo "</tr>";
    }
    ?>

</table>

<br>
<a href="form_input.php">Kembali</a>

</body>
</html>