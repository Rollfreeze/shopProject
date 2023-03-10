function increaseCount(a, b) {
    var input = b.previousElementSibling;
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.value = value;
}

function deacreaseCount(a, b) {
    var input = b.nextElementSibling;
    var value = parseInt(input.value, 10);
    if (value > 1) {
        value = isNaN(value) ? 0 : value;
        value--;
        input.value = value;
    }
}

function goAuthPlease() {
    alert("Пожалуйста, авторизируйтесь, чтобы добавлять товар в корзину и совершать покупки")
}

function addGoodsToBasket(button) {
    var amountSelectedValue = button.nextElementSibling.children[1].value;

    var button = button.parentElement.children[7];
    var counter = button.parentElement.children[8].children;


    var cardForm = button.parentElement.children[1];

    var cardData = {
        "good_id": cardForm[0].defaultValue,
        "good_title": cardForm[1].defaultValue,
        "good_subtitle": cardForm[2].defaultValue,
        "good_image_path_1": cardForm[3].defaultValue,
        "good_image_path_2": cardForm[4].defaultValue,
        "good_category_id": cardForm[5].defaultValue,
        "good_is_new": cardForm[6].defaultValue,
        "good_is_leader": cardForm[7].defaultValue,
        "good_price": cardForm[8].defaultValue,
        "good_country_id": cardForm[9].defaultValue,
        "good_popularity": cardForm[10].defaultValue,
        "amount_selected_value": amountSelectedValue
    }

    // console.log(cardData);

    $.ajax({
        url: "../php/put_basket.php",
        method: "POST",
        data: cardData, 
        dataType: "json",
        success: function(data) {
            console.log(data);
            // alert('success');

            counter[0].style = "transition: 0.0s; font-size: 15px; display: block; color: green;"
            counter[0].innerHTML = "В корзине: ";
            counter[0].onclick = "";

            var a_button = document.createElement('a');
            a_button.href = 'basket.php';
            a_button.className = 'product-button';
            a_button.innerHTML = 'Перейти в корзину';
            button.parentNode.replaceChild(a_button, button);

            counter[2].style = "display: none;"

            document.getElementById("basket_p").innerHTML =
                `Позиций: <span class='orange-selected'>${data.goods_id.length}</span>, на сумму: <span class='orange-selected'>${data.common_sum}</span>`;
        },
        error: function(er) {
            console.log(er);
            alert('error');
        }
    });
}


function addGoodsToBasketFromCard(button) {
    var amountSelectedValue = button.previousElementSibling.children[1].value;
    var counter = button.previousElementSibling.children;

    var cardForm = button.nextElementSibling;
    var cardData = {
        "good_id": cardForm[0].defaultValue,
        "good_title": cardForm[1].defaultValue,
        "good_subtitle": cardForm[2].defaultValue,
        "good_image_path_1": cardForm[3].defaultValue,
        "good_image_path_2": cardForm[4].defaultValue,
        "good_category_id": cardForm[5].defaultValue,
        "good_is_new": cardForm[6].defaultValue,
        "good_is_leader": cardForm[7].defaultValue,
        "good_price": cardForm[8].defaultValue,
        "good_country_id": cardForm[9].defaultValue,
        "good_popularity": cardForm[10].defaultValue,
        "amount_selected_value": amountSelectedValue
    }

    $.ajax({
        url: "../php/put_basket.php",
        method: "POST",
        data: cardData, 
        dataType: "json",
        success: function(data) {
            console.log(data);

            counter[0].style = "transition: 0.0s; font-size: 15px; display: block; color: green;"
            counter[0].innerHTML = "В корзине: ";
            counter[0].onclick = "";

            var a_button = document.createElement('a');
            a_button.href = 'basket.php';
            a_button.className = 'product-button';
            a_button.innerHTML = 'Перейти в корзину';
            a_button.style = "margin-top: 120px;"
            button.parentNode.replaceChild(a_button, button);

            counter[2].style = "display: none;"

            document.getElementById("basket_p").innerHTML =
                `Позиций: <span class='orange-selected'>${data.goods_id.length}</span>, на сумму: <span class='orange-selected'>${data.common_sum}</span>`;
        },
        error: function(er) {
            console.log(er);
            alert('error');
        }
    });
}


