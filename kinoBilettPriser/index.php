<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kino Bilett Priser</title>
</head>
<body>
    <form method="GET">
        <label for="over18">skriv antall personer som er over 17 år</label>
        <input type="number" name="over18"> <br>

        <label for="13til17">skriv antall personer mellom 13 og 17 år</label>
        <input type="number" name="13til17"> <br>

        <label for="2til12">skriv antall personer mellom 2 og 1 år</label>
        <input type="number" name="2til12"> <br>

        <label for="under2">skriv antall personer under 2 år</label>
        <input type="number" name="under2"> <br>

        <input type="submit" value="skjekk pris">
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $over18 = (int) $_GET["over18"];
            $fra13til17 = (int) $_GET["13til17"];
            $fra2til12 = (int) $_GET["2til12"];
            $under2 = (int) $_GET["under2"];
            
            $pris = (($over18 * 150) + ($fra13til17 * (150/2)) + ($fra2til12 * (150/4)));

            echo "bilettene vil koste: $pris";
        };
    ?>
</body>
</html>