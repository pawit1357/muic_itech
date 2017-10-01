<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="UsingSheet.xls"');#ชื่อไฟล์
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>					
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<?php echo $content; ?>
</body>
</html>