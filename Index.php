<?php 
session_start(); // Session should start before HTML output
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naturforum</title>
    <style>
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 50px; 
            overflow: hidden; 
            z-index: 1000; /* S�rger for at bj�lken er oven p� andre elementer */
        }

        .top-bar img {
            width: 100%; /* Billedet str�kkes til at d�kke hele bredden */
            height: 100%; /* Billedet str�kkes til at d�kke hele h�jden */
            object-fit: cover; /* S�rger for at billedet d�kker hele bj�lken uden at �ndre proportionerne */
        }

        .logo-container {
            position: absolute;
            top: 60px; /* Lidt under bj�lken */
            left: 50%;
            transform: translateX(-50%); /* Centrerer logoet horisontalt */
            z-index: 1001;
        }

        .logo-container img {
            height: 150px; /* Juster h�jden p� logoet efter behov */
            width: auto; /* Bevarer proportionerne */
        }

    </style>


   
</head>
<body>

<?php include 'InsertGuest.php'; ?>

<div class="top-bar">
    <img src="/Billeder/Bj�lk.png" alt="Bj�lke Billede" onerror="this.src='/Billeder/placeholder.png'">
</div>

<!-- Logo centreret under bj�lken -->
<div class="logo-container">
    <img src="/Billeder/Logo.png" alt="Logo">
</div>

</body>
</html>
