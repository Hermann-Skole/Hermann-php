<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
<nav class="">
        <?php include 'components/nav.php'; ?>
    </nav>
    <?php   
        include 'components/skjekkAdmin.php';
    ?>

    <?php
        if (isset($_POST['idKunder'])) {

            $idKunder = $_POST['idKunder'];

            $servername = "localhost";
            $database = "bilregister";
            $dbUser = "root";
            $dbPassord = "";

            // prøver å åpne en connection med databsen
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $dbUser, $dbPassord);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                die("Kunne ikke koble til databasen: " . $e->getMessage());
            };

            $sql_kunder = "SELECT kunder.Fnr, kunder.tlf, kunder.epost, kunder.fornavn, kunder.etternavn, kunder.adresse, kunder.postnr FROM kunder WHERE Fnr = :idKunder;";
            $statment = $conn->prepare($sql_kunder);
            $statment->bindParam(':idKunder', $idKunder, PDO::PARAM_INT);
            $statment->execute();
            $kunde = $statment->fetchAll();

            if (!$kunde) {
                die("Customer not found");
            }

            echo '
                <div class="text-center mb-8 text-white mx-[30rem]">
                    <h2 class="text-2xl mb-4">Registrer Kunde</h2>
                    <form action="php/edit.php" method="POST" class="space-y-4">
                        <label for="fornavn" class="block">Fødsels nummer:</label>
                        <input value="' . $kunde[0]["Fnr"] . '" type="number" id="fornavn" name="Fnr" required class="w-full p-2 rounded bg-gray-700 text-white">

                        <label for="fornavn" class="block">Fornavn:</label>
                        <input value="' . $kunde[0]["fornavn"] . '" type="text" id="fornavn" name="fornavn" required class="w-full p-2 rounded bg-gray-700 text-white">

                        <label for="etternavn" class="block">Etternavn:</label>
                        <input value="' . $kunde[0]["etternavn"] . '" type="text" id="etternavn" name="etternavn" required class="w-full p-2 rounded bg-gray-700 text-white">

                        <label for="adresse" class="block">Adresse:</label>
                        <input value="' . $kunde[0]["adresse"] . '" type="text" id="adresse" name="adresse" required class="w-full p-2 rounded bg-gray-700 text-white">

                        <label for="postnr" class="block">Postnr:</label>
                        <input value="' . $kunde[0]["postnr"] . '" type="text" id="postnr" name="postnr" required class="w-full p-2 rounded bg-gray-700 text-white">

                        <label for="tlf" class="block">Telefon:</label>
                        <input value="' . $kunde[0]["tlf"] . '" type="tel" id="tlf" name="tlf" required class="w-full p-2 rounded bg-gray-700 text-white">

                        <label for="epost" class="block">Epost:</label>
                        <input value="' . $kunde[0]["epost"] . '" type="email" id="epost" name="epost" required class="w-full p-2 rounded bg-gray-700 text-white">

                        <input type="">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white py-2 px-4 rounded">Registrer Kunde</button>
                    </form>
                </div>
            ';
        }

        if (isset($_POST['idBiler'])) {

            $idBiler = $_POST['idBiler'];

            $servername = "localhost";
            $database = "bilregister";
            $dbUser = "root";
            $dbPassord = "";

            // prøver å åpne en connection med databsen
            try{
            $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $dbUser, $dbPassord);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
            die("Kunne ikke koble til databasen: " . $e->getMessage());
            };

            $sql_biler = "SELECT biler.RegNr, biler.Type, biler.Merke, biler.Farge, biler.Fnr FROM biler WHERE biler.RegNr = :idBiler;";
            $statment_biler = $conn->prepare($sql_biler);
            $statment_biler->bindParam(':idBiler', $idBiler, PDO::PARAM_STR);
            $statment_biler->execute();
            $bil = $statment_biler->fetchAll();

            if (!$bil) {
            die("Customer not found");
            }

            echo '
            <div class="text-center mb-8 text-white mx-[30rem]">
                <h2 class="text-2xl mb-4">Registrer Kunde</h2>
                    <div class="text-center">
                        <h2 class="text-2xl mb-4">Registrer Bil</h2>
                        <form action="php/edit.php" method="POST" class="space-y-4">
                            <label for="regnr" class="block">RegNr:</label>
                            <input value="' . $bil[0]["RegNr"] . '" type="text" id="regnr" name="regnr" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="type" class="block">Type:</label>
                            <input value="' . $bil[0]["Type"] . '" type="text" id="type" name="type" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="merke" class="block">Merke:</label>
                            <input value="' . $bil[0]["Merke"] . '" type="text" id="merke" name="merke" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="farge" class="block">Farge:</label>
                            <input value="' . $bil[0]["Farge"] . '" type="text" id="farge" name="farge" required class="w-full p-2 rounded bg-gray-700 text-white">

                            <label for="fnr" class="block">Fødsels nummer:</label>
                            <input value="' . $bil[0]["Fnr"] . '" type="number" id="fnr" name="fnr" required class="w-full p-2 rounded bg-gray-700 text-white">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white py-2 px-4 rounded">Registrer Bil</button>
                        </form>
                </div>
            </div>
            ';
        }
        ?>
</body>
</html>