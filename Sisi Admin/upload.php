<?php
include "koneksi.php";
include "session_bts_admin.php";

if (isset($_POST["upload"])) {
    // Get image data
    $image = $_FILES['image']['tmp_name'];
    $imageType = $_FILES['image']['type'];
    $imageName = $_FILES['image']['name'];
    $imageContent = addslashes(file_get_contents($image));

    // Insert image data into database
    $query = "INSERT INTO gambar (name, type, content) VALUES ('$imageName', '$imageType', '$imageContent')";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        // Display error message and terminate script execution
        die("Error: " . mysqli_error($koneksi));
    }

    // Query to retrieve the last inserted ID
    $idQuery = "SELECT LAST_INSERT_ID() as id";
    $result = mysqli_query($koneksi, $idQuery);

    if (!$result) {
        // Display error message and terminate script execution
        die("Error: " . mysqli_error($koneksi));
    }

    $id = mysqli_fetch_assoc($result)['id'];

    // Mengambil nilai 'nama' dengan isi content kosong
    $tindaklanjut = "DONE";
    $query = "SELECT nama, tanggal, bulan, tahun, nominal_uang, jenis_dana FROM gambar WHERE content = ''";

    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $nama = $row['nama'];
    $tanggal = $row['tanggal'];
    $bulan = $row['bulan'];
    $tahun = $row['tahun'];
    $nominal = $row['nominal_uang'];
    $jenis = $row['jenis_dana'];
 
    // Memperbarui nilai 'nama' dengan isi content yang telah terisi
    $query = "UPDATE gambar SET nama = '$nama', tanggal = '$tanggal', bulan = '$bulan', 
    tahun = '$tahun', nominal_uang = '$nominal', jenis_dana = '$jenis' WHERE content != '' AND tindak_lanjut = ''";
    mysqli_query($koneksi, $query);
    
    mysqli_query($koneksi, "DELETE FROM gambar WHERE content = ''");

    mysqli_query($koneksi, "UPDATE gambar SET tindak_lanjut = '$tindaklanjut' WHERE content != ''");

    // Redirect to bukti.php with the ID of the uploaded image
    "Location: bukti_transfer.php?id=$id";
    echo "<meta http-equiv='refresh' content='1;URL=privilege-control.php'>";
    exit();
}
?>
