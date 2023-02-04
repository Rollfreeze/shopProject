<?php
    session_start();
    require_once "../php/general_page.php";
    require_once "../php/edit_helper.php";
    require_once "../php/good_cooments_fetch.php";
    require_once "../php/sql_connection.php";
    require_once "../php/likes_helper.php";
    // header("Location: good_item_page.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/counter.js"></script>
    <title>Просмотр товара</title>
</head>
<body>
    <?php
        echo getHeader();

        // var_dump($_POST['comment-area']);
        // var_dump($_POST['dele_comment_id']);
        // var_dump($_POST['put_like']);
        
        $didDeleteComment = isset($_POST['dele_comment_id']);
        $didNewComent = (isset($_GET['comment-area']) && !empty($_GET['comment-area']));
        
        // Переменные для алертов
        $delete_comment_result = null;
        $comment_result = null;

        // Если был добавлен или удален комментарий
        if ($didDeleteComment) {
            $good_id = $_POST['good_id'];
            $good_title = $_POST['good_title'];
            $good_subtitle = $_POST['good_subtitle'];
            $good_image_path_1 = $_POST['good_image_path_1'];
            $good_image_path_2 = $_POST['good_image_path_2'];
            $good_category_id = $_POST['good_category_id'];
            $good_is_new = $_POST['good_is_new'];
            $good_is_leader = $_POST['good_is_leader'];
            $good_price = $_POST['good_price'];
            $good_country_id = $_POST['good_country_id'];
            $good_popularity = $_POST['good_popularity'];

            $titlePlusiks = str_replace(" ", "+", $good_title);
            $subtitlePlusiks = str_replace(" ", "+", $good_subtitle);

            $good_isNew_href = ($_POST['good_is_new'] == '1') ? '1' : '0';
            $good_isLeder_href = ($_POST['good_is_leader'] == '1') ? '1' : '0';

            if ($didDeleteComment) {
                $connection = new SQLConnection();
                $delete_comment_result = $connection->delete_good_comment(
                    $_POST['dele_comment_id'],
                );
            }
        } else if ((isset($_GET['good_id']) && $_GET['good_id'] != null)) {
            // var_dump($_GET);
            $good_id = $_GET['good_id'];
            $good_title = $_GET['good_title'];
            $good_subtitle = $_GET['good_subtitle'];
            $good_image_path_1 = $_GET['good_image_path_1'];
            $good_image_path_2 = $_GET['good_image_path_2'];
            $good_category_id = $_GET['good_category_id'];
            $good_is_new = $_GET['good_is_new'];
            $good_is_leader = $_GET['good_is_leader'];
            $good_price = $_GET['good_price'];
            $good_country_id = $_GET['good_country_id'];
            $good_popularity = $_GET['good_popularity'];

            $titlePlusiks = str_replace(" ", "+", $good_title);
            $subtitlePlusiks = str_replace(" ", "+", $good_subtitle);

            $good_isNew_href = ($_GET['good_is_new'] == '1') ? '1' : '0';
            $good_isLeder_href = ($_GET['good_is_leader'] == '1') ? '1' : '0';


            if ($didNewComent) {
                $connection = new SQLConnection();
                $user = $_SESSION['current_user'];

                $comment_result = $connection->add_comment(
                    $good_id,
                    $user['user_id'],
                    $user['user_name'],
                    $_GET['comment-area'],
                );

                // var_dump($comment_result);
            }

            if (isset($_GET['put_like'])) {
                $user = $_SESSION['current_user'];

                $connection = new SQLConnection();
                $put_like_result = $connection->add_like(
                    $good_id,
                    $user['user_id']
                );
            } else if (isset($_GET['remove_like'])) {
                $user = $_SESSION['current_user'];

                $connection = new SQLConnection();
                $remove_like_result = $connection->remove_like(
                    $good_id,
                    $user['user_id']
                );
            }
        }
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <?php
                    echo "<a class='bread-bar-item' href='good_item_page.php?good_id=$good_id&good_title=$titlePlusiks&good_subtitle=$subtitlePlusiks&good_image_path_1=$good_image_path_1&good_image_path_2=$good_image_path_2&good_category_id=$good_category_id&good_is_new=$good_isNew_href&good_is_leader=$good_isLeder_href&good_price=$good_price&good_country_id=$good_country_id&good_popularity=$good_popularity'>$good_title</a>";
                ?>
           </div>
        </main>
    </div>

    <div class="container">
        <?php
            if (isset($_POST['dele_comment_id']) && $delete_comment_result) echo '<h2 class="green_alert">Комментарий успешно удален!</h2>';
            else if (isset($_POST['dele_comment_id']) && !$delete_comment_result) echo '<h2 class="red_alert">Не удалось удалить комментарий</h2>';
            else if ($didNewComent && $comment_result) echo '<h2 class="green_alert">Комментарий успешно добавлен!</h2>';
            else if ($didNewComent && !$comment_result) echo '<h2 class="red_alert">Не удалось добавить комментарий</h2>';
          ?>

        <div class="show-up-container">
            <div class="good-item-page-avatar">
                <?php
                    $productLogo = '<div class="good-item-page-avatar-logo" style="' . 'background-image: url(' . '..' . "/assets/" . $good_image_path_1 . '")' . '"></div>';
                    echo $productLogo;
                ?>
            </div>
            
            <div class="second-col">
                <div class="flex-row-2">
                    <h1 class='h1' style='text-align: left; margin-bottom: 5px; margin-top: 15px; margin-left: 0; margin-right: 20px; font-size: 34px;'>
                        <?php
                            echo $good_title
                        ?>
                    </h1>

                    <?php
                        // Лайки
                        likeBuilder(
                            $good_id, $good_title, $good_subtitle, $good_image_path_1,
                            $good_image_path_2, $good_category_id, $good_is_new,
                            $good_is_leader, $good_price, $good_country_id, $good_popularity
                        );
                    ?>
                </div>


                <div class="gray-hr"></div>

                <div class="under-hr-description flex-row">
                    <div class="description-good-box">
                        <?php
                        $connection = new SQLConnection();
                        $country = $connection->get_country_name($good_country_id);

                        $scoreColor = score_color($good_popularity);
                        echo "<p class='good-raiting'>Рейтинг товара: <span class='span-raiting $scoreColor'>$good_popularity</span></p>";
                        echo "<p class='good-country'>Страна: <span class='span-raiting country-c'>$country</span></p>";
                        echo "<p class='show-up-description'>$good_subtitle</p>";
                        ?>
                    </div>

                    <div class="counter-box">
                        <?php
                        echo "<p class='counter-box-money'>$good_price руб. за кг.</p>";
                        ?>

                        <div class="product-item-kg-counter">
                            <span class="down" onclick="deacreaseCount(event, this)">-</span>
                            <input type="text" value="1"></input>
                            <span class="up" onclick="increaseCount(event, this)">+</span>
                        </div>

                        <p class="normal-little" style="margin: 0 auto;">кг</p>
                        
                        <button class="product-button" style="margin-top: 100px;">Добавить в корзину</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
    
        <?php
            $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
            if ($isAuth) {
                echo '<form action="good_item_page.php" method="get">';
                    // форма для отправки самой же страницы на себя
                    $hidden_elements = <<< HIDDEN
                        <input type="hidden" name="good_id" value="$good_id"></input>
                        <input type="hidden" name="good_title" value="$good_title"></input>
                        <input type="hidden" name="good_subtitle" value="$good_subtitle"></input>
                        <input type="hidden" name="good_image_path_1" value="$good_image_path_1"></input>
                        <input type="hidden" name="good_image_path_2" value="$good_image_path_2"></input>
                        <input type="hidden" name="good_category_id" value="$good_category_id"></input>
                        <input type="hidden" name="good_is_new" value="$good_is_new"></input>
                        <input type="hidden" name="good_is_leader" value="$good_is_leader"></input>
                        <input type="hidden" name="good_price" value="$good_price"></input>
                        <input type="hidden" name="good_country_id" value="$good_country_id"></input>
                        <input type="hidden" name="good_popularity" value="$good_popularity"></input>
HIDDEN;
                    echo $hidden_elements;
                
    
                $add_coment_btn = <<< BTN
                <div class="flex-row-end">
                    <div style="margin-right: 20px;">
                        <button class="filter-button" style="width: 258px; margin: 0; margin-bottom: 15px;">Добавить комментарий</button>
                    </div>
                </div>

                <div class="flex-row-end">
                    <textarea maxlength="50" name="comment-area" id="comment-area" cols="40" rows="4"></textarea>
                </div>
            </form>
BTN;
                echo $add_coment_btn;
            }
        ?>


        <?php
            good_cooments_fetch(
                $good_id, $good_title, $good_subtitle, $good_image_path_1,
                $good_image_path_2, $good_category_id, $good_is_new,
                $good_is_leader, $good_price, $good_country_id, $good_popularity
            );
        ?>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>