<?php
    function advertisment_card(
        $advert_id, $advert_title,
        $advert_subtitle, $advert_image
    ) {
        $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
        $user = $_SESSION['current_user'];
        
        $isRoot = false;
        if ($isAuth) {
            $isRoot = $user['is_root'];
        }

        $rootTools = '';
        if ($isRoot) {
            $rootTools = <<< ROOT_TOOLS
            <form method="post" class="delete-advertisment-form">
                <input type="hidden" name="advert_id_delete" id="advert_id_delete" value="$advert_id"></input>
                <input type="submit" class="advertisment_delete_button"></input>
            </form>

            <form method="get" class="edit-advertisment-form" action="edit_advert.php">
                <input type="hidden" name="advert_id" id="advert_id" value="$advert_id"></input>
                <input type="hidden" name="advert_title" id="advert_title" value="$advert_title"></input>
                <input type="hidden" name="advert_subtitle" id="advert_subtitle" value="$advert_subtitle"></input>
                <input type="hidden" name="advert_image" id="advert_image" value="$advert_image"></input>
                <input type="submit" class="advertisment_edit_button"></input>
            </form>
ROOT_TOOLS;
        }

        $advertLogo = '<div class="advertisment-logo" style="' . 'background-image: url(' . '..' . "/assets/" . $advert_image . '")' . '"></div>';

        $advertisment_card = <<< ADVERTISMENT_CARD
        <div class="advertisment-item">
            $rootTools

            $advertLogo
            <div class="advertisment-title">$advert_title</div>
            <div class="advertisment-subtitle">$advert_subtitle</div>
        </div>
ADVERTISMENT_CARD;

        return $advertisment_card;
    }
?>