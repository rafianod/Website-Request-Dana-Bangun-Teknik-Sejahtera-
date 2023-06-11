<?php
include "session_bts_admin.php";
include "koneksi.php";
?>

<style>
    h3 {
        text-align: center;
    }

    form {
        text-align: center;
        margin-top: 20px;
    }

    form button {
        display: block;
        margin: auto;
    }
</style>
<h3>Permintaan Dana User</h3>

<body>
    <table align="center" , border="1">
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
            <th align="center" , colspan="2">Aksi</th>
        </tr>

        <?php
        include "koneksi.php";
        $no = 1;
        $query = "SELECT * FROM form_dana WHERE status_klik = ''";
        $ambildata = mysqli_query($koneksi, $query);
        while ($tampil = mysqli_fetch_array($ambildata)) {
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
        <td><a href ='?approve=$tampil[id_table]'> Approve</a></td>
        <td><a href ='?reject=$tampil[id_table]'> Reject</a></td>
    </tr>";
            $no++;
        }
        ?>

    </table>

    <form>
        <table align="center">
            <tr colspan="2">
                <td>
                    <button type="button" onclick="back()">Back</button>
                </td>
                <td>
                    <button type="submit" formaction="sejarah_request.php">History Form</button>
                </td>
            </tr>
        </table>
    </form>




    <script>
        function back() {
            window.location.href = "privilege-control.php";
        }
    </script>
</body>

<?php
include "koneksi.php";
if (isset($_GET['approve'])) {

    $approve = "APPROVED";
    $statusklik = "CLICKED";

    mysqli_query($koneksi, "INSERT INTO gambar 
    (nama, tanggal, bulan, tahun, nominal_uang, jenis_dana, jika_lain_lain, 
    pilihan_rekening, no_rek, no_telp)
                            SELECT nama, tanggal, nominal_uang, jenis_dana, jika_lain_lain, 
                            pilihan_rekening, no_rek, no_telp
                            FROM form_dana
                            WHERE id_table = '$_GET[approve]'");

    mysqli_query($koneksi, "INSERT INTO status_dana 
    (nama, tanggal, jenis_dana, jika_lain_lain, pilihan_rekening, no_rek, 
    nominal_uang, email, no_telp, real_name, status_dana)
                            SELECT nama, tanggal, bulan, tahun, jenis_dana, jika_lain_lain, pilihan_rekening, 
                            no_rek, nominal_uang, email, no_telp, real_name, '$approve'
                            FROM form_dana
                            WHERE id_table = '$_GET[approve]'");

    mysqli_query($koneksi, "UPDATE form_dana SET status_klik = '$statusklik' WHERE id_table = '$_GET[approve]'");
    echo "<div style='text-align: center;'>Permintaan dana telah diapprove!</div>";
    echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
} else if (isset($_GET['reject'])) {
    $reject = "REJECTED";
    $statusklik = "CLICKED";

    mysqli_query($koneksi, "INSERT INTO status_dana 
    (nama, tanggal, jenis_dana, jika_lain_lain, pilihan_rekening, no_rek, 
    nominal_uang, email, no_telp, real_name, status_dana)
                            SELECT nama, tanggal, bulan, tahun, jenis_dana, jika_lain_lain, pilihan_rekening, 
                            no_rek, nominal_uang, email, no_telp, real_name, '$reject'
                            FROM form_dana
                            WHERE id_table = '$_GET[reject]'");


    mysqli_query($koneksi, "UPDATE form_dana SET status_klik = '$statusklik' WHERE id_table = '$_GET[reject]'");

    echo "<div style='text-align: center;'>Permintaan dana telah direject!</div>";
    echo "<meta http-equiv='refresh' content='1;URL=approvement_request.php'>";
}

?>