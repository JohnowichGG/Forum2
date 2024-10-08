<?php
include 'DBconnection.php'; // Forbind til databasen

// Hent alle indlæg og tilhørende emnetitel fra 'Posts' og 'emne'
$sql = "
    SELECT 
        Posts.id, Posts.title, Posts.content, Posts.author, Posts.created_at, emne.title AS emne_title
    FROM 
        Posts
    JOIN 
        emne 
    ON 
        Posts.topic = emne.id
    ORDER BY 
        Posts.created_at DESC"; // Henter data og sorterer efter oprettelsesdato

$result = $conn->query($sql);

// Tjek om der er indlæg at vise
if ($result->num_rows > 0) {
    echo "<h1>Alle Indlæg</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Titel</th><th>Indhold</th><th>Forfatter</th><th>Emne</th><th>Oprettet</th></tr>";

    // Loop gennem indlæg og vis dem i tabellen
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['content']) . "</td>";
        echo "<td>" . htmlspecialchars($row['author']) . "</td>";
        echo "<td>" . htmlspecialchars($row['emne_title']) . "</td>"; // Viser emnetitlen fra 'emne'-tabellen
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Ingen indlæg fundet.";
}

// Luk forbindelsen
$conn->close();
?>
