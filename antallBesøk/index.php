<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>antall besøk</title>
</head>
<body>
    <?php
        session_start();

        if (!isset($_SESSION["antallBesok"])) {
            $_SESSION["antallBesok"] = 1;
            echo "du har besøkt siden $_SESSION[antallBesok] ganger";
        } else {
            $_SESSION["antallBesok"]++;
            echo "du har besøkt siden $_SESSION[antallBesok] ganger";
        }
    ?>
</body>
</html>