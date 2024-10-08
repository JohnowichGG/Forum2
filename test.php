<?php
include 'DBconnection.php'; // Forbind til databasen

// Hent alle r�kker fra emne-tabellen
$query = "SELECT * FROM emne";
$result = $conn->query($query);

// Tjek om foresp�rgslen er udf�rt korrekt
if ($result) {
    // Iter�r over alle r�kkerne
    while($row = $result->fetch_assoc()){
        // Iter�r over alle felterne i r�kken
        foreach($row as $key => $val){
            // Gener�r output
            echo htmlspecialchars($key) . ": " . htmlspecialchars($val) . "<br />";
        }
        echo "<hr>"; // Separator mellem r�kkerne
    }
} else {
    echo "Fejl ved hentning af data: " . $conn->error;
}

// Luk forbindelsen
$conn->close();
?>
