<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer Kunde</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<main>
    <?php include 'nav.php'; ?>
    <div class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
        <div class="bg-gray-800 p-8 rounded shadow-md w-full max-w-7xl">
            <div class="text-center">
                <h1 class="text-2xl font-bold mb-6">Registrer Ny Kunde</h1>
                <form action="php/registrerMedlem.php" method="POST" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="m_nr" class="block">Medlemms nummer:</label>
                            <input type="number" id="m_nr" name="m_nr"  class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="fornavn" class="block">Fornavn:</label>
                            <input type="text" id="fornavn" name="fornavn" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="etternavn" class="block">Etternavn:</label>
                            <input type="text" id="etternavn" name="etternavn" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="adresse" class="block">Adresse:</label>
                            <input type="text" id="adresse" name="adresse" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="postnr" class="block">Postnr:</label>
                            <input type="number" id="postnr" name="postnr" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="fodt" class="block">Fødselsdato:</label>
                            <input type="date" id="fodt" name="fodt" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="tlf" class="block">Telefon:</label>
                            <input type="tel" id="tlf" name="tlf" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="mail" class="block">Epost:</label>
                            <input type="email" id="mail" name="mail" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="betalt" class="block text-sm font-medium text-gray-300">Betalt</label>
                            <input type="checkbox" id="betalt" name="betalt" value="1" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                    </div>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white py-2 px-4 rounded mt-4">Registrer Kunde</button>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>
