<?php
include 'DBconnection.php'; // Forbind til databasen

// Start sessionen kun hvis den ikke allerede er startet
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

// Hent topic_id fra URL
$topicId = isset($_GET['topic_id']) ? (int)$_GET['topic_id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postTitle = $_POST['post_title']; // Hent titel fra formularen
    $postContent = $_POST['post_content'];
    $author = $_SESSION['Brugernavn'] ?? 'Ukendt'; // Hent brugernavnet fra sessionen

    // Hent emne titel baseret p� topicId for at gemme den rigtige topic
    $topicQuery = $conn->prepare("SELECT title FROM emne WHERE id = ?");
    $topicQuery->bind_param("i", $topicId);
    $topicQuery->execute();
    $topicResult = $topicQuery->get_result();
    $topicRow = $topicResult->fetch_assoc();

    if ($topicRow) {
        // Forbered SQL-inds�ttelsen
        $sql = "INSERT INTO Posts (title, content, author, topic, created_at) VALUES (?, ?, ?, ?, NOW())"; 
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $postTitle, $postContent, $author, $topicRow['title']); // Brug emnetitel i stedet for topicId

        // Udf�r foresp�rgslen
        if ($stmt->execute()) {
            echo "<p>Indl�g oprettet med succes! <a href='Allepost.php?topic_id=" . $topicId . "'>Se indl�g</a></p>";
        } else {
            echo "Fejl ved oprettelse af indl�g: " . $stmt->error;
        }

        // Luk forbindelsen
        $stmt->close();
    } else {
        echo "Emnet blev ikke fundet.";
    }

    $conn->close();
    exit;
}

// Hent data fra emnetabellen
$tableName = 'emne'; // Tabelnavn
$dataSql = "SELECT * FROM $tableName WHERE id = ?"; // Hent data for det specifikke emne
$stmt = $conn->prepare($dataSql);
$stmt->bind_param("i", $topicId);
$stmt->execute();
$dataResult = $stmt->get_result();

// Tjek om foresp�rgslen er udf�rt korrekt
if ($dataResult->num_rows > 0) {
    $topicRow = $dataResult->fetch_assoc();
    echo "<h2>Opret Indl�g til emnet: " . htmlspecialchars($topicRow['title'], ENT_QUOTES, 'UTF-8') . "</h2>";
    echo "<form method='POST' action='Postsubmit.php?topic_id=" . $topicId . "'>"; // Form til at oprette indl�g
    echo "<input type='text' name='post_title' placeholder='Indl�gstitel' required>";
    echo "<textarea name='post_content' placeholder='Skriv dit indl�g her...' required></textarea>";
    echo "<button type='submit'>Opret Indl�g</button>";
    echo "</form>";
} else {
    echo "Ingen data fundet i tabellen.";
}

// Luk forbindelsen
$stmt->close();
$conn->close();
?>
