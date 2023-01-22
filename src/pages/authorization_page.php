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
        require_once "../php/general_page.php";
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

    <?php
        require_once "../php/sql_connection.php";

        $drawException = false;
        $drawSuccess = false;
        if (isset($_GET['username']) && isset($_GET['password'])) {
            $connection = new SQLConnection();
            $result = $connection->authorize($_GET['username'], $_GET['password']);
            if (!$result) $drawException = true;
            else $drawSuccess = true;
        }
    ?>

    <div class="container">
        <div class="personal-data-law-box">
            <?php
                if ($drawException) echo '<h2 class="red_alert">Пользователь не найден</h2>';
                // if ($drawSuccess) {

                // }
            ?>

            
            
            <h1 class="h1" style="text-align: center; margin-top: 0px;">Авторизация</h1>
            <form class="authorization-form" method="get">
                <input class="auth_form_input" type="text" name="username" maxlength="15" minlength="1" pattern="^[a-zA-Z0-9_.-]*$" id="username" placeholder="Логин" required>
                <input class="auth_form_input" type="text" name="password" maxlength="15" minlength="1" pattern="^[a-zA-Z0-9_.-]*$" id="password" placeholder="Пароль" required>
                <button class="auth_form_button" type="submit">Вход в аккаунт</button>
            </form>
        </div>
    </div>

    <?php
        require_once "../php/general_page.php";
        echo getFooter();
    ?>
</body>
</html>