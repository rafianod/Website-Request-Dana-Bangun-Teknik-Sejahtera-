<?php
include "session_bts_admin.php";
include "koneksi.php";
?>
<html>
    <head>
        <title>Pemrograman Web Pembuatan Privilege</title>
        <style type="text/css">
            table {
                background-color:greenyellow;
                text-align: center;
                width: 900px;
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

            #createBtn{
                width: auto;
            }

            #logoutBtn{
                margin-left:auto;
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
    <form method = "POST">
      <table align="center">
        <tr>
          <td colspan = "2">
            <div id = "judul">Privilege Control</div>
          </td>
        </tr>
        <tr>
          <td>User ID:</td>
          <td><input id="id" type="text" name="user_id"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input id="pass" type="password" name="password"></td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="tombol">
              <button type="submit" id="createBtn" name="createpvl">CREATE PRIVILEGE</button>
              <button type="button" onclick = "delpvl()">VIEW USERS</button>
              <button type = "button" onclick = "viewreq()">VIEW REQUEST</button>
              <button type="button" id="logoutBtn" onclick = "logout()">LOG OUT</button>
            </div>
          </td>
        </tr>
      </table>
      <br>
      <table>
        <tr>
          <td>
            <b>Mohon perhatiannya untuk tidak membuat user id serta password yang sama antar satu sama lain</b>
          </td>
        </tr>
      </table>
    </form>
    
    <script>
      function logout()
      {
        var konfirmasi = confirm("Apakah anda yakin ingin keluar?");
      if(konfirmasi){
        window.location.href = "logout_admin_bts.php";
      }
       
      }

      function delpvl()
      {
        window.location.href = "delete_privilege.php";
      }

      function viewreq()
      {
        window.location.href = "approvement_request.php";
      }
    </script>
  </body>
</html>

<?php
include "koneksi.php";
if(isset($_POST['createpvl']))
{
  if(isset($_POST['user_id']) != "" && $_POST['password'] != "")
  {
    mysqli_query($koneksi, "INSERT INTO hak_istimewa SET
    user_id = '$_POST[user_id]',
    password = '$_POST[password]'
    ");
    echo "<div style = 'text-align:center;'>Hak Akses Baru telah dibuat!</div>";
  }

  else{
    echo "<div style = 'text-align:center;'>Mohon masukkan user id dan password!</div>";
  }
}
?>
