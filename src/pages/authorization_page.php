<?php
    session_start();
    require_once "../php/sql_connection.php";
    require_once "../php/general_page.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Авторизация</title>
</head>
<body>
    <?php
        $drawException = false;
        $drawSuccess = false;
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $connection = new SQLConnection();
            $result = $connection->authorize($_POST['username'], $_POST['password']);
            if (!$result) $drawException = true;
            else {
                $drawSuccess = true;
                $_SESSION['current_user'] = [
                    'user_id' => $result[0]['id'],
                    'user_name' => $result[0]['login'],
                    'is_root' => ($result[0]['isRoot'] == "0") ? false : true
                ];
            }
        } else if (isset($_POST['go_logout'])) {
            // var_dump($_POST['go_logout']);
            $_SESSION['current_user'] = null;
            session_destroy();
        }

        echo getHeader();
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="authorization_page.php">Авторизация</a>
           </div>
        </main>
    </div>

    <div class="container" style="margin-bottom: 50px;">
        <div class="personal-data-law-box">
            <?php
                if ($drawException) echo '<h2 class="red_alert">Пользователь не найден</h2>';
                if ($drawSuccess) {
                    $username = $_POST['username'];
                    echo '<h2 class="green_alert">Авторизация прошла успешно!</h2>';
                    echo "<h1 class='h1' style='text-align: center; margin-top: 0px;'>Добро пожаловать, $username!</h1>";
                    echo get_log_out_button();
                } else if (!isset($_SESSION['current_user']) || $_SESSION['current_user'] == null) {
                    $AUTH_FORM = <<< AUTH_FORM
                    <h1 class="h1" style="text-align: center; margin-top: 0px;">Авторизация</h1>
                    <form action="authorization_page.php" class="authorization-form" method="post">
                        <input class="auth_form_input" type="text" name="username" minlength="1" id="username" placeholder="Логин" required>
                        <input class="auth_form_input" type="text" name="password" minlength="1" id="password" placeholder="Пароль" required>
                        <button class="auth_form_button" type="submit">Вход в аккаунт</button>
                    </form>
AUTH_FORM;
                    echo $AUTH_FORM;
                } else {
                    $user_name = $_SESSION['current_user']['user_name'];
                    echo "<h1 class='h1' style='text-align: center; margin-top: 0px;'>Вы авторизированы как $user_name!</h1>";
                    echo get_log_out_button();
                }
            ?>
        </div>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>