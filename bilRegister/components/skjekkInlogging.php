<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(!$_SESSION['innlogging'] && $_SESSION['innlogging'] === false){
            header("location: index.php");
        }
    ?>
</body>
</html>