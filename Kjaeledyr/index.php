<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bil Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body >
    <main class="text-center">
        <?php
            include 'nav.php';

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

            $sql_dyr = "SELECT id, navn, rase, eierId, regDato, typeDyr FROM kjaeledyr";

            // Gjør spørringen klar
            $stmt = $conn->prepare($sql_dyr);

            // Kjør spørringen
            $stmt->execute();

            $dyr = $stmt->fetchAll();

            echo "<table class='min-w-full bg-gray-700 text-white rounded-lg shadow-md'>";
                echo "<thead>";
                    echo "<tr class='bg-gray-800 text-indigo-600'>";
                        echo "<th class='py-2 px-4 border-b border-gray-600'>ID</th>";
                        echo "<th class='py-2 px-4 border-b border-gray-600'>Navn</th>";
                        echo "<th class='py-2 px-4 border-b border-gray-600'>Rase</th>";
                        echo "<th class='py-2 px-4 border-b border-gray-600'>Eier ID</th>";
                        echo "<th class='py-2 px-4 border-b border-gray-600'>Registreringsdato</th>";
                        echo "<th class='py-2 px-4 border-b border-gray-600'>Type Dyr</th>";
                        echo "<th class='py-2 px-4 border-b border-gray-600'>Handling</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    for($i = 0; $i < count($dyr); $i++){
                        echo "<tr class='bg-gray-800 hover:bg-gray-600'>";
                            echo "<td class='py-2 px-4 border-b border-gray-600'>" . $dyr[$i]['id'] . "</td>";
                            echo "<td class='py-2 px-4 border-b border-gray-600'>" . $dyr[$i]['navn'] . "</td>";
                            echo "<td class='py-2 px-4 border-b border-gray-600'>" . $dyr[$i]['rase'] . "</td>";
                            echo "<td class='py-2 px-4 border-b border-gray-600'>" . $dyr[$i]['eierId'] . "</td>";
                            echo "<td class='py-2 px-4 border-b border-gray-600'>" . $dyr[$i]['regDato'] . "</td>";
                            echo "<td class='py-2 px-4 border-b border-gray-600'>" . $dyr[$i]['typeDyr'] . "</td>";
                            echo "<td class='py-2 px-4 border-b border-gray-600'>
                                <form action='php/slettDyr.php' method='POST' onsubmit='return confirm(\"Er du sikker på at du vil slette " . htmlspecialchars($dyr[$i]['navn']) . "?\")'>
                                    <input type='hidden' name='dyrId' value ='" . $dyr[$i]['id'] . "'>
                                    <button class='bg-red-500 px-2 rounded' type='submit'>X</button>
                                </form>
                            </td>";
                        echo "</tr>";
                    };
                echo "</tbody>";
            echo "</table>";
        ?>  
    </main>  
</body>
</html>