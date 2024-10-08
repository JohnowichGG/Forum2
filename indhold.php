<?php
include 'DBconnection.php'; // Forbind til databasen

// Hent det valgte emne fra URL'en
$selected_topic = isset($_GET['topic']) ? htmlspecialchars($_GET['topic']) : '';

// Hent eksisterende indl�g for det valgte emne fra databasen
$sql = "SELECT * FROM Posts WHERE topic = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $selected_topic);
    $stmt->execute();
    $result = $stmt->get_result();

    // Hvis der er indl�g, vis dem
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<h3>Indl�g:</h3>";
            echo "<p>" . htmlspecialchars($row['content']) . "</p>";
            echo "<p><em>Af: " . htmlspecialchars($row['author']) . " den " . $row['created_at'] . "</em></p>";
            echo "</div>";
        }
    } else {
        echo "Ingen indl�g fundet for dette emne.";
    }
    $stmt->close();
} else {
    echo "Fejl ved hentning af indl�g: " . $conn->error;
}

// Luk forbindelsen
$conn->close();
?>

<!-- Formular til at oprette et indl�g -->
<h2>Opret et Indl�g</h2>
<form action="PostSubmit.php" method="POST">
    <label for="post-title">Titel:</label><br>
    <input type="text" id="post-title" name="title" required><br>
    <label for="post-content">Indhold:</label><br>
    <textarea id="post-content" name="content" required></textarea><br>
    <input type="hidden" name="topic" value="<?php echo htmlspecialchars($selected_topic); ?>">
    <input type="submit" value="Opret Indl�g">
</form>
