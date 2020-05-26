<?
	session_start();
	include("db.php");
	if($_GET['redit'] == 'true') {
        echo
			"<script>
				let i = 1;
			</script>";
	}

	if(isset($_POST["redit"])) {
		$name = htmlspecialchars ($_POST["name"]);
		$surname = htmlspecialchars ($_POST["surname"]);
		$date = htmlspecialchars ($_POST["date"]);

		$error_name = '';
		$error_surname = '';
		$error_date = '';
		$errors = false;

		if ($name == '') {
			$error_name = 'Введите имя!';
			$errors = true;
		}

		if ($surname == '') {
			$error_surname = 'Введите фамилию!';
			$errors = true;
		}

		if (time() - strtotime($date) < 568114000) {
			$error_date = 'Вам должно быть 18 лет!';
			$errors = true;
		}

		if (!$errors) {
			$id = $_SESSION['id'];
			$sql_rename = "UPDATE users SET name = '$name' WHERE `id` = '$id'";
			$result_rename = mysqli_query($conn, $sql_rename);
			$sql_rename = "UPDATE users SET surname = '$surname' WHERE `id` = '$id'";
			$result_rename = mysqli_query($conn, $sql_rename);
			$sql_rename = "UPDATE users SET date_birth = '$date' WHERE `id` = '$id'";
			$result_rename = mysqli_query($conn, $sql_rename);
			echo
				"<script>
					i = 0;
				</script>";
			echo '<script>document.location.href = "PROFILE.php"; </script>';
		}
		
	}
	
	if ($_GET['delete'] == 'true') {
		$id = $_SESSION['id'];
		$file = "user_img/".$id.".jpg";
		unlink($file);
		echo '<script>document.location.href = "PROFILE.php"; </script>';
	}

