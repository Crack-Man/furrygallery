<?php
    include 'db.php';
    // Проверка есть ли хеш
    if ($_GET['hash']) {
        $hash = $_GET['hash'];
        // Получаем id и подтверждено ли Email
        if ($result = mysqli_query($conn, "SELECT `activation`, `status`, `email` FROM `users` WHERE `activation`='" . $hash . "'")) {
            while( $row = mysqli_fetch_assoc($result) ) { 
                if ($row['status'] == 0) {
                    $upd = "UPDATE users SET status = '1' WHERE activation='" . $row['activation'] . "'";
                    mysqli_query($conn, $upd);
                    if (mysqli_query($conn, $upd))
                    {
                        echo "Email подтверждён";
                    }
                    else
                    {
                        print_r(mysqli_error($conn));
                    }
                } else {
                    echo "Что то пошло не так";
                }
            } 
        } else {
            echo "Что то пошло не так";
        }
    } else {
        echo "Что то пошло не так";
    }
    mysqli_close($conn);
?>