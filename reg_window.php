<?php
    session_start ();
	if(isset($_POST["Done_reg"])) {
        $Email = htmlspecialchars ($_POST["E-Mail"]);
        $Login = htmlspecialchars ($_POST["Login"]);
        $Password = htmlspecialchars ($_POST["Password"]);
        $Password1 = htmlspecialchars ($_POST["Password1"]);
        $Surname = htmlspecialchars ($_POST["Surname"]);
        $Name = htmlspecialchars ($_POST["Name"]);
		$Admin = "toxa-18.10@ya.ru";
						
		$Error_EMAIL = "";
		$Error_Login = "";
        $Error_Password = "";
        $Error_Surname = "";
        $Error_Name = "";
        $Error = false;	
        		
		if($Email == "" || !preg_match ("/@/", $_POST["E-Mail"])) {
			$Error_EMAIL = "Введите адрес.";
			$Error = True;
		}
						
		if($Login == "") {
			$Error_Login = "Введите логин.";
			$Error = True;
		}
        
        if($Password == "") {
			$Error_Password = "Введите пароль.";
			$Error = True;
        }
        
        if($Password != $Password1) {
			$Error_Password = "Пароли не совпадают.";
			$Error = True;
        }

        if($Surname == "") {
			$Error_Surname = "Введите Фамилию.";
			$Error = True;
        }
        
        if($Name == "") {
			$Error_Name = "Введите имя.";
			$Error = True;
		}
						
		if(!$Error) {
			$Theme = "=?utf=8?B?".base64_encode($Theme)."?=";
			$From = "From: $From_Name, $From_Email\r\nReply-to: $From_Name, $From_Email\r\nContent-type: text/plain; charset=utf-8\r\n";
			mail ($Admin, $Theme, $Body, $From);
			exit;
		}
	}
?>

<html>
<head>
    <meta charset="utf-8">
	<link href="css/reg.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="pop_main" class="pop_main">
        <div id="pop" class="pop">
            <form id="autorization" name="autorization" action="" method="post">
                <p>E-MAIL</p>
                <p><input type="email" name="E-Mail" placeholder="E-MAIL" value="" style="height: 17%">
                <p>ПАРОЛЬ</p>
                <p><input type="password" name="Password" placeholder="ПАРОЛЬ" value="" style="height: 17%">
                <p><input type="button" name="butreg" id = "butreg" value="РЕГИСТРАЦИЯ" style=" float: left; font-family: The Capt; width: 200; height: 50px; font-size: 17px; margin-right: 30px ">
                <input type="button" name="Done" value="ВХОД" style=" float: right; font-family: The Capt; width: 200; height: 50px; font-size: 17px; margin-right: 20px ">
            </form>
            <form id="registration" name="registration" action="" method="post" style="display: none;">
                <p>E-MAIL <p><label style='color: red; font-family: The Capt; font-size: 20px;'><?=$Error_EMAIL?></label></p>
                <p><input type="email" name="E-Mail" placeholder="E-MAIL" value="">
                <p>ЛОГИН <p><label style='color: red; font-family: The Capt; font-size: 20px;'><?=$Error_Login?></label></p>
                <p><input type="text" name="Login" placeholder="ЛОГИН" value="">
                <p>ПАРОЛЬ <p><label style='color: red; font-family: The Capt; font-size: 20px;'><?=$Error_Password?></label></p>
                <p><input type="password" name="Password" placeholder="ПАРОЛЬ" value="">
                <p>ПОВТОРИТЕ ПАРОЛЬ</p>
                <p><input type="password" name="Password1" placeholder="ПОВТОРИТЕ ПАРОЛЬ" value="">
                <p>ФАМИЛИЯ <p><label style='color: red; font-family: The Capt; font-size: 20px;'><?=$Error_Surname?></label></p>
                <p><input type="text" name="Surname" placeholder="ФАМИЛИЯ" value="">
                <p>ИМЯ <p><label style='color: red; font-family: The Capt; font-size: 20px;'><?=$Error_Name?></label></p>
                <p><input type="text" name="Name" placeholder="ИМЯ" value="">
                <p>ДАТА РОЖДЕНИЯ</p>
                <p><input type="date" name="Date" placeholder="ДАТА РОЖДЕНИЯ" value="">
                <p><input type="button" id="butauto" value="ВХОД" style=" float: left; font-family: The Capt; width: 200; height: 50px; font-size: 17px; margin-right: 30px ">
                <p><input type="submit" id = "sub_reg" name="Done_reg" value="РЕГИСТРАЦИЯ" style=" float: right; font-family: The Capt; width: 200; height: 50px; font-size: 17px; margin-right: 20px ">
            </form>
        </div>
    </div>
    <script src="../js/reg.js" type="text/javascript"></script>
</body>
</html>