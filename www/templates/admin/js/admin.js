//Функції для адміністративної частини сайту

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
 * Додавання нової категорії
 *
 */
function newCategory() {
	var postData = getData('#blockNewCategory');

	$.ajax({
		type: 'POST',
		async: false,
		url: "/admin/addnewcat/",
		data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				alert(data['message']);
				$('#newCategoryName').val('');
			} else {
				alert(data['message']);
			}
		}
	})
}

/**
 * Модифікація існуючої категорії
 *
 */
function updateCategory(itemId) {
	var parentId = $('#parentId_' + itemId).val();
	var newName = $('#itemName_' + itemId).val();
	var postData = {itemId: itemId, parentId: parentId, newName: newName};

	$.ajax({
		type: 'POST',
		async: true,
		url: "/admin/updatecategory/",
		data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				alert(data['message']);
			} else {
				alert(data['message']);
			}
		}
	})
}

/**
 * Додавання нового товару
 */
function addProduct(){
	var itemName = $('#newItemName').val();
	var itemPrice = $('#newItemPrice').val();
	var itemCatId = $('#newItemCatId').val();
	var itemDesc = $('#newItemDesc').val();
	var itemImg = $('#newImg').val();

	var postData = {
		itemName: itemName,
		itemPrice: itemPrice,
		itemCatId: itemCatId,
		itemDesc: itemDesc,
		itemImg: itemImg
	}

	$.ajax({
		type: 'POST',
		async: true,
		url: "/admin/addproduct/",
		data: postData,
		dataType: 'json',
		success: function(data) {
			alert(data['message']);
			if(data['success']){
				$('#newItemName').val();
				$('#newItemPrice').val();
				$('#newItemCatId').val();
				$('#newItemDesc').val();
				location.reload();
			}
		}
	})
}

/**
 * Оновлення даних товару
 *
 */
function updateProduct(itemId) {
	var itemName = $('#itemName_' + itemId).val();
	var itemPrice = $('#itemPrice_' + itemId).val();
	var itemCatId = $('#itemCatId_' + itemId).val();
	var itemDesc = $('#itemDesc_' + itemId).val();
	var itemStatus = $('#itemStatus_' + itemId).prop("checked");

	if(itemStatus == false){
		itemStatus = 1;
	} else {
		itemStatus = 0;
	}

	var postData = {
		itemId: itemId, itemName: itemName, itemPrice: itemPrice, itemCatId: itemCatId, itemDesc: itemDesc, itemStatus: itemStatus
	};

	$.ajax({
		type: 'POST',
		async: 'false',
		url: '/admin/updateproduct/',
		data: postData,
		dataType: 'json',
		success: function (data) {
			alert(data['message']);
		}
	})
}

/**
 * Оновлення дати оплати та статусу оплати
 *
 */
function updateDatePayment(itemId) {
	var itemDatePayment = $('#datePayment_' + itemId).val();
	var itemStatus = $('#itemStatus_' + itemId).prop("checked");

	if(itemStatus == true){
		itemStatus = 1;
	} else {
		itemStatus = 0;
	}

	var postData = {
		itemId: itemId,
		itemDatePayment: itemDatePayment,
		itemStatus: itemStatus
	}

	$.ajax({
		type: 'POST',
		async: 'false',
		url: '/admin/updatedatepayment/',
		data: postData,
		dataType: 'json',
		success: function (data) {
			alert(data['message']);
			location.reload();
		}
	})
}


/**
 * Авторизація адміністратора
 *
 */
function loginAdmin(){

	var postData = getData('#loginAdmin');

	$.ajax({
		type: 'POST',
		async: true,
		url: "/admin/login/",
		data: postData,
		dataType: 'json',
		success: function(data){
			if (data['success']) {
				location.reload();
				//alert("success");
				$('#loginAdmin').hide();

				//$('#registerBox').hide();
				//$('#displayName').html(data['displayName']);
				//$('#userBox').setTimeout(300).show();
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
 * Додавання нового адміністратора
 */
function addAdmin() {
	var postData = getData('#newAdmin');

	$.ajax({
		type: 'POST',
		async: false,
		url: "/admin/addnewadmin/",
		data: postData,
		dataType: 'json',
		success: function(data){
			if (data['success']){
				location.reload();
			}
		}
	})

}