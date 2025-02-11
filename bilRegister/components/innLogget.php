<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
        <div class="bg-gray-800 p-8 rounded shadow-md w-full max-w-sm">
            <div class="text-center">
                <?php

                    // skjekker om brukeren er logget inn ved å se om en innlogging variabel i session finnes og er true
                    if(isset($_SESSION['innlogging']) && $_SESSION['innlogging'] === true){
                        echo "<span class='text-green-400'>Du er logget inn</span>";
                    } else {
                        echo "<span class='text-red-400'>Du er ikke logget inn</span>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>