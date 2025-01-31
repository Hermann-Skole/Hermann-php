<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>velkommen</title>
</head>
<body>
    <?php
        session_start();

        if (!isset($_SESSION['navn'])){
            $_SESSION['navn'] = "Ola Nordmann";
            $_SESSION['alder'] = 25;
            $_SESSION['epost'] = "ola@example.com";
        }; 

        $navn = $_SESSION['navn'];

        echo "Velkommen $navn";
    ?>
    <a href="profil.php">
        <button>Min Profil</button>
    </a>
</body>
</html>