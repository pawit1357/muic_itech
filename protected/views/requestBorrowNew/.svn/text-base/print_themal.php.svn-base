<html>
<head>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(function() {
	window.print();	
	window.close();	
});
</script>
<?php 
$userLogin = $data->user_login;
$personInfo = $data->user_login->user_information;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Receipt</title>
</head>

<style type="text/css">
table {
	background-color: #ffffff;
	color: #000000;
	font-family: Arial;
	font-size: 8pt;
	border-collapse: collapse;
	table-layout: fixed;
	width: 200px;
}

table td {
	background-color: #ffffff;
	color: #000000;
	font-family: Arial;
	font-size: 8pt;
	border: solid 0px #fab;
	width: 50px;
	word-wrap: break-word;
}
</style>
<body>
	<table width="<?php echo $width?>">
		<tr>
			<td align="center"><font size="4"><b>Equipment borrowing request form</b>
			</font></td>
		</tr>
		<tr>
			<td align="right"><font size="2"><?php echo date("d")?>/<?php echo date("m")?>/<?php echo date("Y")?>
			</font></td>
		</tr>
		<tr>
			<td align="left"><font size="2">Name: <?php echo $personInfo->personal_title.$personInfo->first_name.' '.$personInfo->last_name ?>

			</font>
			</td>
		</tr>
				</tr>
				<tr>
			<td>..........................................................</td>
		</tr>
		<tr>
			<td>List of item:</td>
		</tr>
				<tr>
			<td>..........................................................</td>
		</tr>
	</table>
	<table>

		<?php 
		$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model()->findAll(array('condition'=>"request_borrow_id = '".$data->id."'"));
		$count = 1;
		if(count($requestBorrowEquipmentTypes) > 0) {

					foreach($requestBorrowEquipmentTypes as $requestBorrowEquipmentType){
						$requestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model()->findAll(array('condition'=>"request_borrow_equipment_type_id = '".$requestBorrowEquipmentType->id."'"));
						if(count($requestBorrowEquipmentTypeItems) > 0) {
							foreach($requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem){
?>
		<tr>
			<td><?php echo $requestBorrowEquipmentTypeItem->equipment->name?>
			</td>
			<td align="center"><?php echo $requestBorrowEquipmentTypeItem->equipment->barcode?>
			</td>
		</tr>

		<?php
							}
						}else{
?>
		<tr>
			<td><?php echo $requestBorrowEquipmentType->equipment_type_list->name?>
			</td>
			<td align="center">-</td>
		</tr>

		<?php
						}
					}
				}
				?>


	</table>
</body>
</html>
