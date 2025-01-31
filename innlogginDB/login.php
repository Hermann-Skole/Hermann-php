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

        // lager variabler for all infoen man trenger for databasen
        $servername = "localhost";
        $database = "innlogging";
        $dbUser = "root";
        $dbPassord = "";

        // prøver å åpne en connection med databsen
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $dbUser, $dbPassord);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){

        };
    ?>
</body>
</html>