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
        if (isset($_GET['regnr'])) {

            $regNr = $_GET['regnr'];

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

            $sql_reg = "SELECT CustomerName, City FROM biler WHERE biler.;";
            $statment = $conn->prepare($sql_reg);
            $statment->execute([$_POST['regnr'], $_POST['type'], $_POST['merke'], $_POST['farge'], $_POST['fnr']]);

            echo "
            <div class='flex items-center justify-center min-h-screen text-white'>
                <div class='bg-gray-800 p-8 rounded shadow-md w-full max-w-5xl'>
                    <div class='text-center'>
                        <h2 class='text-2xl mb-4'>Registrer Bil</h2>
                        <form action='php/registrerBil.php' method='POST' class='space-y-4'>
                            <label for='regnr' class='block'>RegNr:</label>
                            <input type='text' id='regnr' name='regnr' value='' required class='w-full p-2 rounded bg-gray-700 text-white'>

                            <label for='type' class='block'>Type:</label>
                            <input type='text' id='type' name='type' required class='w-full p-2 rounded bg-gray-700 text-white'>

                            <label for='merke' class='block'>Merke:</label>
                            <input type='text' id='merke' name='merke' required class='w-full p-2 rounded bg-gray-700 text-white'>

                            <label for='farge' class='block'>Farge:</label>
                            <input type='text' id='farge' name='farge' required class='w-full p-2 rounded bg-gray-700 text-white'>

                            <label for='fnr' class='block'>Fødsels nummer:</label>
                            <input type='number' id='fnr' name='fnr' required class='w-full p-2 rounded bg-gray-700 text-white'>
                            <button type='submit' class='bg-indigo-600 hover:bg-indigo-500 text-white py-2 px-4 rounded'>Registrer Bil</button>
                        </form>
                    </div>
                </div>
            </div>
            ";

            
            
        } elseif (isset($_GET['Fnr'])) {
            $fnr = $_GET['Fnr'];

        } else {
            die("Error: 'regnr' parameter is missing.");
        }
    ?>
</body>
</html>