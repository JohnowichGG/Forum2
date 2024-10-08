<?php
include 'DBconnection.php'; // Forbind til databasen

// Hent alle rækker fra emne-tabellen
$query = "SELECT * FROM emne";
$result = $conn->query($query);

// Tjek om forespørgslen er udført korrekt
if ($result) {
    // Iterér over alle rækkerne
    while($row = $result->fetch_assoc()){
        // Iterér over alle felterne i rækken
        foreach($row as $key => $val){
            // Generér output
            echo htmlspecialchars($key) . ": " . htmlspecialchars($val) . "<br />";
        }
        echo "<hr>"; // Separator mellem rækkerne
    }
} else {
    echo "Fejl ved hentning af data: " . $conn->error;
}

// Luk forbindelsen
$conn->close();
?>
