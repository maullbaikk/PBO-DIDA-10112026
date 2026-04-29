<!DOCTYPE html>
<html>
<head>
    <title>Input Bangun Ruang</title>
</head>
<body>

<h2>Form Input Bangun Ruang</h2>

<form method="POST" action="proses6.1.php">
    Jenis Bangun:
    <select name="jenis">
        <option value="bola">Bola</option>
        <option value="kerucut">Kerucut</option>
        <option value="limas">Limas Segi Empat</option>
        <option value="kubus">Kubus</option>
        <option value="tabung">Tabung</option>
    </select><br><br>

    Sisi: <input type="number" name="sisi"><br><br>
    Jari-jari: <input type="number" name="jari"><br><br>
    Tinggi: <input type="number" name="tinggi"><br><br>

    <button type="submit" name="submit">Hitung</button>
</form>

</body>
</html>