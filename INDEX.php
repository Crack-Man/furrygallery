<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_Main.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>

<body>
    <?php
        include("entered.php");
        if(!entered()) {include("reg.php");} else {
    ?>
    <a href='/GALLERY.php?log_out=true'>
        <div id="logout" class="logout">
            ВЫЙТИ
        </div>
    </a>
    <? } ?>
    <div class="Main">
        <a href="PROFILE.php">
            <div class="F1">
                ПРОФИЛЬ
            </div>
        </a>
        <a href="GALLERY.php">
            <div class="F1">
                ГАЛЕРЕЯ
            </div>
        </a>
        <div class="F2">
            FURRY GALLERY
        </div>
        <a href="HELP.php">
            <div class="F1">
                ПОМОЩЬ
            </div>
        </a>
        <a href="CONTACTS.php">
            <div class="F1">
                КОНТАКТЫ
            </div>
        </a>
    </div>

    <script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script><!-- Если JQuery не работает -->
    <script src="../js/reg.js" type="text/javascript"></script>
    <script src="functions_Main.js"></script>
</body>

</html>