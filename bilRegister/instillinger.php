<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instillinger</title>
</head>
<body>
    
    <nav class="">
        <?php include 'components/nav.php'; ?>
    </nav>
    <?php   
        include 'components/skjekkInlogging.php';
    ?>

    <main>
        <?php
            if (isset($_SESSION['innlogging']) && $_SESSION['innlogging'] === true){
                include 'components/innLogget.php';
            } else {
                include 'components/loginPage.php';
            }
            
        ?>
    </main>
</body>
</html>