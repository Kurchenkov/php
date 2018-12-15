<!--Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление. 
Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега <select>.-->
<?
    if(isset($_POST)){
        $sign = $_POST[run];
    } else{
        $sign = "";
    }
    $x = $_POST[x];
    $y = $_POST[y];


    switch($_POST[run]){
        case "+":
            $z = $x + $y;
            break;
        case "*":
            $z = $x * $y;
            break;
        case "-":
            $z = $x - $y;
            break;
        case "/":
            if($y != 0){
                $z = $x / $y;    
            } else {
                $z = "Error";    
            }
            break;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calc</title>
    <style>
        input[type="text"]{
            width: 35px;
            height: 20px;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <input name="x" type="text" value="<?=$x?>">
        <select name="run">
            <option> <?=$sign?> </option>
            <option value="+"> + </option>
            <option value="*"> * </option>
            <option value="-"> - </option>
            <option value="/"> / </option>
        </select>
        <input name="y" type="text" value="<?=$y?>">    
        <input name="send" type="submit" value=" = ">
        <input name="z" type="text" value="<?=$z?>">    
    </form>
</body>
</html>