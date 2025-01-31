<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- form som poster til login.php med bruker info til å logge inn -->
    <form method="POST" action="login.php">
        <input type="text" name="brukernavn" placeholder="Brukernavn"> 
        <input type="text" name="passord" placeholder="passord">
        <input type="submit" value="Logg inn">
    </form>

    <!-- form til å logge ut ved å bli sendt til logout.php -->
    <form method="POST" action="logout.php">
        <input type="submit" value="Logg ut">
    </form>

    <?php
        session_start();

        // skjekker om brukeren er logget inn ved å se om en innlogging variabel i session finnes og er true
        if(isset($_SESSION['innlogging']) && $_SESSION['innlogging'] === true){
            echo "du er logget inn";
        } else {
            echo "du er ikke logget inn";
        }
    ?>
</body>
</html>