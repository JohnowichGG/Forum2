
<?php
include 'DBconnection.php'; // Forbind til databasen

// Angiv tabelnavnet
$tableName = 'emne'; // Tabelnavn

// Hent data fra den angivne tabel
$dataSql = "SELECT * FROM `$tableName`"; // Hent alle data
$dataResult = $conn->query($dataSql);

// Tjek om forespørgslen er udført korrekt
if ($dataResult) {
    // Tjek om der er data i tabellen
    if ($dataResult->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        
        // Hent kolonnenavne og tilføj en kolonne for knappen
        while ($fieldInfo = $dataResult->fetch_field()) {
            echo "<th>" . htmlspecialchars($fieldInfo->name) . "</th>"; // Kolonnenavne
        }
        echo "<th>Handling</th>"; // Ny kolonne for handling
        echo "</tr>";

        // Loop gennem dataene og vis dem
        while ($dataRow = $dataResult->fetch_assoc()) {
            echo "<tr>";
            foreach ($dataRow as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>"; // Data værdier
            }
            // Tilføj en knap til at skrive et indlæg
            $topicId = $dataRow['id']; // Antager, at 'id' er kolonnenavnet
            echo "<td><a href='Postsubmit.php?topic_id=" . $topicId . "'><button>Skriv Indl&aeligg</button></a></td>"; // Knap til at skrive indlæg
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Ingen data fundet i tabellen.";
    }
} else {
    echo "Fejl ved hentning af data fra tabellen: " . $conn->error;
}

// Luk forbindelsen
$conn->close();
?>
