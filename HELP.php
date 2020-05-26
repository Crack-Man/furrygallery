<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_Help.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
        include('NAVIGATION.php');
		include('db.php');
		include ('functionsHELP.php');
		$images = get_images_db();
		include("entered.php");
		if(!entered()) include("reg.php");
		if (entered()) {
	?>
		<a href='/GALLERY.php?log_out=true'>
			<div id="logout" class="logout">
				ВЫЙТИ
			</div>
		</a>
	<?php } ?>
	<div class=OsnovnoyBlock>
	<div class=NEOsnovnoyBlock>
	   В данном разделе можно ознакомится с политикой нашего сайта, его содержанием и функционалом. 
	</div>
	</div>
	<div class=OsnovnoyBlock>
	<div class=NEOsnovnoyBlock>
		На нашем сайте публикуются изображения и комиксы фурри тематики.</br>
		Зарегистрированные пользователи могут оценивать и добавлять в избранное контент присутствующий на нашем сайте.</br>
		Пользователи, являющиеся админами, могут добавлять и скрывать контент, присутствующий на нашем сайте.
	</div>
	</div>
	<div class=OsnovnoyBlock>
	<div class=NEOsnovnoyBlock>
		У каждого зарегистрированного пользователя есть свой профиль. В нём можно увидеть: </br>
		- Изображение профиля</br>
		- Ник</br>
		- Дату регистрации</br>
		- Статус на сайте</br>
		- Личные данные (ФИО, дату рождения)</br>
		- Избранные изображения</br>
		- Оценённые изображения</br>
		- Добавленные изображения (только для администраторов сайта)</br>
		- Скрытые изображения (только для администраторов сайта)
	</div>
	</div>
	<div class=sp1>
		<div class=sp2>
			<div class=sp3>
				<div class="tags">        
				<?php foreach($images as $image): ?>
				<p><?php print_r($image['autor']); ?><p>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class=sp2>
				На нашем сайте реализован поиск изображений по авторам.</br>
				Ниже приведён список авторов, изображения которых опубликованы на нашем сайте.</br>
				Если же при поиске присутсвующего в списке автора вы не увидели картинки, то это значит, что по каким-либо причинам картинки были скрыты.</br>
		</div>
	</div>
	<div class=OsnovnoyBlock>
	<div class=NEOsnovnoyBlock>
	При наведении мыши на каждое из изображений можно увидеть следующее:</br>
	- Кнопку оценивания</br>
	- Кнопку добавления в избранное</br>
	- Кнопку скрытия (только для администраторов сайта)</br>
	- Авторство
	</div>
	</div>
	<div class=OsnovnoyBlock>
	<div class=NEOsnovnoyBlock>
	При наведении мыши на каждый из комиксов можно увидеть следующее:</br>
	- Кнопку оценивания</br>
	- Кнопку добавления в избранное</br>
	- Кнопку скрытия (только для администраторов сайта)</br>
	- Авторство</br>
	- Название
	</div>
	</div>
	<div class=OsnovnoyBlock>
	<div class=NEOsnovnoyBlock>
	Если же вы являетесь автором изображения и не хотите чтобы изображения вашего авторства присутствовали на нашем сайте, то обратитесь по данным контактам.</br>
	Для подтверждения авторства вам необходимо привести доказательства того, что именно вы являетесь автором данных изображений.</br>
	Мы ответим на вашу заявку в минимальные сроки.
	</div>
	</div>
	<div class=OsnovnoyBlock>
	<div class=NEOsnovnoyBlock>
	Если же у вас есть предложения по улучшению нашего сайта, то вы можете обратится по данным контактам.</br>
	Мы рассмотрим вашу заявку и ответим вам если ваше предложение достойно и возможно для реализации.
	</div>
	</div>
	<script src="../js/reg.js" type="text/javascript"></script>
</body>

</html>