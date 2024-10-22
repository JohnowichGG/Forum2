    <style>
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 50px; 
            overflow: hidden; 
            z-index: 1000; /* Sørger for at bjælken er oven på andre elementer */
        }

        .top-bar img {
            width: 100%; /* Billedet strækkes til at dække hele bredden */
            height: 100%; /* Billedet strækkes til at dække hele højden */
            object-fit: cover; /* Sørger for at billedet dækker hele bjælken uden at ændre proportionerne */
        }

        .home-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            z-index: 1001; /* Sørger for at knappen er oven på bjælken */
        }

        .home-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opret Profil</title>
    <style>
        /* Stil til at centrere indholdet */
        body {
            display: flex;
            justify-content: center; /* Centrerer horisontalt */
            align-items: center; /* Centrerer vertikalt */
            height: calc(100vh - 50px); /* Får body til at fylde hele højden minus menuens højde */
            margin: 0; /* Fjerner standard margin */
            font-family: Arial, sans-serif; /* Vælger skrifttype */
            background-color: #f4f4f4; /* Baggrundsfarve */
        }

        .form-container {
            background-color: white; /* Hvid baggrund for formularen */
            padding: 20px; /* Indvendig polstring */
            border-radius: 5px; /* Rundede hjørner */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Skaber skygge */
            width: 300px; /* Fast bredde på formularen */
        }

        input[type="text"],
        input[type="email"],
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

    <div class="form-container">
        <h2>Opret en ny profil</h2>
        <form action="register.php" method="POST">
            Brugernavn: <input type="text" name="username" required><br>
            E-mail: <input type="email" name="email" required><br>
            Adgangskode: <input type="password" name="password" required><br>
            <input type="submit" value="Opret profil">
        </form>
    </div>

</body>
</html>


<div class="tilbage">
    <?php include 'Tilbage.php'; ?>
</div>