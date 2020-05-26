<?php
$servername = "furrygallery";
$username = "root";
$password = "";
$db = "furrygallery";
$conn = mysqli_connect($servername,$username,$password,$db);
$conn -> set_charset("utf8");
if (!$conn) {
	die("connection failed: ".mysqli_connect_error());
}
?>