var listArea;
var noItem;
$(function() {
	listArea = $('#equipmentList');
	noItem = $('<div><i>- no item found -</i></div>');
	listArea.append(noItem);
	$('#add_equipment').click(function() {
		addEquipment()
	});
});

function addEquipment() {
	var eq = $('#equipment_type').val();
	var eqDetail = $('#equipment_type_list_id').val();
	var eqText = $('#equipment_type option:selected').text();
	var eqDetailText = $('#equipment_type_list_id option:selected').text();
	var qt = $('#EquipmentTypeQty').val();
	if (eq == '' || qt == '' || qt < 1) {
		alert("Please select equipment and quantity must be more than 0.");
	} else {
		deleteEqNoAlert(eqDetail);
		if (appendItem(eq,eqDetail, qt, eqText,eqDetailText)) {
			noItem.hide();
			$('#equipment_type').val('');
			$('#equipment_list').html('<select name=\"equipment_type_list\" id=\"equipment_type_list\" ><option value=\"\">-Select-</option></select>');
			$('#EquipmentTypeQty').val('');
			$('#equipment_remain').html('');
		}
	}
}

function appendItem(eq,eqDetail, qt, eqText,eqDetailText) {
	var exItem = $('#eq-' + eqDetail);
	if ( typeof (exItem.val()) == "undefined") {
		var newItem = $('<div class="eq-detail" id="item-'
				+ eqDetail
				+ '"><div class="item-detail-left">'
				+ eqText+'>>'+eqDetailText
				+ '</div><div id="qt-'
				+ eqDetail
				+ '" class="item-detail-right">'
				+ qt
				+ '</div><div class="item-detail-manage"><a href="javascript:deleteEq(\''
				+ eqDetail + '\')"> </a></div><input type="hidden" name="eqs[' +  eq+','+eqDetail
				+ ']" id="eq-' + eqDetail + '" value="' + qt
				+ '"><div class="clear"></div></div>');
		listArea.append(newItem);
		exItem = $('#' + eqDetail);
	} else {
		var newQty = (parseInt(exItem.val()) + parseInt(qt));
		var exQty = $('#qt-' + eqDetail);
		exItem.val(newQty);
		exQty.html(newQty);
	}
	return true;
}

function deleteEq(eq) {
	if (confirm('Confirm remove?')) {
		var item = $('#item-' + eq);
		if (typeof (item.val()) !== "undefined") {
			item.remove();
		}
	}
}
function deleteEqNoAlert(eq) {
//	if (confirm('Confirm remove?')) {
		var item = $('#item-' + eq);

		if (typeof (item.val()) !== "undefined") {
			item.remove();
		}
//	}
}