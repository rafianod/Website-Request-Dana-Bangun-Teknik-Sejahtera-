<?php
include "session_bts_user.php";
include "koneksi.php";
$nama = $rekbank = $nominal = $email = $phone = "";
$namaErr = $rekbankErr = $nominalErr = $emailErr = $phoneErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = trim($_POST['inputted_name']);
    $rekbank = trim($_POST['rekbank']);
    $nominal = trim($_POST['nominal']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    //cek input kosong:
    if (empty($nama)) {
        $namaErr = "<span style='color:red'>Mohon isi bagian nama.</span><br>";
        
    }

    if (empty($rekbank)) {
        $rekbankErr = "<span style='color:red'>Mohon isi bagian rekening bank.</span><br>";
    }

    if (empty($nominal)) {
        $nominalErr = "<span style='color:red'>Mohon isi bagian nominal.</span><br>";
    }

    if (empty($email)) {
        $emailErr = "<span style='color:red'>Mohon isi bagian email.</span><br>";
    }

    if (empty($phone)) {
        $phoneErr = "<span style='color:red'>Mohon isi bagian nomor telepon.</span><br>";
    }

    //cek semua input sudah diisi apa belum
    if (empty($namaErr) && empty($rekbankErr) && empty($nominalErr) && empty($emailErr) && empty($phoneErr)) {

        $sql_insert = "INSERT INTO form_dana SET
        nama = '" . $_SESSION['username'] . "',
        tanggal = '" . $_POST['tanggal'] . "',
        jenis_dana = '" . $_POST['jenis'] . "',
        jika_lain_lain = '" . $_POST['lainlain'] . "',
        pilihan_rekening = '" . $_POST['bank'] . "',
        no_rek = '" . $_POST['rekbank'] . "',
        nominal_uang = '" . $_POST['nominal'] . "',
        email = '" . $_POST['email'] . "',
        no_telp = '" . $_POST['phone'] . "',
        real_name = '" . $nama . "'
        ";

        mysqli_query($koneksi, $sql_insert);

        echo "<br>";
        echo "<div style='text-align: center;' class='green-text'>Form Permintaan telah dikirim!</div>";
        echo "<meta http-equiv='refresh' content='1;URL=login-control-request.php'>";
    }
}
?>

<html>

<head>
    <link rel="stylesheet" href="bts.css">
    <style>
        .green-text
        {
            color: darkgreen;
        }

        .red-text
        {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Pengisian Form Permintaan Dana</h2>
    <form action = "create_request.php" method = "POST">
        <div class="alert_info"><b>Mohon isi dengan benar dan lengkap agar permintaan nya dapat diproses serta mendapatkan dana secara kemungkinan besar</b></div>
        <table class="table2" border="0">
            <tr>
                <td>
                    <label class="bold"></label>
                </td>
                <td>
                    <span></span>
                    <input type="hidden" name="real_name" value = "<?php echo $_SESSION['username'];?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label class = "bold"><b class = "required">*</b>Nama: </label>
                </td>

                <td>
                    <input type = "text" id = "inputted_name" name = "inputted_name" size = "30" value = "<?php echo $nama; ?>"><br><?php echo $namaErr;?> 
                </td>
            </tr>
            <tr>
                <td>
                    <label class="bold"><b class="required">*</b>Tanggal: </label>
                </td>
                <!-- yang tampil di halaman web yaitu di apitan value dan option di HTML-->
                <!-- kalo value itu yang muncul di database serta dapat ditampilkan dari mysql ke form php-->
                <td>
                    <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="bold"><b class="required">*</b>Jenis Dana: </label>
                </td>
                <td>
                    <select name="jenis">
                        <option value="BBM"> BBM</option>
                        <option value="Tol"> Tol</option>
                        <option value="Dana Taktis"> Dana Taktis</option>
                        <option value="DLL"> Lain-lain</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label class="bold">Jika jenis dana untuk yang lain maka sebutkan (kosongkan jika bukan): </label>
                </td>
                <td>
                    <input type="text" name="lainlain" size="30">
                </td>
            </tr>

            <tr>
                <td>
                    <label class="bold"><b class="required">*</b>Rekening bank/pilihan permintaan dana: </label>
                </td>
                <td>
                    <select name="bank">
                        <option value = "BNI"> BNI</option>
                        <option value = "BCA"> BCA</option>
                        <option value = "BRI"> BRI</option>
                        <option value = "Mandiri"> Mandiri</option>
                        <option value = "Gopay"> Gopay</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label class="bold"><b class="required">*</b>Masukkan nomor rekening bank anda sesuai pilihan (isi strip jika pilih gopay): </label>
                </td>
                <td>
                    <input type="text" name="rekbank" size="30" value = "<?php echo $rekbank; ?>"><br><?php echo $rekbankErr;?>
                </td>
            </tr>

            <tr>
                <td>
                    <label class="bold"><b class="required">*</b>Jumlah uang yang diinginkan: </label>
                </td>
                <td>
                    <input type="text" name="nominal" size="30" value = "<?php echo $nominal; ?>"><br><?php echo $nominalErr;?>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="bold"><b class="required">*</b>Email: </label>
                </td>
                <td>
                    <input type="email" name="email" size="30" value = "<?php echo $email; ?>"><br><?php echo $emailErr;?>
                </td>
            </tr>   
            <tr>
                <td>
                    <label class="bold"><b class="required">*</b>Nomor Telepon/WA: </label>
                </td>
                <td>
                    <input type="tel" name="phone" size="30" value = "<?php echo $phone; ?>"><br><?php echo $phoneErr;?>
                </td>
            <tr>

            <tr>
                <td colspan = "2">
                    <button type = "button" onclick = "back()">Back</button>
                    <input type = "submit" value = "Submit" name="sendform">
                </td>
            </tr>
    </form>
    <script>
        function back()
        {
            window.location.href = "login-control-request.php";
        }
    </script>
</body>
</html>
