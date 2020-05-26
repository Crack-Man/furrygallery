<?php
    function entered() {
        if(isset($_COOKIE['login']) && isset($_COOKIE['password'])){
            include("db.php");
            $Login_session = $_COOKIE['login'];
            $sql_session = "SELECT * FROM users WHERE login = '$Login_session'";
            $result_session = mysqli_query($conn, $sql_session);
            if (mysqli_num_rows($result_session) == 1) {
                $row_session = $result_session->fetch_array(MYSQLI_ASSOC);
                unset($_SESSION['id']);
                $_SESSION['id'] = $row_session['id'];
                $id = $_SESSION['id'];
                return true; 	
            } else {
                SetCookie("login", "", time() - 360000, '/');
                SetCookie("password", "", time() - 360000, '/');
                unset($_SESSION['id']);
                return false;
            } 
        } else return false;
    }
?>