<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Min Profil</title>
</head>
<body>
    <?php
        session_start();

        $navn = $_SESSION['navn'];
        $alder = $_SESSION['alder'];
        $epost = $_SESSION['epost'];

        echo "navnet ditt er: $navn <br>" ;
        echo "eposten din er: $epost <br>";
        echo "alderen din er: $alder <br>";

        echo ($alder >= 18) ? "Du er myndig <br>" : "Du er ikke myndig ennå <br>";
    ?>
    <a href="rediger.php">
        <button>Rediger Info</button>
    </a>
    <a href="index.php">
        <button>Tilbake til hejmme side</button>
    </a>
</body>
</html>