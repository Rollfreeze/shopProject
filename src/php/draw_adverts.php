<?php
require_once "../php/advertisment_card.php";
require_once "../php/sql_connection.php";

function draw_adverts()
{
    $connection = new SQLConnection();
    $adverts = $connection->get_all_adverts();
    if ($adverts) {
        // echo "<pre>";
        // var_dump($good_cards);
        // echo "</pre>";

        echo '<div class="advertisments-container">';
        for ($i = 0; $i < count($adverts); $i++) {
            echo advertisment_card(
                $adverts[$i]['id'],
                $adverts[$i]['title'],
                $adverts[$i]['subtitle'],
                $adverts[$i]['image']
            );
        }
        echo '</div>';
    }
}
