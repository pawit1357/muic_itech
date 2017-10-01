<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once dirname(__FILE__).'/protected/extensions/phpexcelreader/excel_reader2.php';
$data = new Spreadsheet_Excel_Reader("Template_Equipment_20141108-1.xls");

$num_row = $data->rowcount() + 1;
?>
<table border="1">
<tr>    
<th>Code</th>    
</tr>
<?php
while($index != $num_row){
if($index>1){
if($data->val($index, 'F') != ""){
	?>
<tr>
	<td><?php echo "[ ".$data->val($index, 'F')." ] ".$data->val($index, 'B').">>".$data->val($index, 'D'); ?><br><img src="http://chart.apis.google.com/chart?cht=qr&chs=90x90&chl=<?php echo $data->val($index, 'F'); ?>" alt=\"testing\" /></td>
</tr>
<?php
}}
$index++;
}
?>
</table>
<html>
<head>
<style>
table.excel {
	border-style: ridge;
	border-width: 1;
	border-collapse: collapse;
	font-family: sans-serif;
	font-size: 12px;
}

table.excel thead th,table.excel tbody th {
	background: #CCCCCC;
	border-style: ridge;
	border-width: 1;
	text-align: center;
	vertical-align: bottom;
}

table.excel tbody th {
	text-align: center;
	width: 20px;
}

table.excel tbody td {
	vertical-align: bottom;
}

table.excel tbody td {
	padding: 0 3px;
	border: 1px solid #EEEEEE;
}
</style>
</head>

<body>
	<?php //echo $data->dump(true,true); ?>
</body>
</html>
