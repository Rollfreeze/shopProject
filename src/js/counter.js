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
    // console.log(amountSelectedValue);

    var card = button.parentElement.children[1];
    // console.log(card);

    var cardData = {
        "good_id": card[0].defaultValue,
        "good_title": card[1].defaultValue,
        "good_subtitle": card[2].defaultValue,
        "good_image_path_1": card[3].defaultValue,
        "good_image_path_2": card[4].defaultValue,
        "good_category_id": card[5].defaultValue,
        "good_is_new": card[6].defaultValue,
        "good_is_leader": card[7].defaultValue,
        "good_price": card[8].defaultValue,
        "good_country_id": card[9].defaultValue,
        "good_popularity": card[10].defaultValue,
        "amount_selected_value": amountSelectedValue
    }

    console.log(cardData);

    $.ajax({
        url: "../php/put_basket.php",
        method: "POST",
        data: cardData, 
        dataType: "json",
        success: function(data) {
            console.log(data);
            alert('success');
        },
        error: function(er) {
            console.log(er);
            alert('error');
        }
    });
}




// function ajax_checker() {

//     $.ajax({
//         type: 'POST',
//         url: 'catalog.php',
//         data: {
//             ajaxData: 'ajax data came!'
//         }, 
//         dataType: 'JSON',
//         success: function(data) {
//         //   console.log(data);
//             alert('success');
//             console.log(data);
//         },
//         error: function(er) {
//         //   console.log(er);
//             alert('error');
//             console.log(er);
//         }
//     });
// }
