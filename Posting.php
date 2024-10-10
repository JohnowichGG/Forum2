﻿<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opret Forumindlæg</title>
</head>
<body>
    <h2>Opret et nyt forumindlæg</h2>
    <form action="Postsubmit.php" method="post">
        <label for="title">Titel:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="content">Indhold:</label><br>
        <textarea id="content" name="content" rows="4" cols="50" required></textarea><br><br>

        <label for="author">Forfatter:</label><br>
        <input type="text" id="author" name="author" required><br><br>

        <input type="submit" value="Opret indlæg">
    </form>
</body>
</html>
