<?php
include 'db.php';
//Через папки
function get_images($directory){
	@$files = scandir($directory);
	$pattern = "#\.(jpe?g|png|gif|tiff|svg|raw|webp)$#";
	foreach($files as $key => $file) {
	     if(!preg_match($pattern, $file)) {
			 	unset($files[$key]);
		}
	}
	return $files;
}

//Через базу данных
function get_images_db(){
	global $conn;
	global $sorting;
	global $searching;
	$sql="SELECT id_image, name_image, autor FROM images ORDER BY $sorting";
	$result=$conn->query($sql);
	// if (isset($_POST["poisk"])) {
	// 	if ($_POST['vvod'] == '')
	// 		{
	// 			echo '<script>document.location.href = "GALLERY.php"; </script>';
	// 		}
	// 	else
	// 		{
	// 			$vvvod = " WHERE autor LIKE '".($_POST['vvod'])."'";
	// 			$sql="SELECT id_image, name_image, autor FROM images $vvvod ORDER BY $sorting";
	// 			$result=$conn->query($sql);
	// 			$_SESSION['vvod'] = $vvvod;
	// 		}
	// }
	if ($_GET['search'] != '') {
		$vvvod = $_SESSION['vvod'];
		$sql="SELECT id_image, name_image, autor FROM images $vvvod ORDER BY $searching";
		$result=$conn->query($sql);
	} else {
		$_SESSION['vvod'] = '';
	}
	while ($row = mysqli_fetch_assoc($result)){
		$images[$row['id_image']]=$row;
	}
	return $images;
}

?>