<?php
    function good_category_name($item) {
        switch($item) {
            case 1: return 'Экзотика';
            case 2: return 'Грибы';
            case 3: return 'Ягоды';
            case 4: return 'Фрукты';
            case 5: return 'Овощи';
            default: return 'Выберите';
        }
    }

    function good_category_selected($good_category_id) {
        for ($i = 1; $i < 6; $i++) {
            $good_category_item_name = good_category_name($i);
            if ($good_category_id == $i) echo "<option value='$i' selected>$good_category_item_name</option>";
            else echo "<option value='$i'>$good_category_item_name</option>";
        }
    }




    function good_country_name($item) {
        switch($item) {
            case 1: return 'Россия';
            case 2: return 'Беларусь';
            case 3: return 'Китай';
            case 4: return 'Таджикистан';
            case 5: return 'Италия';
            default: return 'Россия';
        }
    }

    function good_country_selected($country_id) {
        for ($i = 1; $i < 6; $i++) {
            $good_country_name = good_country_name($i);
            if ($country_id == $i) echo "<option selected value='$i'>$good_country_name</option>";
            else echo "<option value='$i'>$good_country_name</option>";
        }
    }




    function good_popularity_name($item) {
        switch($item) {
            case 5: return '5';
            case 4: return '4';
            case 3: return '3';
            case 2: return '2';
            case 1: return '1';
            default: return '1';
        }
    }

    function good_popularity_selected($good_popularity) {
        for ($i = 1; $i < 6; $i++) {
            $good_popularity_name = good_popularity_name($i);
            if ($good_popularity == $i) echo "<option selected value='$i'>$good_popularity_name</option>";
            else echo "<option value='$i'>$good_popularity_name</option>";
        }
    }

    function score_color($item) {
        switch($item) {
            case 5: return 'green-c';
            case 4: return 'blue-c';
            case 3: return 'yellow-c';
            case 2: return 'brown-c';
            case 1: return 'red-c';
            default: return '';
        }
    }







    function filter_country_name($item) {
        switch($item) {
            case 0: return 'Все страны';
            case 1: return 'Россия';
            case 2: return 'Беларусь';
            case 3: return 'Китай';
            case 4: return 'Таджикистан';
            case 5: return 'Италия';
        }
    }

    function filter_country_selected($id) {
        for ($i = 0; $i < 6; $i++) {
            $country_name = filter_country_name($i);
            if ($id == $i) echo "<option value='$i' selected>$country_name</option>";
            else echo "<option value='$i'>$country_name</option>";
        }
    }

    

    function filter_sort_name($item) {
        switch($item) {
            case 0: return 'Показать все';
            case 1: return 'Лидер продаж';
            case 2: return 'Новинки';
            case 3: return 'По имени (а-я)';
            case 4: return 'По имени (я-а)';
            case 5: return 'По цене (min-max)';
            case 6: return 'По цене (max-min)';
            case 7: return 'По полуярности (худш.-лучш.)';
            case 8: return 'По полуярности (лучш.-худш)';
        }
    }

    function filter_sort_selected($id) {
        for ($i = 0; $i < 9; $i++) {
            $sort_name = filter_sort_name($i);
            if ($id == $i) echo "<option value='$i' selected>$sort_name</option>";
            else echo "<option value='$i'>$sort_name</option>";
        }
    }
?>