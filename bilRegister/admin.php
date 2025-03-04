<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <nav class="">
        <?php include 'components/nav.php'; ?>
    </nav>
    <?php   
        include 'components/skjekkAdmin.php';
    ?>

    <main>

        <div class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
            <div class="bg-gray-800 p-8 rounded shadow-md w-full max-w-5xl">
                <div class="text-center">
                    <?php
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

                        $sql_kunder = "SELECT kunder.Fnr, kunder.tlf, kunder.epost, kunder.fornavn, kunder.etternavn, kunder.adresse, kunder.postnr FROM kunder ORDER BY kunder.etternavn ASC;";

                        // Gjør spørringen klar
                        $stmt = $conn->prepare($sql_kunder);
                    
                        // Kjør spørringen
                        $stmt->execute();

                        $kunder = $stmt->fetchAll();

                        echo "<table class='min-w-full bg-gray-700 text-white rounded-lg shadow-md'>";
                            echo "<thead>";
                                echo "<tr class='bg-gray-800 text-indigo-600'>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Etternavn</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Fornavn</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Adresse</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Postnr</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Telefon</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Epost</th>";
                                    echo "<th class='py-2 px-4 border-b  border-gray-600'>Handling</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                                for($i = 0; $i < count($kunder); $i++){
                                    echo "<tr class='bg-gray-800 hover:bg-gray-600'>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $kunder[$i]['etternavn'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $kunder[$i]['fornavn'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $kunder[$i]['adresse'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $kunder[$i]['postnr'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $kunder[$i]['tlf'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $kunder[$i]['epost'] . "</td>";
                                        echo '<td class="py-2 px-4 border-b border-gray-600">';
                                            echo '<div class="flex space-x-2">';
                                                echo '<a href="edit.php?Fnr=' . urlencode($kunder[$i]['Fnr']) . '" class="bg-indigo-500 px-2 rounded"> Edit </a>';
                                                echo '<button class="bg-red-500 px-2 rounded"> X </button>';
                                            echo '</div>';  
                                        echo '</td>';
                                    echo "</tr>";
                                };
                            echo "</tbody>";
                        echo "</table>";
                    ?>  
                </div>
            </div>
        </div>

        <div class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
            <div class="bg-gray-800 p-8 rounded shadow-md w-full max-w-5xl">
                <div class="text-center">
                    <?php
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

                        $sql_biler = "SELECT biler.RegNr, biler.Type, biler.Merke, biler.Farge, biler.Fnr FROM biler ORDER BY biler.Type ASC;";

                        // Gjør spørringen klar
                        $stmt = $conn->prepare($sql_biler);
                    
                        // Kjør spørringen
                        $stmt->execute();

                        $biler = $stmt->fetchAll();

                        echo "<table class='min-w-full bg-gray-700 text-white rounded-lg shadow-md'>";
                            echo "<thead>";
                                echo "<tr class='bg-gray-800 text-indigo-600'>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>RegNr</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Type</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Merke</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Farge</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Fnr</th>";
                                    echo "<th class='py-2 px-4 border-b  border-gray-600'>Handling</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                                for($i = 0; $i < count($biler); $i++){
                                    echo "<tr class='bg-gray-800 hover:bg-gray-600'>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $biler[$i]['RegNr'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $biler[$i]['Type'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $biler[$i]['Merke'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $biler[$i]['Farge'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $biler[$i]['Fnr'] . "</td>";
                                        echo '<td class="py-2 px-4 border-b border-gray-600">';
                                            echo '<div class="flex space-x-2">';
                                                echo '<a href="edit.php?regnr=' . urlencode($biler[$i]['RegNr']) . '" class="bg-indigo-500 px-2 rounded"> Edit </a>';
                                                echo '<button class="bg-red-500 px-2 rounded"> X </button>';
                                            echo '</div>';  
                                        echo '</td>';
                                    echo "</tr>";
                                };
                            echo "</tbody>";
                        echo "</table>";
                    ?>  
                </div>
            </div>
        </div>

    </main>
</body>
</html>