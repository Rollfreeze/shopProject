<?php
    function advertisment_card() {
        $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
        $user = $_SESSION['current_user'];
        
        $isRoot = false;
        if ($isAuth) {
            $isRoot = $user['is_root'];
        }

        $rootTools = '';
        if ($isRoot) {
            $rootTools = <<< ROOT_TOOLS
            <form class="delete-advertisment-form">
                <input type="submit" class="advertisment_delete_button"></input>
            </form>
            <form class="edit-advertisment-form">
                <input type="submit" class="advertisment_edit_button"></input>
            </form>
ROOT_TOOLS;
        }

        $advertisment_card = <<< ADVERTISMENT_CARD
        <div class="advertisment-item">
            $rootTools
            <div class="advertisment-logo a4"></div>
            <div class="advertisment-title">Авакадо и его польза</div>
            <div class="advertisment-subtitle">Авакадо имеет самую полезную жирность продукта</div>
        </div>
ADVERTISMENT_CARD;

        return $advertisment_card;
    }
?>