<?php
    // выкидывает с админских панелей обычных пользователей
    $isRoot = false;
    $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
    if ($isAuth) {
        $user = $_SESSION['current_user'];
        $isRoot = $user['is_root'];
    }

    if (!$isRoot) {
        header('Location: http://localhost/pages/catalog.php');
    }
?>  