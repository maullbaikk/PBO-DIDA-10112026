<?php


class Pembeli {

    // PROPERTY nya itu ada 4
    public $nama;
    public $punyaKartu;
    public $totalBelanja;
    public $diskon;

    // ini buat menyimpan data nya
    function __construct($nama, $punyaKartu, $totalBelanja){
        $this->nama = $nama;               
        $this->punyaKartu = $punyaKartu;   
        $this->totalBelanja = $totalBelanja; 
    }

    // ini method nya buat menghitung
    function hitungDiskon(){

        
        if($this->punyaKartu){

            
            if($this->totalBelanja > 500000){
                $this->diskon = 50000; 
            }

    
            elseif($this->totalBelanja > 100000){
                $this->diskon = 15000; 
            }

            
            else{
                $this->diskon = 0; 
            }

        }else{

            
            if($this->totalBelanja > 100000){
                $this->diskon = 5000; 
            }else{
                $this->diskon = 0; 
            }

        }

    }

}


// ini data yang di kirim dari form 1
$nama = $_POST['nama'];
$kartu = $_POST['kartu'];
$belanja = $_POST['belanja'];


// object nya
$pembeli1 = new Pembeli($nama,$kartu,$belanja);


// Menjalankan method untuk menghitung diskon
$pembeli1->hitungDiskon();


// Menghitung total bayar setelah diskon
$totalBayar = $pembeli1->totalBelanja - $pembeli1->diskon;


// Menampilkan hasil ke layar
echo "<h2>HASIL PERHITUNGAN</h2>";
echo "Nama : $pembeli1->nama <br>";
echo "Kartu Member : " . ($pembeli1->punyaKartu ? "Ada" : "Tidak Ada") . "<br>";
echo "Total Belanja : Rp " . number_format($pembeli1->totalBelanja,0,',','.') . "<br>";
echo "Diskon : Rp " . number_format($pembeli1->diskon,0,',','.') . "<br>";
echo "Total Bayar : Rp " . number_format($totalBayar,0,',','.') . "<br>";

?>