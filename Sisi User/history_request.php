<?php
include "session_bts_user.php";
include "koneksi.php";
?>
<style>
    h3{
        text-align: center;
    }

    form{
        text-align: center;
        margin-top: 20px;
    }

    form button{
        display: block;
        margin: auto;
    }
</style>
<h3>History Form Permintaan Dana</h3>
<body>
<table align = "center", border = "1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Jenis Dana</th>
        <th>Jenis Dana (lain-lain)</th>
        <th>Pilihan permintaan dana</th>
        <th>Nomor rekening</th>
        <th>Jumlah uang</th>
        <th>Email</th>
        <th>Nomor Telepon/WA</th>
    </tr>
    <?php
    include "koneksi.php";
    $no = 1;
    $query = "SELECT * FROM form_dana WHERE nama = '$_SESSION[username]'";
    $ambildata = mysqli_query($koneksi, $query);
    while ($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$no</td>
            <td>$tampil[real_name]</td>
            <td>$tampil[tanggal]</td>
            <td>$tampil[jenis_dana]</td>
            <td>$tampil[jika_lain_lain]</td>
            <td>$tampil[pilihan_rekening]</td>
            <td>$tampil[no_rek]</td>
            <td>$tampil[nominal_uang]</td>
            <td>$tampil[email]</td>
            <td>$tampil[no_telp]</td>
        </tr>";
        $no++;
    }
    ?>
</table>

<form>
    <table align = "center">
        <tr>
            <td>
                <button type = "button" onclick = "back()">Back</button>
            </td>
        </tr>
    </table>
</form>
<script>
    function back()
    {
        window.location.href = "login-control-request.php";
    }
</script>
</body>
