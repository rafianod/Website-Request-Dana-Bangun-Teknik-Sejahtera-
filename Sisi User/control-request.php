<?php
session_start();
include "koneksi.php";
?>
  <html>
    <head>
        <title>Pemrograman Web Request Dana</title>
        <style type="text/css">
            table {
                background-color: #abdbe3;
                text-align: center;
                width: 400px;
                border-collapse: collapse;
                margin: auto;
                border-color: black;
            }

            td{
                padding: 10px;
                width: 50%;
                border: 1px solid black;
            }


            .tombol{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                margin-top: 20px;
            }

            .tombol button{
                margin: 5px;
                padding: 5px;
                flex: 1;
            }

            #loginBtn{
                width: auto;
            }

            #judul{
              text-align: center;
              font-size: 24px;
              font-weight: bold;
              margin-top: 20px;
            }
        </style>
    </head>
    <body>
    <form action = "" method = "POST">
      <table align="center">
        <tr>
          <td colspan = "2">
            <div id = "judul">Fund Request Control</div>
          </td>
        </tr>
        <tr>
          <td>User ID:</td>
          <td><input type="text" name="username"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name = "password"></td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="tombol">
              <!-- button type = "button" hanya untuk dibuat onclick ujung2nya -->
              <button type="submit" id="loginBtn" name = "loginBtn">Login</button>
            </div>
          </td>
        </tr>
      </table>
    </form>
  </body>
  <!-- kode sintaks php di bawah nama variabel nya sesuai yang di database nya yang terdapat di dalam variabel $sql-->
</html>

<?php
if(isset($_POST['loginBtn']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $_SESSION['username'] = $username;

  //validasi input
  if(empty($username) || empty($password))
  {
    echo "<div style = 'text-align: center;'>Mohon masukkan user id dan password anda";
    exit;
  }
  $sql = "select * from hak_istimewa where password = '$_POST[password]'
  and user_id = '$_POST[username]'";
  $result = mysqli_query($koneksi, $sql);
  if(!$result)
  {
    die("Query gagal: ".mysqli_error($koneksi));
  }
  $cek = mysqli_num_rows($result);
  if($cek > 0)
  {
    $_SESSION['password'] = $_POST['password'];
    echo "<meta http-equiv='refresh' content='1;URL=login-control-request.php'>";
  }

  else{
    echo "<div style = 'text-align: center;'>User ID atau password yang anda masukkan salah!</div>";
  }

  
}


