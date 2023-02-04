<?php
    // Получает все комментарии к конкретному товару
    function good_cooments_fetch($good_id, $good_title, $good_subtitle,
        $good_image_path_1, $good_image_path_2, $good_category_id,
        $good_is_new, $good_is_leader, $good_price, $good_country_id,
        $good_popularity
    ) {
        $connection = new SQLConnection();
        $result = $connection->get_good_comments($good_id);

        $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
        $isRoot = false;
        $delete_coment_form = '';
        if ($isAuth) {
            $user = $_SESSION['current_user'];
            $isRoot = $user['is_root'];
        }

        // var_dump($result);

        if ($result) {
            for ($i = 0; $i < count($result); $i++) {
                $current_item = $result[$i];
                $current_comment_id = $current_item['id'];
                $current_user_name = $current_item['user_name'];
                $current_comment_time = $current_item['time'];
                $current_comment_message = $current_item['comment'];

                if ($isAuth && $isRoot) {
                    $delete_coment_form = <<< DELETE_FORM
                    <form method="post">
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
                        <input type="hidden" name="dele_comment_id" value="$current_comment_id"></input>
                        <input type="submit" class="advert_delete_button-2">
                    </form>
DELETE_FORM;
                }
                
                
                $comment_bloc = <<< COMMENT
                <div class="user-coment">
                    <div class="user-line">
                        <div class="flex-row">
                            <div class="flex-row-2">
                                <div class="auth-box"></div>
                                <div class="user-coment-name">$current_user_name</div>
                                <div class="user-coment-time">$current_comment_time</div>
                            </div>
        
                            $delete_coment_form
                        </div>
                    </div>
                    
                    <div class="user-coment-box">
                        Комментарий: $current_comment_message
                    </div>
                </div>
COMMENT;
                echo $comment_bloc;
            }
        }
    }
?>