<?php
    session_start ();
    include("db.php");
	if(isset($_POST["Done"])) {
        $Email = htmlspecialchars ($_POST["E-Mail"]);
        $Password = htmlspecialchars ($_POST["Password"]);
						
		$Error_EMAIL = "";
        $Error_Password = "";
        $Error = false;	
        		
		if($Email == "" || !preg_match ("/@/", $_POST["E-Mail"])) {
			$Error_EMAIL = "Введите адрес.";
			$Error = True;
		}
						
		
        if($Password == "") {
			$Error_Password = "Введите пароль.";
			$Error = True;
        }
        
        
						
		if(!$Error) {
			$sql_email = "SELECT * FROM users WHERE email = '$Email'";
            $result_email = mysqli_query($conn, $sql_email);
            if (mysqli_num_rows($result_email) == 1){ //если нашлась одна строка, значит такой юзер существует в БД 		
                $roww = mysqli_fetch_assoc($result_email);
                if (password_verify($Password, $roww['password'])){ //сравниваем хэшированный пароль из БД с паролем, введённым пользователем
                    setcookie ("login", $roww['login'], time() + 50000);					
                    setcookie ("password", $roww['password'], time() + 50000); 					
                    $_SESSION['id'] = $roww['id'];	//записываем в сессию id пользователя 				
                    $id = $_SESSION['id'];
                    header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
                }
                else { //если пароли не совпали 							
                    $Error_Password = "Неверный E-Mail и/или пароль"; 										
                    $Error = True;		
                } 						

            }
            else { //если почта не найдена							
                $Error_Password = "Неверный E-Mail и/или пароль"; 										
                $Error = True;		
            } 	
		}
	}
?>

<html>
<head>
    <meta charset="utf-8">
	<link href="css/autor_ver.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="pop_main" class="pop_main">
        <div class="pop_autor">
            <form id="autorization" name="autorization" action="" method="post">
                <p>E-MAIL</p>
                <p><input type="email" name="E-Mail" placeholder="E-MAIL" value="" style="height: 17%">
                <p>ПАРОЛЬ</p>
                <p><input type="password" name="Password" placeholder="ПАРОЛЬ" value="" style="height: 17%">
                <p><input type="button" name="butreg" id = "butreg" value="РЕГИСТРАЦИЯ" style=" float: left; font-family: The Capt; width: 200; height: 50px; font-size: 17px; margin-right: 30px ">
                <input type="button" name="Done" value="ВХОД" style=" float: right; font-family: The Capt; width: 200; height: 50px; font-size: 17px; margin-right: 20px ">
            </form>
        </div>
    </div>
</body>
</html>