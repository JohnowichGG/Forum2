<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaelig;lg login eller opret profil</title>
    <style>
        .container {
            text-align: center;
            margin-top: 100px;
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

<div class="container">
    <h2>Velkommen!</h2>
    <p>V&aeliglg hvad du vil</p>
    
    <!-- Knap til login-siden -->
    <form action="login.html" method="GET">
        <button type="submit" class="button">Log ind</button>
    </form>

    <!-- Knap til registrerings-siden -->
    <form action="register.html" method="GET">
        <button type="submit" class="button">Opret Profil</button>
    </form>
</div>

</body>
</html>
