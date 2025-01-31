<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>volum eske</title>
</head>
<body>
    <form method="get" action="">
        <input type="number" name="lengde" placeholder="lengde">
        <input type="number" name="bredde" placeholder="bredde">
        <input type="number" step="0.000001" name="steps" placeholder="antall steg">
        <input type="submit" value="send inn">
    </form>
    <?php
        function regneUt($hoyde, $lengde, $bredde){
            $breddeEtter = $bredde - ($hoyde * 2);
            $lengdeEtter = $lengde - ($hoyde * 2);
            $volum = $hoyde * $lengdeEtter * $breddeEtter;

            return $volum;
        };
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $lengde = $_GET['lengde'];
            $bredde = $_GET['bredde'];
            $antallSteps = $_GET['steps'];
            $hoyesteSvar = 0;
            $hoyesteHoyden = 0;
            for ($i = 0; $i <= (($lengde > $bredde) ? $bredde/2 : $lengde/2); $i += $antallSteps){
                $svar = regneUt($i, $lengde, $bredde);
                echo "hvis høyden er: $i cm blir volumet: $svar cm <br>";
                if ($svar >= $hoyesteSvar) {
                    $hoyesteSvar = $svar;
                    $hoyesteHoyden = $i;
                };
            };

            echo "det største volumet er $hoyesteSvar når høyden er $hoyesteHoyden";
        };
    ?>
</body>
</html>