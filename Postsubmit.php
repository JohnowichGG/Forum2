
<div class="menu">
<?php include 'Menu.php';?>
</div>
<?php
include 'DBconnection.php'; 
?>


<?php

// Sørg for, at brugeren er logget ind

echo "Session brugernavn: " . $_SESSION['Brugernavn'];

if (!isset($_SESSION['Brugernavn'])) {
    die("Du skal være logget ind for at oprette et indlæg.");
}

// Inkluder menuen og databaseforbindelsen
echo '<div class="menu">';
include 'menu.php';
echo '</div>';
include 'DBconnection.php'; 

// Hent data fra formularen
$titel = htmlspecialchars($_POST['title']); // HTML-special chars for at undgå XSS
$indhold = htmlspecialchars($_POST['content']);
$bruger = $_SESSION['Brugernavn']; // Hent brugernavn fra sessionen

// Forbered SQL-forespørgsel til indsættelse af indlægget i Posts-tabellen
$sql = "INSERT INTO Posts (title, content, , created_at) VALUES (?, ?, ?, NOW())";

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
