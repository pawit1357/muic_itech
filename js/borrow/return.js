var focusBarcode = true;
var dialog;
var brokenPrice = 0;
var brokenRemark;
var eqData = null;

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
//		if (focusBarcode) {
//			$('#barcode').focus();
//		}
//	});
	dialog = $('#dialog-form').dialog({
		autoOpen : false,
		 maxWidth:450,
         maxHeight: 300,
		height : 300,
		width : 450,
		modal : true,
		focus : function() {
			$("#broken-remark").val('');
			$("#broken-price").val('');
			$("#broken-save").focus();
//			$("#broken-remark").select();
		},
		close : function() {
			$('#barcode').focus();
			focusBarcode = true;
		}
	});
	$('#broken-save').on('click', (function(e) {
//		if (e.ctrlKey) {
//			return false;
//		}
//		if (e.keyCode == 13) {
			brokenPrice = $('#broken-price').val();
			brokenRemark = $('#broken-remark').val();
			appendEq(eqData);
			closeDialog();
//		}
	}));
});

function popupDialog() {
	dialog.dialog("open");
}
function closeDialog() {
	dialog.dialog("close");
}

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

	request
			.done(function(data) {
				var result;
				var positive = false;
				setReady();
				// alert(msg.id);
				if (typeof (data.id) !== 'undefined') {
					if (isRequest(data.equipment_type_list_id)) {
						result = data.equipment_type_list_name + ' no.'
								+ data.barcode + ' was added.';
						// appendEq(data);
						eqData = data;
						focusBarcode = false;
						popupDialog();
						positive = true;
					} else {
						result = data.equipment_type_name
								+ ' was not request by user.';
					}
				} else {
					result = 'Item not found.';
				}
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
	if (data != null) {
		if (!isNumber(brokenPrice)) {
			brokenPrice = 0;
		}
		
		var pTitle = "Broken Price : ";
		if (brokenPrice != 0) {
			if ($('#eq-item-' + data.id + '-fine').html() !== undefined) {
				if ($('#eq-val-broken-' + data.id).val() !== undefined) {
					$('#eq-val-broken-' + data.id).val(brokenPrice);
					$('#eq-val-remark-' + data.id).val(brokenRemark);
				}
				$('#eq-item-' + data.id + '-fine').html(
						pTitle + $('#eq-val-broken-' + data.id).val());

			} else {
			
				var brokenDiv = $('<div id="eq-item-' + data.id + '-fine">'
						+ pTitle + brokenPrice + '</div>');
				$('#eq-item-' + data.id + '-left').append(brokenDiv);
				$('#eq-item-' + data.id + '-left').append(
						'<input type="hidden" id="eq-val-broken-' + data.id
								+ '" name="brokenPrice[' + data.id
								+ ']" value="' + brokenPrice + '"><input type="hidden" id="eq-val-remark-' + data.id
								+ '" name="brokenRemark[' + data.id
								+ ']" value="' + brokenRemark + '">');
			}
			
		} else {
			
			if ($('#eq-item-' + data.id + '-fine').html() !== undefined) {
				$('#eq-item-' + data.id + '-fine').remove();
			}
			
			if ($('#eq-val-broken-' + data.id).val() !== undefined) {
				$('#eq-val-broken-' + data.id).remove();
				$('#eq-val-remark-' + data.id).remove();
			}
			
		}
		

		
		
		var item = $('#eq_item_req_' + data.id);
		// alert(data.id);
		item.prop('checked', true);
		returnCheckChange(data.equipment_type_list_id);
		brokenPrice = 0;
		eqData = null;
	}
}

function checkComplete(eqId) {
	var requestedQty = $('#eqs-' + eqId).val();
	if (checkNode(eqId) == requestedQty) {
		updateComplete(eqId);
	} else {
		updateIncomplete(eqId);
	}
}
function isNumber(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
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
			item.remove();
			checkComplete(eqId);
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

function returnCheckChange(eqId) {
	var allSuccess = true;
	var items = $('#eq-detail-' + eqId + ' input[type="checkbox"]');
	for ( var i = 0; i < items.length; i++) {
		if (!items[i].checked) {
			allSuccess = false;
		}
	}

	if (allSuccess) {
		updateComplete(eqId)
	} else {
		updateIncomplete(eqId)
	}
}
