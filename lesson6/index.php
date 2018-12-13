<!--Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление. 
Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега <select>.-->
<?

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
</head>
<body>
    <form action="" method="POST">
        <input name="leftElem" type="text" value="<?=$_POST[leftElem]?>">
        <select name="doing">
            <option value="addition"> + </option>
            <option value="multiplication"> * </option>
            <option value="subtraction"> - </option>
            <option value="division"> / </option>
        </select>
        <input name="rightElem" type="text" value="<?=$_POST[rightElem]?>">
        <input name="send" type="submit" value=" = ">
        <input name="result" type="text" value="">    
    </form>
</body>
</html>