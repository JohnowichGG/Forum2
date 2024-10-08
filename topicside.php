<div class="menu">
    <?php include 'Menu.php'; ?>
</div>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Emner</title>
    
</head>
<body>
    <h1>Forum Emner</h1>


    <h2>V&aeliglg et Emne</h2>
    <ul id="topics-list">
        <!-- Her bliver emner listet -->
        <?php include 'topic.php'; ?>
        <?php include 'add_topic.php'; ?>

    </ul>
</body>
</html>
