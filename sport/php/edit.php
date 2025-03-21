<?php
    include 'contactDb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fornavn'])) {
    // Get member data from the form
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $adresse = $_POST['adresse'];
    $postnr = $_POST['postnr'];
    $poststed = $_POST['poststed'];
    $fodt = $_POST['fodt'];
    $telefon = $_POST['telefon'];
    $mail = $_POST['mail'];
    $betalt = $_POST['betalt'];
    $m_nr = $_POST['m_nr'];
    
    // Update data in database
    $sql = "UPDATE medlem SET fornavn = :fornavn, etternavn = :etternavn, adresse = :adresse, 
            postnr = :postnr, fodt = :fodt, telefon = :telefon, 
            mail = :mail, betalt = :betalt WHERE m_nr = :m_nr";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':fornavn', $fornavn);
    $stmt->bindParam(':etternavn', $etternavn);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':postnr', $postnr);
    $stmt->bindParam(':fodt', $fodt);
    $stmt->bindParam(':telefon', $telefon);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':betalt', $betalt);
    $stmt->bindParam(':m_nr', $m_nr);

    if ($stmt->execute()) {
        header("Location: ../medlemmer.php");
        exit;
    } else {
        echo "Feil ved oppdatering av medlemsinformasjon.";
    }
}

// Send brukeren tilbake til hovedsiden
header("Location: ../medlemmer.php");
exit();
?>