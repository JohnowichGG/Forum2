<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Velkommen vaelig;lg login eller opret profil</title>
    <style>
        .container {
            text-align: center;
            margin-top: 200px;
        }
        .button {
            padding: 15px 25px;
            font-size: 18px;
            margin: 20px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <br />
    <br />
<div class="container">
    <p>!HUSK!</p>
    <p>hold den pæne tone og hold jer til emnet</p>
    
    <!-- Knap til login-siden -->
    <form action="loggin.php" method="GET">
        <button type="submit" class="button">Log ind</button>
    </form>

    <!-- Knap til registrerings-siden -->
    <form action="registering.php" method="GET">
        <button type="submit" class="button">Opret Profil</button>
    </form>
</div>

</body>
</html>
