$(function() {

	// document.onkeypress=captureKeys;
	$('#barcode').focus();
	$('#barcode').bind('keydown', (function(e) {
		if (e.ctrlKey) {
			return false;
		}
		if (e.keyCode == 13) {
			// enter
			var code = $('#barcode').val();
			code = code.split(' ').join('');
			if (code != '') {
				prepare(code);
			}
			$('#barcode').val('');
		}
	}));
	
//	$('#barcode').blur(function() {
//		$('#barcode').focus();
//	});

});

function prepare(code) {
	var url = $('#base_url').val()
			+ "/index.php/AjaxRequest/GetEquipmentDetailByBarcode?tmp="
			+ new Date().getTime() + "&id=" + code;
	setWorking();
	// alert(url);
	var request = $.ajax({
		url : url,
		type : "GET",
		data : '',
		contentType : "application/json; charset=utf-8",
		dataType : "json",
	});

	request.done(function(data) {
		
		//alert(data.remain);
		if ( data.remain == null) {
		var result;
		var positive = false;
		setReady();

		if (typeof (data.id) !== 'undefined') {
			
			if (!isRequest(data.equipment_type_list_id)) {
				appendEqType(data.equipment_type_list_id, data.equipment_type_name,data.equipment_type_list_name);
			}
			result = data.equipment_type_list_name + ' no.' + data.barcode+ ' was added.';
			
			if (!isExists(data.id)) {
				appendEq(data);
				positive = true;
				
				//alert($('#countAddedItem').val().split(',').length+','+$('#eq-qt-' + data.equipment_type_list_id).html().trim());
				
				$('#countAddedItem').val($('#countAddedItem').val()+data.equipment_type_list_id+',')
				
			} else {
				result = "Item has been added."
			}
		} else {
			result = 'Item not found.';
		}
		}else{
			result = 'Item is not available.';
		}
		
		//$('#last-scan-result').html(data.equipment_type_list_id+','+data.equipment_type_list_name)
		$('#last-scan-result').html(result);
		if (positive) {
			setColorGreen();
		} else {
			setColorRed();
		}
	});

	request.fail(function(jqXHR, textStatus) {
		alert("Request failed: " + textStatus);
	});
	// alert(code);
}

function setWorking() {
	$('#barcode-status-text').html('Working');
	$('#barcode-status-area').removeClass('ready');
	$('#barcode-status-area').addClass('working');
}

function setReady() {
	$('#barcode-status-text').html('Ready')
	$('#barcode-status-area').removeClass('working');
	$('#barcode-status-area').addClass('ready');
}

function updateComplete(eqTypeId) {
	$('#eq-detail-head-' + eqTypeId).removeClass('incomplete');
	$('#eq-detail-head-' + eqTypeId).addClass('complete');
}
function updateIncomplete(eqTypeId) {
	$('#eq-detail-head-' + eqTypeId).removeClass('complete');
	$('#eq-detail-head-' + eqTypeId).addClass('incomplete');
}

function isRequest(eqTypeId) {
	var eqHead = $('#eq-detail-head-' + eqTypeId).html();
	if (typeof (eqHead) === 'undefined') {
		return false;
	} else {
		return true;
	}
}

function appendEq(data) {

	var isInclude = false;
	
	var eqQt = $('#eq-qt-' + data.equipment_type_list_id);
	
	if (typeof (eqQt.val()) === 'undefined') {
		isInclude = true;
	}else{
		if( parseInt($('#countAddedItem').val().split(',').length) > parseInt($('#eq-qt-' + data.equipment_type_list_id).html().trim())){
			isInclude = true;
		}else{
			isInclude = false;
		}
	}
	
	var itemHover = $('#eq-detail-' + data.equipment_type_list_id);
	var newItem = $('<div class="eq-item" id="eq-item-'+ data.id+ '"><div class="left">'
			+ 'Barcode number: '+data.barcode+((isInclude)? "*":"")
			+ '</div><div class="manage"><a class="removeBtn" href="javascript:remove('
			+ data.id + ', ' + data.equipment_type_list_id
			+ ')"> </a><input type="hidden" id="eq_item_req_' + data.id
			+ '" name="eq_item[' + data.id + ']" value="'
			+ data.equipment_type_list_id
			+ '"></div><div class="clear"></div></div>');
	itemHover.append(newItem);
	checkComplete(data.equipment_type_list_id)
}

function appendEqType(eqTypeId, eqTypeName,equipment_type_list_name) {
	$('#equipmentList').append('<input type="hidden" name="eqids[' + eqTypeId + ']" value="'+ eqTypeId + '">');
	$('#equipmentList').append('<input type="hidden" id="eqs-' + eqTypeId + '" value="' + 1 + '">');
	$('#equipmentList').append('<div class="eq-detail-p incomplete" id="eq-detail-head-'+ eqTypeId + '"></div>');
	$('#eq-detail-head-' + eqTypeId).append('<div class="item-detail-left">' + eqTypeName + ' >> '+equipment_type_list_name+' </div>');
	$('#eq-detail-head-' + eqTypeId).append('<div class="clear"></div>');
	$('#eq-detail-head-' + eqTypeId).append('<div	id="eq-detail-' + eqTypeId + '"></div>');
}

function checkComplete(eqId) {
	var requestedQty = $('#eqs-' + eqId).val();
	if (checkNode(eqId) == requestedQty) {
		updateComplete(eqId);
	} else {
		updateIncomplete(eqId);
	}
}

function checkNode(eqId) {
	var count = $('#eq-detail-' + eqId + ' div[class="eq-item"]').length;
	return count;
}

function isExists(itemId) {
	var itemVal = $('#eq_item_req_' + itemId);
	if (typeof (itemVal.val()) === 'undefined') {
		return false;
	} else {
		return true;
	}
}

function remove(itemId, eqId) {
	if (confirm('Confirm to remove.')) {
		var item = $('#eq-item-' + itemId);
		if (typeof (item.html()) !== 'undefined') {
			
			
			$('#countAddedItem').val( $('#countAddedItem').val().replace(eqId+',',''))
			
			item.remove();
			checkComplete(eqId);
		}
	}
}
function deleteEq(eq) {
	if (confirm('Confirm remove?')) {
		var item = $('#eq-detail-head-'+eq);
		if (typeof (item.val()) !== "undefined") {
			item.remove();
			$('#equipmentListDelete').append('<input type="hidden" name="eqTypeIdDelete[' + eq + ']" value="'+ eq + '">');
		}
	}
}
function setColorRed() {
	$('#last-scan-result').removeClass('green');
	$('#last-scan-result').addClass('red');
}

function setColorGreen() {
	$('#last-scan-result').removeClass('red');
	$('#last-scan-result').addClass('green');
}
