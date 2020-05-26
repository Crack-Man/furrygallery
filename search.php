<?php
    session_start();
    if ($_POST['vvod'] != '') {
        $vvvod = " WHERE autor LIKE '".($_POST['vvod'])."'";
        $_SESSION['vvod'] = $vvvod;
        echo '<script>document.location.href = "GALLERY.php?search=true"; </script>';
    } else {
        echo '<script>document.location.href = "GALLERY.php"; </script>';
    }
    
?>