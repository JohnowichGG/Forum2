<?php
include 'DBconnection.php'; // Forbind til databasen

// Hent alle tabeller fra den angivne database
$sql = "SHOW TABLES";
$result = $conn->query($sql);

// Tjek om forespørgslen er udført korrekt
if ($result) {
    if ($result->num_rows > 0) {
        echo "<h2>Tabeller i databasen:</h2>";
        echo "<ul>";
        // Loop gennem alle tabeller og vis dem
        while ($row = $result->fetch_row()) {
            echo "<li>" . htmlspecialchars($row[0]) . "</li>"; // Viser tabellens navn
        }
        echo "</ul>";
    } else {
        echo "Ingen tabeller fundet.";
    }
} else {
    echo "Fejl ved hentning af tabeller: " . $conn->error;
}

<?php
echo "Dette er en test for at se, om topic.php inkluderes.";
?>


// Luk forbindelsen
$conn->close();
?>

