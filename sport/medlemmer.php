<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<main >
    <?php include 'nav.php'; ?>
        <div class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
            <div class="bg-gray-800 p-8 rounded shadow-md w-full max-w-7xl">
                <div class="text-center">
                    <?php
                        include 'php/contactDb.php';

                        $sql_medlemmer = "SELECT m_nr, fornavn, etternavn, adresse, postnr, fodt, telefon, mail, betalt FROM medlem ORDER BY m_nr ASC;";
                        // Gjør spørringen klar
                        $stmt = $conn->prepare($sql_medlemmer);
                        // Kjør spørringen
                        $stmt->execute();
                        $medlemmer = $stmt->fetchAll();

                        echo "<table class='min-w-full bg-gray-700 text-white rounded-lg shadow-md'>";
                            echo "<thead>";
                                echo "<tr class='bg-gray-800 text-pink-600'>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Medlem nummer</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Fornavn</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Etternavn</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Adresse</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Postnr</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Poststed</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Fødtsels dato</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Telefon</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Mail</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Betalt</th>";
                                    echo "<th class='py-2 px-4 border-b border-gray-600'>Metoder</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                                for($i = 0; $i < count($medlemmer); $i++){
                                    $sql_Poststed = "SELECT poststed FROM norske_postnummer WHERE postnummer = :postnummer;";
                                    $statment_Poststed = $conn->prepare($sql_Poststed);
                                    $statment_Poststed->bindParam(':postnummer', $medlemmer[$i]['postnr'], PDO::PARAM_STR);
                                    $statment_Poststed->execute();
                                    $poststed = $statment_Poststed->fetchAll();
                                    echo "<tr class='bg-gray-800 hover:bg-gray-600'>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $medlemmer[$i]['m_nr'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $medlemmer[$i]['fornavn'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $medlemmer[$i]['etternavn'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $medlemmer[$i]['adresse'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $medlemmer[$i]['postnr'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $poststed[0]['poststed'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $medlemmer[$i]['fodt'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $medlemmer[$i]['telefon'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . $medlemmer[$i]['mail'] . "</td>";
                                        echo "<td class='py-2 px-4 border-b border-gray-600'>" . (($medlemmer[$i]['betalt'] == 1) ? 'Har Betalt' : 'Ikke Betalt') . "</td>";
                                        echo '<td class="py-2 px-4 border-b border-gray-600">';
                                            echo '<div class="flex space-x-2">';
                                                echo '<form action="/php/sport/edit.php" method="POST">
                                                    <input type="hidden" name="idMedlemmer" value="'. $medlemmer[$i]['m_nr'] . '">
                                                    <button class="bg-indigo-500 px-2 rounded" type="submit">Edit</button>
                                                </form>';
                                                echo '<form action="/php/sport/php/slett.php" method="POST">
                                                    <input type="hidden" name="idMedlemmer" value="'. $medlemmer[$i]['m_nr'] . '">
                                                    <button class="bg-red-500 px-2 rounded" type="submit"> X </button>
                                                </form>';
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