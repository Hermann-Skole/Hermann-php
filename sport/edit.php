<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediger Medlem</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav>
        <?php include 'nav.php'; ?>
    </nav>

    <div class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
        <div class="bg-gray-800 p-8 rounded shadow-md w-full max-w-7xl">
            <?php
                include 'php/contactDb.php';

                if (isset($_POST['idMedlemmer'])) {
                    $idMedlemmer = $_POST['idMedlemmer'];
                
                    $sql_Medlemmer = "SELECT m_nr, fornavn, etternavn, adresse, postnr, fodt, telefon, mail, betalt FROM medlem WHERE m_nr = :idMedlemmer;";
                    $statment_Medlemmer = $conn->prepare($sql_Medlemmer);
                    $statment_Medlemmer->bindParam(':idMedlemmer', $idMedlemmer, PDO::PARAM_STR);
                    $statment_Medlemmer->execute();
                    $medlem = $statment_Medlemmer->fetchAll();
            ?>
            
            <div class="text-center">
                <h1 class="text-2xl font-bold mb-6">Rediger Medlem</h1>
                <form action="php/edit.php" method="POST" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="m_nr" class="block">Medlemsnummer:</label>
                            <input value="<?php echo $medlem[0]['m_nr']; ?>" type="number" id="m_nr" name="m_nr" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="fornavn" class="block">Fornavn:</label>
                            <input value="<?php echo $medlem[0]['fornavn']; ?>" type="text" id="fornavn" name="fornavn" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="etternavn" class="block">Etternavn:</label>
                            <input value="<?php echo $medlem[0]['etternavn']; ?>" type="text" id="etternavn" name="etternavn" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="adresse" class="block">Adresse:</label>
                            <input value="<?php echo $medlem[0]['adresse']; ?>" type="text" id="adresse" name="adresse" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="postnr" class="block">Postnummer:</label>
                            <input value="<?php echo $medlem[0]['postnr']; ?>" type="text" id="postnr" name="postnr" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="fodt" class="block">Fødselsdato:</label>
                            <input value="<?php echo $medlem[0]['fodt']; ?>" type="date" id="fodt" name="fodt" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="telefon" class="block">Telefon:</label>
                            <input value="<?php echo $medlem[0]['telefon']; ?>" type="tel" id="telefon" name="telefon" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="mail" class="block">Epost:</label>
                            <input value="<?php echo $medlem[0]['mail']; ?>" type="email" id="mail" name="mail" required class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div>
                            <label for="betalt" class="block text-sm font-medium text-gray-300">Betalt</label>
                            <input type="checkbox" id="betalt" name="betalt" value="1" <?php echo ($medlem[0]['betalt'] == 1 ? 'checked' : ''); ?> class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                    </div>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white py-2 px-4 rounded mt-4">Oppdater Medlem</button>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>