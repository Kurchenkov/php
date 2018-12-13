<?php
if(isset($_POST['x']) && isset($_POST['y']))

$result = $_POST['x'] + $_POST['y'];
$result = $_POST['x'] - $_POST['y'];
$result = $_POST['x'] * $_POST['y'];
$result = $_POST['x'] / $_POST['y'];


$result = "";

?>

<html>
<head>
<meta charset="utf-8">
<title>Делаем колькулятор</title>
</head>

<body>
<form method="post">
<input type="text" name="x"/>
<input type="text" name="y"/>
<input type="submit" value="="/>
<p><input type="submit" value="+"/>	
<input type="submit" value="-"/>
<input type="submit" value="*"/>
<input type="submit" value="/"/></p>
<?php echo $result; ?>
</form>	
</body>
</html>