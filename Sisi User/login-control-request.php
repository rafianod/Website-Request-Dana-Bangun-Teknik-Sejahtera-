<?php
include "session_bts_user.php";
include "koneksi.php";
$username = $_SESSION['username'];
?>
<html>
    <head>
        <title>Berhasil Login</title>
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
                flex-direction: column;
                justify-content: space-between;
                align-items: center;
                margin-top: 20px;
            }

            .tombol button{
                margin: 5px;
                padding: 5px;
                flex: 1;
                width: 100%;
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
    <form>
      <table align="center">
      <tr>
          <td colspan = "2">
            <div id = "judul">Selamat Datang, <?php echo $username;?>!</div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="tombol">
              <button type="button" onclick = "createreq()">Create Request</button>
              <button type="button" onclick = "historyreq()">Request History</button>
              <button type="button" onclick = "viewreq()">View Response</button>
              <button type = "button" onclick = "bukti_transfer()">Bukti Transfer</button>
              <button type="button" onclick = "logout()">Log Out</button>
            </div>
          </td>
        </tr>
      </table>
    </form>
    <script>
   
      function historyreq()
      {
        window.location.href = "history_request.php";
      }
     
      function viewreq()
      {
        window.location.href = "view_respond.php";
      }
      function logout()
      {
        var konfirmasi = confirm("Apakah anda yakin ingin keluar?");
        if(konfirmasi)
        {
          window.location.href = "logout_user_bts.php";
        }
      }
      function bukti_transfer()
      {
        window.location.href = "bukti_transfer.php";
      }

      function createreq()
      {
        window.location.href = "create_request.php";
      }
    </script>
  </body>
</html>

