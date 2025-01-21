<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tippe Spill</title>
</head>
<body>
    <form action="" method="GET">
        <input type="text" name="brukerSvar">
        <input type="submit" value="Send Svar">
    </form>
    <?php
        session_start();
        if (!isset($_SESSION['tallet'])) {
            $tallet = rand(1,10);
            $_SESSION['tallet'] = $tallet;
            $_SESSION['antallForsok'] = 1;
        };
        $tallet = $_SESSION['tallet'];
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $brukerSvar = $_GET['brukerSvar'];
            if($tallet < $brukerSvar) {
                echo "tallet er lavere";
                $_SESSION['antallForsok'] = $_SESSION['antallForsok']+1;
            } elseif ($tallet > $brukerSvar) {
                echo "tallet er høyere";
                $_SESSION['antallForsok'] = $_SESSION['antallForsok']+1;
            } else {
                $_SESSION['antallForsok'] = $_SESSION['antallForsok']+1;
                echo "Riktig tallet var $tallet, du brukte $_SESSION[antallForsok] forsøk";
                session_destroy();
                echo "<br> <form action='' method='post'> <input type='submit' name='start' value='start på nytt' /> </form>";
                if (isset($_POST['start'])) {
                    header('location: index.php');
                }
            }
        }
    ?>
</body>
</html>