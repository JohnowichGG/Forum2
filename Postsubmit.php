
<?php
include 'Connection.php'; 
?>


<?php



// Hent data fra formularen
$titel = $_POST['titel'];
$indhold = $_POST['indhold'];
$bruger = $_POST['bruger'];

// Forbered SQL-foresp�rgsel til inds�ttelse af indl�gget
$sql = "INSERT INTO Posts (titel, indhold, bruger) VALUES (?, ?, ?)";

// Brug prepared statements for at undg� SQL-injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $titel, $indhold, $bruger);

// Udf�r foresp�rgslen
if ($stmt->execute()) {
    echo "Indl�g gemt med succes!";
} else {
    echo "Fejl: " . $sql . "<br>" . $conn->error;
}

// Luk forbindelsen
$stmt->close();
$conn->close();
?>