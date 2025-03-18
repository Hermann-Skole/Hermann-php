<?php
    $servername = "localhost";
    $database = "kjaeledyr";
    $dbUser = "root";
    $dbPassord = "";

    // prøver å åpne en connection med databsen
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $dbUser, $dbPassord);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("Kunne ikke koble til databasen: " . $e->getMessage());
    };

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dyrId'])) {
    $dyrId = intval($_POST['dyrId']);

    $sql_slett = "DELETE FROM kjaeledyr WHERE id = :dyrId";
    $stmt = $conn->prepare($sql_slett);
    $stmt->bindParam(':dyrId', $dyrId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Dyret ble slettet.";
    } else {
        echo "Feil ved sletting.";
    }
}

// Send brukeren tilbake til hovedsiden
header("Location: ../index.php");
exit();
?>