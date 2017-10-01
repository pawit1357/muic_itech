function loadDatePicker(elementId) {
	$("#" + elementId + "").datepicker({
		dateFormat : 'dd-mm-yy'
	});
}

function getDateFormat(date, format) {
	var res = date.split("-");
	format = format.replace('dd', res[0]);
	format = format.replace('mm', res[1]);
	format = format.replace('yy', res[2]);
	return format;
}
