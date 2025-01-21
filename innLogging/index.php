<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logg inn</title>
</head>
<body>
    <form method="GET" action="">
        <input type="text" name="brukerNavn" placeholder="Bruker Navn">
        <input type="text" name="Passord" placeholder="Passord">
        <input type="submit">
    </form>

    <?php
        session_start();

        $riktigBruker = "Bruker";
        $riktigPassord = "Passord";

        // hvis en request er sendt
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // henter brukernavn og passord fra brukeren
            $brukerPassord = $_GET["Passord"];
            $brukerNavn = $_GET["brukerNavn"]; 

            // skjekker om brukernavn og passord er riktig
            if ($brukerPassord == $riktigPassord and strcasecmp($brukerNavn, $riktigBruker) == 0) {
                $_SESSION["innlogget"] = true;
                header("Location: velkommen.php");
                echo "du er logget inn";
            } else {
                echo "passord eller brukernavn er feil";
            };
        };
    ?>
</body>
</html>