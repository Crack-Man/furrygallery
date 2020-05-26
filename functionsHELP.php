<?php
//Через базу данных
function get_images_db(){
	global $conn;
	global $sorting;
	$sql="SELECT autor FROM images ORDER BY autor ASC";
	$result=$conn->query($sql);
	while ($row = mysqli_fetch_assoc($result)){
		$images[$row['autor']]=$row;
	}
	array_unique($images);
	return $images;
}
?>