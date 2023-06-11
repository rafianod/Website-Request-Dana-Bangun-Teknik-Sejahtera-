<?php
session_start();
include "koneksi.php";
?>
<html>
    <head>
        <title>Pemrograman Web Login Admin</title>
        <style type="text/css">
            table {
                background-color:greenyellow;
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
            <div id = "judul">Admin Room</div>
          </td>
        </tr>
        <tr>
          <td>User ID:</td>
          <td><input type="text" name = "admin"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name = "pwdadmin"></td>
        </tr>
        <tr>
          <td colspan = "2">
            <div class="tombol">
              <button type="submit" id="loginBtn" name = "loginBtn">Login</button>
            </div>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>

<?php
if(isset($_POST['loginBtn']))
{
  $username = $_POST['admin'];
  $password = $_POST['pwdadmin'];

  //validasi input
  if(empty($username) || empty($password))
  {
    echo "<div style = 'text-align: center;'>Mohon masukkan user id dan password anda";
    exit;
  }

  $sql = "select * from admin_bts where pwdadmin = '$password'
  and user_id = '$username'";
  $result = mysqli_query($koneksi, $sql);
  $cek = mysqli_num_rows($result);

  if($cek > 0)
  {
    $_SESSION['user_id'] = $_POST['admin'];
    echo "<meta http-equiv='refresh' content='1;URL=privilege-control.php'>";

  }

  else{
    echo "<div style = 'text-align: center;'>User ID atau password yang anda masukkan salah!</div>";
  }
}
?>

