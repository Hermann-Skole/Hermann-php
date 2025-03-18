<?php
    include 'contactDb.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idMedlemmer'])) {
        $idMedlemmer = $_POST['idMedlemmer'];

        $sql = "DELETE FROM medlem WHERE m_nr = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idMedlemmer]);

        if ($stmt->execute()) {
            echo "Medlemmet ble slettet.";
        } else {
            echo "Feil ved sletting.";
        }
    }

    // Send brukeren tilbake til hovedsiden
    header("Location: ../medlemmer.php");
    exit();
?>
