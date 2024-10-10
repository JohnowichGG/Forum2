<?php
echo '
<style>
    .top-bar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 50px; /* Angiv h�jden p� bj�lken */
        overflow: hidden; /* Skjul overskydende indhold */
        z-index: 1000; /* S�rger for at bj�lken er oven p� andre elementer */
    }

    .top-bar img {
        width: 100%; /* Billedet str�kkes til at d�kke hele bredden */
        height: 100%; /* Billedet str�kkes til at d�kke hele h�jden */
        object-fit: cover; /* S�rger for at billedet d�kker hele bj�lken uden at �ndre proportionerne */
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
        z-index: 1001; /* S�rger for at knappen er oven p� bj�lken */
    }

    .home-button:hover {
        background-color: #45a049;
    }
</style>

<div class="top-bar">
    <img src="/Billeder/Bj�lk.png" alt="Bj�lke Billede" onerror="this.src=\'/Billeder/placeholder.png\'">
</div>
<a href="index.php" class="home-button">Home</a>';
?>
