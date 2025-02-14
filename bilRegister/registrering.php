<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrering</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <nav class="">
        <?php include 'components/nav.php'; ?>
    </nav>
    <?php   
        include 'components/skjekkInlogging.php';
    ?>

    <main>
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-gray-800 p-8 rounded shadow-md w-full max-w-5xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl mb-4">Registrer Kunde</h2>
                        <form action="php/registrerKunde.php" method="POST" class="space-y-4">
                            <label for="fornavn" class="block">fødsels nummer:</label>
                            <input type="text" id="fornavn" name="Fnr" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="fornavn" class="block">Fornavn:</label>
                            <input type="text" id="fornavn" name="fornavn" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="etternavn" class="block">Etternavn:</label>
                            <input type="text" id="etternavn" name="etternavn" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="adresse" class="block">Adresse:</label>
                            <input type="text" id="adresse" name="adresse" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="postnr" class="block">Postnr:</label>
                            <input type="text" id="postnr" name="postnr" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="tlf" class="block">Telefon:</label>
                            <input type="text" id="tlf" name="tlf" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="epost" class="block">Epost:</label>
                            <input type="email" id="epost" name="epost" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white py-2 px-4 rounded">Registrer Kunde</button>
                        </form>
                    </div>
                    <div class="text-center">
                        <h2 class="text-2xl mb-4">Registrer Bil</h2>
                        <form action="php/registrerBil.php" method="POST" class="space-y-4">
                            <label for="regnr" class="block">RegNr:</label>
                            <input type="text" id="regnr" name="regnr" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="type" class="block">Type:</label>
                            <input type="text" id="type" name="type" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="merke" class="block">Merke:</label>
                            <input type="text" id="merke" name="merke" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="farge" class="block">Farge:</label>
                            <input type="text" id="farge" name="farge" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="fnr" class="block">Fnr:</label>
                            <input type="text" id="fnr" name="fnr" required class="w-full p-2 rounded bg-gray-700 text-white">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white py-2 px-4 rounded">Registrer Bil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>