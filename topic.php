<?php
include 'DBconnection.php'; // Forbind til databasen

// Hent eksisterende emner fra databasen
$sql = "SELECT * FROM emne";
$result = $conn->query($sql);

// Hvis der er emner i databasen, vis dem
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Opret et link til hvert emne, der dirigerer til indhold.php
            echo "<li><a class='topic-button' href='indhold.php?topic=" . urlencode($row['title']) . "'>" . htmlspecialchars($row['title']) . "</a></li>";
        }
    } else {
        echo "Ingen emner fundet.";
    }
} else {
    // Fejl ved udførelse af SELECT-forespørgslen
    echo "Fejl ved hentning af emner: " . $conn->error;
}

$conn->close();
?>
