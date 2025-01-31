<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediger Profil</title>
</head>
<body>
    <?php
        session_start();

        $navn = $_SESSION['navn'];
        $alder = $_SESSION['alder'];
        $epost = $_SESSION['epost'];

    
        if (isset($_GET['submitted'])){
            
            $navnInput = $_GET['navn'];
            $epostInput = $_GET['epost'];
            $alderInput = $_GET['alder'];
            if (mb_strlen($navnInput, "UTF-8") >= 2 && $alderInput >= 1 && $alderInput <= 120 && strpos($epostInput, "@") == true){
                $_SESSION['navn'] = $navnInput;
                $_SESSION['epost'] = $epostInput;
                $_SESSION['alder'] = $alderInput;

                if (!isset($_SESSION["antallEdits"])) {
                    $_SESSION["antallEdits"] = 1;
                } else {
                    $_SESSION["antallEdits"]++; 
                }

                header('location: profil.php');
            } else {
                echo (mb_strlen($navnInput, "UTF-8") <= 2) ? "navnet er for kort <br>" : "";
                echo ($alderInput < 1) ? "alderen er for liten <br>" : "";
                echo ($alderInput > 120) ? "alderen er for høy <br>" : "";
                echo (strpos($epostInput, "@") === false) ? "eposten er ikke ekte <br>" : "";
            };
        };
    
    ?>
    
    <form method='GET'>
        <input required type='text' name='navn' placeholder=<?php echo"'$navn'"; ?>> <br>
        <input required type='text' name='epost' placeholder=<?php echo"'$epost'"; ?>> <br>
        <input required type='number' name='alder' placeholder=<?php echo"'$alder'"; ?>> <br>
        <input type='submit' value='send inn' name='submitted'>
    </form>
    <a href="profil.php">
        <button>Tilbake til profil</button>
    </a>
    <?php echo (isset($_SESSION["antallEdits"])) ? "<br>du har redigert profilen $_SESSION[antallEdits] ganger" : ""; ?>
</body>
</html>