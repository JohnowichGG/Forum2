
<?php
include 'Connection.php'; 
?>


<?php



// Hent data fra formularen
$titel = $_POST['titel'];
$indhold = $_POST['indhold'];
$bruger = $_POST['bruger'];

// Forbered SQL-forespørgsel til indsættelse af indlægget
$sql = "INSERT INTO Posts (titel, indhold, bruger) VALUES (?, ?, ?)";

// Brug prepared statements for at undgå SQL-injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $titel, $indhold, $bruger);

// Udfør forespørgslen
if ($stmt->execute()) {
    echo "Indlæg gemt med succes!";
} else {
    echo "Fejl: " . $sql . "<br>" . $conn->error;
}

// Luk forbindelsen
$stmt->close();
$conn->close();
?>