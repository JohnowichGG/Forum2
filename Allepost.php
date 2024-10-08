<?php
include 'DBconnection.php'; // Forbind til databasen

// Sæt UTF-8 som tegnsæt for forbindelsen
$conn->set_charset('utf8');

// Hent topic_id fra URL
$topic_id = isset($_GET['topic_id']) ? intval($_GET['topic_id']) : 0;

// Hent emne titel baseret på topic_id
$topicTitleQuery = $conn->prepare("SELECT title FROM emne WHERE id = ?");
$topicTitleQuery->bind_param("i", $topic_id);
$topicTitleQuery->execute();
$topicTitleResult = $topicTitleQuery->get_result();
$topicTitle = $topicTitleResult->fetch_assoc();

if (!$topicTitle) {
    echo "<p>Emnet blev ikke fundet.</p>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indlægsoversigt for <?php echo htmlspecialchars($topicTitle['title'], ENT_QUOTES, 'UTF-8'); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .submit-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .post-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 80px;
        }
        .post {
            background-color: white;
            width: 60%;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .post h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }
        .post p {
            font-size: 16px;
            color: #666;
        }
        .post .meta {
            font-size: 14px;
            color: #999;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <a href="Postsubmit.php?topic_id=<?php echo $topic_id; ?>" class="submit-btn">Skriv Indlæg</a>

    <div class="post-container">
        <?php
        // Hent indlæg der matcher topic
        $sql = "
            SELECT 
                Posts.id, Posts.title, Posts.content, Posts.author, Posts.created_at
            FROM 
                Posts
            WHERE 
                Posts.topic = ?
            ORDER BY 
                Posts.created_at DESC";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $topicTitle['title']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<h2>" . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . "</h2>";
                echo "<p>" . nl2br(htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8')) . "</p>";
                echo "<div class='meta'>Skrevet af " . htmlspecialchars($row['author'], ENT_QUOTES, 'UTF-8') . " den " . htmlspecialchars($row['created_at'], ENT_QUOTES, 'UTF-8') . "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>Ingen indlæg fundet for emnet '" . htmlspecialchars($topicTitle['title'], ENT_QUOTES, 'UTF-8') . "'.</p>";
        }

        // Luk forbindelsen
        $conn->close();
        ?>
    </div>
</body>
</html>
