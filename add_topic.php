<?php
include 'DBconnection.php'; // Forbind til databasen

$emneOprettet = false; // Variabel til at spore om et emne er blevet oprettet
$emneEksisterer = false; // Variabel til at spore om emnet allerede eksisterer

// Tjekker om formen er blevet sendt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hent emnetitlen fra formularen
    $topic = $_POST['topic'];

    // Tjek om emnet allerede eksisterer
    $sql = "SELECT * FROM emne WHERE title = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $topic);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Emnet eksisterer allerede
        $emneEksisterer = true;
    } else {
        // Emnet eksisterer ikke, så vi kan oprette det
        $sql = "INSERT INTO emne (title) VALUES (?)"; // Antager at du har en kolonne kaldet 'title' i din 'emne'-tabel
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $topic); // "s" betyder, at parameteren er en streng

        // Udfør forespørgslen
        if ($stmt->execute()) {
            $emneOprettet = true; // Emne er nu oprettet
        } else {
            echo "Fejl ved oprettelse af emne: " . $stmt->error;
        }
    }

    // Luk statement
    $stmt->close();
}

// Luk forbindelsen
$conn->close();
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opret Nyt Emne</title>
</head>
<body>
    <h1>Opret Nyt Emne</h1>
    <?php if ($emneOprettet): ?>
        <p>Nyt emne oprettet med succes!</p>
        <form action="topicside.php" method="GET">
            <input type="submit" value="Gå tilbage til emnesiden">
        </form>
    <?php elseif ($emneEksisterer): ?>
        <p>Dette emne eksisterer allerede!</p>
        <form action="topicside.php" method="GET">
            <input type="submit" value="Gå tilbage til emnesiden">
        </form>
    <?php else: ?>
        <form action="add_topic.php" method="POST">
            <label for="topic">Emnetitel:</label><br>
            <input type="text" id="topic" name="topic" required><br>
            <input type="submit" value="Opret Emne">
        </form>
    <?php endif; ?>
</body>
</html>
