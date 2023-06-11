<?php
include "koneksi.php";
include "session_bts_user.php";
?>
<style>

    form {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 20px;
    }


    form button {
        display: block;
        margin: auto;
    }


    td {
        padding: 10px;
    }


    button {
        display: block;
        margin: auto;
    }

    h3{
        text-align: center;
    }

</style>

<!DOCTYPE html>
<html>
<head>
	<title>Bukti Transfer Dana</title>
</head>

<h3>Bukti Transfer Dana</h3>

<body>
<table align="center" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Nominal Uang</th>
            <th>Jenis Dana</th>
            <th>Bukti Transfer Dana</th>
        </tr>
    </thead>
    <tbody>
    <?php
include "koneksi.php";
$no = 1;
$ambildata = mysqli_query($koneksi, "SELECT * from gambar WHERE nama = '$_SESSION[username]' AND content != ''");
while ($tampil = mysqli_fetch_assoc($ambildata)){
    echo "
    <tr>
        <td>$no</td>
        <td>$tampil[nama]</td>
        <td>$tampil[tanggal]</td>
        <td>$tampil[nominal_uang]</td>
        <td>$tampil[jenis_dana]</td>
        <td><img src='showimage.php?id=" . $tampil['id'] . "' width='250' height='300'></td>
    </tr>";
    $no++;
}

?>

    </tbody>
</table>

<form>
    <button type="button" onclick="back()">Back</button>
</form>


<script>
    function back() {
        window.location.href = "login-control-request.php";
    }
</script>
</body>
</html>
