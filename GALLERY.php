<?
	session_start();
    if($_GET['log_out'] == 'true') {
        SetCookie("login", "", time() - 360000, '/');
        SetCookie("password", "", time() - 360000, '/');
        unset($_SESSION['id']);
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/'); 
    }
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_Navigation.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/style_Gallery.css" media="screen" />
	<link href="css/lightbox.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
		
		include ('NAVIGATION.php');
		include("entered.php");
		if(!entered()) include("reg.php");
		if (entered()) {
	?>
			<a href='?log_out=true'>
				<div id="logout" class="logout">
					ВЫЙТИ
				</div>
			</a>
	<?php }
		$sorting=$_GET["sort"];
		switch($sorting) {
			case '';
			$sorting='date ASC';
			break;
			
			case 'a...ya-asc';
			$sorting='autor ASC';
			$sort_name='А...Я';
			break;
			
			case 'date-asc';
			$sorting='date ASC';
			$sort_name='ПО ДАТЕ';
			break;
			
			case 'rating-asc';
			$sorting='rating DESC';
			$sort_name='ПО РЕЙТИНГУ';
			break;
		}
		$searching=$_GET["search"];
		switch($searching) {
			case 'true';
			$searching='date ASC';
			break;
			
			case 'a...ya-asc';
			$searching='autor ASC';
			$sort_name='А...Я';
			break;
			
			case 'date-asc';
			$searching='date ASC';
			$sort_name='ПО ДАТЕ';
			break;
			
			case 'rating-asc';
			$searching='rating DESC';
			$sort_name='ПО РЕЙТИНГУ';
			break;
		}
		include ('functions.php');
		include ('db.php');
		$directory = 'images/pictures/Wolfy-Nail/';
		$imagess = get_images($directory);
		
		$images = get_images_db();
		$height1=0;
		$height2=0;
		$height3=0;

    ?>

