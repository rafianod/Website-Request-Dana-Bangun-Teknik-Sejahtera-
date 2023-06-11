<?php
include "koneksi.php";
include "session_bts_admin.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Image to MySQL Database and Display in PHP</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Silakan Unggah Bukti Transfer Dana:</label>
        <input type="file" name="image">
        <br><br>
        <input type="submit" name="upload" value="Upload">
    </form>


    <br>
   
    <table border = "1">
    <tr>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Jenis Dana</th>
        <th>Jika lain-lain (Jenis Dana)</th>
        <th>Pilhan Rekening</th>
        <th>Nomor Rekening</th>
        <th>Nomor Telepon</th>
        <th>Jumlah uang</th>
    </tr>
    <?php
    include "koneksi.php";
    $ambildata = mysqli_query($koneksi, "SELECT * FROM gambar WHERE tindak_lanjut = ''");
    while ($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$tampil[nama]</td>
            <td>$tampil[tanggal]</td>
            <td>$tampil[bulan]</td>
            <td>$tampil[tahun]</td>
            <td>$tampil[jenis_dana]</td>
            <td>$tampil[jika_lain_lain]</td>
            <td>$tampil[pilihan_rekening]</td>
            <td>$tampil[no_rek]</td>
            <td>$tampil[no_telp]</td>
            <td>Rp. " . number_format($tampil['nominal_uang'], 0, ',', '.') . "</td>
        </tr>";
    }
    ?>
    </table>
     
</body>
</html>
