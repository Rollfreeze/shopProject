<?php
    function draw_countries_table() {
        $connection = new SQLConnection();
        $countries = $connection->get_all_countries();
        if ($countries) {
            // echo "<pre>";
            // var_dump($good_cards);
            // echo "</pre>";

            for ($i = 0; $i < count($countries); $i++) {
                $current_id = $countries[$i]['id'];
                $current_name = $countries[$i]['country_name'];
                echo "<tr>";
                    echo "<td class='td-1'>$current_id</td>";
                    echo "<td class='td-2'>$current_name</td>";
                    echo "<td width='150' class='td-2 center-text'><a class='delete-a' href='control_countries.php?delete_id=$current_id'>Удалить<a></td>";
                echo "</tr>";
            }
        }
    }

    // динамические опции выбора категорий
    function draw_countries_options() {
        $connection = new SQLConnection();
        $countries = $connection->get_all_countries();
        if ($countries) {
            for ($i = 0; $i < count($countries); $i++) {
                $current_id = $countries[$i]['id'];
                $current_name = $countries[$i]['country_name'];
                echo "<option value='$current_id'>$current_name</option>";
            }
        }
    }
?>