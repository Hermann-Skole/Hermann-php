<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="">
        <?php include '../components/nav.php'; ?>
    </nav>
    <?php   
        include '../components/skjekkInlogging.php';
    ?>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servername = "localhost";
            $database = "bilregister";
            $dbUser = "root";
            $dbPassord = "";

            // prøver å åpne en connection med databsen
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $dbUser, $dbPassord);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                die("Kunne ikke koble til databasen: " . $e->getMessage());
            };

            $sql_reg = "INSERT INTO kunder (Fnr, fornavn, etternavn, adresse, postnr, epost, tlf) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $statment = $conn->prepare($sql_reg);
            $statment->execute([$_POST['Fnr'], $_POST['fornavn'], $_POST['etternavn'], $_POST['adresse'], $_POST['postnr'], $_POST['epost'], $_POST['tlf']]);

            $_SESSION['fullfort'] = true;

            header("location: ../registrering.php");
        };
    ?>
</body>
</html>