?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_Navigation.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/style_Profile.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
 	<?php
		
        include ('NAVIGATION.php');
		include("entered.php");
		if(!entered()) include("reg.php");
		if (entered()) {
	?>
			<a href='/GALLERY.php?log_out=true'>
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
			$sorting='rating ASC';
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
	<?
		if (entered()) {
			$id = $_SESSION['id'];
			$sql_data = "SELECT * FROM users WHERE id = '$id'";
			$result_data = mysqli_query($conn, $sql_data);
			$row_data = mysqli_fetch_assoc($result_data);
		}
			
	?>
	<div class="ava_and_menu" id="srch">
		<div id="f" class="ava">
			<?
				$filename = "user_img/".$id.".jpg";
				if (file_exists($filename)) { ?>
					<a href="?delete=true" style="position: absolute; right: 0.01%; top: 2.5%; margin-right: 5%; font-size: 20px;">&#10008;</a>
					<script>
						let f = document.getElementById('f');
						f.innerHTML += '<img src="<?='user_img/'.$id.'.jpg'?>" alt="Моя фотография" width=100% style="object-fit: cover; margin: 4.5%; width: 90%; height: 80%;" />';
					</script>
			<?  } else { ?>
					<h2><p style="font-size: 30px; text-align: center; font-family: The Capt;"><b> Загрузите фото профиля: </b></p></h2>
					<form action="upload.php" style="display: block; width: 100%; height: 70%;" method="post" enctype="multipart/form-data">
						<p><input type="file" style="margin: 20% 5% 0% 5%; width: 800px; height: 15%;" name="filename"></p>
						<p><input type="submit" style="margin: 0% 25% 0% 25%; width: 50%; height: 15%;" value="Загрузить"></p>
					</form>
			<?  } ?>
			
			<p style="font-size: 25px; text-align: center;"><? echo  "Дата регистрации: ".date('d/m/Y', $row_data['date_reg']); ?></p>
		</div>
		<div class="menu">
			<div class="podmenu">
				<a>ИЗБРАННОЕ</a>
			</div>
			<div class="podmenu">
				<a>ОЦЕНЁННОЕ</a>
			</div>
			<div class="podmenu">
				<a>ДОБАВЛЕННОЕ</a>
			</div>
			<div class="podmenu">
				<a>СКРЫТОЕ</a>
			</div>
		</div>
	</div>
	<div class="dannie_sort_gallery">
		<div id="main_data" class="dannie">
			<div id='dannie' class="data_user">
				
			<a><p style="font-size: 50px; padding: 0px 0 0 10;">ЛИЧНЫЕ ДАННЫЕ <a href="?redit=true" style="font-size: 15px; letter-spacing: 2.5px;">ИЗМЕНИТЬ</a> </p></a>

			<a><p style="padding: 10px 0 0 10;">ИМЯ:</p></a>
			<a><p style="padding: 0px 0 0 10;"> <? echo $row_data['name']; ?> </p></a>
					
			<a><p style="padding: 10px 0 0 10;">ФАМИЛИЯ:</p>
			<a><p style="padding: 0px 0 0 10;"> <? echo $row_data['surname']; ?> </p></a>
					
			<a><p style="padding: 10px 0 0 10;">ДАТА РОЖДЕНИЯ:</p></a>
			<? $dr = ($row_data['date_birth'])." 00:00:00"; ?>
			<a><p style="padding: 0px 0 0 10;"><? echo DATE_FORMAT(new DateTime($dr), 'd-m-Y'); ?></p></a>
				
			</div>
			
			<form class="redit" id="redit" method="POST">
				<p style="font-size: 50px; padding: 0px 0 0 10;">ЛИЧНЫЕ ДАННЫЕ </p>

				<p style="padding: 10px 0 0 10;">ИМЯ:</p>
				<p style="padding: 0px 0 0 10;"><input class="ren" type="text" name="name" value="<? echo $row_data['name']; ?>" placeholder="ВВЕДИТЕ ИМЯ" autocomplete="off"><label class='lbl'><? echo $error_name; ?></label></p>
				

				<p style="padding: 10px 0 0 10;">ФАМИЛИЯ:</p>
				<p style="padding: 0px 0 0 10;"><input class="ren" type="text" name="surname" value="<? echo $row_data['surname']; ?>" placeholder="ВВЕДИТЕ ФАМИЛИЮ" autocomplete="off"><label class='lbl'><? echo $error_surname; ?></label></p>
				

				<p style="padding: 10px 0 0 10;">ДАТА РОЖДЕНИЯ:</p> 
				<p style="padding: 0px 0 0 10;"><input class="ren" type="date" name="date" value="<? echo $row_data['date_birth']; ?>" placeholder="ВВЕДИТЕ ДАТУ РОЖДЕНИЯ" autocomplete="off"><label class='lbl'><? echo $error_date; ?></label></p>
				

				<input class="inputredit" type="submit" name="redit" value="ИЗМЕНИТЬ" autocomplete="off">
			</form>

		</div>
		<div class="sort">
			<form action="functions.php" style="display: flex; width: 30%; height: 117%; margin: 0px 0px 0px 0px;">
				<input class="searchstyle" type="text" name="text" placeholder="ПОИСК АВТОРА" autocomplete="off">
				<input class="inputstyle" type="submit" name="enter" value="ПОИСК" autocomplete="off">
			</form>
			<div id="alphavit" class="sort3">
				<a href="GALLERY.php?sort=a...ya-asc">
					А...Я
				</a>
			</div>
			<div id="date" class="sort3">
				<a href="GALLERY.php?sort=date-asc">
				ПО ДАТЕ
				</a>
			</div>
			<div id="rating" onclick="ratingtbut()" class="sort3">
				<a href="GALLERY.php?sort=rating-asc">
				ПО РЕЙТИНГУ
				</a>
			</div>
			<div id="images" onclick="imgbut()" class="sort3">
				<a>КАРТИНКИ</a>
			</div>
			<div id="cartoon" onclick="crttbut()" class="sort3">
				<a>КОМИКСЫ</a>
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
				</script>		
			<?php foreach($images as $image): ?>
				
				<?php $file = 'images/pictures/'.$image['autor'].'/'.$image['name_image'];
				$size = getimagesize($file);

				if ($height1==0){ ?>
					<script>
					first.innerHTML += '<a data-lightbox="roadtrip" href="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>"><img src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" width="100%" height="auto"> </img></a>';
					</script>
					<?php $height1=$height1+(int)($size['1']);}
					
				else if ($height2==0){ ?>
					<script>
					second.innerHTML += '<a data-lightbox="roadtrip" href="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>"><img src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" width="100%" height="auto"> </img></a>';
					</script>
					<?php $height2=$height2+(int)($size['1']);}
						
				else if ($height3==0){ ?>
					<script>
					third.innerHTML += '<a data-lightbox="roadtrip" href="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>"><img src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" width="100%" height="auto"> </img></a>';
					</script>
					<?php $height3=$height3+(int)($size['1']);}
	
				else if ($height1<=$height2 && $height1<=$height3){ ?>
					<script>
					first.innerHTML += '<a data-lightbox="roadtrip" href="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>"><img src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" width="100%" height="auto"> </img></a>';
					</script>
					<?php $height1=$height1+(int)($size['1']);}
					
				else if ($height2<=$height1 && $height2<=$height3){ ?>
					<script>
					second.innerHTML += '<a data-lightbox="roadtrip" href="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>"><img src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" width="100%" height="auto"> </img></a>';
					</script>
					<?php $height2=$height2+(int)($size['1']);}
					
				else if ($height3<=$height1 && $height3<=$height2){ ?>
					<script>
					third.innerHTML += '<a data-lightbox="roadtrip" href="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>"><img src="<?='images/pictures/'.$image['autor'].'/'.$image['name_image']?>" width="100%" height="auto"> </img></a>';
					</script>
					<?php $height3=$height3+(int)($size['1']);} ?>
					
			<?php endforeach; ?>
			<?php #print_r($height1) ?>
			<?php #print_r($height2) ?>
			<?php #print_r($height3) ?>
	</div>
	 <div id="UPPER" class="UP">^</div>
	<script>
		main_data = dannie = document.getElementById('main_data');
		dannie = document.getElementById('dannie');
		redit = document.getElementById('redit');
		if(i == 1) {
			redit.style.display = 'block';
			dannie.style.display = 'none';
			main_data.style.height = '57%';
		} else {
			redit.style.display = 'none';
			dannie.style.display = 'block';
			main_data.style.height = '35%';
		}
	</script>
	<script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script><!-- Если JQuery не работает -->
	<script src="../js/reg.js" type="text/javascript"></script>
    <script src="js/scroll.js" type="text/javascript"></script>
    <!-- <script src="../Style/Galery.js" type="text/javascript"></script>-->
</body>
</html>