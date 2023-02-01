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

    function category_checkbox_list() {
        $connection = new SQLConnection();
        $categories = $connection->get_all_categories();
        if ($categories) {
            $checkboxFiltersExist = isset($_SESSION['current_checkbox_filters']) && !empty($_SESSION['current_checkbox_filters']);

            echo "<table class='filter-table'>";
                echo "<tbody>";
                    // строка
                    for ($i = 0; $i < ceil(count($categories) / 5); $i++) {
                        echo "<tr class='filter-tr'>";

                        // элементы строки
                        for ($j = $i * 5; $j < $i * 5 + 5; $j++) {
                            if ($j == count($categories)) break;
                            $categoryID = $categories[$j]['id'];
                            $categoryName = $categories[$j]['name'];

                            // Если фильтры сброшены или не заданы, то п.у. отмечены будут все
                            $checkedDefault = '';
                            if (!$checkboxFiltersExist || in_array($categoryID, $_SESSION['current_checkbox_filters'])) {
                                $checkedDefault = 'checked';
                            }

                            echo "<td class='filter-td'>";
                                echo "<input type='checkbox' $checkedDefault name='category-$categoryID' id='category-$categoryID'>";
                                echo "<label class='unselectable' for='category-$categoryID'>$categoryName</label>"; 
                            echo "</td>";
                        }

                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
        }
    }

    // динамические опции выбора категорий
    function draw_categories_options() {
        $connection = new SQLConnection();
        $categories = $connection->get_all_categories();
        if ($categories) {
            for ($i = 0; $i < count($categories); $i++) {
                $current_id = $categories[$i]['id'];
                $current_name = $categories[$i]['name'];
                echo "<option value='$current_id'>$current_name</option>";
            }
        }
    }
?>