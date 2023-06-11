<?php
session_start();
if(!isset($_SESSION['password']))
{
    header("location:control-request.php");
}
?>
