<?php
include "session_bts_admin.php";
include "koneksi.php";
?>

<style>
    h3{
        text-align: center;
    }

    form{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    form button{
        display: block;
        margin: auto;
    }

    td{
        padding: 10px;
    }

    button{
        display: block;
        margin: auto;
    }

    table{
        margin: auto;
    }
</style>
<h3>History Permintaan Dana User</h3>
<body>
<table align = "center", border = "1">
    <tr>
        <th>No</th>
        <th>Nama Asli</th>
        <th>Nama (form)</th>
        <th>Tanggal</th>
        <th>Jenis Dana</th>
        <th>Jenis Dana (lain-lain)</th>
        <th>Pilihan permintaan dana</th>
        <th>Nomor rekening</th>
        <th>Jumlah uang</th>
        <th>Email</th>
        <th>Nomor Telepon/WA</th>
        <th>Status</th>
        <th>Hapus Data</th>
    </tr>

    <?php
    include "koneksi.php";
    $no = 1;
    $ambildata = mysqli_query($koneksi, "select * from status_dana");
    while ($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$no</td>
            <td>$tampil[nama]</td>
            <td>$tampil[real_name]</td>
            <td>$tampil[tanggal]</td>
            <td>$tampil[jenis_dana]</td>
            <td>$tampil[jika_lain_lain]</td>
            <td>$tampil[pilihan_rekening]</td>
            <td>$tampil[no_rek]</td>
            <td>Rp. " . number_format($tampil['nominal_uang'], 0, ',', '.') . "</td>
            <td>$tampil[email]</td>
            <td>$tampil[no_telp]</td>
            <td>$tampil[status_dana]</td>
            <td><a href ='?kode=$tampil[id_table]'><img src = https://png.pngtree.com/element_our/20190601/ourlarge/pngtree-trash-free-button-png-picture-image_1338315.jpg width = 30; height = 30></a></td>
        </tr>";
        $no++;
    }
    ?>
</table>

<form>
    <button type = "button" onclick = "back()">Halaman Utama</button>
</form>

<script>
    function back()
    {
        window.location.href = "privilege-control.php";
    }
</script>
</body>

<?php
if(isset($_GET['kode']))
{
    mysqli_query($koneksi, "DELETE FROM status_dana WHERE id_table = '$_GET[kode]'");
    echo "<div style = 'text-align: center;'>Data telah terhapus!</div>";
    echo "<meta http-equiv='refresh' content='2;URL=sejarah_request.php'>";

}
?>
