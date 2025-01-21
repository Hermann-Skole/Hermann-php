<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="number" name="alder1" placeholder="person 1">
        <input type="number" name="alder2" placeholder="person 2">
        <input type="submit">
    </form>
    <?php
        $alder1 = 1;
        $alder2 = 1;

        $alder1 = $_GET['alder1'];
        $alder2 = $_GET['alder2'];

        if ($alder1 > $alder2) {
            echo "Person 1 er eldst";
        } else if ($alder1 < $alder2) {
            echo "Person 2 er eldst";
        } else {
            echo "Personene er like gamle";
        }

    ?>
</body>
</html>
