<?php
    session_start ();
    include("db.php");
	if(isset($_POST["Done_reg"])) {
        $Email = htmlspecialchars ($_POST["E-Mail"]);
        $Login = htmlspecialchars ($_POST["Login"]);
        $Password = htmlspecialchars ($_POST["Password"]);
        $Password1 = htmlspecialchars ($_POST["Password1"]);
        $Surname = htmlspecialchars ($_POST["Surname"]);
        $Name = htmlspecialchars ($_POST["Name"]);
        $Date = htmlspecialchars ($_POST["Date"]);
        $Admin = "toxa-18.10@ya.ru";
						
		$Error_EMAIL = "";
		$Error_Login = "";
        $Error_Password = "";
        $Error_Password1 = "";
        $Error_Surname = "";
        $Error_Name = "";
        $Mes = "";
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
			$Error_Password1 = "Пароли не совпадают.";
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

        if($Date == 0) {
			$Error_Date = "Введите дату.";
			$Error = True;
        }
        
        if(time() - strtotime($Date) < 568114000) {
			$Error_Date = "Вам должно быть 18 лет!";
			$Error = True;
		}
        
        $sql_login = "SELECT * FROM users WHERE name = '$Login'";
        $result_login = mysqli_query($conn, $sql_login);
        $row_login = $result_login->fetch_array(MYSQLI_ASSOC);
        $test_login = $row_login['id'];
        if($test_login != NULL) {
            $Error_Login = "Такой логин уже существует.";
			$Error = True;
        }
        
        $sql_email = "SELECT * FROM users WHERE name = '$Email'";
        $result_email = mysqli_query($conn, $sql_email);
        $row_email = $result_email->fetch_array(MYSQLI_ASSOC);
        $test_email = $row_email['id'];
        if($test_email != NULL) {
            $Error_email = "Такой E-Mail уже существует.";
			$Error = True;
        }

		if(!$Error) {
            $base_url = "furry/";
            $options = [
                'cost' => 5,
            ];
            $Password_Hash = password_hash($Password, PASSWORD_BCRYPT, $options);
            $activation = md5($Email);
            $Time = time();
            $sql = "INSERT INTO `users` VALUES (
                id,
                '$Email',
                '$Login',
                '$Password_Hash',
                '$Date',
                '$Surname',
                '$Name',
                '$Time',
                '$activation',
                status,
                admin
                )";
            $result = mysqli_query($conn, $sql) or die("Ошибка ".mysqli_error($conn));
            $Theme = "Активация аккаунта FURRYGALLERY";
            $Body= "Здравствуйте! \n \n Мы должны убедиться в том, что вы человек. Пожалуйста, подтвердите адрес вашей электронной почты, и можете начать использовать ваш аккаунт на сайте. <br/> <br/> <a href=\"".$base_url."activation.php?hash=".$activation."\">".$base_url."activation.php?hash=".$activation."</a>";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= "Content-type: text/html; charset=utf-8 \r\n";
            mail ($Email, $Theme, $Body, $headers);
            $Mes = "Регистрация выполнена успешно, пожалуйста, проверьте электронную почту.";
            
		}
	}
?>

<!-- 'admin) or (=' -->
<!-- admin' or "=' -->
<!-- pattern для защиты -->
<html>
<head>
    <meta charset="utf-8">
	<link href="css/reg_ver.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="pop_main" class="pop_main">
        <div class="pop_reg">
            <form id="registration" name="registration" action="" method="post">
                <div class="pop">
                    <p>E-MAIL</p>
                    <p><label style='color: red; font-family: The Capt; font-size: 20px;'><?=$Error_EMAIL?></label></p>
                    <p><input type="email" name="E-Mail" placeholder="E-MAIL" value="<?=$Email?>"></p>
                    <p>ЛОГИН</p>
                    <p><label style='color: red; font-family: The Capt; font-size: 20px;'><?=$Error_Login?></label></p>
                    <p><input type="text" name="Login" placeholder="ЛОГИН" value="<?=$Login?>"></p>
                    <p>ПАРОЛЬ</p>
                    <p><label style='color: red; font-family: The Capt; font-size: 20px;'><?=$Error_Password?></label></p>
                    <p><input type="password" name="Password" placeholder="ПАРОЛЬ" value="<?=$Password?>"></p>
                    <p>ПОВТОРИТЕ ПАРОЛЬ</p>
                    <p><label style='color: red; font-family: The Capt; font-size: 20px;'><?=$Error_Password1?></label></p>
                    <p><input type="password" name="Password1" placeholder="ПОВТОРИТЕ ПАРОЛЬ" value="<?=$Password1?>"></p>
                </div>
                <div class="pop">
                    <p>ФАМИЛИЯ</p>
                    <p><label style='color: red; font-family: The Capt; font-size: 20px;'><?=$Error_Surname?></label></p>
                    <p><input type="text" name="Surname" placeholder="ФАМИЛИЯ" style="float: right;" value="<?=$Surname?>"></p>
                    <p>ИМЯ</p>
                    <p><label style='color: red; font-family: The Capt; font-size: 20px;'><?=$Error_Name?></label></p>
                    <p><input type="text" name="Name" placeholder="ИМЯ" style="float: right;" value="<?=$Name?>"></p>
                    <p>ДАТА РОЖДЕНИЯ</p>
                    <p><label style='color: red; font-family: The Capt; font-size: 20px;'><?=$Error_Date?></label></p>
                    <p><input type="date" name="Date" placeholder="ДАТА РОЖДЕНИЯ" style="float: right;" value="<?=$Date?>"></p>
                </div>
                <p><input type="button" id="butauto" value="ВХОД" style="position: absolute; bottom: 10px; left: 10px; font-family: The Capt; width: 200; height: 50px; font-size: 17px; margin-right: 30px ">
                <p><input type="submit" id = "sub_reg" name="Done_reg" value="РЕГИСТРАЦИЯ" style="position: absolute; bottom: 10px; right: 10px; font-family: The Capt; width: 200; height: 50px; font-size: 17px; margin-right: 20px ">
                <p><label style='font-family: The Capt; font-size: 20px;'><?=$Mes?></label></p>
            </form>
        </div>
    </div>
</body>
</html>