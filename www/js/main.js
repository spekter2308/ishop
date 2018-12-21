/**
 * Функція додавання товару в корзину
 *
 * @param integer $itemId ID продукта
 * @return в випадку успіху обновляються дані корзини на сторінці
 */
function addToCart(itemId) {
	console.log("js - addToCart()");
	$.ajax({
		type: 'POST',
		async: false,
		url: "/cart/addtocart/" + itemId + '/',
		dataType: 'json',
		success: function (data) {
			if(data['success']){
				$('#cartCntItems').html(data['cntItems']);

				$('#addCart_' + itemId).hide();
				$('#removeCart_' + itemId).show();
			}
		}
	});
}

/**
 * Видалення продукту із корзини
 *
 * @param integer $itemId ID продукта
 * @return в випадку успіху обновляються дані корзини на сторінці
 */
function removeFromCart(itemId) {
	console.log("js - removeFromCart()");
	$.ajax({
		type: 'POST',
		async: false,
		url: "/cart/removefromcart/" + itemId + '/',
		dataType: 'json',
		success: function (data) {
			if(data['success']){
				$('#cartCntItems').html(data['cntItems']);

				$('#addCart_' + itemId).show();
				$('#removeCart_' + itemId).hide();
			}
		}
	});
}

/**
 * Підрахунок вартості купленого товару
 *
 * @param integer itemId ID продукта
 */
function conversionPrice(itemId) {
	var newCnt = $('#itemCnt_' + itemId).val();
	var itemPrice = $('#itemPrice_' + itemId).attr('value');
	var itemRealPrice = newCnt * itemPrice;

	$('#itemRealPrice_' + itemId).html(itemRealPrice);
}

/**
 * Отримання даних з форми
 *
 */
function getData(obj_form){
	var hData = {};
	$('input, textarea, select', obj_form).each(function(){
		if(this.name && this.name!=''){
			hData[this.name] = this.value;
			console.log('hData[' + this.name + '] = ' + hData[this.name]);
		}
	});
	return hData;
}

/**
 * Реєстрація нового користувача
 */
function registerNewUser(){
	var postData = getData('#registerBox');

	$.ajax({
		type: 'POST',
		async: true,
		url: "/user/register/",
		data: postData,
		dataType: 'json',
		success: function(data){
			console.log(data);
			if(data['success']){
				location.reload();

				alert(data['message']);
				//блок в лівому стовбці
				$('#registerBox').hide();
				$('#displayName').html(data['userName']);
				$('#userBox').setTimeout(300).show();

				//сторінка замовлення
				/*$('#loginBox').hide();
				$('#btnSaveOrder').show();*/
			}	else {
				alert(data['message']);
			}
		}
	});
}

/**
 * Авторизація користувача
 *
 */
function login(){

	var postData = getData('#loginBox');

	$.ajax({
		type: 'POST',
		async: true,
		url: "/user/login/",
		data: postData,
		dataType: 'json',
		success: function(data){
			if (data['success']) {
				location.reload();

				$('#loginBox').hide();

				$('#registerBox').hide();
				$('#displayName').html(data['displayName']);
				$('#userBox').setTimeout(300).show();
				// заполняем поля на странице заказа
				/*$('#name').val(data['name']);
				$('#phone').val(data['phone']);
				$('#adress').val(data['adress']);
				$('#btnSaveOrder').show();*/
			} else {
				alert(data['message']);
			}
		}
	});
}

/**
 * Показати/заховати форму реєстрації
 */
function showRegisterBox(){
	$('#registerBoxHidden').slideToggle("slow");
}

/**
 * Оновлення даних користувача
 *
 */
function updateUserData(){
	//console.log("js - updateUserData");
	var postData = getData('#updateUserData');

	$.ajax({
		type: 'POST',
		async: true,
		url: "/user/update/",
		data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				$('#displayName').html(data['displayName']);
				alert(data['message']);
			} else {
				alert(data['message']);
			}
			location.reload();
		}
	});
}

/**
 * Збереження замовлення
 *
 */
function saveOrder(){
	var postData = getData('#frmOrder');
	$.ajax({
		type: 'POST',
		async: false,
		url: "/cart/saveorder/",
		data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				alert(data['message']);
				document.location = '/';
			} else {
				alert(data['message']);
			}
		}
	});
}