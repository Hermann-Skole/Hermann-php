<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="svar" placeholder="svar">
        <input type="submit">
        <?php
            session_start();

            // skjekker om antSpors ikke er satt
            if (!isset($_SESSION['antSpors'])) {
                $_SESSION['antSpors'] = 0;
                $_SESSION['antallRiktige'] = 0;
            }

            // henter verdien fra sessionen
            $antSpors = $_SESSION['antSpors'];
            $antallRiktige = $_SESSION['antallRiktige'];

            // setter 2 arrayer som er spørmålene og svarene
            $sporsmal = array(
                "Hva er hovedstaten i Norge? ",
                "Hva heter den norske nasjonal dagen? ",
                "Hvilket dyr er avbildet på Norges riksvåpen? ",
                "Hva er Norges største innsjø? ",
                "Hvilket fjell er det høyeste i Norge? ",
                "Hvilket hav grenser Norge til i vest? ",
                "Hvilken by er kjent som Norges oljehovedstad? ",
                "Hva heter den norske valutaen? ",
                "Hvilket norsk fylke er det nordligste? ",
                "Hva heter Norges største øy? "
            );
            $svar = array(
                "oslo",
                "17. mai",
                "Løve",
                "Mjøsa",
                "Galdhøpiggen",
                "Atlanterhavet",
                "Stavanger",
                "Krone",
                "Finnmark",
                "Svalbard"
            );

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $brukerSvar = $_POST['svar'];

                // skjekker om svaret er riktig uten at det er case sensitiv
                if (strcasecmp($brukerSvar, $svar[$antSpors]) == 0) {
                    echo "Riktig svar <br>";
                    $antallRiktige++;
                } else {
                    echo "Feil svar <br>";
                }
                // teller antal spørsmål brukeren har gjort
                $antSpors++;

                // lagrer spørsmålet bruker er på i sessionen og antall riktige de har
                $_SESSION['antSpors'] = $antSpors;
                $_SESSION['antallRiktige'] = $antallRiktige;
            }

            // skjekker om brukeren ennå har spørsmål igjen, hvis ikke printer den antall riktige og destroyer session
            if ($antSpors < count($sporsmal)) {
                echo $sporsmal[$antSpors];
            } else {
                echo "Ingen flere spørsmål. Du fikk $antallRiktige av 10 riktige svar.";
                session_destroy();
            }
        ?>
    </form>
</body>
</html> 


