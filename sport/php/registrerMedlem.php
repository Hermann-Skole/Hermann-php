<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include 'contactDb.php';

        $betalt = isset($_POST['betalt']) ? 1 : 0;

        $sql_reg = "INSERT INTO medlem (m_nr, fornavn, etternavn, adresse, postnr, fodt, telefon, mail, betalt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $conn->prepare($sql_reg);
        $statement->execute([
            $_POST['m_nr'], 
            $_POST['fornavn'], 
            $_POST['etternavn'], 
            $_POST['adresse'], 
            $_POST['postnr'], 
            $_POST['fodt'], 
            $_POST['tlf'], 
            $_POST['mail'],
            $betalt
        ]);

        $_SESSION['fullfort'] = true;
        
        header("location: ../medlemmer.php");
    }
?>
