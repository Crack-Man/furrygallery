<html>
<head>
    <meta charset="utf-8">
	<link href="css/reg.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>    
    <div id="pop_main" class="pop_main">
        <div id="pop" class="pop">
            <form id="autorization" name="autorization" action="autor_verification.php" method="post">
                <p class="p">E-MAIL</p>
                <p class="p"><input class="inputr" type="email" name="E-Mail" placeholder="E-MAIL" value="" style="height: 17%">
                <p class="p">ПАРОЛЬ</p>
                <p class="p"><input class="inputr" type="password" name="Password" placeholder="ПАРОЛЬ" value="" style="height: 17%">
                <p class="p"><input class="inputr" type="button" name="butreg" id = "butreg" value="РЕГИСТРАЦИЯ" style=" float: left; font-family: The Capt; width: 200; height: 50px; font-size: 17px; margin-right: 30px ">
                <input class="inputr" type="submit" name="Done" value="ВХОД" style=" float: right; font-family: The Capt; width: 200; height: 50px; font-size: 17px; margin-right: 20px ">
            </form>
            <form id="registration" name="registration" action="reg_verification.php" method="post" style="display: none;">
                <p class="p">E-MAIL</p>
                <p class="p"><input class="inputr" type="email" name="E-Mail" placeholder="E-MAIL" value="">
                <p class="p">ЛОГИН</p>
                <p class="p"><input class="inputr" type="text" name="Login" placeholder="ЛОГИН" value="">
                <p class="p">ПАРОЛЬ</p>
                <p class="p"><input class="inputr" type="password" name="Password" placeholder="ПАРОЛЬ" value="">
                <p class="p">ПОВТОРИТЕ ПАРОЛЬ</p>
                <p class="p"><input class="inputr" type="password" name="Password1" placeholder="ПОВТОРИТЕ ПАРОЛЬ" value="">
                <p class="p">ФАМИЛИЯ</p>
                <p class="p"><input class="inputr" type="text" name="Surname" placeholder="ФАМИЛИЯ" value="">
                <p class="p">ИМЯ</p>
                <p class="p"><input class="inputr" type="text" name="Name" placeholder="ИМЯ" value="">
                <p class="p">ДАТА РОЖДЕНИЯ</p>
                <p class="p"><input class="inputr" type="date" name="Date" placeholder="ДАТА РОЖДЕНИЯ" value="">
                <p class="p"><input class="inputr" type="button" id="butauto" value="ВХОД" style=" float: left; font-family: The Capt; width: 200; height: 50px; font-size: 17px; margin-right: 30px ">
                <p class="p"><input class="inputr" type="submit" id = "sub_reg" name="Done_reg" value="РЕГИСТРАЦИЯ" style=" float: right; font-family: The Capt; width: 200; height: 50px; font-size: 17px; margin-right: 20px ">
            </form>
        </div>
    </div>
</body>
</html>