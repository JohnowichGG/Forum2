<?php
include 'DBconnection.php'; // Forbind til databasen

// Tjek, om formularen er blevet sendt
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hent id og emnet fra formularen og beskyt mod XSS
    $new_id = (int)$_POST['id']; // Sørg for at konvertere til integer
    $new_topic = htmlspecialchars($_POST['topic']);

    // Tjek om emnet allerede findes i databasen
    $check_sql = "SELECT * FROM emne WHERE title = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $new_topic);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "Emnet '$new_topic' findes allerede i databasen.";
    } else {
        // Forbered SQL-forespørgslen til indsættelse
        $sql = "INSERT INTO emne (id, title) VALUES (?, ?)";

        // Brug prepared statements for at undgå SQL-injection
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("is", $new_id, $new_topic);

            // Udfør forespørgslen
            if ($stmt->execute()) {
                echo "Nyt emne oprettet med succes!";
            } else {
                echo "Fejl ved oprettelse af emne: " . $stmt->error;
            }

            // Luk statement
            $stmt->close();
        } else {
            echo "Fejl i forberedelse af forespørgslen: " . $conn->error;
        }
    }

    // Luk check statement
    $check_stmt->close();
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
    <form action="add_topic.php" method="POST">
        <label for="id">ID:</label><br>
        <input type="number" id="id" name="id" required><br>
        <label for="topic">Emnetitel:</label><br>
        <input type="text" id="topic" name="topic" required><br>
        <input type="submit" value="Opret Emne">
    </form>
</body>
</html>
