<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <style>
        .container{
            width: 450px;
            margin: 10% auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .block{
            display: flex;
            align-items: center;
            justify-content: space-around;
            margin-bottom: 30px;
            width: 140px;
            height: 125px;
        }
    </style>
</head>
<body>
    <div class="container"> 
    <?
        include "config.php";
        $sql = "select * from gallery";
        $result = mysqli_query($connect, $sql);
        while($data = mysqli_fetch_assoc($result)) { ?>
            <div class="block">
                <a href="big/<?=$data[id]?>.jpg" target="_blank">
                    <img src="<?=$data[path]?>" alt="stone">
                </a>
            </div>
        <? } ?>
    </div>
</body>
</html>