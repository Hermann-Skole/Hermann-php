<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    screens: {
                        'sm': '640px',
                        'md': '768px',
                        'lg': '1024px',
                        'xl': '1280px',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-900">
    <div class="w-full flex justify-center">
        <div class="bg-gray-800 text-white p-2 w-full sm:w-11/12 md:w-10/12 m-4 rounded-xl flex flex-col md:flex-row items-center py-4 shadow-lg">
            <a href="index.php">
                <img src="images/bilregister-logo.png" alt="" class="w-32 h-auto object-contain ml-2">
            </a>
            <div class="ml-4 space-x-4 flex items-center flex-grow mt-4 md:mt-0">
                <a href="bilRegister.php" class="mx-2">Bilregister</a>
                <a href="kunder.php" class="mx-2">Kunder</a>
                <a href="registrering.php" class="mx-2">Registrering</a>
                <a href="instillinger.php" class="mx-2">Instillinger</a>
                <?php
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                        echo "<a href='admin.php' class='mx-2 text-indigo-600'>Admin</a>";
                    }
                ?>
            </div>
            <?php
                if(isset($_SESSION['innlogging']) && $_SESSION['innlogging'] === true){
                    echo " 
                    <form method='POST' action='logout.php' class='bg-indigo-600 p-2 rounded-md mx-2 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-4 md:mt-0'>
                    <input type='submit' value='Logg ut'>
                    </form>
                    ";
                } 
            ?>
            
        </div>
    </div>
</body>
</html>