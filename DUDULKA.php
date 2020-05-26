<?php
include 'db.php';

function get_folder($directory){
	$f = opendir($directory);
	while(false!==($folder=readdir($f))){
		if ($folder=='.'||$folder=='..')continue;
	$folders[]=$folder;}
return $folders;
}

function get_image($folder){
	$images = scandir($folder);
	$pattern = "#\.(jpe?g|png|gif|tiff|svg|raw|webp)$#";
	foreach($images as $key => $image) {
	    if(!preg_match($pattern, $image)) {
		 	unset($images[$key]);}
}
return $images;
}

$directory = 'images/pictures/';
$folder = get_folder($directory);
	print_r($folder);
		
foreach ($folder as $folders){
	//print($folders);
	//$mysqli->query("INSERT INTO 'images' ('autor') VALUES ('$folders')");
	$images = get_image('images/pictures/'.$folders);
		foreach	($images as $image){
			$sql=("INSERT INTO `images`(`name_image`,`autor`,`rating`) VALUES ('$image','$folders',0)");
			$result=mysqli_query($conn, $sql)or die("Ошибка ".mysqli_error($conn));	
			print_r($image);
		}
}
?>