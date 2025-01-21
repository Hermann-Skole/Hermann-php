<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if ($_SESSION["innlogget"] = true) {
        echo "Du er logget inn";
        echo "
        <form method='POST'>
            <input type='submit' value='Logg Ut' name='loggUt'>
        </form>";
        } else {
        echo "Du er ikke logget inn";
        }
       if(array_key_exists('loggUt', $_POST)) {
        $_SESSION["innlogget"] = false;
        session_destroy();
       }
    ?>
</body>
</html>