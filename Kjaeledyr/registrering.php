<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'nav.php'; ?>

    <form action="" method="POST" class="space-y-4 text-white m-4">
        <label for="navn" class="block">Navn:</label>
        <input type="text" id="navn" name="navn" required class="w-full p-2 rounded bg-gray-700 text-white">

        <label for="rase" class="block">Rase:</label>
        <input type="text" id="rase" name="rase" required class="w-full p-2 rounded bg-gray-700 text-white">

        <label for="eierId" class="block">Eier ID:</label>
        <input type="number" id="eierId" name="eierId" required class="w-full p-2 rounded bg-gray-700 text-white">

        <label for="typeDyr" class="block">Type Dyr:</label>
        <input type="text" id="typeDyr" name="typeDyr" required class="w-full p-2 rounded bg-gray-700 text-white">

        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white py-2 px-4 rounded">
            Registrer Kjæledyr
        </button>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servername = "localhost";
            $database = "kjaeledyr";
            $dbUser = "root";
            $dbPassord = "";

            // prøver å åpne en connection med databsen
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $dbUser, $dbPassord);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                die("Kunne ikke koble til databasen: " . $e->getMessage());
            };

            try{
                $sql_reg = "INSERT INTO kjaeledyr (navn, rase, eierId, typeDyr) VALUES (?, ?, ?, ?)";
                $statment = $conn->prepare($sql_reg);
                $statment->execute([$_POST['navn'], $_POST['rase'], $_POST['eierId'], $_POST['typeDyr']]);

                echo "<p class='bg-green-500 text-white p-2 rounded m-4'>Dyret ble lagt til vellykket</p>";
            } catch(Exception $e){
                die("Kunne ikke koble til databasen: " . $e->getMessage());
            }
        };
    ?>
</body>
</html>
</body>
</html>