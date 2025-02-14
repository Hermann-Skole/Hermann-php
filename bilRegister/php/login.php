<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php
        session_start();

        // lager variabler for all infoen man trenger for databasen
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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputNavn = $_POST['brukernavn'];
            $inputPassord = $_POST['passord'];
        
            $sql = "SELECT * FROM brukere WHERE brukernavn = ? AND passord = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$inputNavn, $inputPassord]);
        
            if ($stmt->rowCount() > 0) {
                $_SESSION['innlogging'] = true;
                
                $sqlAdmin = "SELECT administrator FROM brukere WHERE brukernavn = ?";
                $stmtAdmin = $conn->prepare($sqlAdmin);
                $stmtAdmin->execute([$inputNavn]);
                $admin = $stmtAdmin->fetch();

                if ($admin['administrator'] == 1) {
                    $_SESSION['admin'] = true;
                } else {
                    $_SESSION['admin'] = false;
                }

                $errorMelding = "$inputNavn logget inn med passordet: $inputPassord";
                $errorType = "success";
                $sqlerror = "INSERT INTO logg (type ,brukernavn, errormelding) VALUES (?, ?, ?)";
                $stmterror = $conn->prepare($sqlerror);
                $stmterror->execute([$errorType, $inputNavn, $errorMelding]);

                header('Location: ../index.php');
                exit;
            } else {
                $errorMelding = "kunne ikke logge inn på $inputNavn med passordet: $inputPassord";
                $errorType = "error";
                $sqlerror = "INSERT INTO logg (type ,brukernavn, errormelding) VALUES (?, ?, ?)";
                $stmterror = $conn->prepare($sqlerror);
                $stmterror->execute([$errorType, $inputNavn, $errorMelding]);

                header("location: ../index.php");
            }
        }
    ?>
</body>
</html>