<!--    <div class="search" id="srch">    
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="ПОИСК" style="border: solid 3px #30217E; width: 92.5%; height: 5%; margin: 10px 10 10 10; font-family: The Capt; font-size: 20px;" name="search1" />
        </form>
        <p style="margin: 10px 10 10 10;">АВТОРЫ:</p>
        <div class="tags">
            <p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p><p>sdf<p>
        </div>
    </div> -->
	
    <div class="sort">
		<form method="post" style="width: 30%; height: 117%; display: flex; margin: 0px 0px 0px 0px;" action="search.php">
			<input class="searchstyle" type="text" name="vvod" placeholder="ПОИСК АВТОРА" autocomplete="off">
			<input class="inputstyle" type="submit" name="poisk" value="ПОИСК" autocomplete="off">
		</form>
		<? if ($_GET['search'] != '') { ?>
		<div id="alphavit" class="sort3">
			<a href="?search=a...ya-asc">
				А...Я
			</a>
		</div>
        <div id="date" class="sort3">
		    <a href="?search=date-asc">
            ПО ДАТЕ
			</a>
        </div>
        <div id="rating" onclick="ratingtbut()" class="sort3">
			<a href="?search=rating-asc">
            ПО РЕЙТИНГУ
			</a>
        </div>
        <div id="images" onclick="imgbut()" class="sort3">
            КАРТИНКИ
        </div>
        <div id="cartoon" onclick="crttbut()" class="sort3">
            КОМИКСЫ
		</div>
		<? } else { ?>
		<div id="alphavit" class="sort3">
		<a href="?sort=a...ya-asc">
			А...Я
		</a>
		</div>
		<div id="date" class="sort3">
			<a href="?sort=date-asc">
			ПО ДАТЕ
			</a>
		</div>
		<div id="rating" onclick="ratingtbut()" class="sort3">
			<a href="?sort=rating-asc">
			ПО РЕЙТИНГУ
			</a>
		</div>
		<div id="images" onclick="imgbut()" class="sort3">
			КАРТИНКИ
		</div>
		<div id="cartoon" onclick="crttbut()" class="sort3">
			КОМИКСЫ
		</div>
		<? } ?>
    </div>
    </div>
	
	<div class="gallery">
		<div class="pictures1">
			<div class="picture" id="1"> </div>
		</div>
		<div class="pictures2">
			<div class="picture" id="2"></div>
		</div>
		<div class="pictures3">
			<div class="picture" id="3"></div>
		</div>
	</div>
	
	<script>
		first=document.getElementById("1");
		second=document.getElementById("2");
		third=document.getElementById("3");
		firstfirst=document.getElementById("11");
		secondsecond=document.getElementById("22");
		thirdthird=document.getElementById("33");
	</script>	
	<?php if($images != NULL) { ?>
	<?php foreach($images as $image): ?>
		<?php $file = 'images/pictures/'.$image['autor'].'/'.$image['name_image'];
		$size = getimagesize($file);

		if ($height1==0){ ?>
			<script>
			first.innerHTML += '<div class="imgANDinfo"><img data-src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" /><div class="infoblock"><div class="infoverh"><div class="like"><img data-src="images/like.png" height="40px" width="40px"></div><div class="izbrannoe"><img data-src="images/izbrannoe.png" height="40px" width="40px"></div></div><div class="rasstoyanieVER"></div><div class="infoniz"><div class="info"><div class="skritie"><img data-src="images/skritie.png" height="40px" width="40px"></div><?print_r($image['autor'])?></div></div></div></div>';

			</script>
			<?php $height1=$height1+(int)($size['1']);}
					
		else if ($height2==0){ ?>
			<script>
			second.innerHTML += '<div class="imgANDinfo"><img data-src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" /><div class="infoblock"><div class="infoverh"><div class="like"><img data-src="images/like.png" height="40px" width="40px"></div><div class="izbrannoe"><img data-src="images/izbrannoe.png" height="40px" width="40px"></div></div><div class="rasstoyanieVER"></div><div class="infoniz"><div class="info"><div class="skritie"><img data-src="images/skritie.png" height="40px" width="40px"></div><?print_r($image['autor'])?></div></div></div></div>';
			</script>
			<?php $height2=$height2+(int)($size['1']);}
						
		else if ($height3==0){ ?>
			<script>
			third.innerHTML += '<div class="imgANDinfo"><img data-src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" /><div class="infoblock"><div class="infoverh"><div class="like"><img data-src="images/like.png" height="40px" width="40px"></div><div class="izbrannoe"><img data-src="images/izbrannoe.png" height="40px" width="40px"></div></div><div class="rasstoyanieVER"></div><div class="infoniz"><div class="info"><div class="skritie"><img data-src="images/skritie.png" height="40px" width="40px"></div><?print_r($image['autor'])?></div></div></div></div>';
			</script>
			<?php $height3=$height3+(int)($size['1']);}
	
		else if ($height1<=$height2 && $height1<=$height3){ ?>
			<script>
			first.innerHTML += '<div class="imgANDinfo"><img data-src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" /><div class="infoblock"><div class="infoverh"><div class="like"><img data-src="images/like.png" height="40px" width="40px"></div><div class="izbrannoe"><img data-src="images/izbrannoe.png" height="40px" width="40px"></div></div><div class="rasstoyanieVER"></div><div class="infoniz"><div class="info"><div class="skritie"><img data-src="images/skritie.png" height="40px" width="40px"></div><?print_r($image['autor'])?></div></div></div></div>';

			</script>
			<?php $height1=$height1+(int)($size['1']);}
					
		else if ($height2<=$height1 && $height2<=$height3){ ?>
			<script>
			second.innerHTML += '<div class="imgANDinfo"><img data-src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" /><div class="infoblock"><div class="infoverh"><div class="like"><img data-src="images/like.png" height="40px" width="40px"></div><div class="izbrannoe"><img data-src="images/izbrannoe.png" height="40px" width="40px"></div></div><div class="rasstoyanieVER"></div><div class="infoniz"><div class="info"><div class="skritie"><img data-src="images/skritie.png" height="40px" width="40px"></div><?print_r($image['autor'])?></div></div></div></div>';
			</script>
			<?php $height2=$height2+(int)($size['1']);}
					
		else if ($height3<=$height1 && $height3<=$height2){ ?>
			<script>
			third.innerHTML += '<div class="imgANDinfo"><img data-src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" /><div class="infoblock"><div class="infoverh"><div class="like"><img data-src="images/like.png" height="40px" width="40px"></div><div class="izbrannoe"><img data-src="images/izbrannoe.png" height="40px" width="40px"></div></div><div class="rasstoyanieVER"></div><div class="infoniz"><div class="info"><div class="skritie"><img data-src="images/skritie.png" height="40px" width="40px"></div><?print_r($image['autor'])?></div></div></div></div>';
			</script>
			<?php $height3=$height3+(int)($size['1']);} ?>
					
	<?php endforeach; ?>
	<?php } else {  ?>
	<div class="N666">НЕ НАЙДЕНО</div>
	<? } ?>
	<?php #print_r($height1) ?>
	<?php #print_r($height2) ?>
	<?php #print_r($height3) ?>
	<!--<img src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" width="100%" height="auto"> </img>-->
	<!-- <a data-lightbox="roadtrip" href="<?=$dir.$image?>">-->
    <div class="UP" id="UPPER">^</div>
    <script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script><!-- Если JQuery не работает -->
    <script src="js/scroll.js" type="text/javascript"></script>
	<script src="../js/reg.js" type="text/javascript"></script>
	<script src="js/lightbox.js"></script>
	<script src="js/lightbox-plus-jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/search.js"></script>
	<script src="js/jquery.js"></script>
	
	<script src="js/lazyload/jquery.lazyloadxt.js"></script>
	<script src="js/lazyload/jqlight.lazyloadxt.js"></script>
	<script src="js/autoScroller.js"></script>

	
    <!-- <script src="../Style/Galery.js" type="text/javascript"></script>-->   
</body>
</html>