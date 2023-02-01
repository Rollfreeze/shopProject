<?php
    session_start();
    require_once "../php/general_page.php";
    require_once "../php/sql_connection.php";
    require_once "../php/country_helper.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Менеджер стран</title>
</head>
<body>
    <?php
        echo getHeader();

        if (isset($_POST['add_country'])) {
            $connection = new SQLConnection();
            $result = $connection->add_country(
                $_POST['country_name'],
            );
        } else if (isset($_POST['change_country_name'])) {
            $connection = new SQLConnection();
            $result = $connection->update_country(
                $_POST['id_country'],
                $_POST['country_new_name'],
            );
        } else if ($_GET) {
            $connection = new SQLConnection();
            $result = $connection->delete_country(
                $_GET['delete_id'],
            );
        }
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="control_countries.php">Менеджер стран-партнеров</a>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <?php
                if ($_POST['add_country'] && $result) echo '<h2 class="green_alert">Новая страна-партнер успешно добавлена!</h2>';
                else if ($_POST['add_country'] && !$result) echo '<h2 class="red_alert">Ой, что-то пошло не так... Попробуйте еще раз</h2>';
                else if ($_POST['change_country_name'] && $result) echo '<h2 class="green_alert">Страна-партнер успешно обновлена!</h2>';
                else if ($_POST['change_country_name'] && !$result) echo '<h2 class="red_alert">Ой, что-то пошло не так... Попробуйте еще раз</h2>';
                else if ($_GET && $result) echo '<h2 class="green_alert">Страна-партнер успешно удалена!</h2>';
                else if ($_GET && !$result) echo '<h2 class="red_alert">Ой, что-то пошло не так... Попробуйте еще раз</h2>';
            ?>

            <h1 class="h1" style="text-align: center; margin-top: 0px;">Добавить или удалить страну-партнера</h1>
            
            <div class="flex-row categories-forms-box">
                <form class="categories-control-form" method="post">
                    <input type="hidden" name="change_country_name" id="change_country_name" value="true"></input>
                    <p class="form-title">Изменить название заданной страны</p>

                    <div class="flex-row" style="width: 350px; margin: 0 auto;">
                        <div>
                            <p class="form-subtitle">ID страны:</p>
                            <input class="auth_form_input" style="width: 120px;" type="text" name="id_country" minlength="1" id="id_country" placeholder="id" required>
                        </div>
                        
                        <div>
                            <p class="form-subtitle">Новое название:</p>
                            <input class="auth_form_input" style="width: 200px;" type="text" name="country_new_name" minlength="1" id="country_new_name" placeholder="Название" required>
                        </div>
                    </div>
 
                    <button class="categories-form-button" type="submit">Заменить</button>
                </form>

                <form class="categories-control-form" method="post">
                    <input type="hidden" name="add_country" id="add_country" value="true"></input>
                    <p class="form-title">Добавить страну-партнера</p>
                    <p class="form-subtitle">Название страны:</p>
                    <input class="auth_form_input" style="width: 200px;" type="text" name="country_name" minlength="1" id="country_name" placeholder="Название" required>

                    <button class="categories-form-button" type="submit">Добавить</button>
                </form>
            </div>

            <p class="form-title" style="margin-bottom: 0px; padding-bottom: 2px;">Таблица стран-партнеров</p>
            <table class="categories-forms-box">
                <tbody>
                    <tr>
                        <td class="td-1">id</td>
                        <td class="td-2">Страна</td>
                        <td class="td-2 center-text">Действие</td>
                    </tr>
                    <?php
                        draw_countries_table();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>