<?php
    function likeBuilder($good_id, $good_title, $good_subtitle,
        $good_image_path_1, $good_image_path_2, $good_category_id,
        $good_is_new, $good_is_leader, $good_price,
        $good_country_id, $good_popularity
    ) {
        $likeUnAuthForm = <<<LIKE
        <div class="heart-box-black"></div>
LIKE;

        $likeAuthForm = <<<LIKE
        <form method="get">
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
            <input class="heart-box-black" type="submit" value="" name="put_like">
        </form>
LIKE;

        $removelikeForm = <<<remove_LIKE
        <form method="get">
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
            <input class="heart-box-red" type="submit" value="" name="remove_like">
        </form>
remove_LIKE;



        $didUserLikeIt = false;
        $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
        if ($isAuth) {
            // Сначала проверка на то, стоит
            // ли уже у этого пользователя лайк
            $connection = new SQLConnection();
            $user = $_SESSION['current_user'];
            $didUserLikeIt = $connection->did_user_like_it(
                $good_id, $user['user_id']);
        }

        if ($isAuth && $didUserLikeIt) {
            echo $removelikeForm;
        } else if ($isAuth && !$didUserLikeIt) {
            echo $likeAuthForm;
        } else {
            echo $likeUnAuthForm;
        }
        
        // Теперь надо узнать сколько всего
        // стоит лайков под записью
        $connection = new SQLConnection();
        $likesAmount = $connection->likes_good_count($good_id);
        echo "<div class='likes_count'>$likesAmount</div>";
        // var_dump($likesAmount);
    }
?>