<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>volum eske</title>
</head>
<body>
    <!-- <form method="get" action="">
        <input type="number" name="hoyde">
    </form> -->
    <?php
        function regneUt($hoyde){
            $bredde = 29.7 - ($hoyde * 2);
            $lengde = 21 - ($hoyde * 2);
            $volum = $hoyde * $lengde * $bredde;

            return $volum;
        };
        for ($i = 0; $i <= 10; $i += 0.1){
            $svar = regneUt($i);
            echo "hvis høyden er: $i cm blir volumet: $svar cm <br>";
        };


        // if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        // }
    ?>
</body>
</html>