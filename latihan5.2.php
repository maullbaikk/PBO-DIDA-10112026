<?php

// ini adalah function
function formatRupiah($angka): string {
return "Rp " . number_format(num: $angka, decimals: 0, decimal_separator: ',', thousands_separator: '.');
}

// ini adalah class
class BelanjaMarket {

public $namaPembeli;
public $namaBarang;
public $hargaBarang;
public $jumlahBeli;

// ini adalah method yang ...
public function hitungSubtotal(): float|int {
return $this->hargaBarang * $this->jumlahBeli;
}

public function hitungDiskon($subtotal){
if ($subtotal > 10000) {
return $subtotal * 0.1;

}
return 0;
}

public function hitungTotal() {
$subtotal = $this->hitungSubtotal();
$diskon = $this->hitungDiskon($subtotal);
return $subtotal - $diskon;
}

}

$dataBelanja = [
[
"nama" => "Budi",
"barang" => "Gula 1 kg",
"harga" => 65000,
"jumlah" => 2

],

[
"nama" => "Sinta",
"barang" => "Minyak 1 L",
"harga" => 140000,
"jumlah" => 1
]
];

echo "

TRANSAKSI 1
";

$errors1 = [];

$nama = $dataBelanja [0] ["nama"];
$barang = $dataBelanja [0] ["barang"];
$harga = $dataBelanja [0] ["harga"];
$jumlah = $dataBelanja [0] ["jumlah"];

if (empty ($nama)) {
$errors1[] = "Nama pembeli tidak boleh kosong.";
}

if ($harga <= 0) {
$errors1[] = "Harga harus lebih dari 0.";
}

if ($jumlah <= 0) {
$errors1[] = "Jumlah beli harus lebih dari 0.";
}

if (!empty($errors1)) {
foreach ($errors1 as $error) {
echo $error . "
";
}

} else {
$belanja1 = new BelanjaMarket();
$belanja1->namaPembeli = $nama;
$belanja1->namaBarang = $barang;
$belanja1->hargaBarang = $harga;
$belanja1->jumlahBeli = $jumlah;

$subtotal = $belanja1->hitungSubtotal();
$diskon = $belanja1->hitungDiskon($subtotal);
$total = $belanja1->hitungTotal();

echo "Pembeli : $belanja1->namaPembeli
";
echo "Barang : $belanja1->namaBarang
";
echo "Subtotal : " . formatRupiah($subtotal) . "
";
echo "Diskon : " . formatRupiah($diskon) . "
";
echo "
Total Bayar: " . formatRupiah($total) . "

";

}
?>