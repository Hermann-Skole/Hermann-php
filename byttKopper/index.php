<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $kopp1 = 1;
        $kopp2 = 2;
        $tempKopp = null;

        echo "Før bytte: <br>";
        echo "Kopp 1: $kopp1 <br> kopp 2: $kopp2 <br> <br>";

        $tempKopp = $kopp1;
        $kopp1 = $kopp2;
        $kopp2 = $tempKopp;
        
        echo "Etter bytte: <br>";
        echo "Kopp 1: $kopp1 <br> kopp 2: $kopp2 <br>";
    ?>
</body>
</html>