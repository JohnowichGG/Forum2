<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log ind</title>
    <style>
        /* Stil til at centrere indholdet */
        body {
            display: flex;
            justify-content: center; /* Centrerer horisontalt */
            align-items: center; /* Centrerer vertikalt */
            height: 100vh; /* Får body til at fylde hele højden af skærmen */
            margin: 0; /* Fjerner standard margin */
            font-family: Arial, sans-serif; /* Vælger skrifttype */
            background-color: #f4f4f4; /* Baggrundsfarve */
        }

        form {
            background-color: white; /* Hvid baggrund for formularen */
            padding: 20px; /* Indvendig polstring */
            border-radius: 5px; /* Rundede hjørner */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Skaber skygge */
        }

        input[type="text"],
        input[type="password"] {
            width: 100%; /* Får inputfelterne til at fylde hele bredden */
            padding: 10px; /* Indvendig polstring */
            margin: 10px 0; /* Margin mellem felterne */
            border: 1px solid #ccc; /* Kantfarve */
            border-radius: 5px; /* Rundede hjørner */
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Baggrundsfarve for knappen */
            color: white; /* Tekstfarve */
            padding: 10px; /* Indvendig polstring */
            border: none; /* Ingen kant */
            border-radius: 5px; /* Rundede hjørner */
            cursor: pointer; /* Musemarkør som hånd */
            width: 100%; /* Får knappen til at fylde hele bredden */
        }

            input[type="submit"]:hover {
                background-color: #45a049; /* Mørkere baggrund ved hover */
            }
    </style>
</head>
<body>

    <form action="login.php" method="POST">
        <h2>Log ind</h2>
        Brugernavn: <input type="text" name="username" required><br>
        Adgangskode: <input type="password" name="password" required><br>
        <input type="submit" value="Log ind">
    </form>

</body>
</html>


<!-- Inkluderer Menu.php -->
<div class="menu">
    <?php include 'Menu.php'; ?>
</div>