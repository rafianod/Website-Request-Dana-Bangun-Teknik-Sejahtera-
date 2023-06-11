<?php
include "koneksi.php";
include "session_bts_admin.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT type, content FROM gambar WHERE id = ?";
	$stmt = $koneksi->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($type, $content);
	$stmt->fetch();
	$stmt->close();
	if (!empty($type)) {
		header("Content-type: $type");
	  }
	  
	echo $content;
}
?>
