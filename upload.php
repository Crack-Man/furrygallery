<? session_start(); ?>

<html>
<head>
  <title>Результат загрузки файла</title>
</head>
<body>
<?php
   if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     echo ("Размер файла превышает три мегабайта");
     exit;
   }
   if(copy($_FILES["filename"]["tmp_name"],
     "c:/Users/ДНС/Desktop/OSPanel/domains/furrygallery/user_img/".$_FILES["filename"]["name"]))
   {
     echo("Файл успешно загружен <br>");
     echo("Характеристики файла: <br>");
     echo("Имя файла: ");
     $id = $_SESSION['id'];
     rename("c:/Users/ДНС/Desktop/OSPanel/domains/furrygallery/user_img/".$_FILES["filename"]["name"], "c:/Users/ДНС/Desktop/OSPanel/domains/furrygallery/user_img/".$id.".jpg");
     echo($_FILES["filename"]["name"]);
     echo("<br>Размер файла: ");
     echo($_FILES["filename"]["size"]);
     echo("<br>Каталог для загрузки: ");
     echo($_FILES["filename"]["tmp_name"]);
     echo("<br>Тип файла: ");
     echo($_FILES["filename"]["type"]);
     echo '<script>document.location.href = "PROFILE.php"; </script>';
   } else {
      echo("Ошибка загрузки файла");
   }

?>
 
</body>
</html>