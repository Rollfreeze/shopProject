<?php
    session_start();
    require_once "../php/general_page.php";
    require_once "../php/sql_connection.php";
    require_once "../php/edit_helper.php";
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
    <title>Редактировать объявление</title>
</head>
<body>
    <?php
        echo getHeader();

        if ($_POST) {
            // $isNew = (isset($_POST['good_is_new'])) ? 1 : 0;
            // $isLeder = (isset($_POST['good_is_leader'])) ? 1 : 0;

            // // var_dump($_POST);
            // $connection = new SQLConnection();
            // $result = $connection->add_good(
            //     $_POST['good_title'], $_POST['good_subtitle'],
            //     $_POST['good_image_path_1'], $_POST['good_image_path_2'],
            //     $_POST['good_category_id'], $isNew, $isLeder,
            //     $_POST['good_price'], $_POST['good_country_id'], $_POST['good_popularity']
            // );

            // if ($result) {
            //     var_dump($result);
            // }
        } else if ($_GET) {
            var_dump($_GET);

            $good_id = $_GET['good_id'];
            $good_title = $_GET['good_title'];
            $good_subtitle = $_GET['good_subtitle'];
            $good_image_path_1 = $_GET['good_image_path_1'];
            $good_image_path_2 = $_GET['good_image_path_2'];
            $good_category_id = $_GET['good_category_id'];
            $good_isNew = ($_GET['good_is_new'] == '1') ? 'checked' : '';
            $good_isLeder = ($_GET['good_is_leader'] == '1') ? 'checked' : '';
            $good_price = $_GET['good_price'];
            $good_country_id = $_GET['good_country_id'];
            $good_popularity = $_GET['good_popularity'];
        }

    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="authorization_page.php">Редактирование объявления</a>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <?php
                if ($_POST && $result) echo '<h2 class="green_alert">Объявление успешно отредактировано!</h2>';
                else if ($_POST && $result == false) echo '<h2 class="red_alert">Ой, что-то пошло не так... Попробуйте еще раз</h2>';
            ?>


            <?php
            echo '<h1 class="h1" style="text-align: center; margin-top: 0px;">Редактирование</h1>';

            echo '<form class="authorization-form-2" method="post">';
                // id
                echo "<input value='$good_id' type='hidden' name='good_id' id='good_id'></input>";

                // title
                echo '<p class="radio-text" style="font-size: 18px;">Название товара:</p>';
                echo "<input value='$good_title' class='auth_form_input' type='text' name='good_title' maxlength='100' minlength='4' id='good_title' placeholder='Название' required>";
                
                // subtitle
                echo '<p class="radio-text" style="font-size: 18px;">Описание товара:</p>';
                echo "<input value='$good_subtitle' class='auth_form_input' type='text' name='good_subtitle' maxlength='100' minlength='4' id='good_subtitle' placeholder='Описание' required>";
                
                // img1
                echo '<hr>';
                echo '<p class="radio-text" style="font-size: 18px; margin-top: 35px;">Фотография товара №1:</p>';
                echo "<input value='../assets/$good_image_path_1' class='img_upload_input' type='file' name='good_image_path_1' id='good_image_path_1' required>";
                
                // img2
                echo '<p class="radio-text" style="font-size: 18px; margin-top: 15px;">Фотография товара №2:</p>';
                echo "<input value='../assets/$good_image_path_2' style='margin-bottom: 40px;' class='img_upload_input' type='file' name='good_image_path_2' id='good_image_path_2' required>";
                echo '<hr>';
                
                // category
                echo '<p class="radio-text" style="font-size: 18px; margin-top: 20px;">Категория товара:</p>';
                echo '<select class="form-select" name="good_category_id" id="good_category_id" required>';
                    good_category_selected($good_category_id);
                echo '</select>';

                // country
                echo '<p class="radio-text" style="font-size: 18px;">Страна производитель:</p>';
                echo '<select class="form-select" name="good_country_id" id="good_country_id" required>';
                    good_country_selected($good_country_id);
                echo '</select>';
                
                // popularity
                echo '<p class="radio-text" style="font-size: 18px;">Оценка товара:</p>';
                echo '<select class="form-select" name="good_popularity" id="good_popularity" required>';
                    good_popularity_selected($good_popularity);
                echo '</select>';

                // price
                echo '<p class="radio-text" style="font-size: 18px;">Стоимость товара:</p>';
                echo "<input value='$good_price' class='auth_form_input' type='text' name='good_price' maxlength='100' minlength='1' id='good_price' placeholder='Стоимость' required>";

                // isNew?
                echo '<div>';
                    echo '<p class="radio-text" style="font-size: 18px; margin-right: 20px;">Товар является новинкой?</p>';
                    echo "<input type='checkbox' $good_isNew name='good_is_new' id='good_is_new' style='vertical-align: top; margin-top: 7px;'>";
                echo '</div>';

                // isLeader?
                echo '<div style="margin-bottom: 15px;">';
                    echo '<p class="radio-text" style="font-size: 18px; margin-right: 20px;">Товар является лидером продаж?</p>';
                    echo "<input type='checkbox' $good_isLeder name='good_is_leader' id='good_is_leader' style='vertical-align: top; margin-top: 7px;'>";
                echo '</div>';

                echo '<button class="auth_form_button-2" type="submit">Редактировать карточку товара на сайт</button>';
            echo '</form>';
            ?>
        </div>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>