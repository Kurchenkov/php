<!--Создать калькулятор, который будет определять тип выбранной пользователем операции,
ориентируясь на нажатую кнопку.-->
<?
    $x = $_POST[x];
    $y = $_POST[y];
    switch($_POST[sign]){
        case "+":
            $z = $x + $y;
            break;
        case "x":
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
            input[type="text"] {
                width: 35px;
                height: 20px;
            }
            input[type="submit"]{
                background-color: #fff;
            }
            input[type="submit"]:{
                background-color: #eee;
            }
        </style>
    </head>
    <body>
        <form action="" method="POST">
            <input name="x" type="text" value="<?=$x?>">
            <input name="sign" type="submit" value="+">
            <input name="sign" type="submit" value="x">
            <input name="sign" type="submit" value="-">
            <input name="sign" type="submit" value="/">
            <input name="y" type="text" value="<?=$y?>">
            <span>=</span>
            <input name="z" type="text" value="<?=$z?>">
        </form>
    </body>
    </html>