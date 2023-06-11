<?php
include "session_bts_admin.php";
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
<h3>Hak Akses User</h3>
<body>
<table align = "center", border = "1">
    <tr>
        <th>No</th>
        <th>User ID</th>
        <th>Password</th>
        <th>Delete</th>
    </tr>

    <?php
    include "koneksi.php";
    $no = 1;
    $ambildata = mysqli_query($koneksi, "select * from hak_istimewa");
    while ($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$no</td>
            <td>$tampil[user_id]</td>
            <td>$tampil[password]</td>
            <td><a href ='?kode=$tampil[password]'><img src = https://png.pngtree.com/element_our/20190601/ourlarge/pngtree-trash-free-button-png-picture-image_1338315.jpg width = 30; height = 30></a></td>
        </tr>";
        $no++;
    }
    ?>
</table>

<form>
    <button type = "button" onclick = "back()">Back</button>
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
    mysqli_query($koneksi, "delete from hak_istimewa where password = '$_GET[kode]'");
    echo "<div style = 'text-align: center;'>Data Hak Akses telah terhapus</div>";
    echo "<meta http-equiv='refresh' content='1;URL=delete_privilege.php'>";

}
?>
