<?php
    function draw_categories_table() {
        $connection = new SQLConnection();
        $categories = $connection->get_all_categories();
        if ($categories) {
            // echo "<pre>";
            // var_dump($good_cards);
            // echo "</pre>";

            for ($i = 0; $i < count($categories); $i++) {
                $current_id = $categories[$i]['id'];
                $current_name = $categories[$i]['name'];
                echo "<tr>";
                    echo "<td class='td-1'>$current_id</td>";
                    echo "<td class='td-2'>$current_name</td>";
                    echo "<td width='150' class='td-2 center-text'><a class='delete-a' href='control_categories.php?delete_id=$current_id'>Удалить<a></td>";
                echo "</tr>";
            }
        }
    }
?>