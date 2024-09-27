<?php
session_start(); // Start sessionen

// S�rg for, at brugeren er logget ind
if (!isset($_SESSION['Brugernavn'])) {
    die("Du skal v�re logget ind for at oprette et indl�g.");
}

include 'DBconnection.php'; // Inkluder databaseforbindelsen

// Hent data fra formularen
$titel = htmlspecialchars($_POST['title']); // HTML-special chars for at undg� XSS
$indhold = htmlspecialchars($_POST['content']);
$bruger = $_SESSION['Brugernavn']; // Hent brugernavn fra sessionen

// Forbered SQL-foresp�rgsel til inds�ttelse af indl�gget i Posts-tabellen
$sql = "INSERT INTO Posts (title, content, author, created_at) VALUES (?, ?, ?, NOW())"; // Rettet: Tilf�jet 'author'

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

<a href="Postsubmit.html">Klik her for at komme til forsiden :)</a>
