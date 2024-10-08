<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opret Indlæg</title>
</head>
<body>
    <div class="menu">
        <?php include 'Menu.php'; ?>
    </div>

    <h1>Opret Indlæg</h1>

    <h2>Indhold for Emne</h2>
    <form action="PostSubmit.php" method="POST">
        <label for="post-title">Titel:</label><br>
        <input type="text" id="post-title" name="title" required><br>
        <label for="post-content">Indhold:</label><br>
        <textarea id="post-content" name="content" required></textarea><br>
        <input type="hidden" name="topic" value="<?php echo htmlspecialchars($_GET['topic']); ?>">
        <input type="submit" value="Opret Indlæg">
    </form>
</body>
</html>
