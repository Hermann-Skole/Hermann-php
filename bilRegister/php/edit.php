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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Fnr'])) {
    // Hent data fra skjemaet
    $fnr = $_POST['Fnr'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $adresse = $_POST['adresse'];
    $postnr = $_POST['postnr'];
    $tlf = $_POST['tlf'];
    $epost = $_POST['epost'];
    
    // Oppdater data i databasen
    $sql = "UPDATE kunder SET fornavn = :fornavn, etternavn = :etternavn, adresse = :adresse, 
            postnr = :postnr, tlf = :tlf, epost = :epost WHERE Fnr = :Fnr";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':fornavn', $fornavn);
    $stmt->bindParam(':etternavn', $etternavn);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':postnr', $postnr);
    $stmt->bindParam(':tlf', $tlf);
    $stmt->bindParam(':epost', $epost);
    $stmt->bindParam(':Fnr', $fnr);

    if ($stmt->execute()) {
        // Hvis oppdateringen er vellykket, send tilbake til oversikten
        header("Location: ../admin.php");
        exit;
    } else {
        echo "Feil ved oppdatering av kundeinformasjon.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['regnr'])) {
    // Get car data from the form
    $regnr = $_POST['regnr'];
    $type = $_POST['type'];
    $merke = $_POST['merke'];
    $farge = $_POST['farge'];
    $fnr = $_POST['fnr'];
    
    // Update data in database
    $sql = "UPDATE biler SET Type = :type, Merke = :merke, Farge = :farge, 
            Fnr = :fnr WHERE RegNr = :regnr";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':merke', $merke);
    $stmt->bindParam(':farge', $farge);
    $stmt->bindParam(':fnr', $fnr);
    $stmt->bindParam(':regnr', $regnr);

    if ($stmt->execute()) {
        header("Location: ../admin.php");
        exit;
    } else {
        echo "Feil ved oppdatering av bilinformasjon.";
    }
}


// Send brukeren tilbake til hovedsiden
header("Location: ../admin.php");
exit();
?>