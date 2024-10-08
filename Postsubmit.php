<div class="menu">
    <?php include 'Menu.php'; ?>
</div>

<?php
include 'DBconnection.php'; // Forbind til databasen

// Tjekker om emne-ID er sendt via URL
if (isset($_GET['topic_id'])) {
    $topicId = $_GET['topic_id'];
} else {
    echo "Ingen emne-ID angivet.";
    exit;
}

// Hent emnetitel baseret på topic_id
$sql = "SELECT title FROM emne WHERE id = ?"; // Antager at 'emne' er navnet på tabellen og 'id' er kolonnen
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $topicId); // "i" for integer
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $topic = $result->fetch_assoc();
    $topicTitle = $topic['title']; // Hent emnetitlen
} else {
    echo "Emnet ikke fundet.";
    exit;
}

// Tjekker om formen er blevet sendt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postTitle = $_POST['post_title']; // Hent titel fra formularen
    $postContent = $_POST['post_content'];
    
    // Hent brugernavnet fra sessionen (forudsætter at brugernavnet er gemt i sessionen)
    $author = $_SESSION['username'] ?? 'Ukendt'; // Standard til 'Ukendt' hvis brugernavnet ikke er sat

    // Forbered SQL-indsættelsen
    $sql = "INSERT INTO Posts (title, content, author, topic, created_at) VALUES (?, ?, ?, ?, NOW())"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $postTitle, $postContent, $author, $topicId); // "s" for string, "i" for integer

    // Udfør forespørgslen
    if ($stmt->execute()) { 
        echo "Indl&aeligg oprettet med succes!";
    } else {
        echo "Fejl ved oprettelse af indlg: " . $stmt->error;
    }

    // Luk statement
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skriv Indl&aeligg</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .menu {
            position: absolute; /* Gør menuen positioneret */
            top: 10px; /* Afstand fra toppen */
            left: 10px; /* Afstand fra venstre */
            z-index: 1000; /* Sørger for at menuen er ovenfor andre elementer */
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Fuld højde af viewport */
        }
        h1 {
            text-align: center; /* Centerer overskriften */
        }
        input[type="text"],
        textarea {
            width: 100%; /* Gør tekstfelterne 100% af containerens bredde */
            padding: 10px; /* Indvendig polstring */
            margin-bottom: 10px; /* Margin mellem felter */
            font-size: 16px; /* Størrelse på teksten */
        }
        input[type="submit"] {
            padding: 10px 20px; /* Indvendig polstring */
            font-size: 16px; /* Størrelse på teksten */
            cursor: pointer; /* Markør ved hover */
        }
    </style>
</head>
<body>
    <div class="menu">
        <?php include 'Menu.php'; ?>
    </div>
    
    <div class="container">
        <h1>Skriv Indl&aeligg til Emnet: <?php echo htmlspecialchars($topicTitle); ?></h1>
        <form action="write_post.php?topic_id=<?php echo $topicId; ?>" method="POST">
            <label for="post_title">Titel:</label><br>
            <input type="text" id="post_title" name="post_title" required><br>
            
            <label for="post_content">Indhold:</label><br>
            <textarea id="post_content" name="post_content" required></textarea><br>
            
            <input type="submit" value="Opret Indlæg">
        </form>
    </div>
</body>
</html>
