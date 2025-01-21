<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="GET">
        <input type="number" name="tall">
        <input type="submit" value="send inn">
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $tall = $_GET['tall'];
            if($tall <= 0 and $tall >= 11){
                echo "tallet må være mellom 1 og 10";
            } else {
                for($i = 0; $i <= ($tall*10); $i+=$tall){
                    echo "$i <br>";
                };
            }
        };
    ?>  
</body>
</html>