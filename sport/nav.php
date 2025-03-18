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
                    colors: {
                        accent: '#ec4899', // Pink color
                    },
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
        <div class="bg-gray-800 text-accent p-2 w-full sm:w-11/12 md:w-10/12 m-4 rounded-xl flex flex-col md:flex-row items-center py-4 shadow-lg">
            <div class="ml-4 space-x-4 flex items-center flex-grow mt-4 md:mt-0">
                <a href="index.php" class="mx-2">Hjem</a>
                <a href="medlemmer.php" class="mx-2">Medlemmer</a>
                <a href="registrering.php" class="mx-2">Registrering</a>
            </div>
        </div>
    </div>
</body>
</html>