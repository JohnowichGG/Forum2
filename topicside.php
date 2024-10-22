<?php include 'Menu.php'; ?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Emner</title>
    <style>
        /* CSS til centrering */
        body {
            display: flex;
            flex-direction: column;
            align-items: center; /* Centrerer indholdet horisontalt */
            justify-content: center; /* Centrerer indholdet vertikalt */
            height: 100vh; /* Sætter højden til 100% af vinduets højde */
            margin: 0; /* Fjerner standard margin */
            font-family: Arial, sans-serif; /* Sætter skrifttype */
            background-color: #f4f4f4; /* Baggrundsfarve */
        }

        #topics-list {
            list-style-type: none; /* Fjerner punkttegn fra listen */
            padding: 0; /* Fjerner padding fra listen */
            margin: 0; /* Fjerner margin fra listen */
        }

        h1 {
            margin-bottom: 20px; /* Plads under overskriften */
        }
    </style>
</head>
<body>
    <h1>Forum Emner</h1>

    <ul id="topics-list">
        <!-- Her bliver emner listet -->
        <?php include 'topicshow.php'; ?>
        <?php include 'add_topic.php'; ?>
    </ul>
</body>
</html>

