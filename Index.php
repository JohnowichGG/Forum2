<?php 
session_start(); // Sessionen skal starte før HTML-output
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naturforum</title>
</head>
<body>

<div class="menu">
    <?php include 'Menu.php'; ?>
</div>


<?php include 'InsertGuest.php'; ?>

</body>
</html>