function deleteFromBasket(id, button) {
    console.log(button.parentElement.parentElement.parentElement.parentElement);

    var deleteData = {
        "delete_id": id
    }
    
    $.ajax({
        url: "../php/delete_from_basket.php",
        method: "POST",
        data: deleteData, 
        dataType: "json",
        success: function(data) {
            // alert(data);
            console.log(data);


            if (data.goods_id.length > 0) {
                document.getElementById("basket_p").innerHTML =
                    `Позиций: <span class='orange-selected'>${data.goods_id.length}</span>, на сумму: <span class='orange-selected'>${data.common_sum}</span>`;
            } else {
                document.getElementById("basket_p").innerHTML = `Товаров нет`;
                document.getElementById("basket_pay_row").style = "display: none;";
            }

            // var weightAmount = 0;
            // for (const [key, value] of Object.entries(data.id_its_amount)) {
            //     weightAmount += value;
            // }

            // document.getElementById("commonWeight").innerHTML =
            //     `Общий вес: ${weightAmount.toString()} кг`;

            document.getElementById("commonWeight").innerHTML =
                `Общий вес: ${data.common_weight.toString()} кг`;

            document.getElementById("common_sum").innerHTML =
                `${data.common_sum} руб.`;

            document.getElementById("goods_amount").innerHTML =
                `В корзине товаров: ${data.goods_id.length}`;

            button.parentElement.parentElement.remove();
        },
        error: function(er) {
            console.log(er);
            alert('error');
        }
    });
}

function basketIncrease(a, b, id) {
    var data = {
        "id": id
    }

    $.ajax({
        url: "../php/increase_good_basket.php",
        method: "POST",
        data: data, 
        dataType: "json",
        success: function(data) {
            console.log(data);

            if (data.goods_id.length > 0) {
                document.getElementById("basket_p").innerHTML =
                    `Позиций: <span class='orange-selected'>${data.goods_id.length}</span>, на сумму: <span class='orange-selected'>${data.common_sum}</span>`;
            } else {
                document.getElementById("basket_p").innerHTML = `Товаров нет`;
                document.getElementById("basket_pay_row").style = "display: none;";
            }

            document.getElementById("commonWeight").innerHTML =
                `Общий вес: ${data.common_weight.toString()} кг`;

            document.getElementById("common_sum").innerHTML =
                `${data.common_sum} руб.`;

            document.getElementById("goods_amount").innerHTML =
                `В корзине товаров: ${data.goods_id.length}`;


            var pricePer = b.parentElement.children[0].defaultValue;
            var input = b.previousElementSibling;
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;

            // Увеличиваем сумму данного товара
            b.parentElement.nextElementSibling.innerHTML = `${value * pricePer} руб.`;
        },
        error: function(er) {
            console.log(er);
            alert('error');
        }
    });
}

function basketDeacrease(a, b, id) {
    var data = {
        "id": id
    }

    var input = b.nextElementSibling;
    var value = parseInt(input.value, 10);
    if (value > 1) {
        $.ajax({
            url: "../php/deacrease_good_basket.php",
            method: "POST",
            data: data, 
            dataType: "json",
            success: function(data) {
                console.log(data);
    
                if (data.goods_id.length > 0) {
                    document.getElementById("basket_p").innerHTML =
                        `Позиций: <span class='orange-selected'>${data.goods_id.length}</span>, на сумму: <span class='orange-selected'>${data.common_sum}</span>`;
                } else {
                    document.getElementById("basket_p").innerHTML = `Товаров нет`;
                    document.getElementById("basket_pay_row").style = "display: none;";
                }
    
                document.getElementById("commonWeight").innerHTML =
                    `Общий вес: ${data.common_weight.toString()} кг`;
    
                document.getElementById("common_sum").innerHTML =
                    `${data.common_sum} руб.`;
    
                document.getElementById("goods_amount").innerHTML =
                    `В корзине товаров: ${data.goods_id.length}`;
    
    
                var pricePer = b.parentElement.children[0].defaultValue;
    
                var input = b.nextElementSibling;
                var value = parseInt(input.value, 10);
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
        
                // Уменьшаем сумму данного товара
                b.parentElement.nextElementSibling.innerHTML = `${value * pricePer} руб.`;
            },
            error: function(er) {
                console.log(er);
                alert('error');
            }
        });
    }
}