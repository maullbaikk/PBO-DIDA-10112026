<!DOCTYPE html>
<html>
<head>
    <title>Hitung Gaji Pegawai</title>
</head>
<body>

<h2>Form Input Pegawai</h2>

<form method="POST" action="proses7.php">
    Nama: <input type="text" name="nama" required><br><br>
    Gaji Pokok: <input type="number" name="gaji" required><br><br>
    Lama Kerja: <input type="number" name="lama" required><br><br>

    Jenis Pegawai:
    <select name="jenis" onchange="showForm(this.value)" required>
        <option value="">-- Pilih --</option>
        <option value="programmer">Programmer</option>
        <option value="direktur">Direktur</option>
        <option value="mingguan">Pegawai Mingguan</option>
    </select>

    <div id="mingguanForm" style="display:none;">
        <br>Harga Barang: <input type="number" name="harga"><br><br>
        Stock: <input type="number" name="stock"><br><br>
        Terjual: <input type="number" name="terjual"><br><br>
    </div>

    <button type="submit">Hitung Gaji</button>
</form>

<script>
function showForm(jenis){
    let form = document.getElementById("mingguanForm");

    let harga = document.getElementsByName("harga")[0];
    let stock = document.getElementsByName("stock")[0];
    let terjual = document.getElementsByName("terjual")[0];

    if(jenis == "mingguan"){
        form.style.display = "block";
        harga.required = true;
        stock.required = true;
        terjual.required = true;
    } else {
        form.style.display = "none";
        harga.required = false;
        stock.required = false;
        terjual.required = false;
    }
}
</script>

</body>
</html>