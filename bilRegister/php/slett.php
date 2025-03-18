<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idKunder'])) {
    $idKunder = $_POST['idKunder'];

    $sql_slett_biler = "DELETE FROM biler WHERE Fnr = :idKunder";
    $stmt_biler = $conn->prepare($sql_slett_biler);
    $stmt_biler->bindParam(':idKunder', $idKunder, PDO::PARAM_INT);
    $stmt_biler->execute();

    $sql_slett = "DELETE FROM kunder WHERE Fnr = :idKunder";
    $stmt = $conn->prepare($sql_slett);
    $stmt->bindParam(':idKunder', $idKunder, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "kunden ble slettet.";
    } else {
        echo "Feil ved sletting.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idBiler'])) {
    $idBiler = $_POST['idBiler'];

    $sql_slett = "DELETE FROM biler WHERE RegNr = :idBiler";
    $stmt = $conn->prepare($sql_slett);
    $stmt->bindParam(':idBiler', $idBiler, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "kunden ble slettet.";
    } else {
        echo "Feil ved sletting.";
    }
}


// Send brukeren tilbake til hovedsiden
header("Location: ../admin.php");
exit();
?>