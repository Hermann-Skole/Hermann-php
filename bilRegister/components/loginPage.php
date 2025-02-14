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
            <!-- form som poster til login.php med bruker info til å logge inn -->
            <form method="POST" action="php/login.php" class="space-y-4">
                <div>
                    <label for="brukernavn" class="block text-sm font-medium text-gray-300">Brukernavn</label>
                    <input type="text" name="brukernavn" id="brukernavn" placeholder="Brukernavn" class="mt-1 block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-gray-700 text-white">
                </div>
                <div>
                    <label for="passord" class="block text-sm font-medium text-gray-300">Passord</label>
                    <input type="password" name="passord" id="passord" placeholder="Passord" class="mt-1 block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-gray-700 text-white">
                </div>
                <div>
                    <input type="submit" value="Logg inn" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                </div>
            </form>

            <div class="mt-4 text-center">
            </div>
        </div>
    </div>
</body>
</html>