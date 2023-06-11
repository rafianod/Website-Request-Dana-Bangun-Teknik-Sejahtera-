<?php
include "session_bts_user.php";
include "koneksi.php";
?>


<style>
    h3 {
        text-align: center;
    }


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


    table {
        margin: auto;
    }
</style>


<h3>Respon dari admin</h3>


<table align="center" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Nominal Uang</th>
            <th>Jenis Dana</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php
    include "koneksi.php";
    $no = 1;
    $ambildata = mysqli_query($koneksi, "select * from status_dana WHERE nama = '$_SESSION[username]'");
    while ($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$no</td>
            <td>$tampil[nama]</td>
            <td>$tampil[tanggal]</td>
            <td>$tampil[nominal_uang]</td>
            <td>$tampil[jenis_dana]</td>
            <td>$tampil[status_dana]</td>
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


